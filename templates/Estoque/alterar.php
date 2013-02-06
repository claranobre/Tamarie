<br /><br />
<h2>Alterar Dados</h2>
<table>
	<form action='<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id']; ?>' method='post'>
<?php  
    $produto = buscar_por_id('estoque', $_GET['id']);
?>
		<tr>
			<td>Nome do produto:</td>
			<td><input type='text' name='nome_produto' value='<?php echo $produto['nome_produto']; ?>' required /></td>
		</tr>
		<tr>
			<td>Referencia do produto:</td>
			<td><input type='text' name='referencia' value='<?php echo $produto['referencia']; ?>' required /></td>
		</tr>
		<tr>
			<td>Preço do produto (em R$):</td>
			<td><input type='text' name='preco_produto' value='<?php echo reverter_float($produto['preco_produto']); ?>' required /></td>
		</tr>
		<tr>
			<td>Quantidade de estoque:</td>
			<td><input type='text' name='quantidade_produto' value='<?php echo $produto['quantidade_produto']; ?>' required /></td>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button>
		</tr>
	</form>
</table>

<?php 
	if (count($_POST) > 0){
		$_POST['preco_produto'] = converter_float($_POST['preco_produto']);
		update($_POST, $_GET['id'], 'estoque');
		ob_clean();
		header('LOCATION: /'.BASE.'/index.php/estoque/listar/');
	}
?>