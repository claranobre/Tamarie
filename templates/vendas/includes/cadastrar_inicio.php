<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
	<table>
		<?php include_once(TEMPLATES.'/vendas/includes/topo_cadastro.html'); ?>
		<tbody id='tabela'>
			<tr>
				<td><input class="span2" type='text' name='referencia[]' required /></td>
				<td><input class="span2" type='text' name='quantidade[]' required /></td>
				<td><input class="span2" type='text' name='desconto[]' placeholder='Ex.: 25%' /></td>
			</tr>
		</tbody>
	</table>
	<button class="btn"  type='submit'>Enviar</button>
	<a href='#' onClick='add_produto()'>Adicionar mais produto</a></td>
</form>