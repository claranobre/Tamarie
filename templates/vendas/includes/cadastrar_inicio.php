<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
	<table>
		<?php include_once(TEMPLATES.'/vendas/includes/topo_cadastro.html'); ?>
		<tbody id='tabela'>
			<tr>
				<td style='width: 400px;'></td>
				<td><input class="span2" type='text' name='referencia[]' required /></td>
				<td><input class="span2" type='text' name='quantidade[]' required /></td>
				<td><input class="span2" type='text' name='desconto[]' placeholder='Ex.: 25%' /></td>
			</tr>
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