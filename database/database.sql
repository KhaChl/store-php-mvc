CREATE DATABASE store_php;
USE store_php;

CREATE TABLE `user`(
    id int(255) auto_increment not null,
    name varchar(100) not null,
    surname varchar(255),
    email varchar(255) not null,
    password varchar(255)not null,
    role varchar(20),
    region varchar(100),
    city varchar(100),
    address varchar(255),
    CONSTRAINT PK_users PRIMARY KEY(id),
    CONSTRAINT UQ_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE `category`(
    id int(255) auto_increment not null,
    name varchar(100) not null,
    CONSTRAINT PK_CATEGORY PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO category VALUES(NULL,'Zapatos');
INSERT INTO category VALUES(NULL,'Pantalones');
INSERT INTO category VALUES(NULL,'Poleras');

CREATE TABLE `product`(
    id int(255) auto_increment not null,
    category_Id int(255) not null,
    name varchar(100) not null,
    description text,
    price float not null,
    stock int(255)not null,
    favorite int(255)not null,
    image varchar(255) not null,
    CONSTRAINT PK_PRODUCT PRIMARY KEY(id),
    CONSTRAINT FK_PRODUCT_CATEGORY FOREIGN KEY(category_Id) REFERENCES category(id)
)ENGINE=InnoDb;

CREATE TABLE `order`(
    id int(255) auto_increment not null,
    user_Id int(255) not null,
    region varchar(100) not null,
    city varchar(100) not null,
    address varchar(255) not null,
    total_Purchase float(255,2) not null,
    state varcher(100) not null,
    date_Purchase date not null,
    hour_Purchase time not null,
    CONSTRAINT PK_ORDER PRIMARY KEY(id),
    CONSTRAINT FK_ORDER_USER FOREIGN KEY(user_Id) REFERENCES user(id)
)ENGINE=InnoDb;

CREATE TABLE `orderList`(
    id int(255) auto_increment not null,
    order_Id int(255) not null,
    product_Id int(255) not null,
    units int(255) not null,
    CONSTRAINT PK_ORDERLIST PRIMARY KEY(id),
    CONSTRAINT FK_ORDERLIST_ORDER FOREIGN KEY(order_Id) REFERENCES order(id),
    CONSTRAINT FK_ORDERLIST_PRODUCT FOREIGN KEY(product_Id) REFERENCES product(id)
)ENGINE=InnoDb;