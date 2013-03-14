<table><tr><td style='height: 60px;'></td></tr><tr><td style='height: 100px; width: 470px;'></td><td><h2>Cadastrar Estoque</h2></td></tr></table>


<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
	<table class='form'>	
		<tr>
			<td style='width: 420px;'></td>
			<td style='text-align: right;'>Nome do produto</td>
			<td><input class='span2' type='text' name='nome_produto' required /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Referencia do produto</td>
			<td><input class='span2' type='text' name='referencia' required /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Preço do produto (em R$)</td>
			<td><input class='span2' type='text' name='preco_produto' required /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Quantidade de estoque</td>
			<td><input class='span2' type='text' name='quantidade_produto' required /></td>
		</tr>
		<tr>
			<td></td>
			<td><table><td style='width: 100px;'></td><td><button class='btn' type='submit'>Enviar</button></td></table></td>
		</tr>
	</table>
</form>

<?php 
	if (count($_POST) > 0){
		insert($_POST, 'estoque');
		ob_clean();
		header('LOCATION: /'.BASE.'/index.php/estoque/listar/');
	}
?>