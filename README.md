# Role Dashboard (Laravel 13)

A simple Laravel web application with authentication and two role-based
dashboards: **Admin** and **User**. Styled with Bootstrap 5 (via CDN) and
pure Blade — no React/Vue, no npm build step.

Built on Laravel 13's slim skeleton: there is no `app/Http/Kernel.php` —
middleware, the custom `role` alias, and routing are all configured in
[`bootstrap/app.php`](bootstrap/app.php).

## Features

- Email/password authentication (Laravel Breeze blade-stack equivalent: login, register, logout)
- `role` column on users (`admin` | `user`, default `user`)
- Role-based redirect after login (`/admin/dashboard` or `/user/dashboard`)
- Custom `RoleMiddleware` (registered as the `role` alias in `bootstrap/app.php`) protecting route groups
- Admin dashboard with user/admin counts + user management table
- User dashboard showing the user's own details

## Requirements

- PHP 8.5 (latest stable; Laravel 13 supports 8.3–8.5)
- Composer
- MySQL

## Setup

```bash
# 1. Install PHP dependencies
composer install

# 2. Create your environment file and app key
cp .env.example .env
php artisan key:generate

# 3. Create the database, then set DB_DATABASE / DB_USERNAME / DB_PASSWORD in .env
#    (default database name: role_dashboard)

# 4. Run migrations and seed the default accounts
php artisan migrate --seed

# 5. Serve the app
php artisan serve
```

Then open http://127.0.0.1:8000.

## Seeded accounts

| Role  | Email             | Password |
|-------|-------------------|----------|
| Admin | admin@example.com | password |
| User  | user@example.com  | password |

## Routes

| Method | URI                | Access            |
|--------|--------------------|-------------------|
| GET    | `/`                | public landing    |
| GET    | `/login`           | guest             |
| GET    | `/register`        | guest             |
| GET    | `/home`            | auth (redirects by role) |
| GET    | `/admin/dashboard` | auth + role:admin |
| GET    | `/admin/users`     | auth + role:admin |
| GET    | `/user/dashboard`  | auth + role:user  |

## Notes

- Sessions, cache and queue use file/sync drivers so the app runs without
  extra database tables — `php artisan migrate --seed` works out of the box.
- Admins are blocked from `/user/*` and users from `/admin/*` (403 via `RoleMiddleware`).
