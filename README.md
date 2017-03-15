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
Unit tests are provided in the `/tests` folder. To run these steps simply run following command from the project root:

```php
bin/phpunit
```

Notes
-----
- Used newest version of PHP (7.1)
- Tests implemented using PHPUnit 6 + including phpunit.xml config for easy execution
- Autoloading classes by composer (PSR-4 standard)
- Follows PSR-1, PSR-2 & PSR-4 guidelines
- Utilized Carbon PHP library for easier and more reliable manipulation of DateTime
- Made Allowed IPs configurable for each banner instance (on top of default ones as per specification)
- Current DateTime for deciding whether banner is displayed is also configurable for each `Banner::isDisplayable()` call (more flexibility)

Future Improvements
-----
- Validate IP address format (with regex)
- More options for the configuration
- Accept directly Carbon classes in the `Banner` constructor or even better `DisplayPeriod` instance
- More test cases possibly also with the data provider to cover multiple inputs with the same scenarios
