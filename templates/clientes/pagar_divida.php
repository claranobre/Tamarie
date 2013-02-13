<?php  
	$pagar_divida = array();
	$pagar_divida['divida'] =  0;
	$pagar_divida['status'] = 'quite';
	update($pagar_divida, 'id', $_GET['id'], 'clientes');
    ob_clean();
	header('LOCATION: /'.BASE.'/index.php/clientes/listar/');
?>