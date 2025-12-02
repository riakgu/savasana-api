# Savasana API

## Overview
Savasana API is a backend system for **Savasana Mom, Kids & Baby Care** - a certified baby spa and maternity treatment center. This API provides comprehensive booking management, customer tracking, service management, and business analytics for managing spa services for mothers, babies, and toddlers.

### Built With
[![Laravel][Laravel]][Laravel-url] [![PHP][PHP]][PHP-url] [![MySQL][MySQL]][MySQL-url] [![Sanctum][Sanctum]][Sanctum-url]

## Features

### Core Features
- **Customer Management** - Manage parent/guardian information
- **Client Management** - Track babies, toddlers, and moms receiving services
- **Service Management** - Define spa services with pricing and duration
- **Booking System** - Record and track appointments with payment status
- **Authentication** - Secure API with Laravel Sanctum

### Business Features
- **Dashboard Statistics** - Daily and monthly revenue, booking counts
- **Reports** - Popular services, top customers, revenue analysis
- **Booking History** - View customer and client booking history

## Documentation

You can explore and test the API using the Postman collection below:

[![Postman][Postman]][Postman-url]


## Getting Started

### Prerequisites
* PHP >= 8.2
* Composer >= 2.8.12
* MySQL >= 8.4.1
* Laravel >= 12.0

### Installation

1. Clone the repository
   ```sh
   git clone https://github.com/riakgu/savasana-api.git
   cd savasana-api
   ```

2. Install dependencies
   ```sh
   composer install
   ```

3. Set up environment variables
   ```sh
   cp .env.example .env
   ```

   Edit `.env` with your configuration:
   ```env
   APP_NAME="Savasana API"
   APP_ENV=local
   APP_KEY=
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=savasana
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Generate application key
   ```sh
   php artisan key:generate
   ```

5. Set up database
   ```sh
   php artisan migrate --seed
   ```

6. Start the application
   ```sh
   php artisan serve
   ```

   The API will be available at `http://localhost:8000`


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.


[Laravel]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[PHP]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[PHP-url]: https://www.php.net/
[MySQL]: https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white
[MySQL-url]: https://www.mysql.com/
[Sanctum]: https://img.shields.io/badge/Sanctum-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Sanctum-url]: https://laravel.com/docs/sanctum
[Postman]: https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=Postman&logoColor=white
[Postman-url]: [https://documenter.getpostman.com/view/your-collection-id](https://documenter.getpostman.com/view/29055658/2sB3dMwVtB)
