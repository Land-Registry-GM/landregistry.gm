<?php

namespace App\Listeners;

use App\Events\TransactionConfirmed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TransactionConfirmationListener
{
    public function handle(TransactionConfirmed $event)
    {
        Log::info('Transaction confirmed', [
            'tx_hash' => $event->txHash,
            'block_number' => $event->blockNumber,
            'confirmations' => $event->confirmations
        ]);
    }
}