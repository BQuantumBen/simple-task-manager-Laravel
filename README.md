Certainly! Below is a simplified version of your GitHub README for a Laravel REST API with a simple task manager.

```markdown
# Laravel REST API - Simple Task Manager

## Installation

1. Run the following command to install dependencies:

   ```bash
   composer install
   ```

2. Perform database migrations:

   ```bash
   php artisan migrate
   ```

3. Start the application:

   ```bash
   php artisan serve
   ```

## Endpoints

### Unprotected Routes

- **Register:**
  - Endpoint: `/register`
  - Method: `POST`

- **Login:**
  - Endpoint: `/login`
  - Method: `POST`

### Protected Routes

- **User Information:**
  - Endpoint: `/user`
  - Method: `GET`

- **Logout:**
  - Endpoint: `/logout`
  - Method: `POST`

- **All Tasks:**
  - Endpoint: `/all-tasks`
  - Method: `GET`

- **Add Task:**
  - Endpoint: `/add-task`
  - Method: `POST`

- **Update Task:**
  - Endpoint: `/update-task/{id}`
  - Method: `POST`

- **Mark Task Completed:**
  - Endpoint: `/mark-completed/{id}`
  - Method: `POST`

- **Delete Task:**
  - Endpoint: `/delete-task/{id}`
  - Method: `DELETE`

## Usage

1. Register a user using the `/register` endpoint.
2. Log in with the registered user credentials using the `/login` endpoint.
3. Access protected routes using the obtained access token.
4. Explore various endpoints for task management.

```

This README provides clear steps for installation, lists available endpoints, and outlines the usage of the API.