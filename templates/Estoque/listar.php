<br /><br />
<h2>Estoque</h2>


<table class='lista'>
	<tr>
		<th>Produto</th>
		<th>Quantidade</th>
		<th>Preço</th>
		<th>Descrição do Produto</th>
	</tr>

<?php 
	$estoque = select_all('estoque');
	foreach ($estoque as $produto):
?>
	<tr>
		<td><?php echo $produto['nome_produto']; ?></td>
		<td><?php echo $produto['quantidade_produto'].' unidades'; ?></td>
		<td><?php echo 'R$ '.reverter_float($produto['preco_produto']); ?></td>
		<td>
			<?php 
				if ($produto['descricao_produto'] == ''){
					echo 'sem descrição disponível';
				}
				else {
				echo $produto['descricao_produto']; 
				}
			?>
		</td>
		<td><a href='/<?php echo BASE; ?>/index.php/estoque/alterar/?id=<?php echo $produto['id']; ?>'>Alterar</a></td>
		<td><a href='/<?php echo BASE; ?>/index.php/estoque/remover/?id=<?php echo $produto['id']; ?>'>Remover</a></td>
	</tr>

<?php  
    endforeach;
?>
</table>

