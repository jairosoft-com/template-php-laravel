### US-002: Update CI Pipeline to Execute Pest Tests

**Objective:** Modify the GitHub Actions workflow to run Pest tests instead of PHPUnit, ensuring automated quality checks reflect the new testing framework.

**Technical Steps:**

1.  **Locate CI Workflow File:**
    *   The CI workflow is defined in `.github/workflows/ci.yml`.

2.  **Modify the `test` Job:**
    *   Open `.github/workflows/ci.yml`.
    *   Navigate to the job named `test`.
    *   Find the step that executes the tests. It currently uses `phpunit`.
    *   Change the `run` command from `./vendor/bin/phpunit` to `./vendor/bin/pest`.

    **Before (excerpt from `ci.yml`):**
    ```yaml
          - name: Run PHPUnit Tests
            run: ./vendor/bin/phpunit
    ```

    **After (excerpt from `ci.yml`):**
    ```yaml
          - name: Run Pest Tests
            run: ./vendor/bin/pest
    ```

3.  **Ensure CI Environment Compatibility:**
    *   The existing `Setup PHP` and `Install Composer dependencies` steps should already provide the necessary environment for Pest, as Pest is a Composer dependency.
    *   Verify that the `php-version` in the `test` job is `8.3` as per the project specification.

4.  **Test CI Integration:**
    *   Push the changes to a feature branch.
    *   Create a pull request to trigger the CI pipeline.
    *   Monitor the `test` job in the GitHub Actions workflow to ensure it executes Pest successfully and all tests pass.

**Considerations:**

*   Ensure all tests have been successfully migrated to Pest locally before updating the CI, to avoid CI failures.
*   The `test` job's `services` section for MySQL should remain unchanged as it provides the database for feature tests, regardless of the testing framework.