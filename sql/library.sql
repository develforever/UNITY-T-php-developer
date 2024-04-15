-- Adminer 4.8.1 PostgreSQL 14.11 (Debian 14.11-1.pgdg120+2) dump

create extension IF NOT EXISTS isn;

DROP TABLE IF EXISTS "author";
DROP SEQUENCE IF EXISTS author_id_seq;
CREATE SEQUENCE author_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 6 CACHE 1;

CREATE TABLE "public"."author" (
    "id" integer DEFAULT nextval('author_id_seq') NOT NULL,
    "name" character varying NOT NULL,
    "last_name" character varying NOT NULL,
    CONSTRAINT "author_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "author";
INSERT INTO "author" ("id", "name", "last_name") VALUES
(1,	'John',	'Doe'),
(2,	'Jan',	'Nowak'),
(3,	'Marek',	'Kowalski'),
(4,	'Derek',	'Morgan'),
(5,	'Terence',	'Dale'),
(6,	'Vincent',	'Hill');

DROP VIEW IF EXISTS "author_book_count";
CREATE TABLE "author_book_count" ("name" character varying, "last_name" character varying, "book_count" bigint);


DROP VIEW IF EXISTS "author_rating";
CREATE TABLE "author_rating" ("name" character varying, "last_name" character varying, "rating" numeric);


DROP TABLE IF EXISTS "book";
DROP SEQUENCE IF EXISTS books_id_seq;
CREATE SEQUENCE books_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 11 CACHE 1;

CREATE TABLE "public"."book" (
    "id" integer DEFAULT nextval('books_id_seq') NOT NULL,
    "author_id" integer NOT NULL,
    "title" character varying NOT NULL,
    "year" character varying NOT NULL,
    "isbn" isbn13 NOT NULL,
    CONSTRAINT "book_isbn" UNIQUE ("isbn"),
    CONSTRAINT "books_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "book";
INSERT INTO "book" ("id", "author_id", "title", "year", "isbn") VALUES
(3,	1,	'Nightmare',	'2020',	'978-2-35082-593-9'),
(4,	2,	'Pod nartą',	'2002',	'978-3-457-78889-9'),
(5,	2,	'Droga kręta',	'2003',	'978-0-476-55163-3'),
(6,	3,	'Mój niedźwiedź',	'1987',	'978-0-8493-6335-1'),
(7,	3,	'Góry i lasy',	'2012',	'978-89-91398-54-2'),
(8,	3,	'Malownicze Tatry',	'2016',	'978-1-03-984456-8'),
(9,	4,	'Margot',	'1987',	'978-87-11-55859-1'),
(10,	5,	'Skynet',	'2023',	'978-7-166-90022-1'),
(11,	6,	'Crime scene',	'2014',	'978-4-663-90283-3');

DROP TABLE IF EXISTS "book_review";
DROP SEQUENCE IF EXISTS review_id_seq;
CREATE SEQUENCE review_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 9 CACHE 1;

CREATE TABLE "public"."book_review" (
    "id" integer DEFAULT nextval('review_id_seq') NOT NULL,
    "book_id" integer NOT NULL,
    "rating_id" integer NOT NULL,
    "description" character varying,
    CONSTRAINT "review_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

TRUNCATE "book_review";
INSERT INTO "book_review" ("id", "book_id", "rating_id", "description") VALUES
(3,	3,	1,	NULL),
(4,	4,	9,	NULL),
(5,	4,	8,	NULL),
(6,	5,	9,	NULL),
(7,	6,	6,	NULL),
(8,	7,	6,	NULL),
(9,	8,	10,	NULL);

DROP TABLE IF EXISTS "rating";
DROP SEQUENCE IF EXISTS rating_id_seq;
CREATE SEQUENCE rating_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 10 CACHE 1;

CREATE TABLE "public"."rating" (
    "id" integer DEFAULT nextval('rating_id_seq') NOT NULL,
    "value" integer NOT NULL,
    CONSTRAINT "rating_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "rating_value" UNIQUE ("value")
) WITH (oids = false);

TRUNCATE "rating";
INSERT INTO "rating" ("id", "value") VALUES
(1,	1),
(2,	2),
(3,	3),
(4,	4),
(5,	5),
(6,	6),
(7,	7),
(8,	8),
(9,	9),
(10,	10);

ALTER TABLE ONLY "public"."book" ADD CONSTRAINT "books_author_id_fkey" FOREIGN KEY (author_id) REFERENCES author(id) ON UPDATE SET NULL ON DELETE SET NULL NOT DEFERRABLE;

ALTER TABLE ONLY "public"."book_review" ADD CONSTRAINT "book_review_book_id_fkey" FOREIGN KEY (book_id) REFERENCES book(id) ON UPDATE SET NULL ON DELETE SET NULL NOT DEFERRABLE;
ALTER TABLE ONLY "public"."book_review" ADD CONSTRAINT "book_review_rating_id_fkey" FOREIGN KEY (rating_id) REFERENCES rating(id) ON UPDATE SET NULL ON DELETE SET NULL NOT DEFERRABLE;

DROP TABLE IF EXISTS "author_book_count";
CREATE VIEW "author_book_count" AS SELECT a.name,
    a.last_name,
    count(b.title) AS book_count
   FROM (author a
     LEFT JOIN book b ON ((a.id = b.author_id)))
  GROUP BY a.id
  ORDER BY (count(b.id)) DESC;

DROP TABLE IF EXISTS "author_rating";
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

-- 2024-04-15 15:58:55.065703+00