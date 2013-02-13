<br /><br />
<h2>Alterar Dados</h2>

<table class='form'>
	<form action='<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id'];?>' method='post'>
<?php
$cliente = buscar_por_id('clientes',$_GET['id']);
?>
		    <tr>
				<td>Modifique o nome do cliente:</td>
				<td><input type='text' name='nome' value='<?php echo $cliente['nome']?>' required/></td>
			</tr>
			<tr>
				<td>Modifique o telefone do cliente:</td>
				<td><input type='text' name='telefone' value='<?php echo $cliente['telefone']?>' required/></td>
			</tr>
			<tr>
				<td>Modifique o cnpj ou cpf do cliente:</td>
				<td><input type='text' name='cnpj' value='<?php echo $cliente['cnpj_cpf']?>' /></td>
			</tr>
			<tr>
				<td>Modifique o endereco do cliente:</td>
				<td><input type='text' name='endereco' value='<?php echo $cliente['endereco']?>' required/></td>
			</tr>
			<tr>
				<td>Modifique a divida do cliente (em reais):</td>
				<td><input type='text' name='divida' value='<?php echo $cliente['divida']?>' /></td>
			</tr>
			<tr>
				<td>Modifique a data de pagamento do cliente:</td>
				<td><input type='text' name='data_pagamento' value='<?php echo converter_data($cliente['data_pagamento']);?>' /></td>
			</tr>
			<tr>
				<td><button type='submit'>Enviar</button></td>
			</tr>
	</form>
</table>

<?php

	if (count($_POST) > 0){
		$_POST['divida'] = converter_float($_POST['divida']);
		$_POST['data_pagamento'] = reverter_data($_POST['data_pagamento']);
		if ($_POST['divida'] > 0) {
			$_POST['status'] = 'em divida';
		}
		else{
			$_POST['status'] = 'quite';
		}
		update($_POST, 'id', $_GET['id'], 'clientes');
		ob_clean();
		header('LOCATION: /'.BASE.'/index.php/clientes/listar/');
	}

?>