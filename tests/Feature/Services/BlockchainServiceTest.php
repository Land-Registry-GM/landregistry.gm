<?php

namespace Tests\Feature\Services;

use Tests\TestCase;
use App\Services\BlockchainService;
use Illuminate\Support\Facades\Log;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;

class BlockchainServiceTest extends TestCase
{
    protected $blockchainService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->blockchainService = new BlockchainService();
    }

    /** @test */
    public function it_can_get_web3_instance()
    {
        $web3 = $this->blockchainService->getWeb3();
        $this->assertInstanceOf(\Web3\Web3::class, $web3);
    }

    /** @test */
    public function it_can_get_account_balance()
    {
        // Get the first account from Ganache
        $accounts = $this->blockchainService->waitForResult(
            fn($cb) => $this->blockchainService->getWeb3()->eth->accounts($cb)
        );
        
        $balance = $this->blockchainService->getBalance($accounts[0]);
        $this->assertTrue(is_numeric($balance->toString()));
        $this->assertGreaterThan(0, $balance->toString());
    }

    /** @test */
    public function it_can_send_transaction()
    {
        // Get accounts
        $accounts = $this->blockchainService->waitForResult(
            fn($cb) => $this->blockchainService->getWeb3()->eth->accounts($cb)
        );
        
        $from = $accounts[0];
        $to = $accounts[1];
        $value = '1000000000000000'; // 0.001 ETH

        // Get initial balances
        $initialBalanceFrom = $this->blockchainService->getBalance($from);
        $initialBalanceTo = $this->blockchainService->getBalance($to);

        // Send transaction
        $txHash = $this->blockchainService->sendTransaction([
            'from' => $from,
            'to' => $to,
            'value' => $value,
        ]);

        // Wait for transaction to be mined
        $receipt = $this->blockchainService->waitForConfirmations($txHash, 1);

        // Get final balances
        $finalBalanceFrom = $this->blockchainService->getBalance($from);
        $finalBalanceTo = $this->blockchainService->getBalance($to);

        // Assertions
        $this->assertIsString($txHash);
        $this->assertStringStartsWith('0x', $txHash);
        $this->assertObjectHasProperty('blockNumber', $receipt);
        $this->assertLessThan(0, $finalBalanceFrom->toString() - $initialBalanceFrom->toString());
        $this->assertGreaterThan(0, $finalBalanceTo->toString() - $initialBalanceTo->toString());
    }
}