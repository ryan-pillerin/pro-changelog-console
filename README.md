# ProChangeLog Console

ProChangeLog is a project changelog and context platform designed to make project history easier to record, understand, and retrieve.

The backend implements the business capabilities of ProChangeLog using Laravel, exposing API contracts to the frontend and other authorized consumers.

## Technology Stack

* PHP 8.4+
* Laravel 13
* MySQL
* Composer
* Nginx
* Laravel-supported testing tools configured by the project

## Development Instructions

### Laravel as the Implementation Framework

All backend development must follow the applicable Laravel documentation, conventions, instructions, and established project configuration.

Before implementing a feature, developers and AI coding assistants must:

* Follow Laravel's recommended practices for the relevant functionality.
* Use Laravel's existing capabilities where appropriate instead of reinventing framework functionality.
* Respect the project's installed Laravel version and dependencies.
* Follow the established project structure and implementation conventions.
* Avoid introducing third-party packages, architectural patterns, or abstractions without sufficient justification.
* Preserve existing functionality and established project conventions when extending the system.

Laravel conventions govern framework implementation. Business ownership and architectural boundaries are determined by the system's business semantics and the Singularity Principle.

### Architecture and Business Semantics

The backend must follow the Singularity Principle to determine semantic identity, ownership, responsibility, and relationships between business capabilities.

The following rules apply:

* **Requires ≠ Owns.** A capability's dependency on another capability does not transfer ownership.
* Preserve semantic identity and responsibility across capability boundaries.
* Use explicit cross-capability contracts.
* Prevent unauthorized access to another capability's internal implementation.
* Keep implementation dependencies as limited as reasonably possible without eliminating necessary semantic relationships.
* Avoid unnecessary abstractions, duplicated responsibilities, and architectural fragmentation.
* Reorganize the implementation when necessary to maintain coherence with the business semantics.

Do not introduce a conventional architecture or design pattern solely because it is commonly used in Laravel projects. Determine whether the structure is appropriate for the actual business responsibility and established architecture.

## Business Capabilities

### Tenant Management

Manages tenant-related responsibilities, invitations, and tenant membership.

### Client Management

Manages client information within the appropriate tenant boundary.

### IAM

Owns account identity, account lifecycle, authentication, credentials, and applicable access-control responsibilities.

### User Management

Owns self-registration and user profile management. Account creation required by registration is performed through IAM's defined capability.

### Project Management

Manages projects, project information, and applicable project membership and visibility rules.

### Changelog Management

Manages changelog entries associated with projects and their applicable business rules.

Each capability retains its semantic ownership regardless of the Laravel implementation used.

## Development Setup

### Requirements

* PHP version compatible with Laravel 13
* Composer
* MySQL
* Required PHP extensions
* Node.js and npm if required by the repository's asset tooling

### Installation

```bash
git clone <backend-repository-url>
cd <backend-project-directory>

composer install

cp .env.example .env

php artisan key:generate
```

Configure the database and other required environment variables in `.env`.

Run database migrations:

```bash
php artisan migrate
```

Start the development server:

```bash
php artisan serve
```

### Testing

Run the project's configured test suite:

```bash
php artisan test
```

Tests should validate meaningful business rules, API workflows, capability boundaries, and relevant failure conditions.

## API Development

* Follow Laravel's applicable routing, request validation, middleware, authentication, and response conventions.
* Maintain explicit API contracts.
* Do not expose internal persistence structures as public API contracts without justification.
* Enforce authorization at the appropriate application boundary.
* Handle cross-capability failures and consistency requirements explicitly.
* Keep API behavior aligned with the documented business rules.

## Security and Configuration

* Keep secrets and environment-specific credentials out of source control.
* Follow Laravel's security guidance for authentication, authorization, validation, and database access.
* Do not expose private credentials through API responses or frontend configuration.
* Configure production permissions, logging, database access, and environment settings appropriately.

## Testing Guidelines

Use Laravel's testing facilities where appropriate.

Prioritize tests for:

* Business rules and capability behavior.
* API workflows.
* Authentication and authorization.
* Cross-capability contracts.
* Important failure conditions.
* Regression risks introduced by implementation changes.

Test coverage should reflect actual behavior and risk rather than an arbitrary number of generated tests.

## Deployment

The production environment uses Laravel with PHP, MySQL, and Nginx.

Deployment procedures must document the actual environment configuration, database migration process, permissions, logging, and operational requirements.

## Future Development

Future capabilities may extend ProChangeLog with project context, documentation references, architecture information, deployment resources, and external integrations.

Implement these capabilities according to their business semantics and documented architectural boundaries, following Laravel's applicable instructions for the implementation.

## Documentation

Refer to the project's business capability documents, architecture documentation, API contracts, and development instructions for detailed requirements.

When instructions conflict, identify the conflict explicitly rather than silently introducing an architectural exception or changing established business ownership.
