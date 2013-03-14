<table><tr><td style='height: 60px;'></td></tr><tr><td style='height: 100px; width: 590px;'></td><td><h2>Vendas</h2></td></tr></table>


<table class='table table-bordered'>
	<tr>
		<th style='text-align: center;'>Data de Venda</th>
		<th style='text-align: center;'>Atendente</th>
		<th style='text-align: center;'>Produto</th>
		<th style='text-align: center;'>Referencia</th>
		<th style='text-align: center;'>Quantidade</th>
		<th style='text-align: center;'>Desconto</th>
		<th style='text-align: center;'>Preço Unidade</th>
		<th style='text-align: center;'>Preço Total</th>
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
		<td style='text-align: center;'><?php echo $produto['data_venda']; ?></td>
		<td style='text-align: center;'><?php echo $produto['atendente']; ?></td>
		<td style='text-align: center;'><?php echo $produto['nome_produto']; ?></td>
		<td style='text-align: center;'><?php echo $produto['referencia']; ?></td>
		<td style='text-align: center;'><?php echo $produto['quantidade']; if($produto['quantidade'] == 1){ echo ' unidade';} else {echo ' unidades';} ?></td>
		<td style='text-align: center;'><?php echo $produto['desconto']; ?></td>
		<td style='text-align: center;'><?php echo 'R$ '.reverter_float($produto['preco_unidade']); ?></td>
		<td style='text-align: center;'><?php echo 'R$ '.reverter_float($produto['preco_total']); ?></td>
	</tr>

<?php  
    endforeach;
?>
	<tr>
		<th style='text-align: center;'>Total:</th>
		<th></th>
		<th></th>
		<th></th>
		<th style='text-align: center;'><?php echo $quantidade; if($quantidade == 1){ echo ' unidade';} else {echo ' unidades';} ?></th>
		<th></th>
		<th></th>
		<th style='text-align: center;'><?php echo 'R$ '.reverter_float($preco_total_vendas); ?></th>
	</tr>
</table>

