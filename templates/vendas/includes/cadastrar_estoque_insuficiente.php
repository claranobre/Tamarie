<br />
	<p>Produtos sem estoque suficiente:</p>
	<table class='lista'>
		<thead>
			<tr>
				<th>Produto</th>
				<th>Referencia</th>
				<th>Estoque Solicitado</th>
				<th>Estoque Disponivel</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($produtos_invalidos as $key => $value): ?>
			<tr>
				<td><?php echo $value['nome_produto']; ?></td>
				<td><?php echo $value['referencia']; ?></td>
				<td><?php echo $value['estoque_solicitado']; ?></td>
				<td><?php echo $value['estoque_disponivel']; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<br /><br />
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
	<table>
		<?php include_once(TEMPLATES.'/vendas/includes/topo_cadastro.html'); ?>
		<tbody id='tabela'>
			<?php foreach ($_POST['referencia'] as $key => $value): ?>

			<tr>
				<td><input type='text' name='referencia[]' value='<?php echo $value; ?>' required /></td>
				<td><input type='text' name='quantidade[]' value='<?php echo $_POST['quantidade'][$key]; ?>' required /></td>
				<td><input type='text' name='desconto[]' value='<?php echo $_POST['desconto'][$key]; ?>' placeholder='Ex.: 25%' /></td>
			</tr>

			<?php endforeach; ?>
		</tbody>
	</table>
	<button type='submit'>Enviar</button>
	<a href='#' onClick='add_produto()'>Adicionar mais produto</a></td>
</form>