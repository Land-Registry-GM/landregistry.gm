<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockchainTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_hash',
        'from_address',
        'to_address',
        'value',
        'gas_used',
        'gas_price',
        'input',
        'block_hash',
        'block_number',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'block_number' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending',
        'value' => '0',
    ];

    /**
     * Get the transaction record associated with this blockchain transaction.
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'blockchain_tx_hash', 'transaction_hash');
    }

    /**
     * Scope a query to only include pending transactions.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include confirmed transactions.
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    /**
     * Scope a query to only include failed transactions.
     */
    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    /**
     * Mark the transaction as confirmed.
     */
    public function markAsConfirmed(array $receipt): self
    {
        $this->update([
            'status' => 'confirmed',
            'block_hash' => $receipt['blockHash'] ?? null,
            'block_number' => $receipt['blockNumber'] ? hexdec($receipt['blockNumber']) : null,
            'gas_used' => $receipt['gasUsed'] ? hexdec($receipt['gasUsed']) : null,
        ]);

        return $this;
    }

    /**
     * Mark the transaction as failed.
     */
    public function markAsFailed(): self
    {
        $this->update(['status' => 'failed']);
        return $this;
    }
}