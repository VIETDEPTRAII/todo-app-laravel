#!/bin/bash

# Copy .env file
cp .env.example .env

# Build Docker containers
docker-compose build

# Start Docker containers
docker-compose up -d

# Install composer dependencies
docker-compose exec app composer install

# Generate application key
docker-compose exec app php artisan key:generate

# Generate JWT secret
docker-compose exec app php artisan jwt:secret

# Run migrations and seed the database
docker-compose exec app php artisan migrate:fresh --seed

# Set proper permissions
docker-compose exec app chmod -R 777 storage bootstrap/cache

echo "Docker setup completed successfully!"
echo "Your Todo API is now running at http://localhost"

