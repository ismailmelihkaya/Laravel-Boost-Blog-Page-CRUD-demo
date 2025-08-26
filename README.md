<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Simple Laravel Blog (No Authentication)

A minimal blog application built with Laravel 12 that implements full CRUD for posts (create, view, edit, delete) without authentication. Styled with Tailwind CSS (via Vite or CDN fallback).

### Features
- Post CRUD: title and body
- Tailwind UI with clean table listing
- Pagination on index
- No auth required

### Tech Stack
- PHP 8.2+
- Laravel 12
- SQLite (default)
- Tailwind CSS 4 (Vite build if available, CDN fallback otherwise)

### Getting Started

1) Install dependencies
```bash
composer install
```

2) Environment
```bash
cp .env.example .env
php artisan key:generate
```

SQLite database file:
```bash
mkdir -p database
type NUL > database/database.sqlite  # Windows (PowerShell: New-Item database/database.sqlite -ItemType File)
```
`.env`:
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

3) Migrate
```bash
php artisan migrate --force
```

4) Serve
```bash
php artisan serve --host=127.0.0.1 --port=8000
```
Open: `http://127.0.0.1:8000/posts`

### Frontend / CSS
- Vite build: `resources/css/app.css` already includes Tailwind. Run `npm install && npm run dev` for hot reload.
- If build assets are missing, the layout falls back to Tailwind via CDN automatically.

### Relevant Files
- `app/Models/Post.php`
- `app/Http/Controllers/PostController.php`
- `routes/web.php`
- `resources/views/components/layouts/app.blade.php`
- `resources/views/posts/*.blade.php`

### Routes
- GET `/posts` – List
- GET `/posts/create` – Create form
- POST `/posts` – Store
- GET `/posts/{post}` – Show
- GET `/posts/{post}/edit` – Edit form
- PUT `/posts/{post}` – Update
- DELETE `/posts/{post}` – Delete

### Troubleshooting
- Ensure `Route::resource('posts', PostController::class);` in `routes/web.php`.
- Ensure `database/database.sqlite` exists and is writable.
- If styles are missing, run Vite or rely on the CDN fallback in layout.

## Using Laravel Boost in this Project

This project was built and managed interactively with Laravel Boost, which provides IDE-integrated tools to inspect, run, and augment a Laravel app.

### What we used Boost for
- Inspect environment/config: queried app name, env, debug, URL, DB/cache/session drivers.
- List Artisan commands: surfaced all registered commands to discover features quickly.
- Run/monitor Artisan: generated models, controllers, migrations and ran `migrate`/`serve`.
- Read latest logs: tailed application log to diagnose a route typo.

### Install (if not already present)
```bash
php artisan boost:install
```

### Start Boost MCP server
```bash
php artisan boost:mcp
```

This exposes Boost tools to compatible editors/clients. You can also open the MCP Inspector:
```bash
php artisan mcp:inspector
```

### Helpful Boost commands (used here)
- `php artisan list` – baseline of available commands.
- `php artisan route:list` – verify RESTful routes for posts.
- `php artisan migrate --force` – apply DB changes.
- `php artisan serve --host=127.0.0.1 --port=8000` – run the app.

### Boost-driven diagnostics
- Latest error fetch revealed a typo (`Route::resourcsesssss`) from `routes/web.php`. Fix: use `Route::resource('posts', PostController::class);`.

With Boost, you can iteratively query config, logs, routes, DB status, and execute framework tasks without leaving your editor.
