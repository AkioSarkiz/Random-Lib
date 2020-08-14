# Random-library

This package for get random value.
Installation:
```
composer require akiosarkiz/randomlib
```

### Example
```php
// Init
use Random\Random;

$random = new Random();

// Random int
$int = $random->int();
$int = $random->int(0, 10);

// Random crypt int (need php-openssl ext)
$crypt_int = $random->crypt_int();
$crypt_int = $random->crypt_int(0, 10);

// Random string
$string = $random->string(10);
$string = $random->string(10, '0123456789');

// Random crypt string (need php-openssl ext)
$crypt_string = $random->crypt_string(10);
$crypt_string = $random->crypt_string(10, 'ads');

// Random float
$float = $random->float();
$float = $random->float(0.0, 10);

// Random crypt float (need php-openssl ext)
$crypt_float = $random->crypt_float();
$crypt_float = $random->crypt_float(-1.0, 10);
```
 
