<br /><br />
<h2>Cadastrar Cliente</h2>
<table>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
		<tr>
			<td>Digite o nome do cliente:</td>
			<td><input type='text' name='nome' required/></td>
		</tr>
		<tr>
			<td>Digite o telefone do cliente:</td>
			<td><input type='text' name='telefone' required/></td>
		</tr>
		<tr>
			<td>Digite o cnpj ou cpf do cliente:</td>
			<td><input type='text' name='cnpj_cpf' /></td>
		</tr>
		<tr>
			<td>Digite o endereco do cliente:</td>
			<td><input type='text' name='endereco' required/></td>
		</tr>
		<tr>
			<td>Digite a divida do cliente (em R$):
			</td>
			<td><input type='text' name='divida' /></td>
		</tr>
		<tr>
			<td>Digite uma data para o<br />
				pagamento do cliente:				
			</td>
			<td><input type='text' name='data_pagamento' value='00/00/0000' /></td>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button>
		</tr>
	</form>
</table>

<?php 
	if (count($_POST) > 0){
		$_POST['data_pagamento'] = reverter_data($_POST['data_pagamento']);
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