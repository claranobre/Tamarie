<?php 

	function reverter_data($dados){
        $str_tratamento = explode('/', $dados);
        $str_tratada = $str_tratamento[2].'-'.$str_tratamento[1].'-'.$str_tratamento[0];
        return $str_tratada;
    }

    function converter_data($dados){
		$dados_explode = explode('-', $dados);
		$dados_tratado = $dados_explode[2].'/'.$dados_explode[1].'/'.$dados_explode[0];
		return $dados_tratado;
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
	$nome = explode(';', $_POST[$campo]);
	foreach ($nome as $valor) {
		$valor = trim($valor);
		}
	return $nome;
	}


?>
