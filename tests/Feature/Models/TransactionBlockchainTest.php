<?php

namespace Tests\Feature\Models;

use App\Models\Owner;
use App\Models\Property;
use App\Models\Transaction;
use App\Services\BlockchainService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;

class TransactionBlockchainTest extends TestCase
{
    use RefreshDatabase;

    protected $seller;
    protected $buyer;
    protected $property;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seller = Owner::factory()->create([
            'ethereum_address' => '0x' . bin2hex(random_bytes(20))
        ]);

        $this->buyer = Owner::factory()->create([
            'ethereum_address' => '0x' . bin2hex(random_bytes(20))
        ]);

        $this->property = Property::factory()->create();
    }

    #[Test]
    public function it_can_record_transaction_on_blockchain()
    {
        $this->mock(BlockchainService::class, function (MockInterface $mock) {
            $mock->shouldReceive('sendTransaction')
                ->once()
                ->with(Mockery::on(function ($transaction) {
                    return is_array($transaction) && 
                           isset($transaction['from']) && 
                           isset($transaction['to']) && 
                           isset($transaction['value']);
                }))
                ->andReturn('0x1234567890abcdef');
        });

        $transaction = Transaction::create([
            'property_id' => $this->property->id,
            'buyer_id' => $this->buyer->id,
            'seller_id' => $this->seller->id,
            'amount' => 100000,
            'transaction_type' => 'sale',
            'transaction_date' => now(),
            'deed_number' => 'DEED-' . uniqid(),
            'tax_paid' => true,
            'recorded_by' => 1,
            'status' => 'pending'
        ]);

        // Record on blockchain
        $txHash = $transaction->recordOnBlockchain();

        // Assert the transaction was recorded
        $this->assertEquals('0x1234567890abcdef', $txHash);
        $this->assertEquals('0x1234567890abcdef', $transaction->fresh()->blockchain_tx_hash);
        $this->assertEquals('completed', $transaction->fresh()->status);
    }

    #[Test]
    public function it_handles_blockchain_failure_gracefully()
    {
        $this->mock(BlockchainService::class, function (MockInterface $mock) {
            $mock->shouldReceive('sendTransaction')
                ->once()
                ->with(Mockery::on(function ($transaction) {
                    return is_array($transaction) && 
                           isset($transaction['from']) && 
                           isset($transaction['to']) && 
                           isset($transaction['value']);
                }))
                ->andReturnNull();
        });

        $transaction = Transaction::create([
            'property_id' => $this->property->id,
            'buyer_id' => $this->buyer->id,
            'seller_id' => $this->seller->id,
            'amount' => 100000,
            'transaction_type' => 'sale',
            'transaction_date' => now(),
            'deed_number' => 'DEED-' . uniqid(),
            'tax_paid' => true,
            'recorded_by' => 1,
            'status' => 'pending'
        ]);

        // Attempt to record on blockchain
        $txHash = $transaction->recordOnBlockchain();

        // Assert the transaction failed gracefully
        $this->assertNull($txHash);
        $this->assertNull($transaction->fresh()->blockchain_tx_hash);
        $this->assertEquals('failed', $transaction->fresh()->status);
    }

    #[Test]
    public function it_verifies_transaction_on_chain()
    {
        $this->mock(BlockchainService::class, function (MockInterface $mock) {
            $mock->shouldReceive('verifyTransaction')
                ->with('0x1234567890abcdef')
                ->once()
                ->andReturn(true);
        });

        $transaction = Transaction::create([
            'property_id' => $this->property->id,
            'buyer_id' => $this->buyer->id,
            'seller_id' => $this->seller->id,
            'amount' => 100000,
            'transaction_type' => 'sale',
            'transaction_date' => now(),
            'deed_number' => 'DEED-' . uniqid(),
            'tax_paid' => true,
            'recorded_by' => 1,
            'blockchain_tx_hash' => '0x1234567890abcdef',
            'status' => 'pending'
        ]);

        // Verify the transaction
        $isVerified = $transaction->verifyOnBlockchain();

        // Assert the transaction was verified
        $this->assertTrue($isVerified);
        $this->assertEquals('completed', $transaction->fresh()->status);
    }

    #[Test]
    public function it_retrieves_transaction_details_from_blockchain()
    {
        $this->mock(BlockchainService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getTransaction')
                ->with('0x1234567890abcdef')
                ->once()
                ->andReturn(['hash' => '0x1234567890abcdef', 'blockNumber' => '0x12345']);
    
            $mock->shouldReceive('getTransactionReceipt')
                ->with('0x1234567890abcdef')
                ->once()
                ->andReturn(['status' => '0x1', 'blockHash' => '0xabc123']);
        });
    
        $transaction = Transaction::create([
            'property_id' => $this->property->id,
            'buyer_id' => $this->buyer->id,
            'seller_id' => $this->seller->id,
            'amount' => 100000,
            'transaction_type' => 'sale',
            'transaction_date' => now(),
            'deed_number' => 'DEED-' . uniqid(),
            'tax_paid' => true,
            'recorded_by' => 1,
            'blockchain_tx_hash' => '0x1234567890abcdef',
            'status' => 'pending'
        ]);
    
        // Get transaction details
        $details = $transaction->getBlockchainDetails();
        $receipt = $transaction->getBlockchainReceipt();
    
        // Assert the details were retrieved
        $this->assertIsArray($details);
        $this->assertEquals('0x1234567890abcdef', $details['hash']);
        $this->assertIsArray($receipt);
        $this->assertEquals('0x1', $receipt['status']);
    }
}