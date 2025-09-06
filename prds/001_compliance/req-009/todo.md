# TODO for REQ-009: Install Core Dependencies

Based on the technical implementation details in `req-009.md`, the following tasks need to be completed:

- [x] **Task 1: Install `require-dev` Packages**
  - Action: Install `barryvdh/laravel-debugbar`, `barryvdh/laravel-ide-helper`, and `dedoc/scramble`.
  - Command: `composer require --dev barryvdh/laravel-debugbar barryvdh/laravel-ide-helper dedoc/scramble`

- [x] **Task 2: Install `require` Packages**
  - Action: Install `spatie/laravel-permission` and `spatie/laravel-data`.
  - Command: `composer require spatie/laravel-permission spatie/laravel-data`

- [x] **Task 3: Publish Package Assets**
  - Action: Publish the configuration and migration files for the newly installed packages.
  - Command: `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"`

- [x] **Task 4: Run Database Migrations**
  - Action: Run the migrate command to create tables required by `spatie/laravel-permission`.
  - Command: `php artisan migrate`

- [x] **Task 5: Configure `laravel-permission`**
  - Action: Add the `HasRoles` trait to the `User` model.

- [x] **Task 6: Generate IDE Helper Files**
  - Action: Run the ide-helper commands to generate accurate autocompletion files.
  - Commands:
    ```bash
    php artisan ide-helper:generate
    php artisan ide-helper:models --write-mixin (User cancelled this command)
    php artisan ide-helper:meta
    ```