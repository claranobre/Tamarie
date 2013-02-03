DROP DATABASE tamarie;
CREATE DATABASE tamarie;
USE tamarie;
CREATE TABLE clientes ( 
	id int NOT NULL auto_increment,
	nome varchar(255) NOT NULL,
	telefone varchar(255) NOT NULL,
	cnpj_cpf varchar(255) NULL,
	endereco varchar(255) NOT NULL,
	divida int NULL,
	data_pagamento date NULL,
	status varchar(255) NULL,
	PRIMARY KEY (id),
	UNIQUE (nome),
	UNIQUE (cnpj_cpf)
);
CREATE TABLE estoque (
	id int NOT NULL auto_increment,
	nome_produto varchar(255) NOT NULL,
	preco_produto float NOT NULL,
	quantidade_produto int NOT NULL,
	referencia varchar(255) NOT NULL,
	UNIQUE (nome_produto),
	PRIMARY KEY (id)
);

INSERT INTO clientes (nome, telefone, endereco, status) values ('Valdet', '3208-6666',  'Rua Miguel Castro', 'quite'),('Karol Reinaldo', '3208-5798', 'Rua Miguel Castro', 'em divida'); 

INSERT INTO estoque (nome_produto, preco_produto, quantidade_produto, referencia) values ('Saia curta', 27.45, 15, '123.5423-24'),('Saia longa rodada', 55, 3,'123.5123-21'); 
