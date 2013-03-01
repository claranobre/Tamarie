<br /><br />
<h2>Vendas</h2>


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
	$vendas = select_all('vendas');
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

