# TODO for REQ-002: Make Controllers "Skinny"

Based on the technical implementation details in `req-002.md`, the following tasks need to be completed for each controller that contains business logic:

- [x] **Task 1: Identify or Create the Domain**
  - Action: For a given controller, ensure a corresponding domain folder exists in `src/`.
  - Example Command: `mkdir -p src/Orders/Actions`

- [x] **Task 2: Create the Data Transfer Object (DTO)**
  - Action: Create a typed DTO class in the domain's `Data` directory to represent the data needed by the action.
  - Example File: `src/Orders/Data/CreateOrderData.php`

- [x] **Task 3: Create the Action Class**
  - Action: Create a single-purpose, invokable class in the domain's `Actions` directory.
  - Action: Move all business logic from the controller method into this class's `__invoke` method.
  - Example File: `src/Orders/Actions/CreateOrderAction.php`

- [x] **Task 4: Refactor the Controller**
  - Action: Modify the controller method to remove all business logic.
  - Action: The controller should only delegate to the Action class and return an HTTP response.