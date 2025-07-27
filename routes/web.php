<?php

use Illuminate\Support\Facades\Route;
use App\Services\BlockchainService;

Route::get('/', function () {
    Log::info('Welcome page visited');
    return view('welcome');
})->name('home');

Route::get('/info', function () {
    Log::info('Phpinfo page visited');
    return phpinfo();
});

Route::get('/health', function () {
    $status = [];

    // Check Database Connection
    try {
        DB::connection()->getPdo();
        // Optionally, run a simple query
        DB::select('SELECT 1');
        $status['database'] = 'OK';
    } catch (\Exception $e) {
        $status['database'] = 'Error';
    }

    // Check Redis Connection
    try {
        Cache::store('redis')->put('health_check', 'OK', 10);
        $value = Cache::store('redis')->get('health_check');
        if ($value === 'OK') {
            $status['redis'] = 'OK';
        } else {
            $status['redis'] = 'Error';
        }
    } catch (\Exception $e) {
        $status['redis'] = 'Error';
    }

    // Check Storage Access
    try {
        $testFile = 'health_check.txt';
        Storage::put($testFile, 'OK');
        $content = Storage::get($testFile);
        Storage::delete($testFile);

        if ($content === 'OK') {
            $status['storage'] = 'OK';
        } else {
            $status['storage'] = 'Error';
        }
    } catch (\Exception $e) {
        $status['storage'] = 'Error';
    }

    // Determine overall health status
    $isHealthy = collect($status)->every(function ($value) {
        return $value === 'OK';
    });

    $httpStatus = $isHealthy ? 200 : 503;

    return response()->json($status, $httpStatus);
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');



Route::get('/test-blockchain', function () {
    $blockchain = app(BlockchainService::class);
    
    // Get accounts
    $accounts = $blockchain->waitForResult(fn($cb) => $blockchain->getWeb3()->eth->accounts($cb));
    $from = $accounts[0];
    $to = $accounts[1];
    
    Log::info('Using accounts', compact('from', 'to'));
    
    // Get balances before
    $balanceBefore = $blockchain->getBalance($from);
    Log::info('Balance before', ['balance' => $balanceBefore->toString()]);
    
    // Prepare and send transaction
    $txHash = $blockchain->sendTransaction([
        'from' => $from,
        'to' => $to,
        'value' => '1000000000000000',
    ]);
    
    Log::info('Transaction sent', ['tx_hash' => $txHash]);
    
    // Wait for confirmations
    $receipt = $blockchain->waitForConfirmations($txHash, 1);
    
    // Get balances after
    $balanceAfter = $blockchain->getBalance($from);
    
    return response()->json([
        'tx_hash' => $txHash,
        'receipt' => $receipt,
        'balance_before' => $balanceBefore->toString(),
        'balance_after' => $balanceAfter->toString(),
        'balance_change' => bcsub($balanceBefore->toString(), $balanceAfter->toString(), 0)
    ]);
});