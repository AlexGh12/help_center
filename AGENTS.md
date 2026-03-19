# Agent Instructions for Help Center Package

This is a Laravel package that generates a help center webpage by reading `.md` files from the `resources/docs/` folder.

## Project Overview

- **Language**: PHP (^7.4|^8.0)
- **Framework**: Laravel (^7.0|^8.37|^9.0|^10.0|^11.0|^12.0|^13.0)
- **Namespace**: `AlexGh12\HelpCenter`
- **Package Name**: `alexgh12/help_center`
- **License**: MIT

## Directory Structure

```
src/
├── AlexGh12.php                    # Facade class
├── HelpCenterServiceProvider.php   # Service provider
├── Http/
│   ├── Controllers/
│   │   └── HelpCenterController.php
│   └── routes.php
config/
└── HelpCenter.php                 # Package config (publishable)
resources/
└── views/
    ├── index.blade.php
    └── layout.blade.php
```

## Build/Lint/Test Commands

### Installation
```bash
composer install
```

### Development Dependencies (recommended)
Add to `composer.json` `require-dev`:
- `phpunit/phpunit` - Testing framework
- `mockery/mockery` - Mocking library
- `phpstan/phpstan` - Static analysis

### Running Tests
```bash
# Run all tests
./vendor/bin/phpunit

# Run a specific test file
./vendor/bin/phpunit tests/HelpCenterTest.php

# Run a specific test method
./vendor/bin/phpunit --filter testExample

# Run tests with coverage
./vendor/bin/phpunit --coverage-html coverage
```

### Static Analysis
```bash
# Run PHPStan (after creating phpstan.neon.dist)
./vendor/bin/phpstan analyse

# Run specific level
./vendor/bin/phpstan analyse --level=max
```

### Code Style
```bash
# Install dev dependencies for linting
composer require --dev friendsofphp/php-cs-fixer

# Fix code style issues
./vendor/bin/php-cs-fixer fix

# Dry run to see what would be fixed
./vendor/bin/php-cs-fixer fix --dry-run --diff
```

### Composer Scripts (add to composer.json)
```json
{
    "scripts": {
        "test": "phpunit",
        "phpstan": "phpstan analyse",
        "cs-fix": "php-cs-fixer fix",
        "cs-check": "php-cs-fixer fix --dry-run --diff"
    }
}
```

## Code Style Guidelines

### Formatting
- **Indentation**: Tabs (not spaces)
- **Line endings**: LF (Unix style)
- **Character encoding**: UTF-8
- **File ending**: newline at end of file
- **Trailing whitespace**: trimmed (except in `.md` files)

### PHP Conventions

#### Opening Tag
```php
<?php
```

#### Namespaces and Imports
```php
<?php

namespace AlexGh12\HelpCenter;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
```

#### Class Declaration
```php
class HelpCenterServiceProvider extends ServiceProvider
{
    // Use tabs for indentation
}
```

#### Method Declaration
```php
/**
 * Description of what the method does.
 *
 * @param string $param Description of parameter
 * @return void
 */
public function boot()
{
    // implementation
}
```

#### Control Structures
```php
if (! config('HelpCenter.enabled')) {
    return;
}

foreach ($items as $item) {
    // ...
}
```

#### Arrays (short array syntax preferred)
```php
return [
    'key' => 'value',
    'another' => config('HelpCenter.path_docs'),
];
```

### Naming Conventions

| Element | Convention | Example |
|---------|------------|---------|
| Classes | PascalCase | `HelpCenterServiceProvider` |
| Methods | camelCase | `registerPublishing()` |
| Variables | camelCase | `$helpCenterPath` |
| Constants | UPPER_SNAKE_CASE | `HELP_CENTER_ENABLED` |
| Config keys | snake_case | `path_docs`, `enabled` |
| Routes | snake_case | `help_center` |

### Class Structure Order
1. Constants
2. Properties (public, then protected, then private)
3. Constructor
4. Public methods
5. Private methods

### PHPDoc Annotations
```php
/**
 * Brief description of the method.
 *
 * @param Type $paramName Description
 * @return ReturnType Description
 */
```

### Blade Template Guidelines
- Section names: snake_case
- Use Bootstrap 5 classes
- Include `@extends` and `@section` directives
- Use `{{ route('route_name') }}` for URLs
- Use `{{ config('key') }}` for config values

### Error Handling
```php
// Return early for guard clauses
if (! $condition) {
    return;
}

// Use Laravel's validator when appropriate
$validator = Validator::make($request->all(), [
    'field' => 'required|string',
]);

if ($validator->fails()) {
    return redirect()->back()->withErrors($validator);
}
```

### Service Provider Patterns
```php
class HelpCenterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register routes, views, configs
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'HelpCenter');
    }

    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../config/HelpCenter.php', 'HelpCenter');
    }
}
```

## Configuration

Package config is stored in `config/HelpCenter.php` and supports environment variables:

| Key | Env Variable | Default |
|-----|--------------|---------|
| enabled | `HELP_CENTER_ENABLED` | `true` |
| path_views | `HELP_CENTER_PATH_VIEWS` | `HelpCenter` |
| path_docs | `HELP_CENTER_PATH_DOCS` | `resources/docs/` |

## Testing Guidelines

### Test File Location
```
tests/
├── TestCase.php
└── HelpCenterTest.php
```

### TestCase Example
```php
<?php

namespace AlexGh12\HelpCenter\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [HelpCenterServiceProvider::class];
    }
}
```

### Test Example
```php
<?php

namespace AlexGh12\HelpCenter\Tests;

class HelpCenterTest extends TestCase
{
    public function test_route_exists()
    {
        $response = $this->get('/help-center');

        $response->assertStatus(200);
    }
}
```

## Common Tasks

### Creating a New Release
```bash
# Update version in composer.json
# Create git tag
git tag v0.x.x
git push origin v0.x.x
```

### Adding New Routes
Edit `src/Http/routes.php`:
```php
Route::get('/{slug}', 'HelpCenterController@show')->name('help_center.show');
```

### Adding New Config Options
1. Add to `config/HelpCenter.php`
2. Add environment variable default in `HelpCenterServiceProvider::register()`
3. Update README.md documentation

## Editor Configuration

The project uses `.editorconfig` - ensure your editor supports it. Key settings:
- PHP files: tabs, 4-space tab width
- Markdown files: no trailing whitespace trimming
- YAML files: 2-space indentation
