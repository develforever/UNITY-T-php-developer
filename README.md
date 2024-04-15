# UNITY-T - Programista PHP Robert Jamróz


## Task 1 - PHP

PHP Composer project. To run interactive see below.

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

All SQL database and schema defeinition are in `sql/library.sql`


```
SELECT a.name,
    a.last_name,
    count(b.title) AS book_count
   FROM (author a
     LEFT JOIN book b ON ((a.id = b.author_id)))
  GROUP BY a.id
  ORDER BY (count(b.id)) DESC;
```

```
CREATE VIEW "author_rating" AS SELECT a.name,
    a.last_name,
    avg(r.value) AS rating
   FROM (((author a
     LEFT JOIN book b ON ((a.id = b.author_id)))
     JOIN book_review br ON ((b.id = br.book_id)))
     JOIN rating r ON ((br.rating_id = r.id)))
  GROUP BY a.id
  ORDER BY (avg(r.value)) DESC
  LIMIT 5;
```

Run adminer and postgresql server for interactive result:

```
docker-compose up
```

Open url: http://localhost:8080/?pgsql=db 
Create database library and import `sql/library.sql` file.

