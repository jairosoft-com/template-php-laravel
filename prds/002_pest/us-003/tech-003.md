### US-003: Update Project Documentation to Reflect Pest Usage

**Objective:** Ensure that the project's `README.md` and `CONTRIBUTING.md` files accurately reflect the use of Pest as the primary testing framework, providing clear instructions for contributors.

**Technical Steps:**

1.  **Update `README.md`:**
    *   Open the `README.md` file in the project root.
    *   Locate the section related to "Running the Quality Assurance Toolchain" or similar instructions for running tests.
    *   Change any mention of `phpunit` to `pest`.

    **Example `README.md` change:**
    **Before:**
    ```markdown
    *   **Run Tests (Pest):**

        ./vendor/bin/phpunit
    ```
    **After:**
    ```markdown
    *   **Run Tests (Pest):**

        ./vendor/bin/pest
    ```

2.  **Update `CONTRIBUTING.md`:**
    *   Open the `CONTRIBUTING.md` file in the project root.
    *   Locate the "Mandatory Pre-PR Quality Checklist" section.
    *   Change any mention of `phpunit` to `pest`.

    **Example `CONTRIBUTING.md` change:**
    **Before:**
    ```markdown
    3. **Run Test Suite:**

    ./vendor/bin/phpunit
    ```
    **After:**
    ```markdown
    3. **Run Test Suite:**

    ./vendor/bin/pest
    ```

3.  **Review and Verify:**
    *   Carefully review both `README.md` and `CONTRIBUTING.md` to ensure all references to the testing framework are updated and the instructions are clear and correct.
    *   Confirm that the updated documentation accurately guides contributors on how to run tests using Pest.

**Considerations:**

*   Ensure consistency in wording and formatting across both documentation files.
*   If there are other project-specific documentation files or wikis, consider updating them as well to maintain a single source of truth for testing instructions.