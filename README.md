# Todo API

A Laravel-based RESTful API for managing todo tasks, built according to the provided Swagger specification.

## Features

- User authentication with JWT
- CRUD operations for tasks
- Task ownership and authorization
- RESTful API design

## API Endpoints

### Authentication

- **POST /api/auth/login** - Authenticate a user
  - Request: 
    ```json
    {
      "email": "test@example.com",
      "password": "password"
    }
    ```
  - Response: 
    ```json
    {
      "token": "jwt_token_here"
    }
    ```

- **POST /api/auth/logout** - Logout and invalidate token
  - Headers: `Authorization: Bearer {token}`
  - Response: 
    ```json
    {
      "message": "Successfully logged out"
    }
    ```

- **POST /api/auth/refresh** - Refresh JWT token
  - Headers: `Authorization: Bearer {token}`
  - Response: 
    ```json
    {
      "token": "new_jwt_token_here"
    }
    ```

- **GET /api/auth/me** - Get authenticated user profile
  - Headers: `Authorization: Bearer {token}`
  - Response: 
    ```json
    {
      "id": 1,
      "name": "Test User",
      "email": "test@example.com",
      "email_verified_at": null,
      "created_at": "2023-01-01T00:00:00.000000Z",
      "updated_at": "2023-01-01T00:00:00.000000Z"
    }
    ```

### Tasks

- **GET /api/tasks** - List all tasks for the authenticated user
  - Headers: `Authorization: Bearer {token}`
  - Response: 
    ```json
    [
      {
        "id": "uuid-string",
        "title": "Task title",
        "description": "Task description",
        "completed": false,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z",
        "user_id": 1
      }
    ]
    ```

- **POST /api/tasks** - Create a new task
  - Headers: `Authorization: Bearer {token}`
  - Request: 
    ```json
    {
      "title": "Task title",
      "description": "Task description"
    }
    ```
  - Response: 
    ```json
    {
      "id": "uuid-string",
      "title": "Task title",
      "description": "Task description",
      "completed": false,
      "created_at": "2023-01-01T00:00:00.000000Z",
      "updated_at": "2023-01-01T00:00:00.000000Z",
      "user_id": 1
    }
    ```

- **GET /api/tasks/{id}** - Get a specific task by ID
  - Headers: `Authorization: Bearer {token}`
  - Response: 
    ```json
    {
      "id": "uuid-string",
      "title": "Task title",
      "description": "Task description",
      "completed": false,
      "created_at": "2023-01-01T00:00:00.000000Z",
      "updated_at": "2023-01-01T00:00:00.000000Z",
      "user_id": 1
    }
    ```

- **PATCH /api/tasks/{id}** - Update a task
  - Headers: `Authorization: Bearer {token}`
  - Request: 
    ```json
    {
      "title": "Updated title",
      "description": "Updated description",
      "completed": true
    }
    ```
  - Response: 
    ```json
    {
      "id": "uuid-string",
      "title": "Updated title",
      "description": "Updated description",
      "completed": true,
      "created_at": "2023-01-01T00:00:00.000000Z",
      "updated_at": "2023-01-01T00:00:00.000000Z",
      "user_id": 1
    }
    ```

- **DELETE /api/tasks/{id}** - Delete a task
  - Headers: `Authorization: Bearer {token}`
  - Response: 204 No Content

## Setup Instructions (Standard)

1. Clone the repository
2. Install dependencies:
   ```
   composer install
   ```
3. Copy the `.env.example` file to `.env` and configure your database
4. Generate application key:
   ```
   php artisan key:generate
   ```
5. Generate JWT secret:
   ```
   php artisan jwt:secret
   ```
6. Run migrations and seed the database:
   ```
   php artisan migrate --seed
   ```
7. Start the development server:
   ```
   php artisan serve
   ```

## Docker Setup (Recommended)

### Prerequisites
- Docker
- Docker Compose

### Quick Setup
1. Clone the repository
2. Run the setup script:
   ```
   ./docker-setup.sh
   ```
   This script will:
   - Copy the `.env.example` to `.env`
   - Build and start Docker containers
   - Install composer dependencies
   - Generate application key and JWT secret
   - Run migrations and seed the database

### Manual Setup
1. Clone the repository
2. Copy the `.env.example` file to `.env`:
   ```
   cp .env.example .env
   ```
3. Build and start the Docker containers:
   ```
   docker-compose build
   docker-compose up -d
   ```
4. Install composer dependencies:
   ```
   docker-compose exec app composer install
   ```
5. Generate application key:
   ```
   docker-compose exec app php artisan key:generate
   ```
6. Generate JWT secret:
   ```
   docker-compose exec app php artisan jwt:secret
   ```
7. Run migrations and seed the database:
   ```
   docker-compose exec app php artisan migrate:fresh --seed
   ```

### Accessing the Application
- The API will be available at: http://localhost:8000
- Database can be accessed at: localhost:3306
  - Database: todo_api
  - Username: todo_user
  - Password: secret

### Docker Commands
- Start containers: `docker-compose up -d`
- Stop containers: `docker-compose down`
- View logs: `docker-compose logs -f`
- Access app container: `docker-compose exec app bash`
- Run artisan commands: `docker-compose exec app php artisan <command>`

## Test User

A test user is created when seeding the database:
- Email: test@example.com
- Password: password

## API Testing with Postman

A Postman collection is included in the repository (`Todo_API.postman_collection.json`). You can import this collection into Postman to test all the API endpoints.

### Testing Steps:
1. Import the collection into Postman
2. Set the `base_url` variable to `http://localhost:8000` (or your server URL)
3. Use the "Login" request to authenticate and get a token
4. The token will be automatically set for subsequent requests
5. Test the other endpoints as needed

