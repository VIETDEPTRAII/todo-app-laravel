# Todo API

A Laravel-based RESTful API for managing todo tasks, built according to the provided Swagger specification.

## Features

- User authentication with JWT
- CRUD operations for tasks
- Task ownership and authorization
- RESTful API design

## API Endpoints

### Authentication

- **POST /api/auth/login** - Authenticate a user and get a JWT token
  - Request: `{ "email": "user@example.com", "password": "password" }`
  - Response: `{ "token": "jwt_token_here" }`

### Tasks

- **GET /api/tasks** - List all tasks for the authenticated user
  - Headers: `Authorization: Bearer {token}`
  - Response: Array of task objects

- **POST /api/tasks** - Create a new task
  - Headers: `Authorization: Bearer {token}`
  - Request: `{ "title": "Task title", "description": "Task description" }`
  - Response: Created task object

- **GET /api/tasks/{id}** - Get a specific task by ID
  - Headers: `Authorization: Bearer {token}`
  - Response: Task object

- **PATCH /api/tasks/{id}** - Update a task
  - Headers: `Authorization: Bearer {token}`
  - Request: `{ "title": "Updated title", "description": "Updated description", "completed": true }`
  - Response: Updated task object

- **DELETE /api/tasks/{id}** - Delete a task
  - Headers: `Authorization: Bearer {token}`
  - Response: 204 No Content

## Setup Instructions

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

## Test User

A test user is created when seeding the database:
- Email: test@example.com
- Password: password

## Task Model

```json
{
  "id": "uuid-string",
  "title": "Task title",
  "description": "Task description",
  "completed": false,
  "createdAt": "2023-01-01T00:00:00.000Z",
  "updatedAt": "2023-01-01T00:00:00.000Z"
}
```

