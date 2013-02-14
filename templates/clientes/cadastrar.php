<br /><br />
<h2>Cadastrar Cliente</h2>
<table class='form'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
		<tr>
			<td>Nome do cliente:</td>
			<td><input type='text' name='nome' required/></td>
		</tr>
		<tr>
			<td>Telefone do cliente:</td>
			<td><input type='text' name='telefone' maxlength='14' onKeyUp="javascript:return mask(this.value,this,'telefone');" required/></td>
		</tr>
		<tr>
			<td>cpf do cliente:</td>
			<td><input type='text' name='cpf' maxlength='14' onKeyUp="javascript:return mask(this.value,this,'cpf');" /></td>
		</tr>
		<tr>
			<td>Endereco do cliente:</td>
			<td><input type='text' name='endereco' required/></td>
		</tr>
		<tr>
			<td>Dívida do cliente (em R$):
			</td>
			<td><input type='text' name='divida' /></td>
		</tr>
		<tr>
			<td>Data de pagamento:</td>
			<td><input type='date' name='data_pagamento' /></td>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button></td>
		</tr>
	</form>
</table>

<?php 
	if (count($_POST) > 0){
		$_POST['divida'] = converter_float($_POST['divida']);
		if ($_POST['divida'] == 0){
			$_POST['status'] = 'quite';
		}
		else {
			$_POST['status'] = 'em divida';
		}
		insert($_POST, 'clientes');
		ob_clean();
		header('LOCATION: /'.BASE.'/index.php/clientes/listar/');
	}
?>