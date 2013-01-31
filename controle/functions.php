<?php 

	function converter_data($dados){
        $str_tratamento = explode('/', $dados);
        $str_tratada = $str_tratamento[2].'-'.$str_tratamento[1].'-'.$str_tratamento[0];
        return $str_tratada;
    }

    function reverter_data($dados){
		$dados_explode = explode('-', $dados);
		$dados_tratado = $dados_explode[2].'/'.$dados_explode[1].'/'.$dados_explode[0];
		return $dados_tratado;
	}

?>
