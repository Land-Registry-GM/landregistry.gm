<?php

return [
    'rpc_url' => env('BLOCKCHAIN_RPC_URL', 'http://ganache:8545'),
    'chain_id' => (int) env('BLOCKCHAIN_CHAIN_ID', 1337),
    'contract_address' => env('BLOCKCHAIN_CONTRACT_ADDRESS'),
    'admin_private_key' => env('BLOCKCHAIN_ADMIN_PRIVATE_KEY'),
    'gas_limit' => 3000000,
    'gas_price' => '2000000000', // 2 Gwei
];
