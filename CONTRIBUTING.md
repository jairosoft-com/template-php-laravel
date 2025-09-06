# **Contributing to hello-world**

First off, thank you for considering contributing to hello-world. It's people like you that make this project great.

## **Code of Conduct**

This project and everyone participating in it is governed by the Code of Conduct. By participating, you are expected to uphold this code. Please report unacceptable behavior.

## **How Can I Contribute?**

### **Reporting Bugs**

*   Ensure the bug was not already reported by searching on GitHub under Issues.
*   If you're unable to find an open issue addressing the problem, open a new one. Be sure to include a **title and clear description**, as much relevant information as possible, and a **code sample or an executable test case** demonstrating the expected behavior that is not occurring.

### **Suggesting Enhancements**

*   Open a new issue to discuss your enhancement. Please provide a clear description of the enhancement, its potential benefits, and any implementation ideas.

### **Pull Requests**

We actively welcome your pull requests.

1.  Fork the repo and create your branch from `develop`.
2.  If you've added code that should be tested, add tests.
3.  If you've changed APIs, update the documentation.
4.  Ensure the test suite passes.
5.  Make sure your code lints and passes static analysis.
6.  Issue that pull request!

## **Development Workflow**

1.  Follow the **Installation** steps in the `README.md` to set up your local environment.
2.  Create a new branch for your feature or bugfix: `git checkout -b feature/amazing-new-feature`.
3.  Write your code and accompanying tests.
4.  Ensure all quality checks pass locally before pushing.

## **Mandatory Pre-PR Quality Checklist**

Before submitting a pull request, you **must** run the entire quality assurance toolchain locally and ensure all checks pass. Pull requests with failing checks will not be reviewed.

1.  **Format Code (Pint):**
    ```bash
    ./vendor/bin/pint
    ```

2.  **Run Static Analysis (Larastan):**
    ```bash
    ./vendor/bin/phpstan analyse
    ```

3.  **Run Test Suite (PHPUnit):**
    ```bash
    ./vendor/bin/phpunit
    ```

We use GitHub Actions to run these checks on every pull request. However, running them locally will save you time and ensure a smoother review process.

## **Any other questions?**

Feel free to open an issue if you have any further questions. We are here to help!
