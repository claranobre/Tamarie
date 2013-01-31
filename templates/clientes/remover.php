<?php 
	delete($_GET['id'],'clientes');	
	ob_clean();
	header('LOCATION: /'.BASE.'/index.php/clientes/listar/');
?>