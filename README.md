# Task Management API

## Overview

The **Task Management API** is a RESTful API built with **Lumen** that allows users to manage tasks effectively. The API supports basic CRUD operations and provides features for filtering, searching, and pagination of tasks. It is designed to help users keep track of their tasks, including details such as title, description, status, and due dates.

## Technologies Used

- **Lumen**: A PHP micro-framework by Laravel that is fast and lightweight, suitable for building APIs.
- **PostgreSQL**: A powerful, open-source object-relational database system that uses and extends the SQL language.
- **PHP**: The server-side scripting language used to develop the application.
- **Composer**: Dependency manager for PHP used to install Lumen and other required packages.
- **Postman**: Tool used for testing API endpoints during development.

## Installation

1. **Clone the repository:**
   ```bash
   git clonegit@github.com:Sparrowan/tasks-lumen-api.git
   cd tasks-lumen-api

2. **Install dependencies:**
    ```bash
    composer install
3. **Configure the environment variables: Copy the .env.example file to .env and configure your database connection settings.**
4. **Run migrations:**
    ```bash
    php artisan migrate
5. **Start the server:**
    ```bash
    php -S localhost:8000 -t public

## API Endpoints

The following endpoints are available in the Task Management API:

### 1. Create a Task
- **Endpoint:** `POST /api/tasks`
- **Description:** Create a new task.
- **Request Body:**
  ```json
  {
      "title": "Task Title",
      "description": "Task description",
      "status": "pending",
      "due_date": "2024-10-20"
  }

### 2. Get All Tasks
- **Endpoint:** `GET /api/tasks`
- **Description:** Retrieve a list of all tasks with optional filters.
- **Query Parameters:**
  - `status`: Filter tasks by status (pending, completed).
  - `due_date`: Filter tasks by due date.
  - `search`: Search tasks by title.
  - `per_page`: Number of tasks per page (default is 10).

### 3. Get a Single Task
- **Endpoint:** `GET /api/tasks/{id}`
- **Description:** Retrieve a specific task by ID.

### 4. Update a Task
- **Endpoint:** `PUT /api/tasks/{id}`
- **Description:** Update an existing task by ID.
- **Request Body:**
  ```json
  {
      "title": "Updated Task Title",
      "description": "Updated description",
      "status": "completed",
      "due_date": "2024-11-01"
  }

### 5. Delete a Task
- **Endpoint:** `DELETE /api/tasks/{id}`
- **Description:** Delete a specific task by ID.



## Postman Collection

A Postman collection named `Task-api-lumen.postman_collection.json` is available for easy testing of the Task Management API. This collection includes all the API endpoints along with sample requests and responses, making it simple to interact with the API and explore its functionalities.

To use the collection, follow these steps:

1. Download the `Task-api-lumen.postman_collection.json` file.
2. Open Postman and import the collection by selecting **File > Import** and choosing the downloaded JSON file.
3. Once imported, you can test each endpoint, modify requests, and observe responses directly within Postman.

