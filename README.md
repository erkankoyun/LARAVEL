# AIHAN Cafe — Laravel Backend Portfolio Project

A Laravel application built as part of my backend development practice and software portfolio.

AIHAN Cafe demonstrates practical Laravel development with MVC architecture, authentication, role-based authorization, database-backed CRUD operations, Blade components, validation, and automated feature testing.

## Current Stack

- PHP 8.2+
- Laravel 12
- Eloquent ORM
- Blade
- Tailwind CSS 4
- DaisyUI 5
- Vite 7
- JavaScript
- Composer
- Node.js / npm
- SQLite by default
- Pest testing framework

## Implemented Features

- User registration
- User login and logout
- Session-based authentication
- Administrator role using an `is_admin` database field
- Custom admin authorization middleware
- Protected admin dashboard
- Public product/menu browsing
- Administrator-only product management
- Product create, edit, update, and delete operations
- Eloquent product model
- Database migrations
- Server-side form validation
- Reusable Blade layout and views
- Responsive navigation based on authentication state
- Admin dashboard statistics
- Feature tests for admin authorization

## Authorization Model

Regular users can register, sign in, and browse the cafe menu.

Only users marked as administrators can:

- Open the admin dashboard
- Create products
- Edit products
- Delete products

Administrative routes are protected by both Laravel's `auth` middleware and a custom `admin` middleware.

## Local Setup

### Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm

### Installation

```bash
git clone https://github.com/erkankoyun/LARAVEL.git
cd LARAVEL
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
php artisan migrate
```

### Create the Administrator Account

Add administrator credentials to your local `.env` file. Do not commit real passwords to GitHub.

```env
ADMIN_NAME="AIHAN Admin"
ADMIN_EMAIL="admin@example.com"
ADMIN_PASSWORD="choose-a-strong-password"
```

Then run:

```bash
php artisan db:seed
```

The seeder creates the administrator account or updates the matching account and sets `is_admin` to `true`.

### Run the Application

```bash
composer run dev
```

Or run Laravel directly:

```bash
php artisan serve
```

Useful routes:

- `/` — Home
- `/products` — Public cafe menu
- `/register` — User registration
- `/login` — Sign in
- `/admin` — Administrator dashboard

## Testing

Run the automated test suite with:

```bash
php artisan test
```

The feature tests verify that public users can browse products, guests are redirected from management routes, regular users are denied administrator access, and administrator accounts can access protected management pages.

## Development Status

**Active development.**

The project now includes a functional authentication and authorization layer plus database-backed product management. Future improvements will continue to focus on production-style backend development.

### Planned Improvements

- REST API endpoints
- API authentication
- Product categories
- Image uploads
- Search and filtering
- Pagination
- More automated tests
- Docker-based development environment
- Deployment workflow

## Author

**Erkan Koyun**  
PHP / Laravel Backend Developer | IT Specialist

- GitHub: [github.com/erkankoyun](https://github.com/erkankoyun)
- Email: erkankoyun@erkankoyun.com

---

This repository is part of my ongoing software development portfolio and documents my progress building practical applications with Laravel and modern PHP.
