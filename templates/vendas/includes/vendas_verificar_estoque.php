<?php  

	function verificar_estoque($dados){
		$produtos_invalidos = array();
			foreach ($dados['referencia'] as $key => $value){
				$estoque = select('*', 'estoque', 'referencia',  $value);
				if ($_POST['quantidade'][$key] > $estoque['quantidade_produto']){
					$produtos_invalidos[$value]['nome_produto'] = $estoque['nome_produto'];
					$produtos_invalidos[$value]['referencia'] = $estoque['referencia'];
					$produtos_invalidos[$value]['estoque_solicitado'] = $_POST['quantidade'][$key];
					$produtos_invalidos[$value]['estoque_disponivel'] = $estoque['quantidade_produto'];
				}
			}
		return $produtos_invalidos;
	}

?>