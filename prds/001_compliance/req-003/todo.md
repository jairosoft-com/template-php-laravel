# TODO for REQ-003: Use Form Requests for Validation

Based on the technical implementation details in `req-003.md`, the following tasks need to be completed for each `POST`/`PUT`/`PATCH` route:

- [x] **Task 1: Create the Form Request Class**
  - Action: Use the Artisan command to generate a new Form Request class.
  - Command: `php artisan make:request StoreOrderRequest`

- [x] **Task 2: Implement the `authorize()` Method**
  - Action: Add the necessary authorization logic to the `authorize()` method in the new Form Request class.

- [x] **Task 3: Implement the `rules()` Method**
  - Action: Move all validation logic from the controller into the `rules()` method of the Form Request class.

- [x] **Task 4: Refactor the Controller**
  - Action: Type-hint the new Form Request in the controller method's signature.
  - Action: Replace any manual validation calls with `$request->validated()`.