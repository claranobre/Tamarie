<?php 
	delete($_GET['id'],'estoque');	
	ob_clean();
	header('LOCATION: /'.BASE.'/index.php/estoque/listar/');
?>