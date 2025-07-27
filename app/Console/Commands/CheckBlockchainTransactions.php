<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BlockchainTransaction;
use App\Services\BlockchainService;
use Illuminate\Support\Facades\Log;

class CheckBlockchainTransactions extends Command
{
    protected $signature = 'blockchain:check-transactions';
    protected $description = 'Check status of pending blockchain transactions';

    protected $blockchainService;

    public function __construct(BlockchainService $blockchainService)
    {
        parent::__construct();
        $this->blockchainService = $blockchainService;
    }

    public function handle()
    {
        $pendingTxs = BlockchainTransaction::where('status', 'pending')->get();

        foreach ($pendingTxs as $tx) {
            try {
                $receipt = $this->blockchainService->getTransactionReceipt($tx->transaction_hash);

                if ($receipt) {
                    $tx->block_hash = $receipt->blockHash;
                    $tx->block_number = hexdec($receipt->blockNumber->toString());
                    $tx->gas_used = hexdec($receipt->gasUsed->toString());
                    $tx->status = ($receipt->status === '0x1') ? 'confirmed' : 'failed';
                    $tx->save();

                    $this->info("✔ Transaction {$tx->transaction_hash} confirmed in block {$tx->block_number}");
                }
            } catch (\Exception $e) {
                $this->error("✘ Error checking transaction {$tx->transaction_hash}: " . $e->getMessage());
                Log::error("Transaction check failed", [
                    'tx_hash' => $tx->transaction_hash,
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }
}
