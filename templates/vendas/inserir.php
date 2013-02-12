<?php 
	$produtos_destratados = $_POST['produtos'];
	$tratamento_produto = array();
	$produtos = array(array());
	foreach ($produtos_destratados as $key => $value) {
		$tratamento_produto[] = explode(';', $value);
	}
	foreach ($tratamento_produto as $chave => $valor) {
		foreach ($valor as $key => $value) {
			$tratamento_value = explode('=>', $value);
			$produtos[$chave][$tratamento_value[0]] = $tratamento_value[1];
		}
	}
	var_dump($produtos);
?>
