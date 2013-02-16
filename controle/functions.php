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
		$nome = rtrim($_POST[$campo], ';');
		$nome = explode(';', $nome);
		foreach ($nome as $chave => $valor) {
			$valor = trim($valor);
		}
	return $nome;
	}


?>
<script type="text/javascript">

	function del_produto(link){
		td = link.parentNode;
		tr = td.parentNode;
		tr.remove();
	}

	function add_produto(){
		var tb = document.getElementById('tabela');
		var tr = document.createElement("tr");
    	tr.innerHTML = "</td><td><input type='text' name='referencia[]' required /></td><td><input type='text' name='quantidade[]' required /></td><td><input type='text' name='desconto[]' placeholder='Ex.: 25%' /></td><td><a href='#' onClick='del_produto(this)'>remover</a></td>";
    	tb.appendChild(tr);
	}

	function cancelar_venda(){
		var check = confirm('Deseja cancelar a venda?')
		if (check){
			window.location = '/tamarie/index.php/estoque/listar/';
		}
	}

	function mask(str,textbox,tipo){
		if (tipo == 'cpf'){
			var loc = '3,7,11';
			var delim = '.,.,-';

			var locs = loc.split(',');
			var delims = delim.split(',');

			for (var i = 0; i <= locs.length; i++){
				for (var k = 0; k <= str.length; k++){
				 	if (k == locs[i]){
				  		if (str.substring(k, k+1) != delims[i]){
				    		str = str.substring(0,k) + delims[i] + str.substring(k,str.length);
				 	 	}
				 	}
				}
			}
			textbox.value = str;
		}

		if (tipo == 'telefone'){
			var loc = '0,3,4,9';
			var delim = '(,), ,-';

			var locs = loc.split(',');
			var delims = delim.split(',');

			for (var i = 0; i <= locs.length; i++){
				for (var k = 0; k <= str.length; k++){
				 	if (k == locs[i]){
				  		if (str.substring(k, k+1) != delims[i]){
				    		str = str.substring(0,k) + delims[i] + str.substring(k,str.length);
				 	 	}
				 	}
				}
			}
			textbox.value = str
		}	
	}

</script>