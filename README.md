# Laravel Book Review App with Docker

![Docker](https://img.shields.io/badge/Docker-2CA5E0?style=flat&logo=docker&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)

A complete Dockerized Laravel application for book reviews, featuring:
-  Docker containers for development/production parity
-  MySQL database with persistent storage
-  Nginx web server configuration
-  Automatic code synchronization

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
