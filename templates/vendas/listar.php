<br /><br />
<h2>Vendas</h2>


<table class='lista'>
	<tr>
		<th>Produto</th>
		<th>Referencia</th>
		<th>Quantidade</th>
		<th>Desconto</th>
		<th>Preço Original</th>
		<th>Preço Descontado</th>
	</tr>
<?php 
	$quantidade = 0;
	$preco_total_original = 0;
	$preco_total_descontado = 0;
	$vendas = select_all('vendas');
	foreach ($vendas as $produto):
		$quantidade += $produto['quantidade'];
		$preco_total_original += ($produto['quantidade']*$produto['preco_original']);
		$preco_total_descontado += ($produto['quantidade']*$produto['preco_descontado']);
?>
	<tr>
		<td><?php echo $produto['nome_produto']; ?></td>
		<td><?php echo $produto['referencia']; ?></td>
		<td><?php echo $produto['quantidade']; if($produto['quantidade'] == 1){ echo ' unidade';} else {echo ' unidades';} ?></td>
		<td><?php echo $produto['desconto']; ?></td>
		<td><?php echo 'R$ '.reverter_float(($produto['quantidade']*$produto['preco_original'])); ?></td>
		<td><?php echo 'R$ '.reverter_float(($produto['quantidade']*$produto['preco_descontado'])); ?></td>
	</tr>

<?php  
    endforeach;
?>
	<tr>
		<th>Total:</th>
		<th></th>
		<th><?php echo $quantidade; if($quantidade == 1){ echo ' unidade';} else {echo ' unidades';} ?></th>
		<th></th>
		<th><?php echo 'R$ '.reverter_float($preco_total_original); ?></th>
		<th><?php echo 'R$ '.reverter_float($preco_total_descontado); ?></th>
	</tr>
</table>

