# PPKD Sticker

Laravel application for managing product categories, products, users, and website settings. The public home page and catalog read category and product data from the configured database.

## Requirements

- PHP 8.3 or later with `dom` and `pdo_mysql` for MariaDB, plus `pdo_sqlite`, `sqlite3`, and `gd` to run the test suite
- Composer
- MariaDB

## Local setup

1. Install PHP dependencies:

   ```sh
   composer install
   ```

2. Create a MariaDB database (the example configuration uses `belajar_laravel`):

   ```sql
   CREATE DATABASE belajar_laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

3. Copy `.env.example` to `.env` and set `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` for your local MariaDB account.

4. Generate the application key, apply migrations, seed starter data, and create the public uploads link:

   ```sh
   php artisan key:generate
   php artisan migrate --seed
   php artisan storage:link
   ```

5. Start the application:

   ```sh
   php artisan serve
   ```

   The public site is available at `http://localhost:8000`; the admin sign-in page is at `/admin/login`.

## Tests

```sh
php artisan test
```

The test suite uses an in-memory SQLite database and requires the SQLite and GD PHP extensions.
