# UNITY-T - Programista PHP Robert Jamróz


## Task 1 - PHP

Requirements:

* phpenv v0.9.0-rc.1
* Composer version 2.7.2 2024-03-11 17:12:18
* PHP 8.1.4


Prepare
```
phpenv install 8.1.4
phpenv local 8.1.4
composer install
```

Run tests

```
./vendor/bin/phpunit --testdox tests
```

## Task 2 - SQL

```
docker-compose up
```

Open url: http://localhost:8080/?pgsql=db 
Create database library and import `sql/library.sql` file.

