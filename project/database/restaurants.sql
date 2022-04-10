PRAGMA foreign_keys = ON;
.header on
.mode column

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS ROwner;
DROP TABLE IF EXISTS Address;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS OOrder;

CREATE TABLE User (
    id_User INTEGER PRIMARY KEY,                            -- unique id given by the website to each new user
    username VARCHAR UNIQUE,                                -- user's unique username
    password VARCHAR,                                       -- user's password
    fname VARCHAR,                                          -- user's first name
    lname VARCHAR,                                          -- user's last name
    phone INTEGER,                                          -- user's phone number
    id_Address INTEGER REFERENCES Address(id_Address)       -- user's address
);


CREATE TABLE ROwner (
    id_Owner INTEGER REFERENCES User(id_User),              -- restaurant owner id given by website
    companyName VARCHAR,                                    -- company who's owner owns
    PRIMARY KEY(id_Owner)
);

CREATE TABLE Address (
    id_Address INTEGER PRIMARY KEY,                         -- unique id given to address
    city VARCHAR,                                           -- name of the address's city
    postalCode VARCHAR,                                     -- postal code of the address
    street VARCHAR                                          -- street of the address
);

CREATE TABLE Restaurant (
    id_Restaurant INTEGER PRIMARY KEY,                          -- id for each id_Restaurant
    name VARCHAR,                                               -- restaurant's name
    id_category INTEGER REFERENCES category(id_Category),       -- restaurants's category
    id_Address INTEGER REFERENCES Address(id_Address),          -- id of
    id_Owner INTEGER REFERENCES ROwner(id_Owner)                -- owner's id of restaurant
);

CREATE TABLE Category (
    id_Category INTEGER PRIMARY KEY,                            -- id for each category
    type VARCHAR                                                -- type of category
);

CREATE TABLE Review (
    id_Order INTEGER REFERENCES OOrder(id_Order),               -- review's id
    id_User INTEGER REFERENCES User(id_User),                   -- user that wrote the review
    published DATE,                                             -- date when the review was posted
    text VARCHAR,                                               -- comment text
    score INTEGER,                                              -- review's score of the restaurant
    PRIMARY KEY (id_Order)
);

CREATE TABLE Dish (
  id_Dish INTEGER PRIMARY KEY,                                  -- id for each dish
  name VARCHAR,                                                 -- dish's name
  price INTEGER,                                                -- dish's price
  description VARCHAR,                                          -- dish's description
  photo VARCHAR,                                                -- dish's photo
  categories VARCHAR,                                           -- dish's categories
  id_Restaurant INTEGER REFERENCES Restaurant                   -- restaurant's id to identify where dish is from
);

CREATE TABLE Order (
    id_Order INTEGER PRIMARY KEY,                                   -- id for each order given by the website
    price INTEGER,                                                  -- order's price
    descritpion VARCHAR,                                            -- order's description with everything ordered and quantities
    id_Restaurant INTEGER REFERENCES Restaurant(id_Restaurant)      -- id's user for orders's history
);

-- Users (Restaurant Owners)
INSERT INTO Users (1,'Joana Valente','#Test1','Joana','Valente',918929898,6); -- Dona do Macdonalds
INSERT INTO Users (2,'Diogo Almeida','#Test2','Diogo','Almeida',918929892,7); -- Dono do Adega Soares
INSERT INTO Users (3,'Jorge Duarte','#Test3','Jorge','Duarte',918929843,8);   -- Dono do 
INSERT INTO Users (4,'Carlos Sousa','#Test3','Jorge','Duarte',918929843,8);

-- Different types of categories 
INSERT INTO Category VALUES(1,'Fast-Food');
INSERT INTO Category VALUES(2,'Gourmet');
INSERT INTO Category VALUES(3,'Healthy');
INSERT INTO Category VALUES(4,'Desert');

-- Restaurant's address
INSERT INTO Address VALUES(1,'Porto','4000-322','Praça da Liberdade, 126');               --Mcdonals aliados
INSERT INTO Address VALUES(2,'Vale de Cambra','3730-249','Av. de Santo António 289');     --Adega Soares
INSERT INTO Address VALUES(3,'Porto','')
