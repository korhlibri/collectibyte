CREATE DATABASE collectibyte;

CREATE TABLE collectibyte.articles(
    id int(9) NOT NULL AUTO_INCREMENT, 
    permalink varchar(25) NOT NULL UNIQUE, 
    title varchar(50) NOT NULL UNIQUE,
    description text NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    archived int(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
) COLLATE 'utf8_general_ci';

CREATE TABLE collectibyte.products(
    id int(9) NOT NULL AUTO_INCREMENT,
    permalink varchar(25) NOT NULL UNIQUE,
    title varchar(50) NOT NULL UNIQUE,
    description text NOT NULL,
    amount int(9) NOT NULL,
    price decimal(10,2) NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    archived int(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
) COLLATE 'utf8_general_ci';