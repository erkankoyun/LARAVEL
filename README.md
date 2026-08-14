# AIHAN Cafe — Laravel Backend Portfolio Project

[![Laravel Tests](https://github.com/erkankoyun/LARAVEL/actions/workflows/tests.yml/badge.svg)](https://github.com/erkankoyun/LARAVEL/actions/workflows/tests.yml)

A practical Laravel application built as part of my software development portfolio.

AIHAN Cafe demonstrates backend development with MVC architecture, authentication, role-based authorization, database-backed CRUD operations, search and filtering, pagination, JSON API endpoints, Blade views, validation, Docker support, and automated feature testing.

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
- GitHub Actions
- Docker / Docker Compose

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
- Product search by name or description
- Availability filtering
- Product pagination
- Public JSON product API with pagination and filtering
- Eloquent product model
- Database migrations
- Server-side form validation
- Reusable Blade layout and views
- Responsive navigation based on authentication state
- Professional admin dashboard and product catalog UI
- Admin dashboard statistics
- Automated feature tests for authorization behavior
- Automated CRUD tests for product creation, updating, deletion, validation, and access control
- Automated tests for product browsing, search, filtering, pagination, and API responses
- GitHub Actions continuous integration
- Docker-based local development setup

## Authorization Model

Regular users can register, sign in, and browse the cafe menu.

Only users marked as administrators can:

- Open the admin dashboard
- Create products
- Edit products
- Delete products

Administrative routes are protected by Laravel's `auth` middleware together with a custom `admin` middleware.

## Product API

The project includes public read-only JSON endpoints for the product catalog.

### List products

```http
GET /api/products
```

Supported query parameters:

- `search` — search product name or description
- `availability=available` — return available products only
- `availability=unavailable` — return unavailable products only
- `per_page` — page size from 1 to 50
- `page` — requested page number

Example:

```http
GET /api/products?search=latte&availability=available&per_page=5
```

### Get one product

```http
GET /api/products/{id}
```

API responses include a `data` payload and pagination metadata where applicable.

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

Add administrator credentials to your local `.env` file. Never commit real passwords or secrets to GitHub.

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
- `/api/products` — Product JSON API

## Docker Setup

If Docker is installed, the application can also be started with:

```bash
docker compose up --build
```

Then open:

```text
http://localhost:8000
```

The Docker setup builds the frontend assets, installs production Composer dependencies, prepares SQLite, runs migrations, and starts Laravel on port 8000.

## Testing

Run the automated test suite with:

```bash
php artisan test
```

The feature tests cover public product browsing, guest redirects, administrator authorization, product CRUD, validation, unauthorized changes, search, availability filtering, pagination, and JSON API responses.

Every push to `main` and every pull request targeting `main` also runs the test suite automatically through GitHub Actions.

## Development Status

**Active development.**

The project currently includes a functional authentication and authorization layer, an administrator dashboard, a polished searchable product catalog, database-backed CRUD management, public read-only API endpoints, Docker support, and automated CI-backed test coverage.

### Planned Improvements

- Token-based API authentication
- Authenticated API write endpoints
- Product categories
- Product image uploads
- Additional API resources
- Expanded automated tests
- Production deployment workflow

## Author

**Erkan Koyun**  
Software Developer | PHP • Laravel • Python | Backend Development | IT Specialist

- Portfolio: [erkankoyun.com](https://erkankoyun.com)
- LinkedIn: [linkedin.com/in/erkan-koyun-6aa709107](https://www.linkedin.com/in/erkan-koyun-6aa709107/)
- GitHub: [github.com/erkankoyun](https://github.com/erkankoyun)
- Email: [erkankoyun@erkankoyun.com](mailto:erkankoyun@erkankoyun.com)

---

**Building reliable web applications and backend systems.**
