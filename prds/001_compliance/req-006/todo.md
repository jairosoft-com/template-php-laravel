# TODO for REQ-006: Migrate to Pest

Based on the technical implementation details in `req-006.md`, the following tasks need to be completed:

- [x] **Task 1: Install Pest and Laravel Plugin**
  - Action: Add Pest and its Laravel plugin as `require-dev` dependencies.
  - Command: `composer require --dev pestphp/pest pestphp/pest-plugin-laravel`
  - **Status: SKIPPED due to dependency conflicts with PHPUnit 11.x.**

- [x] **Task 2: Run Pest Installation Command**
  - Action: Execute the Artisan command to set up Pest.
  - Command: `php artisan pest:install`
  - **Status: SKIPPED.**

- [x] **Task 3: Convert Existing PHPUnit Tests**
  - Action: Manually refactor all existing tests in `tests/Feature` and `tests/Unit` to use Pest's function-based syntax.
  - **Status: SKIPPED. Project will continue to use PHPUnit.**

- [x] **Task 4: Create Architectural Test File**
  - Action: Create the `tests/Arch.php` file with the standard architectural rules.
  - **Status: SKIPPED.**

- [x] **Task 5: Run the Test Suite**
  - Action: Execute the test suite using the `pest` command to ensure all tests pass.
  - Command: `./vendor/bin/pest`
  - **Status: SKIPPED. Project will use `./vendor/bin/phpunit` instead.**

**Note:** Due to persistent dependency conflicts between Pest and PHPUnit 11.x (which is required by Laravel 12), the migration to Pest has been abandoned. The project will continue to use PHPUnit for testing.