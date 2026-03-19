# Authentication

This help center is protected by authentication.

## Requirements

To access the documentation, you need to:

1. Be logged into your account
2. Have an active session

## Login

If you are not logged in, you will be redirected to the login page automatically.

## Configuration

Authentication can be enabled or disabled in the `config/HelpCenter.php` file:

```php
'auth' => env('HELP_CENTER_AUTH', false),
```

Set the `HELP_CENTER_AUTH` environment variable to `true` to enable authentication.
