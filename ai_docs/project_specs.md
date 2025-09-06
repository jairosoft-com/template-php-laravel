# **A Project Template for Modern, Scalable, and Contributor-Friendly Laravel Applications**

## **I. Executive Summary: A Blueprint for Modern, Scalable Laravel Applications**

### **Purpose and Philosophy**

This document presents an expert-level, comprehensive project template for modern PHP/Laravel applications. It is designed not merely as a collection of files but as a well-reasoned architectural blueprint intended to serve as a robust foundation for building applications that are simple to approach, scalable to meet future demands, and maintainable over the long term. The philosophy underpinning this template is rooted in three guiding principles:

1. **Long-Term Scalability:** The architecture is explicitly designed to manage complexity as an application grows, moving beyond the default framework structure to a more organized, domain-centric model. This approach prevents the common pitfalls of monolithic applications, ensuring that the codebase remains manageable and performant under increasing load and feature complexity.  
2. **Rigorous Maintainability:** Through strict adherence to established coding standards, a comprehensive suite of automated quality assurance tools, and a clear separation of concerns, the template is engineered to minimize technical debt. The structure promotes clarity and predictability, making it easier for developers to understand, modify, and extend the application without introducing unintended side effects.  
3. **Enhanced Productivity for Human and AI Contributors:** Acknowledging the evolving landscape of software development, this template is optimized for collaboration between human developers and AI-powered tools. Its predictable structure, extensive documentation, and automated feedback loops create an environment where both human intuition and machine efficiency can thrive, accelerating the development lifecycle.

### **Key Architectural Decisions**

To achieve these goals, several pivotal architectural decisions have been made and are justified in detail throughout this report:

* **Adoption of a Domain-Oriented Architecture:** The template eschews the default technical grouping of files in favor of a structure inspired by Domain-Driven Design (DDD) and Modular Architecture. Code is organized by business capability, creating highly cohesive and loosely coupled modules that are easier to develop and maintain in isolation.  
* **Comprehensive Automated Quality Assurance Pipeline:** A robust Continuous Integration (CI) pipeline is integrated by default. Using GitHub Actions, this pipeline automatically enforces code style, performs static analysis to detect bugs before runtime, and executes a full suite of automated tests on every proposed code change. This pipeline acts as the ultimate guardian of code quality.  
* **A Security-First Posture:** The template is fortified with a multi-layered security approach. It leverages Laravel's secure-by-default features and mandates additional best practices, including robust input validation, protection against common web vulnerabilities, and secure configuration management.  
* **A Curated Set of Foundational Packages:** A minimal yet powerful set of third-party packages is included to address common development needs, such as permissions management and data transfer objects, without introducing unnecessary bloat or complexity.

### **Target Audience and Benefits**

This architectural blueprint is designed for Technical Leads, Senior Software Architects, and development teams seeking to standardize their development practices and build enterprise-grade Laravel applications. By adopting this template, organizations can expect to realize significant benefits, including:

* **Accelerated Onboarding:** New developers can quickly understand the project structure and conventions, reducing ramp-up time.  
* **Improved Code Quality and Consistency:** Automated tooling ensures that all contributions adhere to a high standard of quality, reducing the burden of manual code reviews.  
* **Reduced Technical Debt:** The scalable architecture and emphasis on best practices prevent the accumulation of design flaws that hinder future development.  
* **De-risked Project Delivery:** A comprehensive test suite and automated checks provide confidence that new features and refactors do not break existing functionality, enabling faster and safer deployments.

## **II. Foundational Stack: Selecting Versions for Longevity and Performance**

The selection of core technologies is a foundational architectural decision that impacts a project's entire lifecycle, from development and performance to long-term maintenance and security. This template standardizes on specific versions of PHP and Laravel, chosen not just for their novelty but for their strategic balance of modern features, ecosystem stability, and long-term support.

### **PHP Version Selection**

* **Recommendation:** The template will standardize on **PHP 8.3**.  
* **Analysis:** As of late 2025, the PHP ecosystem presents several viable versions. PHP 8.4 is the latest release, while PHP 8.3 is also under active support, and PHP 8.2 receives security fixes only. While adopting the absolute latest version (8.4) is tempting, a more prudent strategy for enterprise applications is to select the most recent, mature minor version of a major release. PHP 8.3, released in November 2023, offers a rich feature set, including typed class constants and granular DateTime exceptions, and has had ample time for the broader library ecosystem to establish stable compatibility.  
* **Justification:** The primary justification for selecting PHP 8.3 is its support lifecycle. It is guaranteed to receive active support for bug fixes until the end of 2025 and critical security support until the end of 2027\. This provides a substantial and predictable window for development, deployment, and maintenance, which is a critical consideration for long-term projects. This choice offers the benefits of a modern PHP version while mitigating the risks associated with being on the bleeding edge of a brand-new release.

### **Laravel Framework Selection**

* **Recommendation:** The template will be built on the latest stable version of **Laravel 12**.  
* **Analysis:** Laravel 12, released in early 2025, is the current stable version of the framework, requiring a minimum PHP version of 8.2 and supporting up to 8.4. Since Laravel 6, the framework has moved away from a formal Long-Term Support (LTS) model, instead adopting a predictable annual release cycle. All modern versions, including Laravel 12, receive 18 months of active support for bug fixes and a full 2 years of security support.  
* **Justification:** In the absence of a traditional LTS release, the most strategic approach to maximize the support window and access the latest features is to adopt the current stable version at the project's inception. Laravel 12 provides access to the most recent performance optimizations and features, such as the `secureValidate()` helper, which offers stricter, safer validation defaults. Its support window extends until early 2027 for security fixes, providing a clear and reliable maintenance timeline.

The end of Laravel's formal LTS model is a strategic evolution that fundamentally influences modern application architecture. It signals a shift toward promoting continuous modernization over long-term stagnation on a single version. This policy has a direct and profound impact on how applications should be designed from day one. Projects can no longer remain on a single version for several years; they must be prepared for major framework upgrades every one to two years to stay within the security support window. Upgrading a tightly-coupled, monolithic application is a notoriously difficult, high-risk, and costly endeavor. Therefore, any modern Laravel template must be architected with upgradability as a primary, non-functional requirement. The key architectural patterns that facilitate low-risk, frequent upgrades are high cohesion and low coupling—the very principles promoted by the Domain-Oriented architecture detailed in the next section—and a comprehensive, automated test suite to verify application functionality after an upgrade. The framework's support policy is thus a direct and compelling justification for adopting the more advanced architectural and testing practices outlined in this report.

| Component | Selected Version | Active Support Until | Security Support Until |  |
| :---- | :---- | :---- | :---- | :---- |
| PHP | 8.3.x | December 31, 2025 | December 31, 2027 |  |
| Laravel Framework | 12.x | August 13, 2026 | February 24, 2027 |  |
| Table 1: Technology Stack Summary. This table provides an at-a-glance reference for the project's core technologies and their support timelines, which is critical for long-term planning and risk assessment. |  |  |  |  |

## **III. Architectural Paradigm: A Domain-Oriented Approach for Scalability**

The structure of an application is the single most important factor in determining its long-term viability. While Laravel's default application structure is exceptionally well-suited for rapid prototyping and small-to-medium-sized projects, it can introduce significant challenges as an application scales in complexity and team size.

### **Critique of the Default Structure**

The default Laravel application structure organizes files based on their technical type, a pattern known as "technical decomposition." For example, all controllers reside in `app/Http/Controllers`, all Eloquent models in `app/Models`, and all database migrations in `database/migrations`. While intuitive at first, this approach leads to low cohesion and high coupling in large applications. To understand or modify a single business feature, such as "Invoicing," a developer must navigate multiple, disparate directories. The logic for this feature becomes scattered across the entire codebase, making it difficult to reason about, test, and maintain. This scattering of concerns increases cognitive load and the risk of introducing bugs when making changes.

### **Proposed Architecture: Pragmatic Domain-Driven Design (DDD)**

To address these scalability challenges, this template adopts an architectural paradigm inspired by Domain-Driven Design and Modular Architecture. The core principle is to organize the application's code not by its technical nature, but by the business "domain" or capability it represents.

* **Structure:** A new top-level directory, `src/`, is introduced at the root of the project. This directory will house the application's core business logic, organized into distinct "Domains." For example, an e-commerce application might have domains such as `Products`, `Orders`, `Shipping`, and `Payments`. Each of these domain folders acts as a self-contained module, holding its own Models, business logic (Actions or Services), Data Transfer Objects (DTOs), Events, and Exceptions.  
* **Justification:** This domain-centric approach creates "bounded contexts"—clear boundaries around specific areas of business functionality. This structure yields several significant advantages:  
  * **High Cohesion:** All code related to a single business concept is physically located together, making it easy to find, understand, and modify.  
  * **Low Coupling:** Domains are designed to be as independent as possible, communicating with each other through well-defined contracts (interfaces) or events, rather than direct class dependencies.  
  * **Improved Navigability:** Developers can work within a single domain directory for most tasks, drastically reducing the cognitive load required to understand the system.  
  * **Parallel Development:** Different teams can work on different domains simultaneously with a reduced risk of merge conflicts, accelerating development velocity.

### **Friendliness to AI Contributors**

This domain-oriented architecture is inherently more comprehensible for AI-powered development tools. AI code generation and analysis models perform best when they operate within a clear and constrained context. The default Laravel structure forces an AI to build a complex mental map of scattered files to understand a single feature. For instance, to add a new attribute to a "Product," it would need to analyze files in `app/Models`, `app/Http/Controllers`, `app/Http/Requests`, `database/migrations`, and potentially others.

In contrast, the domain-oriented structure provides this context implicitly through the file system. When a developer asks an AI to "add a `price` attribute to the `Product`," the AI can focus its analysis almost exclusively within the `src/Products/` directory. It can correctly infer that it needs to modify the `Product` model, add a column to the migration within that domain, update the relevant `ProductData` DTO, and adjust the `CreateProductAction`. The file system itself becomes a powerful contextual clue, leading to more accurate, relevant, and efficient AI-assisted development. This structural choice directly addresses the requirement for an "AI-friendly" template by aligning the codebase with the way context-based models process information.

## **IV. The Anatomy of the Project Template: A Directory-by-Directory Deep Dive**

The proposed project structure maintains the familiarity of the standard Laravel root directory while reorganizing the application's core logic into a more scalable, domain-oriented paradigm. This section provides a detailed walkthrough of the key directories and their intended purpose.

### **The Root Directory**

The root directory of the project remains largely unchanged from a standard Laravel installation. Directories such as `bootstrap`, `config`, `database`, `public`, `resources`, `routes`, `storage`, and `tests` retain their conventional roles. This ensures compatibility with the wider Laravel ecosystem, including deployment tools like Forge and Vapor, and maintains a familiar entry point for experienced Laravel developers.

### **The `app/` Directory: The Application Layer**

In this architecture, the `app/` directory is refocused to serve as the **Application Layer**. Its primary responsibility is to handle incoming requests and orchestrate the core business logic that resides in the Domain Layer. It is the bridge between the outside world (HTTP, Console) and the application's core.

* `app/Http/Controllers/`: This directory still contains the application's controllers. However, they are mandated to be "skinny." Their sole responsibility is to parse the incoming HTTP request, delegate the business task to an Action or Service class from the appropriate domain, and formulate an HTTP response. They contain no business logic themselves.  
* `app/Http/Requests/`: Form Request classes are used for all validation and authorization of incoming data for `POST`, `PUT`, and `PATCH` requests. This keeps controllers clean and centralizes validation logic.  
* `app/Console/Commands/`: Artisan commands reside here. Like controllers, they act as entry points, parsing command-line arguments and delegating the work to the Domain Layer.  
* `app/Providers/`: This directory contains Laravel's service providers. A key convention in this template is the creation of a dedicated `DomainServiceProvider` for each domain (e.g., `InvoicingServiceProvider`). These providers are responsible for registering the domain's specific service container bindings, such as binding a repository interface to its Eloquent implementation.

### **The `src/` Directory: The Domain Layer**

This new directory is the heart of the application. It contains all the core business logic, is completely framework-agnostic (in principle), and is organized by business domain. It is autoloaded via a PSR-4 entry in the `composer.json` file, mapping the `Domain\` namespace to the `src/` directory.

An example structure for a single domain, such as `Invoicing`, would be as follows :

src/  
└── Invoicing/  
    ├── Actions/  
    │   └── GenerateInvoiceAction.php  
    ├── Data/  
    │   ├── InvoiceData.php  
    │   └── Money.php  
    ├── Database/  
    │   ├── Factories/  
    │   │   └── InvoiceFactory.php  
    │   └── Migrations/  
    │       └── 2025\_01\_01\_000000\_create\_invoices\_table.php  
    ├── Enums/  
    │   └── InvoiceStatus.php  
    ├── Events/  
    │   └── InvoicePaid.php  
    ├── Exceptions/  
    │   └── InvoiceGenerationFailedException.php  
    ├── Models/  
    │   ├── Invoice.php  
    │   └── LineItem.php  
    └── Repositories/  
        ├── EloquentInvoiceRepository.php  
        └── InvoiceRepository.php (Interface)

* **Actions:** Single-purpose, invokable classes that encapsulate a specific business operation. This promotes the Single Responsibility Principle.  
* **Data:** Contains Data Transfer Objects (DTOs), which are typed objects for passing data between layers, and Value Objects, which represent simple, immutable values with business rules (e.g., an `EmailAddress` or `Money` object).  
* **Database:** Holds migrations and factories that are specific to this domain, keeping the schema definition co-located with the code that uses it.  
* **Enums:** PHP 8.1+ enums provide strongly-typed, self-documenting representations of a fixed set of values.  
* **Events:** Domain-specific events that are dispatched when a significant business action occurs. This allows for decoupled communication between domains.  
* **Exceptions:** Custom, domain-specific exceptions that provide more context than generic exceptions.  
* **Models:** The Eloquent models that represent the core entities of the domain.  
* **Repositories:** This directory contains the data persistence contracts (interfaces, e.g., `InvoiceRepository`) and their concrete implementations (e.g., `EloquentInvoiceRepository`). This separates the business logic from the persistence mechanism, making the code more testable and flexible.

### **The `src/Shared/` Directory**

A special `Shared` domain is reserved for code that is genuinely cross-cutting and used by multiple other domains. This could include base classes, shared value objects (like `Money` or `Address`), or common interfaces. The use of this directory should be disciplined to avoid it becoming a dumping ground; if a piece of logic is only used by two or three domains, it may be better to duplicate it to maintain stricter domain independence.

## **V. Code Craftsmanship: Enforcing Quality, Consistency, and Clarity**

A scalable and maintainable codebase is built on a foundation of consistent, high-quality code. This template elevates coding standards from mere recommendations to enforced project law through a combination of documented conventions and automated tooling. The goal is to create a codebase that is predictable, readable, and easy to navigate for any contributor.

### **Adherence to PSR Standards**

The PHP Framework Interoperability Group (PHP-FIG) publishes PHP Standards Recommendations (PSRs) that provide a shared foundation for interoperability and code style across the PHP ecosystem.

* **Mandate:** This project will strictly enforce the **PSR-12 (Extended Coding Style Guide)**. PSR-12 builds upon the foundational PSR-1 (Basic Coding Standard) and provides a comprehensive set of rules for formatting PHP code, covering everything from indentation and line length to the declaration of classes, methods, and control structures. Adherence to PSR-12 ensures a universally consistent and readable code style. This enforcement is not optional and will be automated by Laravel Pint, as detailed in the following section. The project also adheres to  
   **PSR-4** for autoloading, which is fundamental to the domain-oriented directory structure.

### **Laravel Naming Conventions**

Beyond the PSR standards, the Laravel community has established a strong set of conventions for naming various application components. Consistency in naming is crucial for reducing cognitive load and making the codebase intuitive. For example, a strict convention allows a developer (or an AI tool) to correctly infer relationships between components, such as knowing that the `UserController` class likely corresponds to the `User` model and the `users` database table. This template codifies these conventions as a project requirement.

| Component | Convention | Good Example | Bad Example |  |
| :---- | :---- | :---- | :---- | :---- |
| Controller | Singular, PascalCase, `Controller` suffix | `ArticleController` | `ArticlesController` |  |
| Route (Resource) | Plural, kebab-case | `articles/1` | `article/1` |  |
| Route (Named) | Plural, snake\_case with dot notation | `users.show_active` | `users.show-active` |  |
| Model | Singular, PascalCase | `User` | `Users` |  |
| `hasOne`/`belongsTo` Relationship | Singular, camelCase | `articleComment` | `articleComments` |  |
| Other Relationships | Plural, camelCase | `articleComments` | `articleComment` |  |
| Table | Plural, snake\_case | `article_comments` | `article_comment` |  |
| Pivot Table | Singular model names, alphabetical, snake\_case | `article_user` | `user_article` |  |
| Table Column | snake\_case, without model name prefix | `meta_title` | `MetaTitle` |  |
| Foreign Key | Singular model name, snake\_case, `_id` suffix | `article_id` | `ArticleId` |  |
| Method | camelCase | `getAll` | `get_all` |  |
| Variable | camelCase | `$activeUsers` | `$any_other_variable` |  |
| Table 2: Laravel Naming Conventions. This table provides a single source of truth for naming conventions, ensuring consistency across the entire codebase. |  |  |  |  |

### **Software Design Principles**

This template is architected around core software design principles that promote clean, maintainable, and testable code.

* **Single Responsibility Principle (SRP):** This principle states that a class or method should have only one reason to change. The template enforces this by design :  
  * **Controllers** are responsible only for HTTP-level concerns.  
  * **Form Requests** are responsible only for validation and authorization.  
  * **Actions or Services** are responsible for executing a single, specific business use case.  
  * **Models and Repositories** are responsible only for data persistence and retrieval.  
* **Fat Models, Skinny Controllers:** This is a well-established Laravel best practice. All database-related logic and business logic should be moved out of controllers and into the domain layer, primarily within Eloquent models (using scopes, accessors, and mutators) or dedicated repository and service classes. This makes the logic reusable and keeps the application's entry points clean and simple.  
* **Don't Repeat Yourself (DRY):** The template encourages the abstraction of common logic into reusable components to avoid code duplication. This can be achieved through service classes, traits for shared model behavior, or Blade components for reusable UI elements.

## **VI. The Automation & Tooling Ecosystem: Enhancing Developer and AI Productivity**

To translate the principles of code craftsmanship into practice, this template integrates a comprehensive ecosystem of automated tools. This toolchain acts as an impartial guardian of code quality, providing rapid feedback and ensuring that every contribution, whether from a human or an AI, adheres to the project's high standards. The Continuous Integration (CI) pipeline is the centerpiece of this strategy, transforming the project from a static set of files into a self-regulating system that actively maintains its own quality.

### **Code Style Enforcement with Laravel Pint**

* **Tool:** Laravel Pint is an opinionated PHP code style fixer built directly into the Laravel ecosystem. It is built on top of PHP-CS-Fixer and is designed for simplicity and zero-configuration use.  
* **Implementation:** A `pint.json` configuration file is included in the project root. It is configured to use the `laravel` preset, which enforces a coding style that adheres to PSR-12 with additional Laravel-specific conventions. Developers can automatically format their code before committing by running the command `./vendor/bin/pint`.

JSON  
{  
    "preset": "laravel"  
}

### **Static Analysis with Larastan**

* **Tool:** Larastan is a powerful static analysis tool for Laravel, built upon PHPStan. It analyzes the codebase without executing it, detecting a wide range of potential bugs, type errors, and logical inconsistencies that might otherwise only be found at runtime or through extensive testing.  
* **Implementation:** The template includes a `phpstan.neon.dist` configuration file. It is configured to a sensible default of `level: 5`, which provides a strong balance between catching critical errors and avoiding the excessive strictness that can sometimes conflict with Laravel's dynamic, "magical" features. The configuration specifies the paths to be analyzed, ensuring it covers both the Application (  
  `app/`) and Domain (`src/`) layers.

YAML  
includes:  
    \-./vendor/larastan/larastan/extension.neon

parameters:  
    paths:  
        \- app  
        \- src  
    \# The level 5 provides a great balance between finding bugs and staying productive.  
    level: 5

    ignoreErrors:  
        \# Example: Ignoring a specific error pattern if necessary  
        \# \- '\#Call to an undefined method Illuminate\\\\Database\\\\Eloquent\\\\Builder::whereSomething\\\\(\\\\)\#'

    excludePaths:  
        \# Exclude generated files or legacy code from analysis  
        \# \-./\*/\_ide\_helper.php

### **Testing Framework: Pest**

* **Framework:** Pest is a modern testing framework built on top of PHPUnit. It is chosen as the default for this template due to its elegant, expressive syntax, which reduces boilerplate code and improves the readability and maintainability of tests.  
* **Implementation:** The standard `tests/` directory is structured to use Pest, with `Feature` and `Unit` subdirectories. A key addition is an `Arch.php` file in the `tests/` root, which leverages Pest's powerful architectural testing features. This allows for the codification of architectural rules, such as ensuring all Action classes are invokable and final, or that controllers do not directly access Eloquent models.

PHP  
// tests/Arch.php

test('actions')  
    \-\>in('Domain\\\*\\Actions')  
    \-\>toBeFinal()  
    \-\>toBeInvokable();

test('controllers')  
    \-\>in('App\\Http\\Controllers')  
    \-\>not-\>toUse('Illuminate\\Database\\Eloquent\\Model');

### **Continuous Integration (CI) with GitHub Actions**

The CI pipeline is the automated enforcer of all the quality standards defined above. It runs automatically on every push and pull request to the main branches, providing immediate feedback. This fast, consistent feedback loop is invaluable; it allows a human developer to quickly see if their changes are compliant, and it enables an AI contributor to interpret the results, self-correct its generated code, and resubmit a compliant change. The pipeline effectively makes the repository a self-regulating system that prevents the introduction of technical debt.

A `.github/workflows/ci.yml` file is included with the following jobs:

| Job Name | Key Command | Purpose | Trigger |  |
| :---- | :---- | :---- | :---- | :---- |
| Code Style | `./vendor/bin/pint --test` | Enforces PSR-12 and Laravel coding standards | `on: [push, pull_request]` |  |
| Static Analysis | `./vendor/bin/phpstan analyse` | Finds bugs and type errors without running code | `on: [push, pull_request]` |  |
| Testing | `./vendor/bin/pest` | Executes all feature, unit, and architecture tests | `on: [push, pull_request]` |  |
| Table 4: CI/CD Workflow Summary. This table provides a clear overview of the automated quality gates that every contribution must pass. |  |  |  |  |

Below is the complete, annotated workflow file:

YAML  
\#.github/workflows/ci.yml  
name: CI

on:  
  push:  
    branches: \[ "main", "develop" \]  
  pull\_request:  
    branches: \[ "main", "develop" \]

jobs:  
  lint:  
    name: Code Style  
    runs-on: ubuntu-latest  
    steps:  
      \- name: Checkout code  
        uses: actions/checkout@v4

      \- name: Setup PHP  
        uses: shivammathur/setup-php@v2  
        with:  
          php-version: '8.3'  
          extensions: mbstring, dom, fileinfo, mysql  
          coverage: none

      \- name: Install Composer dependencies  
        uses: ramsey/composer-install@v2

      \- name: Run Pint  
        run:./vendor/bin/pint \--test

  analyse:  
    name: Static Analysis  
    runs-on: ubuntu-latest  
    steps:  
      \- name: Checkout code  
        uses: actions/checkout@v4

      \- name: Setup PHP  
        uses: shivammathur/setup-php@v2  
        with:  
          php-version: '8.3'  
          extensions: mbstring, dom, fileinfo, mysql  
          coverage: none

      \- name: Install Composer dependencies  
        uses: ramsey/composer-install@v2

      \- name: Run Larastan  
        run:./vendor/bin/phpstan analyse

  test:  
    name: Testing  
    runs-on: ubuntu-latest  
    services:  
      mysql:  
        image: mysql:8.0  
        env:  
          MYSQL\_ROOT\_PASSWORD: password  
          MYSQL\_DATABASE: testing  
        ports:  
          \- 3306:3306  
        options: \--health-cmd="mysqladmin ping" \--health-interval=10s \--health-timeout=5s \--health-retries=3

    steps:  
      \- name: Checkout code  
        uses: actions/checkout@v4

      \- name: Setup PHP  
        uses: shivammathur/setup-php@v2  
        with:  
          php-version: '8.3'  
          extensions: mbstring, dom, fileinfo, mysql  
          coverage: none \# Coverage can be enabled here if desired

      \- name: Install Composer dependencies  
        uses: ramsey/composer-install@v2

      \- name: Prepare Laravel Application  
        run: |  
          cp.env.ci.env  
          php artisan key:generate

      \- name: Run Migrations  
        env:  
          DB\_HOST: 127.0.0.1  
          DB\_PORT: 3306  
          DB\_DATABASE: testing  
          DB\_USERNAME: root  
          DB\_PASSWORD: password  
        run: php artisan migrate \--force

      \- name: Run Pest Tests  
        env:  
          DB\_HOST: 127.0.0.1  
          DB\_PORT: 3306  
          DB\_DATABASE: testing  
          DB\_USERNAME: root  
          DB\_PASSWORD: password  
        run:./vendor/bin/pest

## **VII. Fortified by Design: A Multi-Layered Security Posture**

While Laravel is designed to be secure by default, robust application security is a shared responsibility between the framework and the developer. This template enforces a security-first posture by codifying best practices in its configuration, structure, and development guidelines, creating a multi-layered defense against common web vulnerabilities.

### **Secure by Default Configuration**

A secure foundation begins with correct configuration. The following settings are critical and must be verified for any production environment:

* **Environment File (`.env`):**  
  * `APP_ENV` must be set to `production`.  
  * `APP_DEBUG` must be set to `false`. This prevents the exposure of sensitive stack traces and configuration details in the event of an error.  
  * `APP_KEY` must be a unique, randomly generated 32-character string, generated with `php artisan key:generate`. This key is essential for all encryption and hashing operations within the framework.  
* **Session Configuration (`config/session.php`):**  
  * `'secure' => env('SESSION_SECURE_COOKIE', true)`: Ensures session cookies are only sent over HTTPS connections in production, preventing man-in-the-middle attacks.  
  * `'http_only' => true`: Prevents client-side scripts from accessing the session cookie, mitigating XSS-based session hijacking.  
  * `'same_site' => 'lax'`: Provides a strong defense against most Cross-Site Request Forgery (CSRF) attacks.

### **Input Validation and Mass Assignment**

The cardinal rule of web security is to never trust user input. This template enforces this rule through architectural patterns.

* **Form Requests:** All `POST`, `PUT`, and `PATCH` requests that handle user data must use dedicated Form Request classes for validation and authorization. This moves this critical logic out of the controller and into a dedicated, reusable class, adhering to the Single Responsibility Principle.  
* **Mass Assignment Protection:** Eloquent's mass assignment protection is a critical defense against unintended data modification. Developers must use the `$fillable` property on Eloquent models to explicitly whitelist attributes that can be mass-assigned. The use of `$request->all()` in model creation or updates is strictly forbidden; instead, `$request->validated()` (which returns only the data that has passed validation in the Form Request) must be used.

### **Protection Against Common Vulnerabilities**

The template leverages Laravel's built-in defenses and recommends additional layers of protection.

* **Cross-Site Scripting (XSS):** Laravel's Blade templating engine automatically escapes all output within `{{ }}` syntax, providing a strong default defense against XSS. The use of the unescaped  
   `{!!!!}` syntax with any user-provided content is forbidden. For an additional layer of defense, especially in applications handling sensitive data, implementing a Content Security Policy (CSP) is highly recommended. This can be achieved with a package like `spatie/laravel-csp` and configured via middleware.  
* **Cross-Site Request Forgery (CSRF):** The `App\Http\Middleware\VerifyCsrfToken` middleware is enabled by default for the `web` middleware group. All HTML forms that submit `POST`, `PUT`, `PATCH`, or `DELETE` requests must include the `@csrf` Blade directive to generate the required token field.  
* **SQL Injection:** The primary defense against SQL injection is the exclusive use of Laravel's Eloquent ORM and Query Builder with parameter bindings. Raw SQL queries (`DB::raw`, `DB::select`) that incorporate user input are a significant security risk and should be avoided. In the rare cases they are necessary, all user input must be passed via bindings, never concatenated directly into the query string.

### **API and Route Security**

* **Rate Limiting:** To protect against brute-force attacks and denial-of-service attempts, rate limiting is essential. The template applies a sensible default rate limit to the `api` route group using the `throttle` middleware in `app/Providers/RouteServiceProvider.php`. This can be easily customized for specific application needs.  
* **Authorization with Policies:** For any action that requires authorization checks beyond simple user authentication (e.g., "can this user edit this post?"), Laravel Policies must be used. Policies organize authorization logic into simple, dedicated classes, keeping controllers and business logic clean and focused.

## **VIII. Core Dependencies: A Curated Set of Essential Packages**

A new Laravel project is powerful out of the box, but its capabilities can be significantly enhanced with a carefully selected set of third-party packages. The philosophy for this template is to include a minimal yet potent collection of dependencies that address common, complex problems without being overly prescriptive or adding unnecessary bloat. The selected packages are from highly reputable sources, primarily the Laravel team and Spatie, ensuring long-term maintenance and high-quality code.

The process for removing any unwanted default packages is straightforward, typically involving `composer remove vendor/package` and then removing any associated service providers or facades from `config/app.php`.

| Package | Purpose | Environment | Documentation |  |
| :---- | :---- | :---- | :---- | :---- |
| `barryvdh/laravel-debugbar` | In-browser toolbar for debugging requests, queries, and more. | `require-dev` | [Link](https://github.com/barryvdh/laravel-debugbar) |  |
| `barryvdh/laravel-ide-helper` | Generates helper files for improved IDE autocompletion. | `require-dev` | [Link](https://github.com/barryvdh/laravel-ide-helper) |  |
| `spatie/laravel-permission` | Flexible Role-Based Access Control (RBAC). | `require` | [Link](https://spatie.be/docs/laravel-permission) |  |
| `spatie/laravel-data` | Powerful Data Transfer Objects (DTOs) and Value Objects. | `require` | [Link](https://spatie.be/docs/laravel-data) |  |
| `dedoc/scramble` | Automatically generates OpenAPI (Swagger) documentation from code. | `require-dev` | [Link](https://scramble.dedoc.co/) |  |
| Table 3: Recommended Core Packages. This table documents the third-party code included in the template, justifying their purpose and providing links for further learning. |  |  |  |  |

### **Rationale for Selections**

* **Development and Debugging:** `laravel-debugbar` and `laravel-ide-helper` are non-negotiable for a productive development environment. The debugbar provides invaluable real-time insights into application performance, while the IDE helper enables static analysis tools and IDEs to understand Laravel's "magic" methods, improving code intelligence and accuracy.  
* **Permissions Management:** Nearly every non-trivial application requires some form of access control. `spatie/laravel-permission` is the de facto industry standard for implementing robust and flexible role-based permissions in Laravel. Including it by default saves developers from reinventing a complex and security-critical system.  
* **Data Objects:** The Domain-Oriented Architecture of this template relies heavily on the use of Data Transfer Objects to pass structured, typed data between layers. `spatie/laravel-data` is a best-in-class library for creating these objects, offering features like validation, casting, and transformations with minimal boilerplate.  
* **API Documentation:** In modern, API-driven development, clear documentation is essential. `dedoc/scramble` automates this process by generating a complete OpenAPI specification directly from PHP attributes and type hints in controllers and form requests. This ensures that documentation is always accurate and up-to-date with the code, which is critical for both human consumers and automated tooling.

### **Rationale for Omissions**

This template deliberately omits certain categories of packages to provide maximum flexibility to the development team:

* **Authentication Starter Kits:** While Laravel Breeze and Jetstream are excellent, the choice of authentication scaffolding (simple login vs. teams, two-factor auth, etc.) is a project-specific decision that should be made after the initial setup.  
* **Admin Panels:** Packages like Nova, Voyager, or Filament are powerful but highly opinionated. The choice of an admin panel depends heavily on the application's specific needs and is best left to the developer.  
* **Frontend Tooling:** The template includes Laravel's default Vite configuration. The choice of a specific frontend framework (Vue, React) or paradigm (Inertia, Livewire) is a major architectural decision that is outside the scope of this backend-focused template.

## **IX. Project Governance and Collaboration: Human and AI-Friendly Documentation**

Effective project governance begins with clear, accessible, and comprehensive documentation. For a template designed to be friendly to all contributors, establishing a high standard for documentation is paramount. The `README.md` serves as the project's front door, while the `CONTRIBUTING.md` provides the rulebook for collaboration.

### **`README.md` Template**

A well-crafted `README.md` file is the most critical piece of documentation for any project. It should provide all the necessary information for a new developer to understand the project's purpose, set up their local environment, and begin contributing.

A brief, one-to-two sentence description of what this project does and the problem it solves.

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

\*\*Clone the repository:\*\*bash git clone [https://github.com/](https://github.com/)\[organization\]/\[repository\].git cd \[repository\]

1. 

**Install Composer dependencies:**  
Bash  
composer install

2. 

**Setup environment file:**  
Bash  
cp.env.example.env

3. *Update the `.env` file with your local database credentials and other necessary settings.*

**Generate application key:**  
Bash  
php artisan key:generate

4. 

**Run database migrations:**  
Bash  
php artisan migrate \--seed

5. 

**Install NPM dependencies and build assets:**  
Bash  
npm install && npm run dev

6. 

**Start the development server:**  
Bash  
php artisan serve

7. 

## **Running the Quality Assurance Toolchain**

This project enforces strict quality standards. Please run the following commands locally before submitting a pull request.

* **Run Code Styler (Pint):**

./vendor/bin/pint

\- \*\*Run Static Analysis (Larastan):\*\*  
\`\`\`bash  
./vendor/bin/phpstan analyse

* **Run Tests (Pest):**

./vendor/bin/pest

\#\# License

This project is licensed under the MIT License \- see the(LICENSE.md) file for details.

### **`CONTRIBUTING.md` Template**

The `CONTRIBUTING.md` file is a direct message to potential contributors, setting clear expectations and providing a transparent guide to the development process. A welcoming and thorough contribution guide is essential for fostering a healthy open-source or internal collaborative environment.

# **Contributing to**

First off, thank you for considering contributing to. It's people like you that make this project great.

## **Code of Conduct**

This project and everyone participating in it is governed by the Code of Conduct. By participating, you are expected to uphold this code. Please report unacceptable behavior.

## **How Can I Contribute?**

### **Reporting Bugs**

* Ensure the bug was not already reported by searching on GitHub under .  
* If you're unable to find an open issue addressing the problem, . Be sure to include a **title and clear description**, as much relevant information as possible, and a **code sample or an executable test case** demonstrating the expected behavior that is not occurring.

### **Suggesting Enhancements**

* Open a new issue to discuss your enhancement. Please provide a clear description of the enhancement, its potential benefits, and any implementation ideas.

### **Pull Requests**

We actively welcome your pull requests.

1. Fork the repo and create your branch from `develop`.  
2. If you've added code that should be tested, add tests.  
3. If you've changed APIs, update the documentation.  
4. Ensure the test suite passes.  
5. Make sure your code lints and passes static analysis.  
6. Issue that pull request\!

## **Development Workflow**

1. Follow the **Installation** steps in the `README.md` to set up your local environment.  
2. Create a new branch for your feature or bugfix: `git checkout -b feature/amazing-new-feature`.  
3. Write your code and accompanying tests.  
4. Ensure all quality checks pass locally before pushing.

## **Mandatory Pre-PR Quality Checklist**

Before submitting a pull request, you **must** run the entire quality assurance toolchain locally and ensure all checks pass. Pull requests with failing checks will not be reviewed.

1. \*\*Format Code:\*\*bash ./vendor/bin/pint  
2. **Run Static Analysis:**

./vendor/bin/phpstan analyse \`\`\`

3. **Run Test Suite:**

./vendor/bin/pest \`\`\`

We use GitHub Actions to run these checks on every pull request. However, running them locally will save you time and ensure a smoother review process.

## **Any other questions?**

Feel free to open an issue if you have any further questions. We are here to help\!

