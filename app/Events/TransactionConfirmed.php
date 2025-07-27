<?php

namespace App\Events;

class TransactionConfirmed
{
    public $txHash;
    public $blockNumber;
    public $confirmations;

    public function __construct(string $txHash, string $blockNumber, int $confirmations = 1)
    {
        $this->txHash = $txHash;
        $this->blockNumber = $blockNumber;
        $this->confirmations = $confirmations;
    }
}