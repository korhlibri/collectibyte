CREATE DATABASE collectibyte;

CREATE TABLE collectibyte.article_categories(
    id int(9) NOT NULL AUTO_INCREMENT, 
    category varchar(50) NOT NULL, 
    PRIMARY KEY (id)
) COLLATE 'utf8_general_ci';

CREATE TABLE collectibyte.articles(
    id int(9) NOT NULL AUTO_INCREMENT, 
    permalink varchar(25) NOT NULL UNIQUE, 
    title varchar(50) NOT NULL UNIQUE,
    id_category int(9) NULL,
    description text NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    archived int(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (id_category) REFERENCES collectibyte.article_categories(id);
) COLLATE 'utf8_general_ci';

CREATE TABLE collectibyte.article_details(
    id int(9) NOT NULL AUTO_INCREMENT, 
    id_article int(9) NOT NULL UNIQUE, 
    article_text text NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    archived int(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (id_article) REFERENCES collectibyte.articles(id)
) COLLATE 'utf8_general_ci';

CREATE TABLE collectibyte.product_categories(
    id int(9) NOT NULL AUTO_INCREMENT,
    category varchar(50) NOT NULL,
    PRIMARY KEY (id)
) COLLATE 'utf8_general_ci'; 

CREATE TABLE collectibyte.products(
    id int(9) NOT NULL AUTO_INCREMENT,
    permalink varchar(25) NOT NULL UNIQUE,
    title varchar(50) NOT NULL UNIQUE,
    id_category int(9) NULL,
    description text NOT NULL,
    amount int(9) NOT NULL,
    price decimal(10,2) NOT NULL,
    creation_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    archived int(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (id_category) REFERENCES collectibyte.product_categories(id);
) COLLATE 'utf8_general_ci';