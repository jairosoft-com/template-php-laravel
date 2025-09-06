This is a simple Laravel 'Hello World' application demonstrating a modern, scalable, and contributor-friendly project template.

## **Architectural Philosophy**

This project is built upon a modern, scalable Laravel template that emphasizes Domain-Driven Design principles. The core business logic is organized into distinct **Domains** located in the `src/` directory. This approach promotes high cohesion, low coupling, and long-term maintainability. For a deeper understanding of the architecture, please refer to the internal project documentation.

## **Getting Started**

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### **Prerequisites**

* PHP 8.3+
* Composer
* Node.js & NPM
* Docker (for Laravel Sail)

### **Installation**

**Clone the repository:**
```bash
git clone https://github.com/laravel_hello_world/hello-world.git
cd hello-world
```

1. **Install Composer dependencies:**
```bash
composer install
```

2. **Setup environment file:**
```bash
cp .env.example .env
```
*Update the `.env` file with your local database credentials and other necessary settings.*

3. **Generate application key:**
```bash
php artisan key:generate
```

4. **Run database migrations:**
```bash
php artisan migrate --seed
```

5. **Install NPM dependencies and build assets:**
```bash
npm install && npm run dev
```

6. **Start the development server:**
```bash
php artisan serve
```

## **Running the Quality Assurance Toolchain**

This project enforces strict quality standards. Please run the following commands locally before submitting a pull request.

*   **Run Code Styler (Pint):**

    ./vendor/bin/pint

*   **Run Static Analysis (Larastan):**

    ./vendor/bin/phpstan analyse

*   **Run Tests (Pest):**

    ./vendor/bin/pest

## License

This project is licensed under the MIT License - see the(LICENSE.md) file for details.
