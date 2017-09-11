CREATE DATABASE desafio-programacao-1;  

CREATE TABLE purchaser(
	id_purchase	SERIAL PRIMARY KEY,
	name_purchase	varchar(40) NOT NULL
);

CREATE TABLE itens(
	id_item		SERIAL PRIMARY KEY,
	description	varchar(60) NOT NULL,
	price		float NOT NULL,
	count_item	integer NOT NULL
);

CREATE TABLE merchants(
	id_merchant	SERIAL PRIMARY KEY,
	name_merchant	varchar(40) NOT NULL,
	address		varchar(60) NOT NULL
);

CREATE TABLE cart(
	id_cart		SERIAL PRIMARY KEY,
	id_purchase	int references purchaser (id_purchase),
	id_merchant	int references merchants (id_merchant),
	id_item		int references itens (id_item)
);