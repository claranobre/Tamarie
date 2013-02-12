<br /><br />
<h2>Cadastrar Venda</h2>
<table class='form'>
	<form action='/<?php echo BASE; ?>/index.php/vendas/confirmar/' method='post'>
		<tr>
			<th></th>
			<?php  
				$referencias = trim_post('referencia');
				foreach ($referencias as $key => $value) {
					echo '<th>Produto '.($key+1).'</th>';
				}
			?>
		</tr>
		<tr>
			<td>Produto:</td>
			<?php foreach ($referencias as $value): 
				$nome = select('nome_produto', 'estoque', 'referencia', $value);
			?>
			<td>
				<input type='text' name='nome_produto' value='<?php echo $nome['nome_produto']; ?>' required />
			</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td>Referencia:</td>
			<?php foreach ($referencias as $value): ?>
			<td>
				<input type='text' name='referencia' value='<?php echo $value; ?>' required />
			</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td>Quantidade:</td>
			<?php foreach ($referencias as $value): ?>
			<td>
				<input type='text' name='quantidade' required />
			</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td>Desconto:</td>
			<?php foreach ($referencias as $value): ?>
			<td>
				<input type='text' name='desconto' />
			</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button></td>
		</tr>
	</form>
</table>