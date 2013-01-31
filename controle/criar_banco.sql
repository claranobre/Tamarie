DROP DATABASE tamarie;
CREATE DATABASE tamarie;
USE tamarie;
CREATE TABLE clientes ( 
	id int NOT NULL auto_increment,
	nome varchar(255) NOT NULL,
	telefone varchar(255) NOT NULL,
	cnpj char(18) NULL,
	endereco varchar(255) NOT NULL,
	divida int NULL,
	data_pagamento date NULL,
	status_pagamento varchar(255) NULL,
	PRIMARY KEY (id),
	UNIQUE (nome),
	UNIQUE (cnpj)
);
CREATE TABLE estoque (
	id int NOT NULL auto_increment,
	produto varchar(255) NOT NULL,
	preco_produto int NOT NULL,
	quantidade_produto int NOT NULL,
	descricao_produto varchar(255) NULL,
	PRIMARY KEY (id)
);

INSERT INTO clientes (nome, telefone, cnpj, endereco) values ('Valdet', '3208-6666', '12.123.123/1234-12', 'Rua Miguel Castro'),('Karol Reinaldo', '3208-5798', '13.123.123/1234-12', 'Rua Miguel Castro'); 

INSERT INTO estoque (produto, preco_produto, quantidade_produto) values ('Saia curta', 35, 15),('Saia longa rodada', 55, 3); 
