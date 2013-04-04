<br /><br />
<h2>Cadastrar Cliente</h2>


<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
	<table class='form'>
		<tr>
			<td>Nome do cliente:</td>
			<td><input class='span2' type='text' name='nome' required/></td>
		</tr>
		<tr>
			<td>Telefone do cliente:</td>
			<td><input class='span2' type='text' name='telefone' maxlength='14' onKeyUp="javascript:return mask(this.value,this,'telefone');" required/></td>
		</tr>
		<tr>
			<td>cpf do cliente:</td>
			<td><input class='span2' type='text' name='cpf' maxlength='14' onKeyUp="javascript:return mask(this.value,this,'cpf');" /></td>
		</tr>
		<tr>
			<td>Endereco do cliente:</td>
			<td><input class='span2' type='text' name='endereco' /></td>
		</tr>
		<tr>
			<td>Dívida do cliente (em R$):
			</td>
			<td><input class='span2' type='text' name='divida' /></td>
		</tr>
		<tr>
			<td>Data de pagamento:</td>
			<td><div class="input-append date" id="dp2" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
	  				<input class="span2" size="16" type="text" name='data_pagamento' />
	  				<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</td>
		</tr>
		<tr>
			<td><button class="btn"  type='submit'>Enviar</button></td>
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