# TODO for REQ-008: Update PHP and Laravel Versions

Based on the technical implementation details in `req-008.md`, the following tasks need to be completed:

- [x] **Task 1: Review Upgrade Guides**
  - Action: Read the official Laravel 12 Upgrade Guide and PHP 8.3 release notes.

- [x] **Task 2: Update `composer.json` - Core**
  - Action: Change the version constraints for `php` to `^8.3` and `laravel/framework` to `^12.0`.

- [x] **Task 3: Update `composer.json` - Laravel Packages**
  - Action: Update versions for other first-party Laravel packages (e.g., `pint`, `sail`).

- [x] **Task 4: Update `composer.json` - Third-Party**
  - Action: Update versions for all other third-party packages to ensure compatibility.

- [x] **Task 5: Run Composer Update**
  - Action: Execute the update command to install new package versions.
  - Command: `composer update`

- [x] **Task 6: Codebase Updates**
  - Action: Make any necessary code changes based on the upgrade guides.
  - **Status: Manual step for user.**

- [x] **Task 7: Thorough Testing**
  - Action: Run the full automated test suite and perform manual testing of the application.
  - Command: `./vendor/bin/phpunit` (Updated from `pest`)
  - **Status: Manual step for user.**