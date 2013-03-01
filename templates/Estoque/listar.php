<br /><br />
<h2>Estoque</h2>


<table class='table table-bordered'>
	<tr>
		<th>Produto</th>
		<th>Referencia</th>
		<th>Quantidade</th>
		<th>Preço</th>
		<th>Alterar</th>
		<th>Remover</th>
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
		<td><?php echo $produto['nome_produto']; ?></td>
		<td><?php echo $produto['referencia']; ?></td>
		<td><?php echo $produto['quantidade_produto'].' unidades'; ?></td>
		<td><?php echo 'R$ '.reverter_float($produto['preco_produto']); ?></td>
		<td><a class='btn' href='/<?php echo BASE; ?>/index.php/estoque/alterar/?id=<?php echo $produto['id']; ?>'>Alterar</a></td>
		<td><a class='btn' href='/<?php echo BASE; ?>/index.php/estoque/remover/?id=<?php echo $produto['id']; ?>'>Remover</a></td>
	</tr>

<?php  
    endforeach;
?>
	<th>Total:</th>
	<th></th>
	<th><?php echo $quantidade_total.' unidades'; ?></th>
	<th><?php echo 'R$ '.reverter_float($soma_preco); ?></th>
	<th></th>
	<th></th>
</table>

