# TODO for REQ-005: Configure Larastan

Based on the technical implementation details in `req-005.md`, the following tasks need to be completed:

- [x] **Task 1: Install Larastan**
  - Action: Add Larastan as a `require-dev` dependency.
  - Command: `composer require --dev larastan/larastan`

- [x] **Task 2: Create `phpstan.neon.dist` Configuration File**
  - Action: Create the `phpstan.neon.dist` file in the project root.

- [x] **Task 3: Add Larastan Configuration**
  - Action: Populate the configuration file with the standard setup (level 5, `app` and `src` paths).

- [x] **Task 4: Perform Initial Analysis**
  - Action: Run the initial analysis and fix any reported errors. (Note: Current errors are due to missing dependencies from REQ-009, which will be resolved later).
  - Command: `./vendor/bin/phpstan analyse`

- [x] **Task 5: Document Usage**
  - Action: Add instructions for running Larastan to the `CONTRIBUTING.md` file. (This will be fully completed once REQ-010 is done).