DROP DATABASE tamarie;
CREATE DATABASE tamarie;
USE matapragas;
CREATE TABLE clientes ( 
	id int NOT NULL auto_increment,
	nome varchar(255) NOT NULL,
	telefone varchar(255) NOT NULL,
	cnpj char(18) NOT NULL,
	endereco varchar(255) NOT NULL,
	divida varchar(255) NULL,
	data_pagamento date NULL,
	status_pagamento varchar(255) NULL,
	PRIMARY KEY (id),
	UNIQUE (nome),
	UNIQUE (cnpj)
);
CREATE TABLE estoque (
	id int NOT NULL auto_increment,
	produto varchar(255) NOT NULL,
	preco_produto char(10) NOT NULL,
	quantidade_produto varchar(255) NOT NULL,
	descricao_produto varchar(255) NULL,
	PRIMARY KEY (id)
);

INSERT INTO clientes (nome, telefone, cnpj, endereco) values ('ItCursos', '3208-6666', '12.123.123/1234-12', 'Rua Miguel Castro'); 
