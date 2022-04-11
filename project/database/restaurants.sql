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

CREATE TABLE Image (
    id_Image INTEGER PRIMARY KEY,                           -- image id given by website to each image 
    link VARCHAR
)

CREATE TABLE Address (
    id_Address INTEGER PRIMARY KEY,                         -- unique id given to address
    city VARCHAR,                                           -- name of the address's city
    postalCode VARCHAR,                                     -- postal code of the address
    street VARCHAR                                          -- street of the address
);

CREATE TABLE Restaurant (
    id_Restaurant INTEGER PRIMARY KEY,                          -- id for each id_Restaurant
    name VARCHAR,                                               -- restaurant's name
    id_category INTEGER REFERENCES Category(id_Category),       -- restaurants's category
    id_Address INTEGER REFERENCES Address(id_Address),          -- id of
    id_Owner INTEGER REFERENCES ROwner(id_Owner),               -- owner's id of restaurant
    id_Image INTEGER REFERENCES Image(id_Image)                 -- image id of restaurant
);

CREATE TABLE Category (
    id_Category INTEGER PRIMARY KEY,                            -- id for each category
    type VARCHAR,                                                -- type of category
    id_Image INTEGER REFERENCES Image(id_Image)
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
  price FLOAT,                                                  -- dish's price
  description VARCHAR,                                          -- dish's description
  photo VARCHAR,                                                -- dish's photo
  id_Restaurant INTEGER REFERENCES Restaurant,                   -- restaurant's id to identify where dish is from
  id_Image INTEGER REFERENCES Image(id_Image)  
);

CREATE TABLE OOrder (
    id_Order INTEGER PRIMARY KEY,                                   -- id for each order given by the website
    price INTEGER,                                                  -- order's price
    descritpion VARCHAR,                                            -- order's description with everything ordered and quantities
    id_Restaurant INTEGER REFERENCES Restaurant(id_Restaurant)      -- id's user for orders's history
);

--------------------------------------------------------------------------------------------------------------------------------------------------

--Restaurants
INSERT INTO Restaurant(1,'McDonals Imperial',1,1,1);
INSERT INTO Restaurant(2,'KFC',1,2,2);
INSERT INTO Restaurant(3,'daTerra',3,3,3);
INSERT INTO Restaurant(4,'Extremepita',3,4,4);
INSERT INTO Restaurant(5,'Dunkin Donuts',2,5,5);
INSERT INTO Restaurant(6,'Burguer King S.Mamede',1,6,6);
INSERT INTO Restaurant(7,'Burguer King Colombo',1,7,6);

-- Users (Restaurant Owners)
INSERT INTO Users(1,'Joana Valente','#Test1','Joana','Valente',918929898,20);     -- Owner of Macdonalds Circunvalação
INSERT INTO Users(2,'Diogo Almeida','#Test2','Diogo','Almeida',918929892,21);     -- Owner of Adega Soares
INSERT INTO Users(3,'Jorge Duarte','#Test3','Jorge','Duarte',918929843,22);       -- Owner of Soul Food
INSERT INTO Users(4,'Carlos Sousa','#Test4','Carlos','Sousa',918929223,23);       -- Owner of 100culpa
INSERT INTO Users(5,'João Sousa','#Test5','João','Sousa',918929123,24);           -- Owner of Rocinha
INSERT INTO Users(6,'João Almeida','#Test6','João','Almeida',918929124,25);       -- Owner of Burguer King S.Mamede
INSERT INTO Users(7,'Manuel Andrade','#Test7','Manuel','Andrade',918719124,26);   -- Owner of Burguer King S.Mamede

-- Different types of categories
INSERT INTO Category VALUES(1,'Fast-Food');
INSERT INTO Category VALUES(2,'Gourmet');
INSERT INTO Category VALUES(3,'Healthy');
INSERT INTO Category VALUES(4,'Desert');

-- Restaurant's address
INSERT INTO Address VALUES(1,'Porto','4000-322','Praça da Liberdade, 126');               -- Mcdonals Aliados
INSERT INTO Address VALUES(2,'Vale de Cambra','3730-249','Av. de Santo António 289');     -- Adega Soares
INSERT INTO Address VALUES(3,'Porto','4200-068','Rua de Antero de Quental 677');          -- Soul Food
INSERT INTO Address VALUES(4,'Porto','4000-042','Rua da Alegria 145');                    -- 100culpa
INSERT INTO Address VALUES(5,'Porto','4050-553','Rua de São João 5');                     -- Rocinha
INSERT INTO Address VALUES(6,'Porto','4465-366','Estrada Nacional 14');                   -- Burguer King São Mamede
INSERT INTO Address VALUES(7,'Lisboa','1500-392','Avenida Lusíada C Colombo');            -- Burguer King Colombo

-- User's (Owners) address
INSERT INTO Address VALUES(20,'Porto','4100-127','Av. da Boavista 621');                  -- Joana Valente
INSERT INTO Address VALUES(21,'Vale de Cambra','3730-360','Rua de São João');             -- Diogo Almeida
INSERT INTO Address VALUES(22,'Porto','4200-050','Rua de Álvaro Castelões');              -- Jorge Duarte
INSERT INTO Address VALUES(23,'Arouca','4540-176','Rua de Vila Nova');                    -- Carlos Sousa
INSERT INTO Address VALUES(24,'Porto','4200-315','Rua Grupo 10 de Maio');                 -- João Sousa
INSERT INTO Address VALUES(25,'Porto','4910-357','Rua de Rio Tinto');                     -- João Almeida
INSERT INTO Address VALUES(26,'Lisboa','1300-472 ','Rua 1º de Maio');                     -- Manuel Andrade

-- Restaurant Owners
INSERT INTO ROwner VALUES(1,'McDonalds Aliados');
INSERT INTO ROwner VALUES(2,'KFC');
INSERT INTO ROwner VALUES(3,'daTerra');
INSERT INTO ROwner VALUES(4,'Extremepita');
INSERT INTO ROwner VALUES(5,'Dunkin Donuts');
INSERT INTO ROwner VALUES(6,'Burguer King S.Mamede');
INSERT INTO ROwner VALUES(7,'Burguer King Colombo');

-- Images 

INSERT INTO Images VALUES(1,"");

--  Mcdonals Aliados dishes
INSERT INTO Dish VALUES(1,'Cheeseburguer',5.90,'simple hamburguer with cheese, pickles and ketchup',1);   --falta a foto
