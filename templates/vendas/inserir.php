<?php 
	if (count($_POST) > 0){
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
		foreach ($produtos as $key => $value) {
			settype($produtos[$key]['quantidade'], 'int');
			settype($produtos[$key]['preco_unidade'], 'float');
			settype($produtos[$key]['preco_total'], 'float');
			if ($produtos[$key]['desconto'] == '') {
				$produtos[$key]['desconto'] = '0%';
			}
			else {
				$desconto = explode('%', $produtos[$key]['desconto']);
				$produtos[$key]['desconto'] = $desconto[0].'%';
			}
		}
		foreach ($produtos as $key => $value) {
			insert($value, 'vendas');
			$quantidade = select('quantidade_produto', 'estoque', 'referencia', $produtos[$key]['referencia']);
			$quantidade = $quantidade['quantidade_produto'];
			settype($quantidade, 'int');
			$restante = array();
			$restante['quantidade_produto'] = ($quantidade-$produtos[$key]['quantidade']);
			update($restante, 'referencia', $produtos[$key]['referencia'], 'estoque');
		}
}
	ob_clean();
	header('LOCATION: /'.BASE.'/index.php/vendas/listar/');
?>
