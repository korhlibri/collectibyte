# collectibyte
A simple PHP project of an e-commerce website using Vue.js and Bootstrap 5.

## Set-up

### Install Dependencies

Install the PHP dependencies via Composer. The dependencies are located in `composer.json`.

```
composer install
```

### SQL Tables

The project requires certain SQL tables to function properly. These tables are available in the root directory of the project, under the `tables.sql` file. The syntax is in MySQL.

### Populate SQL Tables

The project uses data in the SQL tables generated with the help of `tables.sql` in order to display meaningful information and allow interactivity of the data entries on the website.

### Change API database settings

The configuration of the database is needed for the project to function properly. The configuration is located in `/api/index.php` and is used by the API to access the database with provided credentials.

## Run

The project can be ran with the help of a XAMP package stack.