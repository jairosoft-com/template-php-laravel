### US-002: Update CI Pipeline to Execute Pest Tests - TODO

- [x] Locate the CI workflow file: `.github/workflows/ci.yml`.
- [x] Open `.github/workflows/ci.yml`.
- [x] Navigate to the job named `test`.
- [x] Change the `run` command from `./vendor/bin/phpunit` to `./vendor/bin/pest`.
- [x] Ensure CI environment compatibility (PHP version, Composer dependencies).
- [ ] Push changes to a feature branch.
- [ ] Create a pull request to trigger the CI pipeline.
- [ ] Monitor the `test` job in the GitHub Actions workflow to ensure it executes Pest successfully and all tests pass.