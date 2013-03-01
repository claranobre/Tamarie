<br /><br />
<h2>Relatorio de Vendas</h2>


<form class="navbar-form pull-left" action='/<?php echo BASE; ?>/index.php/vendas/relatorio/' method='post'>
	<table>
		<tr>
			<td>Data Inicial:</td>
			<td>Data Limite:</td>
		</tr>
		<tr>
			<td><input class="span2" type='date' name='data_inicial' required/></td>
			<td><input class="span2" type='date' name='data_limite' required/></td>
		</tr>
	</table>
	<button class="btn"  type='submit'>Filtar</button>
</form>

<?php if (count($_POST) > 0): ?>
<table class='table table-bordered'>
	<tr>
		<th>Data de Venda</th>
		<th>Atendente</th>
		<th>Produto</th>
		<th>Referencia</th>
		<th>Quantidade</th>
		<th>Desconto</th>
		<th>Preço Unidade</th>
		<th>Preço Total</th>
	</tr>
<?php 
	$quantidade = 0;
	$preco_total_vendas = 0;
	$vendas = buscar_relatorio_vendas($_POST['data_inicial'], $_POST['data_limite']);
	foreach ($vendas as $produto):
		$produto['data_venda'] = converter_data($produto['data_venda']);
		reverter_data($produto['data_venda']);
		$quantidade += $produto['quantidade'];
		$preco_total_vendas += ($produto['preco_total']);
?>
	<tr>
		<td><?php echo $produto['data_venda']; ?></td>
		<td><?php echo $produto['atendente']; ?></td>
		<td><?php echo $produto['nome_produto']; ?></td>
		<td><?php echo $produto['referencia']; ?></td>
		<td><?php echo $produto['quantidade']; if($produto['quantidade'] == 1){ echo ' unidade';} else {echo ' unidades';} ?></td>
		<td><?php echo $produto['desconto']; ?></td>
		<td><?php echo 'R$ '.reverter_float($produto['preco_unidade']); ?></td>
		<td><?php echo 'R$ '.reverter_float($produto['preco_total']); ?></td>
	</tr>

<?php  
    endforeach;
?>
	<tr>
		<th>Total:</th>
		<th></th>
		<th></th>
		<th></th>
		<th><?php echo $quantidade; if($quantidade == 1){ echo ' unidade';} else {echo ' unidades';} ?></th>
		<th></th>
		<th></th>
		<th><?php echo 'R$ '.reverter_float($preco_total_vendas); ?></th>
	</tr>
</table>
<?php endif; ?>