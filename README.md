# Sophos HTTP Client

### Installation/Usage

- Install with Composer `$ composer require matidev/sophos-http-client-php`
- Get 2FA code from Secret key: `Mati\TwoFactor::getCode( $tfaSecret )`
- Bypass Sophos: `Mati\SophosHttpClient::bypass( $sophosUrl, $username, $password )`

### Testing

- `php vendor/phpunit/phpunit/phpunit tests/TwoFactorTest.php`
- `php vendor/phpunit/phpunit/phpunit tests/SophosHttpClientTest.php`