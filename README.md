# Gambia Land Registry System

A modern, web-based land registry management system built with Laravel and Filament, designed to provide transparent, secure, and reliable land ownership management for The Gambia and beyond.

## 🏗️ Project Overview

This land registry system is built using:
- **Laravel 11** - PHP framework for robust backend development
- **Filament 3** - Modern admin panel and application framework
- **PostgreSQL** - Reliable relational database
- **Docker** - Containerized development environment
- **Redis** - Caching and session management

## 🚀 Features

- **Property Management** - Complete CRUD operations for land properties
- **Owner Management** - Track property ownership and history
- **Document Management** - Store and manage property-related documents
- **Transaction Tracking** - Monitor property sales and transfers
- **Legal Encumbrances** - Track liens, mortgages, and legal restrictions
- **Tax Records** - Manage property tax information
- **Survey Management** - Store property survey data
- **Permit Tracking** - Manage building and development permits
- **Dispute Resolution** - Track and manage land disputes
- **Role-based Access Control** - Secure user permissions with Filament Shield
- **Activity Logging** - Comprehensive audit trail
- **Google Maps Integration** - Visual property mapping

## 📋 Prerequisites

Before setting up the project, ensure you have the following installed:

- **Docker** (version 20.10 or higher)
- **Docker Compose** (version 2.0 or higher)
- **Git**

### Installing Docker (Ubuntu/Debian)

```bash
sudo apt update
sudo apt install -y docker-ce docker-ce-cli containerd.io docker-compose-plugin

# Verify installation
docker --version
docker compose version
```

### Installing Docker (macOS)

Download and install Docker Desktop from [https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)

### Installing Docker (Windows)

Download and install Docker Desktop from [https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)

## 🛠️ Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/Land-Registry-GM/landregistry.gm.git
cd landregistry.gm
```

### 2. Environment Configuration

```bash
# Copy the environment file
cp .env.example .env
```

Edit the `.env` file and update the following key configurations:

```env
APP_NAME="Gambia Land Registry"
APP_URL=http://localhost:8080
APP_ENV=local
APP_DEBUG=true

# Database Configuration
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=app
DB_USERNAME=laravel
DB_PASSWORD=secret

# Redis Configuration
REDIS_HOST=redis
REDIS_PASSWORD=redis@123
REDIS_PORT=6379

# User ID and Group ID (adjust to match your system)
UID=1000
GID=1000
```

To find your user ID and group ID:
```bash
id -u  # User ID
id -g  # Group ID
```

### 3. Start Docker Services

```bash
# Start all services in detached mode
docker compose -f compose.dev.yaml up -d
```

### 4. Install Dependencies

Access the workspace container:
```bash
docker compose -f compose.dev.yaml exec workspace bash
```

Install PHP dependencies:
```bash
composer install
```

Install frontend dependencies:
```bash
npm install
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Database Migrations

```bash
php artisan migrate
```

### 7. Build Frontend Assets

```bash
npm run dev
```

### 8. Access the Application

Open your browser and navigate to: [http://localhost:8080](http://localhost:8080)

## 🐳 Docker Commands

### Useful Docker Commands

```bash
# Access workspace container
docker compose -f compose.dev.yaml exec workspace bash

# Run Laravel commands
docker compose -f compose.dev.yaml exec workspace php artisan migrate
docker compose -f compose.dev.yaml exec workspace php artisan make:controller ExampleController

# View logs
docker compose -f compose.dev.yaml logs -f
docker compose -f compose.dev.yaml logs -f web

# Rebuild containers (after Dockerfile changes)
docker compose -f compose.dev.yaml up -d --build

# Stop all services
docker compose -f compose.dev.yaml down

# Stop and remove volumes
docker compose -f compose.dev.yaml down -v
```

## 🗄️ Database

The application uses PostgreSQL as the primary database. The database is automatically created when you first run the migrations.

### Database Seeding

To populate the database with sample data:

```bash
php artisan db:seed
```

### Reset Database

To reset the database and run migrations fresh:

```bash
php artisan migrate:fresh --seed
```

## 🔧 Development

### Running Tests

```bash
php artisan test
```

### Code Formatting

```bash
./vendor/bin/pint
```

## 📁 Project Structure

```
landregistry.gm/
├── app/
│   ├── Filament/           # Filament admin panel resources
│   ├── Http/Controllers/   # Laravel controllers
│   ├── Models/            # Eloquent models
│   └── Policies/          # Authorization policies
├── database/
│   ├── migrations/        # Database migrations
│   ├── seeders/          # Database seeders
│   └── factories/        # Model factories
├── docker/               # Docker configuration files
├── resources/            # Frontend assets
├── routes/              # Application routes
└── storage/             # File storage and logs
```

## 🔒 Security

- All user inputs are validated and sanitized
- SQL injection protection through Eloquent ORM
- XSS protection through Laravel's built-in security features
- CSRF protection enabled
- Role-based access control with Filament Shield
- Comprehensive activity logging

## 🐛 Troubleshooting

### Common Issues

1. **Permission Denied Errors**
   - Ensure your UID and GID in `.env` match your system user
   - Run: `chmod -R 755 storage bootstrap/cache`

2. **Database Connection Issues**
   - Verify PostgreSQL container is running: `docker compose -f compose.dev.yaml ps`
   - Check database credentials in `.env`

3. **Port Already in Use**
   - Change the port in `compose.dev.yaml` or stop conflicting services

4. **Composer Install Fails**
   - Clear composer cache: `composer clear-cache`
   - Check PHP version compatibility (requires PHP 8.2+)

### Logs

Check application logs:
```bash
docker compose -f compose.dev.yaml exec workspace tail -f storage/logs/laravel.log
```

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guidelines](CONTRIBUTING.md) for details.

### Development Workflow

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/amazing-feature`
3. Make your changes
4. Run tests: `php artisan test`
5. Commit your changes: `git commit -m 'Add amazing feature'`
6. Push to the branch: `git push origin feature/amazing-feature`
7. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

If you encounter any issues or have questions:

1. Check the [Issues](../../issues) page for existing solutions
2. Create a new issue with detailed information
3. Join our community discussions

## 🙏 Acknowledgments

- [Laravel](https://laravel.com/) - The PHP framework
- [Filament](https://filamentphp.com/) - The admin panel framework
- [Filament Shield](https://github.com/bezhansalleh/filament-shield) - Role and permission management
- [Spatie Activity Log](https://github.com/spatie/laravel-activitylog) - Activity logging

---

**Built with ❤️ for The Gambia**
