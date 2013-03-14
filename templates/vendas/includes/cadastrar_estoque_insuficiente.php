<br />
	<table><tr><td style='width: 410px;'></td><td><h3>Produtos sem estoque suficiente</h3></td></tr></table>
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th style='text-align: center'>Produto</th>
				<th style='text-align: center'>Referencia</th>
				<th style='text-align: center'>Estoque Solicitado</th>
				<th style='text-align: center'>Estoque Disponivel</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($produtos_invalidos as $key => $value): ?>
			<tr>
				<td style='text-align: center'><?php echo $value['nome_produto']; ?></td>
				<td style='text-align: center'><?php echo $value['referencia']; ?></td>
				<td style='text-align: center'><?php echo $value['estoque_solicitado']; ?></td>
				<td style='text-align: center'><?php echo $value['estoque_disponivel']; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<table><tr><td style='height: 20px;'></td></tr><tr><td style='height: 100px; width: 440px;'></td><td><h3>Redigite os dados da venda</h3></td></tr><tr><td style='height: 20px;'></td></tr></table>
<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
	<table>
		<?php include_once(TEMPLATES.'/vendas/includes/topo_cadastro.html'); ?>
		<tbody id='tabela'>
			<?php foreach ($_POST['referencia'] as $key => $value): ?>

			<tr>
				<td></td>
				<td><input class='span2' type='text' name='referencia[]' value='<?php echo $value; ?>' required /></td>
				<td><input class='span2' type='text' name='quantidade[]' value='<?php echo $_POST['quantidade'][$key]; ?>' required /></td>
				<td><input class='span2' type='text' name='desconto[]' value='<?php echo $_POST['desconto'][$key]; ?>' placeholder='Ex.: 25%' /></td>
			</tr>

			<?php endforeach; ?>
		</tbody>
	</table>
	<table>
		<tr>
			<td style='width: 400px;'></td>
			<td>
				<button class='btn btn-success' type='submit'>Enviar</button>
				<a class='btn btn-info' href='#' onClick='add_produto()'>Adicionar mais produto</a>
			</td>
		</tr>
	</table>
</form>