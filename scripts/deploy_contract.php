<?php

require __DIR__.'/../vendor/autoload.php';

use Web3\Web3;
use Web3\Contract;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Utils;
use Web3p\EthereumTx\Transaction;

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Initialize Web3
$provider = new HttpProvider(new HttpRequestManager('http://ganache:8545'));
$web3 = new Web3($provider);

// Get the contract source
$contractSource = file_get_contents(__DIR__ . '/../resources/contracts/LandRegistry.sol');

// Compile the contract
$compiled = shell_exec('solc --combined-json abi,bin ' . escapeshellarg($contractSource));
$compiled = json_decode($compiled, true);

// Get the ABI and bytecode
$abi = json_encode($compiled['contracts']['LandRegistry.sol:LandRegistry']['abi']);
$bytecode = '0x' . $compiled['contracts']['LandRegistry.sol:LandRegistry']['bin'];

// Deploy the contract
$contract = new Contract($provider, $abi);
$from = '0x90F8bf6A479f320ead074411a4B0e7944Ea8c9C1'; // First Ganache account
$privateKey = '0x4f3edf983ac636a65a842ce7c78d9aa706d3b113bce9c46f30d7d21715b23b1d';

// Get nonce
$nonce = null;
$web3->eth->getTransactionCount($from, function ($err, $result) use (&$nonce) {
    if ($err !== null) {
        echo 'Error getting nonce: ' . $err->getMessage() . PHP_EOL;
        exit(1);
    }
    $nonce = $result->toString();
});

// Deploy transaction
$deployTx = $contract->bytecode($bytecode)->new([
    'from' => $from,
    'gas' => '0x200000'
], function ($err, $transaction) use ($contract, $from, $privateKey, $nonce) {
    if ($err !== null) {
        echo 'Error creating transaction: ' . $err->getMessage() . PHP_EOL;
        exit(1);
    }

    // Sign and send the transaction
    $signedTx = '0x' . $transaction;
    $txHash = null;
    $web3->eth->sendRawTransaction($signedTx, function ($err, $result) use (&$txHash) {
        if ($err !== null) {
            echo 'Error sending transaction: ' . $err->getMessage() . PHP_EOL;
            exit(1);
        }
        $txHash = $result;
    });

    // Wait for the transaction to be mined
    $receipt = null;
    while ($receipt === null) {
        $web3->eth->getTransactionReceipt($txHash, function ($err, $result) use (&$receipt) {
            if ($err !== null) {
                echo 'Error getting receipt: ' . $err->getMessage() . PHP_EOL;
                exit(1);
            }
            $receipt = $result;
        });
        sleep(1);
    }

    echo 'Contract deployed at: ' . $receipt->contractAddress . PHP_EOL;
    echo 'Transaction hash: ' . $txHash . PHP_EOL;
});