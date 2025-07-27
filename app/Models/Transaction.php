<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Services\BlockchainService;

class Transaction extends Model
{
    use LogsActivity;

    protected $fillable = [
        'property_id',
        'transaction_type',
        'buyer_id',
        'seller_id',
        'amount',
        'transaction_date',
        'deed_number',
        'tax_paid',
        'recorded_by',
        'blockchain_tx_hash',
        'blockchain_verified_at',
        'status',


    ];

    protected $casts = [
        'transaction_date' => 'datetime:Y-m-d',
        'tax_paid' => 'boolean',
        'amount' => 'decimal:2'
    ];

    protected $dates = [
        'blockchain_verified_at'
    ];


    protected $attributes = [
        'status' => 'pending',
        'tax_paid' => false,
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function buyer()
    {
        return $this->belongsTo(Owner::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(Owner::class, 'seller_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Transaction model has been {$eventName}");
    }

    public function blockchainTransaction()
    {
        return $this->hasOne(BlockchainTransaction::class, 'transaction_hash', 'blockchain_tx_hash');
    }

    public function recordOnBlockchain(): ?string
    {
        // If already recorded, return the existing hash
        if ($this->blockchain_tx_hash) {
            return $this->blockchain_tx_hash;
        }

        try {
            $blockchainService = app(BlockchainService::class);
            
            // Prepare transaction data
            $transactionData = [
                'from' => $this->seller->ethereum_address,
                'to' => $this->buyer->ethereum_address,
                'value' => $this->amount,
                'data' => [
                    'property_id' => $this->property_id,
                    'transaction_id' => $this->id,
                ]
            ];
            
            // Send the transaction
            $txHash = $blockchainService->sendTransaction($transactionData);

            if ($txHash) {
                $this->update([
                    'blockchain_tx_hash' => $txHash,
                    'status' => 'completed'
                ]);
                return $txHash;
            } else {
                $this->update(['status' => 'failed']);
            }

            return null;
        } catch (\Exception $e) {
            $this->update(['status' => 'failed']);
            \Log::error('Error recording transaction on blockchain', [
                'transaction_id' => $this->id,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }

    /**
     * Verify the transaction on the blockchain
     *
     * @return bool
     */
    public function verifyOnBlockchain(): bool
    {
        if (!$this->blockchain_tx_hash) {
            return false;
        }

        try {
            $blockchainService = app(BlockchainService::class);
            $isVerified = $blockchainService->verifyTransaction($this->blockchain_tx_hash);
            
            if ($isVerified) {
                $this->update([
                    'blockchain_verified_at' => now(),
                    'status' => 'completed'
                ]);
            }
            
            return $isVerified;
        } catch (\Exception $e) {
            \Log::error('Error verifying transaction on blockchain', [
                'transaction_id' => $this->id,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    /**
     * Get transaction details from the blockchain
     *
     * @return array|null
     */
    public function getBlockchainDetails(): ?array
    {
        if (!$this->blockchain_tx_hash) {
            return null;
        }

        try {
            $blockchainService = app(BlockchainService::class);
            return $blockchainService->getTransaction($this->blockchain_tx_hash);
        } catch (\Exception $e) {
            \Log::error('Error fetching transaction details from blockchain', [
                'transaction_id' => $this->id,
                'tx_hash' => $this->blockchain_tx_hash,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }

    /**
     * Get transaction receipt from the blockchain
     *
     * @return array|null
     */
    public function getBlockchainReceipt(): ?array
    {
        if (!$this->blockchain_tx_hash) {
            return null;
        }

        try {
            $blockchainService = app(BlockchainService::class);
            return $blockchainService->getTransactionReceipt($this->blockchain_tx_hash);
        } catch (\Exception $e) {
            \Log::error('Error fetching transaction receipt from blockchain', [
                'transaction_id' => $this->id,
                'tx_hash' => $this->blockchain_tx_hash,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }


}