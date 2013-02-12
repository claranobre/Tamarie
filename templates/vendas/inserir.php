<?php 
	$produtos = $_POST['produtos'];
	$tratamento_produto = array();
	foreach ($produtos as $key => $value) {
		$tratamento_produto[] = explode(';', $value);
	}
	var_dump($tratamento_produto);
	echo '<br /><br />';
	foreach ($tratamento_produto as $key => $value) {
		var_dump($value);
		echo '<br /><br />';
	}
?>
