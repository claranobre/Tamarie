<br /><br />
<h2>Cadastrar Estoque</h2>


<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
	<table class='form'>	
		<tr>
			<td>Nome do produto:</td>
			<td><input class='span2' type='text' name='nome_produto' required /></td>
		</tr>
		<tr>
			<td>Referencia do produto:</td>
			<td><input class='span2' type='text' name='referencia' required /></td>
		</tr>
		<tr>
			<td>Preço do produto (em R$):</td>
			<td><input class='span2' type='text' name='preco_produto' required /></td>
		</tr>
		<tr>
			<td>Quantidade de estoque:</td>
			<td><input class='span2' type='text' name='quantidade_produto' required /></td>
		</tr>
		<tr>
			<td><button class="btn"  type='submit'>Enviar</button></td>
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