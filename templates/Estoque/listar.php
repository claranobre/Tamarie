<table><tr><td style='height: 60px;'></td></tr><tr><td style='height: 100px; width: 590px;'></td><td><h2>Estoque</h2></td></tr></table>


<table class='table table-bordered'>
	<tr>
		<th style='text-align: center;'>Produto</th>
		<th style='text-align: center;'>Referencia</th>
		<th style='text-align: center;'>Quantidade</th>
		<th style='text-align: center;'>Preço</th>
		<th style='text-align: center;'>Alterar</th>
		<th style='text-align: center;'>Remover</th>
	</tr>

<?php 
	$quantidade_total = 0;
	$soma_preco = 0;
	$estoque = select_all('estoque');
	foreach ($estoque as $produto):
		$quantidade_total += $produto['quantidade_produto'];
		$soma_preco += $quantidade_total*$produto['preco_produto'];
?>
	<tr>
		<td style='text-align: center;'><?php echo $produto['nome_produto']; ?></td>
		<td style='text-align: center;'><?php echo $produto['referencia']; ?></td>
		<td style='text-align: center;'><?php echo $produto['quantidade_produto'].' unidades'; ?></td>
		<td style='text-align: center;'><?php echo 'R$ '.reverter_float($produto['preco_produto']); ?></td>
		<td style='text-align: center;'><a class='btn' href='/<?php echo BASE; ?>/index.php/estoque/alterar/?id=<?php echo $produto['id']; ?>'>Alterar</a></td>
		<td style='text-align: center;'><a class='btn btn-danger' href='/<?php echo BASE; ?>/index.php/estoque/remover/?id=<?php echo $produto['id']; ?>'>Remover</a></td>
	</tr>

<?php  
    endforeach;
?>
	<th style='text-align: center;'>Total:</th>
	<th></th>
	<th style='text-align: center;'><?php echo $quantidade_total.' unidades'; ?></th>
	<th style='text-align: center;'><?php echo 'R$ '.reverter_float($soma_preco); ?></th>
	<th></th>
	<th></th>
</table>

