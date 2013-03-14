<table><tr><td style='height: 60px;'></td></tr><tr><td style='height: 100px; width: 470px;'></td><td><h2>Cadastrar Cliente</h2></td></tr></table>


<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
	<table class='form'>
		<tr>
			<td style='width: 425px;'></td>
			<td style='text-align: right;'>Nome do cliente</td>
			<td><input class='span2' type='text' name='nome' required/></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Telefone do cliente</td>
			<td><input class='span2' type='text' name='telefone' maxlength='14' onKeyUp="javascript:return mask(this.value,this,'telefone');" required/></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>cpf do cliente</td>
			<td><input class='span2' type='text' name='cpf' maxlength='14' onKeyUp="javascript:return mask(this.value,this,'cpf');" /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Endereco do cliente</td>
			<td><input class='span2' type='text' name='endereco' /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Dívida do cliente (em R$)</td>
			<td><input class='span2' type='text' name='divida' /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Data de pagamento</td>
			<td><div class="input-append date" id="dp2" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
	  				<input class="span2" size="16" type="text" name='data_pagamento' />
	  				<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><table><td style='width: 90px;'></td><td><button class='btn' type='submit'>Enviar</button></td></table></td>
		</tr>
	</table>
</form>

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