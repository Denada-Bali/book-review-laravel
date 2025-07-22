# Laravel Book Review App with Docker

![Docker](https://img.shields.io/badge/Docker-2CA5E0?style=flat&logo=docker&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)

A complete Dockerized Laravel application for book reviews, featuring:
-  Docker containers for development/production parity
-  MySQL database with persistent storage
-  Nginx web server configuration
-  Automatic code synchronization

## Server Architecture

### Nginx Configuration
Pre-configured with:
- Laravel-optimized routing
- PHP-FPM container integration
- Security headers
- Hidden file protection

### Real-Time Code Sync
- Local changes instantly reflect in containers
- No rebuilds needed for most file changes
- Volume-mapped directories:
  - `./` → `/var/www/html` (Entire project)
  - `./nginx/nginx.conf` → Nginx config

### **Troubleshooting Blade Issues**
    ```bash
# If Blade changes aren't appearing:
    docker-compose exec laravel php artisan cache:clear
    docker-compose exec laravel php artisan view:clear
The docker-compose exec laravel prefix is necessary because we're running commands inside our Docker container rather than on our host machine.
Which means our Laravel app runs in a container (like a virtual machine).

## Prerequisites

- Docker Desktop ([Install](https://www.docker.com/products/docker-desktop))
- Git ([Install](https://git-scm.com/downloads))

##  Quick Start

1. **Clone the repository**
   ```bash
   git clone [https://github.com/yourusername/book-review.git](https://github.com/Denada-Bali/book-review-laravel.git)
   cd book-review
2. Start the containers
   ```bash
   docker-compose up -d --build
3. Install dependencies
   ```bash
   docker-compose exec laravel composer install
5. Generate application key
    ```bash
    docker-compose exec laravel php artisan key:generate
6. Run migrations
   ```bash
   docker-compose exec laravel php artisan migrate
