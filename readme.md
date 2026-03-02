# Laravel Filesharing Application

A secure, intuitive, and efficient file-sharing platform built with Laravel. This application provides users with a central dashboard to manage, share, and organize their digital assets seamlessly.

## Key Features

- **User Authentication**: Secure registration, login, and password recovery.
- **File Management**: Simple interface to upload, download, and delete files.
- **Sharing Capabilities**: Share files with other registered users via their email addresses.
- **Dashboard**: A clean, sortable overview of all uploaded and shared files.
- **Professional Design**: Designed for responsiveness and ease of use with Bootstrap 5.

## Technical Stack

- **Backend**: [Laravel](https://laravel.com/) (PHP 8.3+)
- **Frontend**: [Vite](https://vitejs.dev/), Bootstrap 5, and SCSS
- **Database**: Supports SQLite, MySQL, and PostgreSQL (SQLite used for local dev)
- **Icons**: Bootstrap Icons

## Local Setup Guide

Follow these steps to set up the project on your local machine:

### 1. Prerequisites
Ensure you have the following installed:
- PHP 8.3+
- Composer
- Node.js & NPM

### 2. Environment Configuration
Copy the template and generate your application key:
```powershell
copy .env.example .env
php artisan key:generate
```

### 3. Install Dependencies
```powershell
composer install
npm install
```

### 4. Database Setup
Create the database and run the migrations:
```powershell
# For SQLite setup
cmd /c "type nul > database/database.sqlite"

# Run migrations
php artisan migrate
```

### 5. Build Assets
Compile the frontend assets:
```powershell
npm run build
```

### 6. Start the Server
Start the development server:
```powershell
php artisan serve
```
The application will be accessible at [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Project Structure

- `app/Http/Controllers`: Application logic and request handling.
- `app/Models`: Database models and relationships.
- `resources/views`: Blade templates for the frontend.
- `resources/sass`: Custom SCSS styles.
- `database/migrations`: Database schema definitions.
