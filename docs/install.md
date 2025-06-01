## Introduction
This is supposed to be a technical documentation which would cover design and setting up of the landregistry.gm prototype. Docker is a very popular container soluton which  simplifies app developement by making sure the app is portable accross different environment. It solves the problem of "it works on my system"

## Architecture
![image](diagrams/arch.png)

There are three main components:


## Setting up dev eng

1. Install Docker and Docker compose
```bash
sudo apt install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin

docker --version
docker compose version
```

2. Clone the repository
```bash
git clone https://github.com/Land-Registry-GM/landregistry.gm.git
cd landregistry.gm
cp .env.example .env
```

3. Go through the env file and update APP_URL 
4. Generate key and update APP_KEY using 
```bash 
docker compose -f compose.dev.yaml exec workspace php artisan key:generate
```

4. You may have to adjust the UID and GID variables in the .env file to match your user ID and group ID in the terminal.

```bash
 id -u
 id -g
```
## Starting the Application

### 1. Start Docker Compose Services

```bash
docker compose -f compose.dev.yaml up -d
```

### 2. Install Laravel and Frontend Dependencies

Enter the workspace container:

```bash
docker compose -f compose.dev.yaml exec workspace bash
```

#### a. Install PHP Dependencies

Run the following command to install PHP dependencies using Composer:

```bash
composer install
```
This command reads the `composer.json` file and installs all required PHP packages for the Laravel application.

#### b. Install Frontend Dependencies

Install JavaScript and CSS dependencies using npm:

```bash
npm install
```
This command downloads and installs all frontend packages listed in `package.json`, such as Vue.js, React, or Tailwind CSS.

#### c. Build Frontend Assets

Compile and bundle frontend assets for development:

```bash
npm run dev
```
This command processes and builds your frontend assets (JavaScript, CSS, etc.) so they are ready to be served by the application.

### 3. Run Database Migrations

```bash
docker compose -f compose.dev.yaml exec workspace php artisan migrate
```

### 4. Access the Application

Open your browser and go to [http://localhost](http://localhost).



## Filament Reference
https://filamentphp.com/docs/2.x/admin/resources/getting-started

### Create Resource
php artisan make:filament-resource Property


### Relationship managers
php artisan make:filament-relation-manager PropertyResource owners title
php artisan make:filament-relation-manager PropertyResource documents title
php artisan make:filament-relation-manager PropertyResource legalEncumbrances title
php artisan make:filament-relation-manager PropertyResource transactions title
php artisan make:filament-relation-manager PropertyResource taxRecords title
php artisan make:filament-relation-manager PropertyResource surveys title
php artisan make:filament-relation-manager PropertyResource permits title
php artisan make:filament-relation-manager PropertyResource disputes title

### many to many relationship
php artisan make:migration create_property_owner_table


### Filament Resources & CRUD operation very simplified
php artisan make:filament-resource Owner
php artisan make:filament-resource Property



can different people owning the same land have different type of ownership e.g. one has Freehold and the other have Lease ownership?


### Troubleshooting

docker compose -f compose.dev.yaml exec workspace php artisan key:generate


### Some issues
1. auditing, keeping track of changes
2. 

