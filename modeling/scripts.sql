create database dine_with_us;


create table users(
	id_user int AUTO_INCREMENT PRIMARY KEY,
    username varchar(255) NOT NULL UNIQUE ,
    pass varchar(255) NOT NULL UNIQUE,
    email varchar(255) NOT NULL UNIQUE,
    isAdmin tinyint default 0
);

create table menu (
	id_menu int AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) UNIQUE,
    starter varchar(255),
    main varchar(255),
    dessert varchar(255)
);

create table reservations(
    id_reservation int AUTO_INCREMENT PRIMARY KEY,
    status ENUM("Accepted","Declined","Pending"),
    reservation_date datetime NOT NULL,
    id_user int,
    id_menu int,
    foreign key (id_user) REFERENCES users(id_user),
    foreign key (id_menu) REFERENCES menu(id_menu)
);

ALTER table menu
add (
    id_user int,
	FOREIGN key (id_user) REFERENCES users(id_user)
);

create table dish(
	id_dish int AUTO_INCREMENT PRIMARY key,
    name varchar(255) NOT NULL UNIQUE,
    description varchar(255) NOT NULL,
    type ENUM("starter","main","dessert")
);

ALTER table users
DROP isAdmin;

CREATE table role(
	id_role int AUTO_INCREMENT PRIMARY KEY,
   	name ENUM("admin","user") NOT NULL
);


alter table users
add ( id_role int , FOREIGN key(id_role) REFERENCES role(id_role));

alter table menu 
DROP starter , DROP main , DROP dessert;


create table menu_dish_relation(
	menu_id int,
    dish_id int ,
    FOREIGN KEY(menu_id) REFERENCES menu(id_menu),
    FOREIGN KEY(dish_id) REFERENCES dish(id_dish)
);



INSERT INTO role(name)
VALUES("admin");

INSERT INTO role(name)
VALUES("user");


insert into users(username,pass,email,id_role)
VALUES("client1","client1","client1@gmail.com",2),
("chef1","chef1","chef1@gmail.com",1);



alter table dish 
add img_URL varchar(255) ;
alter table menu 
add url_img varchar(255) ;
alter table users
add img varchar(255);
alter table menu
add description varchar(255) Not NULL;


INSERT INTO MENU(id_user,name,description,url_img) 
VALUES(1,"menu1","menu1 is a great menu","assets/images/placeholder.jpg"),
(1,"menu2","menu2 is a great menu","assets/images/placeholder.jpg"),
(1,"menu3","menu3 is a great menu","assets/images/placeholder.jpg"),
(32,"menu4","menu4 is a great menu","assets/images/placeholder.jpg"),
(32,"menu5","menu5 is a great menu","assets/images/placeholder.jpg"),
(32,"menu6","menu6 is a great menu","assets/images/placeholder.jpg");

INSERT INTO dish(name,description,type,img_URL) 
VALUES("dish1","dish1 is really great","starter","assets/images/placeholder.jpg"),
("dish2","dish2 is really great","starter","assets/images/placeholder.jpg"),
("dish3","dish3 is really great","main","assets/images/placeholder.jpg"),
("dish4","dish4 is really great","main","assets/images/placeholder.jpg"),
("dish5","dish5 is really great","dessert","assets/images/placeholder.jpg"),
("dish6","dish6 is really great","dessert","assets/images/placeholder.jpg");

INSERT into menu_dish_relation
VALUES (2,8),
(2,10),
(2,12);
INSERT into menu_dish_relation
VALUES (3,9),
(3,11),
(3,13);


SELECT d.id_dish,d.name,d.type FROM menu m,dish d,menu_dish_relation r WHERE m.id_menu = r.menu_id and d.id_dish = r.dish_id;