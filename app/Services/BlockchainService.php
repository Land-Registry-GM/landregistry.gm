<?php

namespace App\Services;

use Web3\Web3;
use Web3\Contract;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3p\EthereumTx\Transaction;
use Illuminate\Support\Facades\Log;

class BlockchainService
{
    protected $web3;
    protected $contractAddress;
    protected $privateKey;
    protected $gasLimit;
    protected $gasPrice;
    protected $chainId;


    public function __construct()
    {
        $this->web3 = new Web3(new HttpProvider(new HttpRequestManager(config('blockchain.rpc_url'))));
        $this->contractAddress = config('blockchain.contract_address');
        $this->privateKey = config('blockchain.admin_private_key');
        $this->gasLimit = config('blockchain.gas_limit', 200000);  // Use from config
        $this->gasPrice = config('blockchain.gas_price', '2000000000');
        $this->chainId = (int) config('blockchain.chain_id', 1337);
        
        Log::info('BlockchainService initialized', [
            'rpc_url' => config('blockchain.rpc_url'),
            'contract_address' => $this->contractAddress,
            'chain_id' => $this->chainId,
            'gas_limit' => $this->gasLimit,
            'gas_price' => $this->gasPrice
        ]);
    }
        
    

    public function waitForResult(callable $callback)
    {
        $result = null;
        $error = null;

        $callback(function ($err, $res) use (&$result, &$error) {
            if ($err) {
                $error = $err;
                return;
            }
            $result = $res;
        });

        $tries = 0;
        while ($result === null && $error === null && $tries < 100) {
            usleep(10000); // 10ms
            $tries++;
        }

        if ($error !== null) {
            Log::error("Blockchain error: " . $error->getMessage());
            throw $error;
        }

        return $result;
    }

    public function getWeb3(): Web3
    {
        return $this->web3;
    }

    protected function getNonce($address)
    {
        $nonce = $this->waitForResult(
            fn($cb) => $this->web3->eth->getTransactionCount($address, 'pending', $cb)
        );
        return '0x' . $nonce->toString(16); // Convert to hex string
    }

    
    public function getTransactionReceipt(string $txHash)
    {
        return $this->waitForResult(fn($cb) => $this->web3->eth->getTransactionReceipt($txHash, $cb));
    }

    public function sendTransaction(array $transaction)
    {
        try {
            Log::info('Preparing to send transaction', ['tx' => $transaction]);
            
            // Convert numeric strings to hex for Web3
            $tx = array_merge($transaction, [
                'from' => $transaction['from'],
                'to' => $transaction['to'] ?? null,
                'value' => '0x' . dechex($transaction['value'] ?? 0),
                'gasPrice' => '0x' . dechex($this->gasPrice),
                'gas' => '0x' . dechex($this->gasLimit),
                'data' => $transaction['data'] ?? '0x',
                'chainId' => $this->chainId,
            ]);
    
            Log::info('Transaction after processing', ['tx' => $tx]);
    
            // Sign the transaction
            $signedTx = $this->signTransaction($tx);
            Log::info('Sending signed transaction', ['signedTx' => $signedTx]);
    
            // Send the transaction
            $txHash = $this->waitForResult(
                fn($cb) => $this->web3->eth->sendRawTransaction($signedTx, $cb)
            );
    
            Log::info('Transaction sent, waiting for mining...', ['tx_hash' => $txHash]);
    
            // Wait for at least 1 confirmation
            $receipt = $this->waitForConfirmations($txHash, 1);
    
            Log::info('Transaction mined successfully', [
                'tx_hash' => $txHash,
                'block_number' => $receipt->blockNumber ?? 'unknown'
            ]);
    
            return $txHash;
    
        } catch (\Exception $e) {
            Log::error('Error in sendTransaction', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'transaction' => $transaction
            ]);
            throw $e;
        }
    }
    protected function signTransaction(array $transaction)
    {
        try {
            Log::info('Starting transaction signing', ['tx' => $transaction, 'chainId' => $this->chainId]);
            
            // Convert all numeric values to hex
            $tx = array_map(function($value) {
                if (is_numeric($value)) {
                    return '0x' . dechex($value);
                }
                return $value;
            }, $transaction);
    
            // Ensure required fields
            $tx['gas'] = $tx['gas'] ?? '0x' . dechex($this->gasLimit);
            $tx['gasPrice'] = $tx['gasPrice'] ?? '0x' . dechex($this->gasPrice);
            $tx['chainId'] = $this->chainId; // Explicitly set chainId
            
            // Get nonce
            $tx['nonce'] = $this->getNonce($tx['from']);
            
            Log::info('Transaction data before signing', [
                'tx' => $tx,
                'chainId' => $this->chainId,
                'privateKey' => $this->privateKey ? substr($this->privateKey, 0, 6) . '...' : null
            ]);
    
            // Create and sign the transaction
            $transaction = new Transaction($tx);
            $signed = $transaction->sign($this->privateKey);
            $signedTx = '0x' . $signed;
    
            Log::info('Transaction signed successfully', [
                'signedTx' => $signedTx,
                'txHash' => '0x' . $transaction->hash(false)
            ]);
    
            return $signedTx;
    
        } catch (\Exception $e) {
            Log::error('Error in signTransaction', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'tx' => $transaction
            ]);
            throw $e;
        }
    }

    public function getBalance(string $address)
    {
        return $this->waitForResult(
            fn($cb) => $this->web3->eth->getBalance($address, 'latest', $cb)
        );
    }

    public function waitForConfirmations(string $txHash, int $requiredConfirmations = 1)
    {
        $maxAttempts = 30; // 30 attempts * 2 seconds = 1 minute max wait time
        $attempt = 0;
        $receipt = null;
    
        Log::info('Waiting for transaction confirmations', [
            'tx_hash' => $txHash,
            'required_confirmations' => $requiredConfirmations
        ]);
    
        while ($attempt < $maxAttempts) {
            try {
                // Get the transaction receipt
                $receipt = $this->waitForResult(
                    fn($cb) => $this->web3->eth->getTransactionReceipt($txHash, $cb)
                );
    
                if ($receipt) {
                    $blockNumber = $receipt->blockNumber;
                    $currentBlock = $this->waitForResult(
                        fn($cb) => $this->web3->eth->blockNumber($cb)
                    );
    
                    $confirmations = hexdec($currentBlock->toString()) - hexdec($blockNumber) + 1;
    
                    Log::info('Transaction status', [
                        'tx_hash' => $txHash,
                        'block_number' => $blockNumber,
                        'current_block' => $currentBlock->toString(),
                        'confirmations' => $confirmations,
                        'required_confirmations' => $requiredConfirmations
                    ]);
    
                    if ($confirmations >= $requiredConfirmations) {
                        event(new \App\Events\TransactionConfirmed(
                            $txHash,
                            $blockNumber,
                            $confirmations
                        ));
                        return $receipt;
                    }
                }
    
                $attempt++;
                Log::debug('Transaction not confirmed yet, waiting...', [
                    'tx_hash' => $txHash,
                    'attempt' => $attempt,
                    'max_attempts' => $maxAttempts
                ]);
                
                // Wait 2 seconds before trying again
                sleep(2);
    
            } catch (\Exception $e) {
                Log::error('Error checking transaction status', [
                    'tx_hash' => $txHash,
                    'error' => $e->getMessage(),
                    'attempt' => $attempt
                ]);
                $attempt++;
                sleep(2); // Wait 2 seconds before retrying
            }
        }
    
        throw new \Exception("Transaction not found or not mined after {$maxAttempts} attempts");
    }

}