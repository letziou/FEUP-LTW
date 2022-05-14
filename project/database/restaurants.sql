PRAGMA foreign_keys = ON;
.header on
.mode column


DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS OOrder;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS ROwner;
DROP TABLE IF EXISTS User;


DROP TABLE IF EXISTS Category;
DROP TABLE IF EXISTS Address;
DROP TABLE IF EXISTS Image;

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
    type TEXT,                                              -- type (JPG,PNG,...)
    image BLOB                                               -- link
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
  id_Restaurant INTEGER REFERENCES Restaurant,                  -- restaurant's id to identify where dish is from
  id_Image INTEGER REFERENCES Image(id_Image)  
);

CREATE TABLE OOrder (
    id_Order INTEGER PRIMARY KEY,                                   -- id for each order given by the website
    price INTEGER,                                                  -- order's price
    description VARCHAR,                                            -- order's description with everything ordered and quantities
    id_Restaurant INTEGER REFERENCES Restaurant(id_Restaurant)      -- id's user for orders's history
);

--------------------------------------------------------------------------------------------------------------------------------------------------

-- Images Categories
INSERT INTO Image VALUES('1000','PNG','categories/fast.png');
INSERT INTO Image VALUES('1001','PNG','categories/casual.png');
INSERT INTO Image VALUES('1002','PNG','categories/gourmet.png');
INSERT INTO Image VALUES('1003','PNG','categories/healthy.png');

-- Images Restaurants
INSERT INTO Image Values('2000','PNG','restaurants/placeholder.png');

-- Images MacDonalds
INSERT INTO Image VALUES('1','PNG','Mac/bigmac.png');
INSERT INTO Image VALUES('2','PNG','Mac/cbo.png');
INSERT INTO Image VALUES('3','PNG','Mac/double_bigtasty.png');
INSERT INTO Image VALUES('4','PNG','Mac/doublecheeseburger.png');
INSERT INTO Image VALUES('5','PNG','Mac/mcchicken.png');
INSERT INTO Image VALUES('6','PNG','Mac/mcdkansas_chicken.png');
INSERT INTO Image VALUES('7','PNG','Mac/mcdkansas.png');
INSERT INTO Image VALUES('8','PNG','Mac/mcroyalbacon.png');
INSERT INTO Image VALUES('9','PNG','Mac/mcroyalcheese.png');
INSERT INTO Image VALUES('10','PNG','Mac/mcroyaldeluxe.png');
INSERT INTO Image VALUES('11','PNG','Mac/mcveggi.png');
INSERT INTO Image VALUES('12','PNG','Mac/normal_bigtasty.png');
INSERT INTO Image VALUES('13','PNG','Mac/rusticchicken_mostardaemel.png');
INSERT INTO Image VALUES('14','PNG','Mac/rusticchicken.png');
INSERT INTO Image VALUES('15','PNG','Mac/filletofish.png');
INSERT INTO Image VALUES('16','PNG','Mac/batatasfritas.png');
INSERT INTO Image VALUES('17','PNG','Mac/chickennuggets.png');
INSERT INTO Image VALUES('18','PNG','Mac/sopa_legumes.png');
INSERT INTO Image VALUES('19','PNG','Mac/sopagraoespinafres.png');
INSERT INTO Image VALUES('20','PNG','Mac/mcflurry_kitkat.png');
INSERT INTO Image VALUES('21','PNG','Mac/mcflurry_m&ms.png');
INSERT INTO Image VALUES('22','PNG','Mac/mcflurry_oreo.png');
INSERT INTO Image VALUES('23','PNG','Mac/mcflurry_snickers.png');
INSERT INTO Image VALUES('24','PNG','Mac/sundae_natura.png');
INSERT INTO Image VALUES('25','PNG','Mac/sundae-caramelo.png');
INSERT INTO Image VALUES('26','PNG','Mac/sundae-chocolate.png');
INSERT INTO Image VALUES('27','PNG','Mac/sundae-morango.png');
INSERT INTO Image VALUES('28','PNG','Mac/sundaebabacamelo.png');

-- Images KFC
INSERT INTO Image VALUES('29','JPEG','KFC/Individual/BBCOriginal.jpeg');
INSERT INTO Image VALUES('30','JPEG','KFC/Individual/BoxMasterZinger.jpeg');
INSERT INTO Image VALUES('31','JPEG','KFC/Individual/DoubleKrunchBacon.jpeg');
INSERT INTO Image VALUES('32','JPEG','KFC/Individual/DoubleKrunchCheese.jpeg');
INSERT INTO Image VALUES('33','JPEG','KFC/Individual/Original.jpeg');
INSERT INTO Image VALUES('34','JPEG','KFC/Individual/OriginalZinger.jpeg');
INSERT INTO Image VALUES('35','JPEG','KFC/Individual/TowerOriginal.jpeg');
INSERT INTO Image VALUES('36','JPEG','KFC/Individual/TowerZinger.jpeg');
INSERT INTO Image VALUES('37','JPEG','KFC/Individual/Twister.jpeg');
INSERT INTO Image VALUES('38','JPEG','KFC/Individual/Twister.jpeg');
INSERT INTO Image VALUES('39','JPEG','KFC/Individual/MenuBaconBoxMaster.jpeg');
INSERT INTO Image VALUES('40','JPEG','KFC/Individual/MenuBBC.jpeg');
INSERT INTO Image VALUES('41','JPEG','KFC/Individual/MenuCrispy.jpeg');
INSERT INTO Image VALUES('42','JPEG','KFC/Individual/MenuDoisPedacos.jpeg');
INSERT INTO Image VALUES('43','JPEG','KFC/Individual/MenuHotWings.jpeg');
INSERT INTO Image VALUES('44','JPEG','KFC/Individual/MenuQuatroPedacos.jpeg');
INSERT INTO Image VALUES('45','JPEG','KFC/Individual/MenuSuper.jpeg');
INSERT INTO Image VALUES('46','JPEG','KFC/Individual/MenuSuperChick.jpeg');
INSERT INTO Image VALUES('47','JPEG','KFC/Individual/MenuTower.jpeg');
INSERT INTO Image VALUES('48','JPEG','KFC/Individual/MenuTowerS.jpeg');
INSERT INTO Image VALUES('49','JPEG','KFC/Individual/MenuTresPedacos.jpeg');
INSERT INTO Image VALUES('50','JPEG','KFC/Individual/MenuTudo.jpeg');
INSERT INTO Image VALUES('51','JPEG','KFC/Individual/WingsCombo.jpeg');
INSERT INTO Image VALUES('52','JPEG','KFC/Individual/DUOKING.jpeg');
INSERT INTO Image VALUES('53','JPEG','KFC/Individual/DUOPROMO.jpeg');
INSERT INTO Image VALUES('54','JPEG','KFC/Individual/muitoporpouco.jpeg');
INSERT INTO Image VALUES('55','JPEG','KFC/Individual/Chips.jpeg');
INSERT INTO Image VALUES('56','JPEG','KFC/Individual/Corn.jpeg');
INSERT INTO Image VALUES('57','JPEG','KFC/Individual/CrispStrips.jpeg');
INSERT INTO Image VALUES('58','JPEG','KFC/Individual/FrenchFries.jpeg');
INSERT INTO Image VALUES('59','JPEG','KFC/Individual/KentuckyFries.jpeg');
INSERT INTO Image VALUES('60','JPEG','KFC/Individual/KentuckyFriesBBC.jpeg');
INSERT INTO Image VALUES('61','JPEG','KFC/Individual/OnionRings.jpeg');
INSERT INTO Image VALUES('62','JPEG','KFC/Individual/OnionRings.jpeg');



-- Restaurants' address
INSERT INTO Address VALUES('1','Porto','4000-322','Praça da Liberdade, 126');               -- Mcdonals Aliados
INSERT INTO Address VALUES('2','Vale de Cambra','3730-249','Av. de Santo António 289');     -- Adega Soares
INSERT INTO Address VALUES('3','Porto','4200-068','Rua de Antero de Quental 677');          -- Soul Food
INSERT INTO Address VALUES('4','Porto','4000-042','Rua da Alegria 145');                    -- 100culpa
INSERT INTO Address VALUES('5','Porto','4050-553','Rua de São João 5');                     -- Rocinha
INSERT INTO Address VALUES('6','Porto','4465-366','Estrada Nacional 14');                   -- Burguer King São Mamede
INSERT INTO Address VALUES('7','Lisboa','1500-392','Avenida Lusíada C Colombo');            -- Burguer King Colombo


-- Users (Owners) address
INSERT INTO Address VALUES('20','Porto','4100-127','Av. da Boavista 621');                  -- Joana Valente
INSERT INTO Address VALUES('21','Vale de Cambra','3730-360','Rua de São João');             -- Diogo Almeida
INSERT INTO Address VALUES('22','Porto','4200-050','Rua de Álvaro Castelões');              -- Jorge Duarte
INSERT INTO Address VALUES('23','Arouca','4540-176','Rua de Vila Nova');                    -- Carlos Sousa
INSERT INTO Address VALUES('24','Porto','4200-315','Rua Grupo 10 de Maio');                 -- João Sousa
INSERT INTO Address VALUES('25','Porto','4910-357','Rua de Rio Tinto');                     -- João Almeida
INSERT INTO Address VALUES('26','Lisboa','1300-472 ','Rua 1º de Maio');                     -- Manuel Andrade

-- Normal Users Address
INSERT INTO Address VALUES('70','Lisboa','1000-001','Rua dos Açores');
INSERT INTO Address VALUES('71','Lisboa','1000-100','Rua Cidade da Horta');
INSERT INTO Address VALUES('72','Lisboa','1000-234','Rua Pascoal de Melo');
INSERT INTO Address VALUES('73','Lisboa','1000-028','Calçada de Arroios');
INSERT INTO Address VALUES('74','Lisboa','1000-111','Avenida dos Defensores de Chaves');
INSERT INTO Address VALUES('75','Lisboa','1000-122','Rua Desidério Bessa');
INSERT INTO Address VALUES('76','Lisboa','1000-008','Rua Actor Taborda');
INSERT INTO Address VALUES('77','Lisboa','1300-003','Rua das Açucenas');
INSERT INTO Address VALUES('78','Lisboa','1300-006','Calçada da Ajuda');
INSERT INTO Address VALUES('79','Lisboa','1300-036','Rua Alexandre de Sá Pinto');
INSERT INTO Address VALUES('80','Lisboa','1300-048','Rua Alexandre Vieira');
INSERT INTO Address VALUES('81','Lisboa','1300-040','Rua Alfredo da Silva');
INSERT INTO Address VALUES('82','Lisboa','1300-046','Rua da Aliança Operária');
INSERT INTO Address VALUES('83','Lisboa','1300-054','Rua do Alvito');
INSERT INTO Address VALUES('84','Lisboa','1300-067','Rua Amoreira á Ajuda');
INSERT INTO Address VALUES('85','Lisboa','1300-070','Rua Armando Lucena');
INSERT INTO Address VALUES('86','Lisboa','1300-080','Rua Augusto Gome Ferreira');
INSERT INTO Address VALUES('87','Lisboa','1300-087','Rua Bica do Marques');
INSERT INTO Address VALUES('88','Lisboa','1300-092','Calçada da Boa-Hora');
INSERT INTO Address VALUES('89','Lisboa','1300-108','Rua do Brotero');
INSERT INTO Address VALUES('90','Lisboa','1300-110','Rua Cabo Manuel Leitão');


-- Normal Users

INSERT INTO User VALUES('50','Manuel Ferreira','#Test50','Manuel','Ferreira','911129898','70');
INSERT INTO User VALUES('51','Manuel Pinho','#Test51','Manuel','Pinho','911229898','71');
INSERT INTO User VALUES('52','Ricardo Ferreira','#Test52','Ricardo','Ferreira','921129898','72');
INSERT INTO User VALUES('53','José Teles','#Test53','José','Teles','931129898','73');
INSERT INTO User VALUES('54','Gustavo Alves','#Test54','Gustavo','Alves','913229898','74');
INSERT INTO User VALUES('55','Mateus Alves','#Test55','Mateus','Alves','913339898','75');
INSERT INTO User VALUES('56','Alexandre Bessa','#Test56','Alexandre','Bessa','914429898','76');
INSERT INTO User VALUES('57','Luis Henrique','#Test57','Luis','Henrique','915529898','77');
INSERT INTO User VALUES('58','Laéticia Almeida','#Test58','Laéticia','Almeida','911129448','78');
INSERT INTO User VALUES('59','Maria Pinho','#Test59','Maria','Pinho','917729898','79');
INSERT INTO User VALUES('60','Marcia Almeida','#Test60','Marcia','Almeida','971129898','80');
INSERT INTO User VALUES('61','Catarina Silva','#Test61','Catarina','Silva','911128828','81');
INSERT INTO User VALUES('62','Pedro Ferreira','#Test62','Pedro','Ferreira','911129863','82');
INSERT INTO User VALUES('63','João Esteves','#Test63','João','Esteves','984129898','83');
INSERT INTO User VALUES('64','Miralis Pin','#Test64','Miralis','Pin','911519898','84');
INSERT INTO User VALUES('65','John Lopes','#Test65','John','Lopes','911555598','85');
INSERT INTO User VALUES('66','Micael Carreira','#Test66','Micael','Carreira','916669898','86');
INSERT INTO User VALUES('67','Vladimir Rip','#Test67','Vladimir','Rip','911100098','87');
INSERT INTO User VALUES('68','Jenifer Lopes','#Test68','Jenifer','Lopes','910000008','88');
INSERT INTO User VALUES('69','Brad Pit','#Test69','Brad','Pit','910983898','89');
INSERT INTO User VALUES('70','Mila Reguila','#Test70','Mila','Reguila','915555558','90');


-- Users (Restaurant Owners)
INSERT INTO User VALUES('1','Joana Valente','#Test1','Joana','Valente','918929898','20');     -- Owner of Macdonalds Circunvalação
INSERT INTO User VALUES('2','Diogo Almeida','#Test2','Diogo','Almeida','918929892','21');     -- Owner of Adega Soares
INSERT INTO User VALUES('3','Jorge Duarte','#Test3','Jorge','Duarte','918929843','22');       -- Owner of Soul Food
INSERT INTO User VALUES('4','Carlos Sousa','#Test4','Carlos','Sousa','918929223','23');       -- Owner of 100culpa
INSERT INTO User VALUES('5','João Sousa','#Test5','João','Sousa','918929123','24');           -- Owner of Rocinha
INSERT INTO User VALUES('6','João Almeida','#Test6','João','Almeida','918929124','25');       -- Owner of Burguer King S.Mamede
INSERT INTO User VALUES('7','Manuel Andrade','#Test7','Manuel','Andrade','918719124','26');   -- Owner of Burguer King S.Mamede

-- Restaurant Owners
INSERT INTO ROwner VALUES('1','McDonalds Aliados');
INSERT INTO ROwner VALUES('2','KFC');
INSERT INTO ROwner VALUES('3','daTerra');
INSERT INTO ROwner VALUES('4','Extremepita');
INSERT INTO ROwner VALUES('5','Dunkin Donuts');
INSERT INTO ROwner VALUES('6','Burguer King S.Mamede');
INSERT INTO ROwner VALUES('7','Burguer King Colombo');

-- Different types of categories
INSERT INTO Category VALUES('1','Fast-Food','1000');
INSERT INTO Category VALUES('2','Casual Dining','1001');
INSERT INTO Category VALUES('3','Healthy','1002');
INSERT INTO Category VALUES('4','Desert','1003');

--Restaurants
INSERT INTO Restaurant VALUES('1','McDonals Imperial','1','1','1','2000');
INSERT INTO Restaurant VALUES('2','KFC','1','2','2','2000');
INSERT INTO Restaurant VALUES('3','daTerra','3','3','3','2000');
INSERT INTO Restaurant VALUES('4','Extremepita','3','4','4','2000');
INSERT INTO Restaurant VALUES('5','Dunkin Donuts','4','5','5','2000');
INSERT INTO Restaurant VALUES('6','Burguer King S.Mamede','1','6','6','2000');
INSERT INTO Restaurant VALUES('7','Burguer King Colombo','1','7','6','2000');


--  Mcdonals Aliados dishes

INSERT INTO Dish VALUES('1','Big Mac','4.70','A sanduíche dupla mais cobiçada no mundo inteiro. 
                        Feita com dois suculentos hambúrgueres 100% carne de vaca, queijo 
                        fundido, pepino, cebola, alface e um molho irresistível.','1','1');   --falta a foto

INSERT INTO Dish VALUES('2','CBO','7.00','Era uma vez um tenro panado de frango que encontrou uma 
                        cebola estaladiça. E um pão macio que conheceu um bacon crocante. No 
                        CBO os melhores ingredientes combinam-se numa dança ora tenra, ora 
                        estaladiça. Ora macia, ora crocante. Deliciosamente juntos para 
                        proporcionar momentos de prazer.','1','2');   

INSERT INTO Dish VALUES('3','Double Big Tasty','6.50','De tamanho generoso, o Big Tasty Double 
                        agora tem um pão especial, com queijo e bacon, e um molho que não 
                        partilha com mais nenhuma sanduíche.','1','3'); 

INSERT INTO Dish VALUES('4','Double Cheese Burguer','6.50','Pão quentinho, hambúrguer de carne 
                        100% bovina, queijo, cebola, picles com ketchup e mostarda.','1','4');

INSERT INTO Dish VALUES('5','McChicken','6.50','Filete de frango com uma camada de alface e 
                        maionese, emoldurado por dois pedaços de pão. Uma sanduíche 
                        multi-sensações que nunca passa de moda.','1','5');

INSERT INTO Dish VALUES('6','Kansas Steakhouse Chicken','6.50','Um bife de frango dourado e crocante, 
                        com um boost de confiança dado pela intensidade e irreverência
                        do molho BBQ. É mesmo típico deste americano.','1','6');

INSERT INTO Dish VALUES('7','Kansas Steakhouse Single','6.50','O Kansas Steakhouse trouxe 
                        intensidade para todos os gostos, vais adorar a combinação da
                        carne de vaca com os sabores tipicamente americanos.','1','7');
                       
INSERT INTO Dish VALUES('8','McRoyal Bacon','5.50','O Kansas Steakhouse trouxe 
                        intensidade para todos os gostos, vais adorar a combinação da
                        carne de vaca com os sabores tipicamente americanos.','1','8');  

INSERT INTO Dish VALUES('9','McRoyal Cheese','5.50','O que mais se pode pedir? Todo o paladar 
                        do McRoyal com uma dupla camada de queijo Cheddar fundido. Ideal 
                        para os amantes de queijo.','1','9');

INSERT INTO Dish VALUES('10','McRoyal Deluxe','5.50','Coroado com sementes de sésamo, 
                        o McRoyal Deluxe tem todos os ingredientes para uma dentada 
                        luxuosa: carne 100% de vaca, rodelas de tomate, queijo Cheddar
                        fundido e maionese aveludada.','1','10');

INSERT INTO Dish VALUES('11','McVeggie','6.25','Um hambúrguer à base de vegetais e quinoa combinado 
                        com tomate, alface e um delicioso molho de alho e coentros. Contém leite e ovo.','1','11');

INSERT INTO Dish VALUES('12','Normal Big Tasty','6.00','Descubra o novo Big Tasty Single e o seu novo 
                        pão com queijo e bacon.','1','12');

INSERT INTO Dish VALUES('13','Rustic Chicken Mostarda e Mel','7.50','Pedaço de frango com uma camada de alface 
                        e mostarda & mel, emoldurado por dois pedaços de pão brioche. Uma sanduíche estaladiça 
                        por fora e suculenta por dentro.','1','13'); 

INSERT INTO Dish VALUES('14','Rustic Chicken Orginal','7.50','Pedaço de frango mais alto com uma camada de alface,
                       tomate e maionese, emoldurado por dois pedaços de pão brioche. Uma sanduíche mais suculenta 
                       e mais crocante.','1','14');

INSERT INTO Dish VALUES('15','Filet-o-Fish','5.00','Delicioso filete de peixe envolto por uma textura crocante, combinado
                        com queijo e uma dose generosa de molho tártaro. Um tesouro do fundo do mar, que é uma forma
                        muito saborosa de comer peixe.','1','15'); 

INSERT INTO Dish VALUES('16','Batatas Fritas','1.50','São uma perdição. Pode tentar resistir-lhes, mas depois alguém
                        traz para a mesa umas batatas fritas longas, loiras, estaladiças é impossível não provar
                        uma. Ou duas. Três, se a outra pessoa não estiver a olhar.','1','16');

INSERT INTO Dish VALUES('17','Chicken Nuggets','1.00','Irresistíveis pedaços de frango panados e dourados. Mudam de cor quando
                        mergulhados no seu molho preferido: barbecue, caril, mostarda, agridoce, maionese, ketchup... depois
                         de começar, o difícil é parar.','1','17');

INSERT INTO Dish VALUES('18','Sopa de Legumes','2.50','Um creme com cenoura, batata, repolho, cebola, espinafre e allho.','1','18');

INSERT INTO Dish VALUES('19','Sopa de Espinafre','2.50','Um creme com cenoura, batata, repolho, cebola, espinafre e allho.','1','19');

INSERT INTO Dish VALUES('20','McFlurry Kit Kat','3.00','Uma deliciosa sopa composta por grão de bico, cebola, cenoura, coentros, 
                        alho e espinafres. ','1','20');      

INSERT INTO Dish VALUES('21','McFlurry M&M''s','3.00','McFlurry M&M''s, com massa gelada sabor baunilha, pedaços deliciosos de 
                        KitKat','1','21');

INSERT INTO Dish VALUES('22','McFlurry Oreo','3.00','McFlurry Oreo, com massa gelada sabor baunilha, pedaços deliciosos de 
                        Oreo','1','22');

INSERT INTO Dish VALUES('23','McFlurry Snickers','3.00','McFlurry Snickers, com massa gelada sabor baunilha, pedaços deliciosos de 
                        Snickers','1','23');

INSERT INTO Dish VALUES('24','Sunday Natural','2.50','Uma montanha de neve doce e cremosa. Ensine a sua colher a fazer esqui antes 
                        que a neve derreta.','1','24');

INSERT INTO Dish VALUES('25','Sunday Caramelo','2.50','Uma montanha de neve doce e cremosa. Ensine a sua colher a fazer esqui e mergulhar
                        no intenso sabor a caramelo, antes que a neve derreta.','1','25');

INSERT INTO Dish VALUES('26','Sunday Chocolate','2.50','Uma montanha de neve doce e cremosa. Ensine a sua colher a fazer esqui e mergulhar
                        no intenso sabor a chocolate, antes que a neve derreta.','1','26');    

INSERT INTO Dish VALUES('27','Sunday Morango','2.50','Uma montanha de neve doce e cremosa. Ensine a sua colher a fazer esqui e mergulhar
                        no intenso sabor a morango, antes que a neve derreta.','1','27');

INSERT INTO Dish VALUES('28','Sunday Baba de Camelo','2.50','Uma montanha de neve doce e cremosa. Ensine a sua colher a fazer esqui e mergulhar
                        no intenso sabor a baba de camelo, antes que a neve derreta.','1','28');  

-- KFC dishes

INSERT INTO Dish VALUES('29','BBC Original','5.50','BBC, a sanduíche composta por 1 Filete de Frango (Receita Original ou Zinger) marinado 
                        e panado, 1 fatia de Queijo, 1 fatia de Bacon, molho BBQ e Maionese.','2','29');

INSERT INTO Dish VALUES('30','BBC Bacon Box Master Zinger','7.20','O Boxmaster BBQ Bacon são 300 gramas de puro prazer, tortilha de trigo
                        torrado com queijo, alface, tomate, torta de batata, filete de frango panado à maneira da KFC, tudo acompanhado
                        com um molho de churrasco e bacon.','2','30');

INSERT INTO Dish VALUES('31','Double Krunch Bacon','4.20','Duas tiras de frango marinado crocante, alface, bacon estaladiço e pão de hambúrguer.','2','31');

INSERT INTO Dish VALUES('32','Double Krunch Cheese','4.20','Sanduíche composta por 2 tiras de Frango marinado e panado, alface, queijo, ketchup e
                        maionese.','2','32');

INSERT INTO Dish VALUES('33','Original','4.45','Sanduíche composta por 1 Filete de Frango marinado e panados, alface, tomate e maionese','2','33');

INSERT INTO Dish VALUES('34','Original Zinger','5.75','Sanduíche composta por 1 Filete de Frango picante marinado e panados, alface, tomate
                        e maionese','2','34');

INSERT INTO Dish VALUES('35','Tower Original','6.50','Uma sanduíche completa que vem com filete de frango marinado e panado de acordo com a receita 
                        exclusiva KFC, alface, queijo, 2 molhos e batata crocante.','2','35'); 

INSERT INTO Dish VALUES('36','Tower Zinger','7.00','Sanduíche composta por 1 Filete de Frango marinado e panados, alface, queijo, batata 
                        crocante, ketchup e Maionese. Filete picante.','2','36');

INSERT INTO Dish VALUES('37','Twister','5.10','Deliciosas suaves tiras de peito de frango autêntico, acompanhado por tomate, alface 
                        e uma deliciosa maionese com molho de pimenta, tudo isto envolvido numa tortilla de trigo integral.','2','37');

INSERT INTO Dish VALUES('38','Menu Double BBCheese','9.95','Menu incluí 1 Sanduíche Double BBCheese, 1 bebida e 1 complemento.','2','38');

INSERT INTO Dish VALUES('39','Menu Bacon Box Master','9.35','Menu incluí 1 Bacon Box Master, 1 bebida e 1 complemento.','2','39');

INSERT INTO Dish VALUES('40','Menu BBC','8.45','Menu incluí 1 BBC, 1 bebida e 1 complemento.','2','40');

INSERT INTO Dish VALUES('41','Menu Tenders','8.95','Menu incluí 5 peitos de frango fritos, 1 bebida e 1 complemento.','2','41');

INSERT INTO Dish VALUES('42','Menu 2 Pedaços','7.30','Menu incluí 2 pedaços de frango, 1 bebida e 1 complemento.','2','42');

INSERT INTO Dish VALUES('43','Menu Cochas Picantes','7.50','Menu incluí 5 cochas de frango picantes, 1 bebida e 1 complemento.','2','43');

INSERT INTO Dish VALUES('44','Menu 4 Pedaços','8.30','Menu incluí 4 peitos de frango fritos, 1 bebida e 1 complemento.','2','44');

INSERT INTO Dish VALUES('45','Menu Super','10.70','A refeição MAIS completa, escolhe a tua Sanduíche ou Pedaços de Frango, 
                        mais 3 Acompanhamentos e 1 Bebida.','2','45');

INSERT INTO Dish VALUES('46','Super Chick&Share 12 Crispy Strips','14.70','12 Tiras de Frango marinados e panados.','2','46');    

INSERT INTO Dish VALUES('47','Menu Tower','8.95','Menu inclui 1 sanduíche Tower, 1 bebida e 1 acompanhamento.','2','47');

INSERT INTO Dish VALUES('48','Menu Twister','7.85','Menu inclui 1 sanduíche Twister, 1 bebida e 1 acompanhamento.','2','48');

INSERT INTO Dish VALUES('49','Menu 3 Pedaços','7.85','Menu inclui 3 pedaços de frango, 1 bebida e 1 acompanhamento.','2','49');

INSERT INTO Dish VALUES('50','Menu Tudo','30.00','Menu incluí 2 sanduíches Twister, 2 sanduíches BBQ Bacon Cheddar, 
                        1 opção Super Chick&Share, 4 acompanhamentos e 4 bebidas.','2','50');

INSERT INTO Dish VALUES('51','Chicken Wings Combo','20.00','15 Hotwings, 2 acompanhamentos e 2 bebidas.','2','51');     

INSERT INTO Dish VALUES('52','Mega Oferta para 3','21.00','Incluí 6 Pedaços, 6 Hotwings, 3x 6 Aros de Cebola e 2 Kentucky Fries.','2','52'); 

INSERT INTO Dish VALUES('53','Mega Oferta para 2','15.00','Incluí 2 sanduíches Double Krunch Bacon, 6 Hotwings, 2 batatas e 2 maçarocas.','2','53');

INSERT INTO Dish VALUES('54','Pedaço de Oferta frango','1.75','Incluí 1 pedaço de frango 1 coxa picante','2','54');

INSERT INTO Dish VALUES('55','Batata rústica','2.00','Como? Ainda não experimentaste as nossas deliciosas batatas rústicas? 
                        Acompanha o teu menu com o mini balde de batatas rústicas e diz-nos se não são espectaculares!','2','55');

INSERT INTO Dish VALUES('56','Maçaroca de milho','0.95','Deliciosa maçaroca cozinhada com um toque de manteiga, ideal 
                        para complementar um menu.','2','56');

INSERT INTO Dish VALUES('57','Tenders','3.00','Autênticas tiras de peito de frango KFC, panadas na hora no restaurante. 
                        Tão crocantes e tenras que quererás sempre repetir.','2','57');

INSERT INTO Dish VALUES('58','Batatas Fritas','2.00','As clássicas, as de uma vida, as que tu tanto gostas … sim, estamos falando
                        de nossas batatas. Acompanha o teu menu com as nossas batatas fritas e diverte-te','2','58');

INSERT INTO Dish VALUES('59','Kentucky Fries BBQ','3.50','Como? Ainda não experimentaste as nossas deliciosas Kentucky Fries? 
                        Pede-as como acompanhamento do teu menu e surpreende-te!','2','59');   

INSERT INTO Dish VALUES('60','Kentucky Fries BBQ Bacon','3.50','O que já era ótimo acaba de ficar PERFEITO. Chegaram as novas Kentucky
                        Fries BBQ, as irresistíveis batatas rústicas com bacon e o delicioso molho BBQ.','2','60');   

INSERT INTO Dish VALUES('61','Argolas de Cebola','3.50','Redondos, dourados, crocantes e deliciosos. Os Aros de Cebola da KFC são
                        irresistíveis! 6 unidades.','2','61');

INSERT INTO Dish VALUES('62','Argolas de Cebola','3.50','Redondos, dourados, crocantes e deliciosos. Os Aros de Cebola da KFC são
                        irresistíveis! 6 unidades.','2','62');


--Orders
INSERT INTO OOrder VALUES('1','14.40','2x BBC Bacon Box Master Zinger','2');

--Reviews
INSERT INTO Review VALUES('1','70','2022-05-03','Excellent service, yummy food!','5');