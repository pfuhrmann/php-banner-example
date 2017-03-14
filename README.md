Mercari PHP Skills Test
===============

Installation
-----------
If you have docker and docker-compose installed than:
```php
docker-compose up
```

Installing on bare metal (you need PHP 7+):
```php
composer install
```

Requirements
------------
* [PHP 7.1](http://php.net)
* [Composer](https://getcomposer.org) 
* [PHPUnit](https://phpunit.de/getting-started.html)

Testing
-------
Basic unit tests are provided in the `/tests` folder. To run these steps simply run following command from the project root:

```php
bin/phpunit
```

Notes
-----
- Used newest version of PHP (7.1)
- Tests implemented using PHPUnit 6 + including phpunit.xml config for easy execution
- Autoloading automatically loaded by composer (PSR-4 autoloading)
- Follows PSR-1, PSR-2 & PSR-4 guidelines
