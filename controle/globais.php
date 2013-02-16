<?php
	// Configurações do Projeto
	define('ARQUIVOS', $_SERVER['DOCUMENT_ROOT']);
	//ARQUIVOS = C:\xampp\htdocs
	define('BASE', 'tamarie');
	define('TEMPLATES', ARQUIVOS.'/'.BASE.'/templates/');

	// Configurações do Banco de Dados
	define('DB_NAME', 'tamarie');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	// define('DB_HOST', 'localhost'); //Windows
	define('DB_HOST', 'localhost:/tmp/mysql.sock'); //Unix/OSX
	ob_start(); //Criando Buffer
	date_default_timezone_set('America/Recife');
	include_once('banco.php');
	include_once('functions.php');
?>