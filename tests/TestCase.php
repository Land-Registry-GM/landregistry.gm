<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\Owner;
use App\Models\Property;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;


    protected function setUp(): void
    {
        parent::setUp();
        
        // Create test data
        $this->seller = Owner::factory()->create([
            'ethereum_address' => '0x' . bin2hex(random_bytes(20))
        ]);
        
        $this->buyer = Owner::factory()->create([
            'ethereum_address' => '0x' . bin2hex(random_bytes(20))
        ]);
        
        $this->property = Property::factory()->create();
    }
}