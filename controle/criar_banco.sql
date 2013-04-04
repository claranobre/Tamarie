DROP DATABASE tamarie;
CREATE DATABASE tamarie;
USE tamarie;
CREATE TABLE clientes ( 
	id int NOT NULL auto_increment,
	nome varchar(255) NOT NULL,
	telefone varchar(255) NOT NULL,
	cpf varchar(255) NULL,
	endereco varchar(255) NULL,
	divida int NULL,
	data_pagamento date NULL,
	status varchar(255) NULL,
	PRIMARY KEY (id),
	UNIQUE (nome),
	UNIQUE (cpf)
);
CREATE TABLE users (
	id int NOT NULL auto_increment,
	login varchar(255) NOT NULL,
	senha varchar(255) NOT NULL,
	dica varchar(255) NULL,
	PRIMARY KEY (id)
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
CREATE TABLE vendas (
	id int NOT NULL auto_increment,
	data_venda timestamp DEFAULT CURRENT_TIMESTAMP,
	atendente varchar(255) NOT NULL,
	nome_produto varchar(255) NOT NULL,
	referencia varchar(255) NOT NULL,
	quantidade int NOT NULL,
	desconto varchar(255) NOT NULL,
	preco_unidade float NOT NULL,
	preco_total float NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO clientes (nome, telefone, endereco, status) values ('Valdet', '(84) 3208-6666',  'Rua Miguel Castro', 'quite'),('Karol Reinaldo', '(84) 3208-5798', 'Rua Miguel Castro', 'em divida'); 

INSERT INTO estoque (nome_produto, preco_produto, quantidade_produto, referencia) values ('saia curta', 27.45, 15, '1357'),('saia longa rodada', 55, 3, '54321'),('legging longa', 19.50, 27, '2468'); 

INSERT INTO users (login, senha) values ('karol', md5('12345')), ('karla', md5('54321')), ('tania', md5('1357'));
