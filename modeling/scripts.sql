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