## PHP Technical task

Create a new Laravel project using composer

Attached you will find a DB dump and a .csv file. 

Create a DB connection in laravel using the .env file. 

Seed the DB based on the dump

In the resulted DB you will have these 1 table: `transactions`.
```
* transactions: id, code, amount, user_id, created_at, updated_at
```

You have two sources. One DB and one is the .csv file

Write two services(classes) that implement an interface which will allow you to retrieve the data. 

1. Create an endpoint which will return the transactions in a json with an extra parameter which will specify the source
2  validate the source value and if the value is unknown throw an exception (eg: /transactions?source=html)

endpoints:
* /transactions?source=db
* /transactions?source=csv

## Overview
A simple implementation for abstract factory design pattern where you could have multiple implementations separated on classes (these classes should implement the same interface) and main class usually called factory responsible to choose a class to create object from.

In this example, the `TransactionFactory` switch between retrieving transaction form database or from CSV file.

## How to run
### Docker
For running with docker use [Laravel Sail](https://laravel.com/docs/8.x/sail) package which is already included in `compposer.json`, simply it's a `docker-compose` came with PHP, MySQL, and Redis and it'ss ready to start with one single command .
1. Clone the project.
2. Run `composer install`
3. Run `sail up -d`

### Local
1. Clone the project.
2. Run `composer install`
3. Set up .env
4. Run `php artisan migrate --seed` which will seed the database exactly like `database.sql`
5. Run `php artisan test`
6. Run `php artisan serv`

## API's
GET `/api/v1/transactions?source={source}` : index all transactions, required query parameter should passed with request `source` where source is db or csv

## Used technologies
* Laravel 8
* maatwebsite/excel package (to handel csv)
