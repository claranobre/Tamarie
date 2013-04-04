<?php 
	
	function reverter_data($dados){
		$str_tratamento = strtotime($dados);
		$str_tratada = strftime('%Y-%m-%d',$str_tratamento);
        return $str_tratada;
    }

    function converter_data($dados){
    	$str_tratamento = strtotime($dados);
		$str_tratada = strftime('%d-%m-%Y' ,$str_tratamento);
		return $str_tratada;
	}

	function converter_float($dados){
		$dados = str_replace(',', '.', $dados);
		$dados = str_replace('R', '', $dados);
		$dados = str_replace('$', '', $dados);
		$dados = str_replace('r', '', $dados);
		$dados = str_replace('e', '', $dados);
		$dados = str_replace('a', '', $dados);
		$dados = str_replace('i', '', $dados);
		$dados = str_replace('s', '', $dados);
		$dados = str_replace(' ', '', $dados);
		settype($dados, 'float');
		return $dados;
	}

	function reverter_float($dados){
		$dados = str_replace('.', ',', $dados);
		return $dados;
	}

	function trim_post($campo){
		$nome = rtrim($_POST[$campo], ';');
		$nome = explode(';', $nome);
		foreach ($nome as $chave => $valor) {
			$valor = trim($valor);
		}
	return $nome;
	}

?>