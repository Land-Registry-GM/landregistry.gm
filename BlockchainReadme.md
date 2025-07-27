# Blockchain Integration Guide

## Table of Contents
- [Overview](#overview)
- [Prerequisites](#prerequisites)
- [Setup](#setup)
- [Configuration](#configuration)
- [Usage](#usage)
- [Testing](#testing)
- [Troubleshooting](#troubleshooting)
- [Development Workflow](#development-workflow)

## Overview

This document covers the blockchain integration for the Land Registry system, including:
- Local development blockchain (Ganache)
- Smart contract interaction
- Transaction management
- Testing procedures

## Prerequisites

- Docker and Docker Compose
- Node.js (for optional tooling)
- Git

## Setup

### 1. Start Development Environment

```bash
# Start all services
docker-compose -f compose.dev.yaml up -d

# Verify Ganache is running
curl -X POST --data '{"jsonrpc":"2.0","method":"web3_clientVersion","params":[],"id":1}' http://localhost:8545
```


### 2. Environment Variables
Add these to your .env file:

# Blockchain Configuration
```bash
BLOCKCHAIN_RPC_URL=http://ganache:8545
BLOCKCHAIN_CHAIN_ID=1337
BLOCKCHAIN_CONTRACT_ADDRESS=  # Add after deployment
BLOCKCHAIN_ADMIN_PRIVATE_KEY=  # Use one from Ganache accounts
```


### 3. Ganache Accounts
Pre-configured accounts (from mnemonic in 
compose.dev.yaml
):

Account	Private Key	Balance
0x90F8...	0x4f3edf...	1000 ETH
0xFFcf...	0x6c9056...	1000 ETH
...	...	...

#### Note: Full list available in Ganache logs: 
```bash
docker-compose -f compose.dev.yaml logs ganache
```


### 4. Configuration

#### BlockchainService Located at 
```bash
app/Services/BlockchainService.php
```

 - Handles all blockchain interactions
 - Manages transaction signing and sending
 - Provides transaction verification
 
#### Transaction Model
 - recordOnBlockchain()
 - Records transaction on blockchain
 - verifyOnBlockchain()
 - Verifies transaction status
 - blockchainTransaction()
 - Relationship to BlockchainTransaction model

###   Usage
#### Recording a Transaction

```bash
$transaction = Transaction::find(1);
$txHash = $transaction->recordOnBlockchain();
```

#### Verifying a Transaction
```bash
$transaction = Transaction::find(1);
$isVerified = $transaction->verifyOnBlockchain();
```


### 5. Testing

```bash
docker exec -it landregistrygm_php-fpm_1 php artisan test tests/Feature/Models/TransactionBlockchainTest.php
```

### Test Accounts

The test environment automatically generates random Ethereum addresses for test users. The base test case ([TestCase.php](landregistry.gm/tests/TestCase.php)) sets up:

1. **Seller Account**
   - Randomly generated Ethereum address
   - Created using `Owner::factory()`

2. **Buyer Account**
   - Randomly generated Ethereum address
   - Also created using `Owner::factory()`

3. **Test Property**
   - Created using `Property::factory()`

#### Example Test Setup
```php
// These are already set up in TestCase.php
$seller = $this->seller;      // Random Ethereum address
$buyer = $this->buyer;        // Random Ethereum address
$property = $this->property;  // Test property
```

#### For Specific Address Testing
If you need to test with specific addresses (like in the previous example), you can override them:

```php
// In your test method
$this->seller->update(['ethereum_address' => '0x90F8bf6A479f320ead074411a4B0e7944Ea8c9C1']);
$this->buyer->update(['ethereum_address' => '0xFFcf8FDEE72ac11b5c542428B35EEF5769C409f0']);

// Or create new ones
$specificSeller = Owner::factory()->create([
    'ethereum_address' => '0x90F8bf6A479f320ead074411a4B0e7944Ea8c9C1'
]);

```
### Ganache Predefined Accounts
If you're using Ganache with the default mnemonic, these accounts are available:

```bash
0x90F8bf6A479f320ead074411a4B0e7944Ea8c9C1 (1000 ETH)
0xFFcf8FDEE72ac11b5c542428B35EEF5769C409f0 (1000 ETH)
0x22d491Bde2303f2f43325b2108D56f1eAc8e053e (1000 ETH)
0xE11BA2b4D45Eaed5996Cd0823791E0C93114882d (1000 ETH)
0xd03ea8624C8C5987235048901fB614fDcA89b117 (1000 ETH)
```


But note that our current test implementation uses randomly generated addresses by default.


### Development Workflow
Start Services:
```bash
docker-compose -f compose.dev.yaml up -d
```
Run Migrations:
```bash
docker-compose -f compose.dev.yaml exec workspace php artisan migrate
```
Run Tests:
```bash
docker-compose -f compose.dev.yaml exec workspace php artisan test
```
View Logs:
```bash
# Blockchain logs
docker-compose -f compose.dev.yaml logs -f ganache
```

# Application logs
```bash
docker-compose -f compose.dev.yaml logs -f php-fpm
```

### Troubleshooting
Common Issues

 - Connection Refused
 - Verify Ganache is running:
 ```bash 
 docker ps | grep ganache
 ```
 - Check logs:
 ```bash 
 docker-compose -f compose.dev.yaml logs ganache
 ```

### Transaction Failures
 - Check gas limits
 - Verify account balances
 - Look for revert reasons in Ganache logs

### Persistent Data
 - Blockchain data is stored in Docker volume ganache_data
 - Reset:
 ```bash
 docker-compose -f compose.dev.yaml down -v
 ```

### Advanced
Accessing Ganache Console
```bash
docker-compose -f compose.dev.yaml exec ganache geth attach
> eth.accounts
> eth.getBalance(eth.accounts[0])
```
### Resetting Blockchain
```bash
# Stop and remove containers and volumes
docker-compose -f compose.dev.yaml down -v

# Start fresh
docker-compose -f compose.dev.yaml up -d
```
Security Notes
 - Never commit private keys to version control
 - Use environment variables for sensitive data
 - Keep test accounts separate from production
 - Regularly update dependencies

### Support
For issues, please contact mlanlokun@gmail.com or create an issue in the repository.


