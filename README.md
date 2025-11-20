# Blogs Website (Learning Project)
A hands-on Laravel + React blog application created for learning purposes.

## Overview
A Laravel 12 project built for learning purposes that mixes traditional Blade views with an Inertia + React front end to explore a blog platform. The backend exposes a posts CRUD module alongside the default authentication scaffolding, profile management, and a Tailwind-powered dashboard shell. Frontend assets are built with Vite, Tailwind CSS v4, and a small component library based on Radix UI and lucide-react.

## Tech Stack
- Laravel 12 (PHP 8.2+) with Eloquent ORM and Inertia bridge
- React 19 + TypeScript, Tailwind CSS 4, Vite build pipeline
- Bootstrap 4 Blade templates for the posts module
- PHPUnit feature tests and Laravel factories for backend testing

## Implemented Features
- **Authentication & Onboarding**: Registration, login, password reset, email verification, and logout flows (`routes/auth.php`).
- **Dashboard Shell**: Inertia-powered dashboard layout at `/dashboard` with responsive cards (`resources/js/pages/dashboard.tsx`).
- **Account Settings**:
  - Profile update, email verification retry, and account deletion dialogs (`resources/js/pages/settings/profile.tsx`, `delete-user.tsx`).
  - Password change form with validation rules (`settings/password.tsx`, `PasswordController`).
  - Appearance page with light/dark/system theme toggle persisted in localStorage/cookies (`AppearanceTabs`, `use-appearance` hook).
- **Blog Posts CRUD**:
  - Blade views to list, create, edit, and delete posts (`resources/views/posts/*.blade.php`).
  - `PostController` handles standard CRUD endpoints (`routes/web.php`).
  - `posts` table stores `title`, `description`, and timestamps; `user_id` column reserved for authorship (`database/migrations/*posts*`).
- **Testing**: Feature tests covering dashboard access control and authentication flows (`tests/Feature`).

## Current Limitations & Future Tasks
- Associate posts with real users by wiring the `user_id` column, using the selected creator in create/edit forms, and showing the author name in listings.
- Add request validation, authorization checks, and graceful handling for missing posts across `store`, `update`, and `destroy`.
- Align the posts experience with the Inertia React stack (or modernize the Blade views) to remove the Bootstrap/Tailwind styling split.
- Expand the posts index/show UI to display the description, timestamps, and CTA links instead of placeholders.
- Seed example posts and extend automated tests to cover CRUD happy paths and validation failures.
- Improve the SQLite rollback in the `add_user_id_to_posts_table` migration and ensure the `down` method fully reverses schema changes.

## Project Structure
- `app/Http/Controllers` – Backend controllers for posts, settings, and auth.
- `resources/js` – Inertia React pages, layouts, hooks, and reusable UI components.
- `resources/views` – Blade templates that back the current posts module.
- `database/migrations` – Schema definitions for users, posts, and supporting tables.
- `tests/Feature` – HTTP-level tests for authentication, dashboard, and settings flows.

## Getting Started
### Prerequisites
- PHP 8.2+, Composer
- Node.js 20+ and npm
- A database connection (SQLite works out of the box)

### Installation
1. Copy the environment file and generate an application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
2. Configure your database credentials in `.env`. For SQLite you can use:
   ```bash
   touch database/database.sqlite
   # then set DB_CONNECTION=sqlite and clear the other DB_* keys
   ```
3. Install backend dependencies:
   ```bash
   composer install
   ```
4. Install frontend dependencies:
   ```bash
   npm install
   ```
5. Run database migrations (and optional seeders):
   ```bash
   php artisan migrate
   php artisan db:seed   # optional
   ```

### Local Development
- Run the full stack (PHP server, queue listener, log viewer, and Vite) with one command:
  ```bash
  composer run dev
  ```
- Or run services separately:
  ```bash
  php artisan serve
  npm run dev
  ```

### Testing
```bash
php artisan test
# or
composer test
```

### Production Builds
Build frontend assets before deploying or serving with `php artisan serve --env=production`:
```bash
npm run build
```

After the build, point your web server to `public/` and run migrations on the target environment.
