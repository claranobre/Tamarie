<br />
	<p>Produtos sem estoque suficiente:</p>
	<table class='table table-bordered'>
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
<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
	<table>
		<?php include_once(TEMPLATES.'/vendas/includes/topo_cadastro.html'); ?>
		<tbody id='tabela'>
			<?php foreach ($_POST['referencia'] as $key => $value): ?>

			<tr>
				<td><input class='span2' type='text' name='referencia[]' value='<?php echo $value; ?>' required /></td>
				<td><input class='span2' type='text' name='quantidade[]' value='<?php echo $_POST['quantidade'][$key]; ?>' required /></td>
				<td><input class='span2' type='text' name='desconto[]' value='<?php echo $_POST['desconto'][$key]; ?>' placeholder='Ex.: 25%' /></td>
			</tr>

			<?php endforeach; ?>
		</tbody>
	</table>
	<button class="btn"  type='submit'>Enviar</button>
	<a class='btn' href='#' onClick='add_produto()'>Adicionar mais produto</a></td>
</form>