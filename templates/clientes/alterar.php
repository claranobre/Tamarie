<table><tr><td style='height: 60px;'></td></tr><tr><td style='height: 100px; width: 479px;'></td><td><h2>Alterar Dados</h2></td></tr></table>


<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id'];?>' method='post'>
	<table class='form'>
	
<?php
$cliente = buscar_por_id('clientes',$_GET['id']);
?>
		    <tr>
		    	<td style='width: 240px;'></td>
				<td style='text-align: right;'>Modifique o nome do cliente</td>
				<td><input class='span2' type='text' name='nome' value='<?php echo $cliente['nome']?>' required/></td>
			</tr>
			<tr>
				<td></td>
				<td style='text-align: right;'>Modifique o telefone do cliente</td>
				<td><input class='span2' type='text' name='telefone' value='<?php echo $cliente['telefone']?>' maxlength='14' onKeyUp="javascript:return mask(this.value,this,'telefone');" required/></td>
			</tr>
			<tr>
				<td></td>
				<td style='text-align: right;'>Modifique o cpf do cliente</td>
				<td><input class='span2' type='text' name='cpf' value='<?php echo $cliente['cpf']?>' maxlength='14' onKeyUp="javascript:return mask(this.value,this,'cpf');" /></td>
			</tr>
			<tr>
				<td></td>
				<td style='text-align: right;'>Modifique o endereco do cliente</td>
				<td><input class='span2' type='text' name='endereco' value='<?php echo $cliente['endereco']?>' required/></td>
			</tr>
			<tr>
				<td></td>
				<td style='text-align: right;'>Modifique a divida do cliente (em reais)</td>
				<td><input class='span2' type='text' name='divida' value='<?php echo $cliente['divida']?>' /></td>
			</tr>
			<tr>
				<td></td>
				<td style='text-align: right;'>Modifique a data de pagamento do cliente</td>
				<td><div class="input-append date" id="dp2" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
	  				<input class="span2" size="16" type="text" value='<?php echo converter_data($cliente['data_pagamento']); ?>' name='data_pagamento' />
	  				<span class="add-on"><i class="icon-th"></i></span>
					</div>
				</td>
			<tr>
				<td></td>
				<td><table><td style='width: 280px;'></td><td><button class='btn' type='submit'>Enviar</button></td></table></td>
			</tr>
	</table>
</form>

<?php

	if (count($_POST) > 0){
		$_POST['data_pagamento'] = reverter_data($_POST['data_pagamento']);
		$_POST['divida'] = converter_float($_POST['divida']);
		if ($_POST['divida'] > 0) {
			$_POST['status'] = 'em divida';
		}
		else{
			$_POST['status'] = 'quite';
		}
		var_dump($_POST);
		update($_POST, 'id', $_GET['id'], 'clientes');
		ob_clean();
		header('LOCATION: /'.BASE.'/index.php/clientes/listar/');
	}

?>