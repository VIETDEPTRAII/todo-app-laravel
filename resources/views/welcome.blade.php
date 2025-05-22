<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo API</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
            color: #1a202c;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        header {
            text-align: center;
            margin-bottom: 2rem;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #2563eb;
        }
        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        h2 {
            color: #1e40af;
            font-size: 1.5rem;
            margin-top: 0;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 0.75rem;
            padding-left: 1.5rem;
            position: relative;
        }
        li::before {
            content: "→";
            position: absolute;
            left: 0;
            color: #3b82f6;
        }
        code {
            background-color: #f1f5f9;
            padding: 0.2rem 0.4rem;
            border-radius: 0.25rem;
            font-family: monospace;
        }
        .footer {
            text-align: center;
            margin-top: 2rem;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Todo API</h1>
            <p>A RESTful API for managing todo tasks</p>
        </header>

        <div class="card">
            <h2>API Documentation</h2>
            <p>This API provides endpoints for managing todo tasks with authentication.</p>
            <p>The API follows the OpenAPI 3.0.0 specification and includes the following features:</p>
            <ul>
                <li>User authentication with JWT</li>
                <li>CRUD operations for tasks</li>
                <li>Task ownership and authorization</li>
                <li>RESTful API design</li>
            </ul>
        </div>

        <div class="card">
            <h2>Authentication Endpoints</h2>
            <ul>
                <li><code>POST /api/auth/login</code> - Authenticate a user</li>
            </ul>
        </div>

        <div class="card">
            <h2>Task Endpoints</h2>
            <ul>
                <li><code>GET /api/tasks</code> - List all tasks</li>
                <li><code>POST /api/tasks</code> - Create a new task</li>
                <li><code>GET /api/tasks/{id}</code> - Get a task by ID</li>
                <li><code>PATCH /api/tasks/{id}</code> - Update a task</li>
                <li><code>DELETE /api/tasks/{id}</code> - Delete a task</li>
            </ul>
        </div>

        <div class="card">
            <h2>Getting Started</h2>
            <p>To use this API, you need to authenticate first and then use the JWT token for subsequent requests.</p>
            <p>Check the README.md file for detailed instructions and examples.</p>
            <p>A Postman collection is also available in the repository for testing the API endpoints.</p>
        </div>

        <div class="footer">
            <p>Created with Laravel {{ app()->version() }}</p>
        </div>
    </div>
</body>
</html>

