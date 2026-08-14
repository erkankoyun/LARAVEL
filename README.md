# AIHAN Cafe — Laravel Backend Practice Project

A Laravel application built as part of my backend development practice and software portfolio.

The project is intentionally being developed step by step to strengthen practical skills in modern PHP, Laravel architecture, Blade templating, routing, database-driven development, testing, and deployment workflows.

## Current Stack

- PHP 8.2+
- Laravel 12
- Blade
- Tailwind CSS 4
- Vite 7
- JavaScript
- Composer
- Node.js / npm
- Laravel database tooling
- Pest testing framework

## Current Implementation

The repository currently includes:

- Laravel 12 application structure
- Custom home route
- Custom `home.blade.php` view
- Reusable Blade components
- AIHAN Cafe landing page
- Tailwind CSS integration
- Vite frontend build configuration
- Environment-based configuration
- Laravel migration and seeding structure
- Pest/Laravel testing dependencies

## Development Goals

This project is being expanded to demonstrate practical backend development skills, including:

- MVC architecture
- Routing and controllers
- Blade templates and reusable components
- Database design and Eloquent ORM
- CRUD operations
- Form validation
- Authentication and authorization
- REST-style API development
- Automated testing
- Docker and deployment workflows

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
php artisan migrate
npm install
npm run build
php artisan serve
```

For the full development workflow, the project also provides:

```bash
composer run dev
```

## Development Status

**Active development.**

The current version is an early-stage Laravel application. Additional backend functionality will be added as the project develops.

### Planned Improvements

- Database-backed models
- Authentication
- CRUD functionality
- Validation
- API endpoints
- Automated tests
- Docker-based development environment

## Author

**Erkan Koyun**  
PHP / Laravel Backend Developer | IT Specialist

- GitHub: [github.com/erkankoyun](https://github.com/erkankoyun)
- Email: erkankoyun@erkankoyun.com

---

This repository is part of my ongoing software development portfolio and documents my progress building practical applications with Laravel and modern PHP.