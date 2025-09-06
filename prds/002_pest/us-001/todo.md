### US-001: Migrate Existing PHPUnit Tests to Pest Syntax - TODO

- [x] Ensure `pestphp/pest` is installed as a development dependency.
- [x] For each PHPUnit test file in `tests/Unit` and `tests/Feature` directories:
    - [x] Rename the file to align with Pest conventions (optional).
    - [x] Remove `use PHPUnit\Framework\TestCase;`.
    - [x] Remove `extends TestCase` from the test class definition.
    - [x] Refactor test methods to use Pest's global `test()` or `it()` functions.
    - [x] Update assertions to Pest's fluent API.
    - [x] Handle `setUp()` with `beforeEach()`.
    - [x] Handle `tearDown()` with `afterEach()`.
    - [x] Convert data providers to Pest's `uses()` or `with()` functions.
- [x] After converting a batch of tests, run `php artisan pest` locally to verify.
- [x] Consider using `pest --init` to generate `Pest.php` if not already present.