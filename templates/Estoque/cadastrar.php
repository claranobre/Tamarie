<br /><br />
<h2>Cadastrar Estoque</h2>
<table class='form'>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
		<tr>
			<td>Nome do produto:</td>
			<td><input type='text' name='nome_produto' required /></td>
		</tr>
		<tr>
			<td>Referencia do produto:</td>
			<td><input type='text' name='referencia' required /></td>
		</tr>
		<tr>
			<td>Preço do produto (em R$):</td>
			<td><input type='text' name='preco_produto' required /></td>
		</tr>
		<tr>
			<td>Quantidade de estoque:</td>
			<td><input type='text' name='quantidade_produto' required /></td>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button></td>
		</tr>
	</form>
</table>

<?php 
	if (count($_POST) > 0){
		insert($_POST, 'estoque');
		ob_clean();
		header('LOCATION: /'.BASE.'/index.php/estoque/listar/');
	}
?>