<br /><br />
<h2>Estoque</h2>


<table class='lista'>
	<tr>
		<th>Produto</th>
		<th>Referencia</th>
		<th>Quantidade</th>
		<th>Preço</th>
	</tr>

<?php 
	$estoque = select_all('estoque');
	foreach ($estoque as $produto):
?>
	<tr>
		<td><?php echo $produto['nome_produto']; ?></td>
		<td><?php echo $produto['referencia']; ?></td>
		<td><?php echo $produto['quantidade_produto'].' unidades'; ?></td>
		<td><?php echo 'R$ '.reverter_float($produto['preco_produto']); ?></td>
		<td><a href='/<?php echo BASE; ?>/index.php/estoque/alterar/?id=<?php echo $produto['id']; ?>'>Alterar</a></td>
		<td><a href='/<?php echo BASE; ?>/index.php/estoque/remover/?id=<?php echo $produto['id']; ?>'>Remover</a></td>
	</tr>

<?php  
    endforeach;
?>
</table>

