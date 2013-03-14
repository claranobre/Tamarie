<table><tr><td style='height: 60px;'></td></tr><tr><td style='height: 100px; width: 479px;'></td><td><h2>Alterar Dados</h2></td></tr></table>


<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id']; ?>' method='post'>
	<table class='form'>

<?php  
    $produto = buscar_por_id('estoque', $_GET['id']);
?>
		<tr>
			<td style='width: 420px;'></td>
			<td style='text-align: right;'>Nome do produto</td>
			<td><input class='span2' type='text' name='nome_produto' value='<?php echo $produto['nome_produto']; ?>' required /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Referencia do produto</td>
			<td><input class='span2' type='text' name='referencia' value='<?php echo $produto['referencia']; ?>' required /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Preço do produto (em R$)</td>
			<td><input class='span2' type='text' name='preco_produto' value='<?php echo reverter_float($produto['preco_produto']); ?>' required /></td>
		</tr>
		<tr>
			<td></td>
			<td style='text-align: right;'>Quantidade de estoque</td>
			<td><input class='span2' type='text' name='quantidade_produto' value='<?php echo $produto['quantidade_produto']; ?>' required /></td>
		</tr>
		<tr>
			<td></td>
			<td><table><td style='width: 100px;'></td><td><button class='btn' type='submit'>Enviar</button></td></table></td>
		</tr>
	</table>
</form>

<?php 
	if (count($_POST) > 0){
		$_POST['preco_produto'] = converter_float($_POST['preco_produto']);
		update($_POST, 'id', $_GET['id'], 'estoque');
		ob_clean();
		header('LOCATION: /'.BASE.'/index.php/estoque/listar/');
	}
?>