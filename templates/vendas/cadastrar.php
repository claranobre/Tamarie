<br /><br />
<h2>Cadastrar Venda</h2>

<?php 

	include_once(TEMPLATES.'/vendas/includes/vendas_verificar_estoque.php');
	if (count($_POST) == 0){
		include_once(TEMPLATES.'/vendas/includes/cadastrar_inicio.php');
	}
	if (count($_POST) > 0){
		$produtos_invalidos = verificar_estoque($_POST);
		if (count($produtos_invalidos) > 0) {
			$estoque_insuficiente = 1;
		}
		if (isset($estoque_insuficiente)){
			include_once(TEMPLATES.'/vendas/includes/cadastrar_estoque_insuficiente.php');
		}
		else{
			include_once(TEMPLATES.'/vendas/includes/cadastrar_estoque_ok.php');
 		}
 	} 

?>