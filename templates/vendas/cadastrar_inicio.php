<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
	<table>
		<?php include_once(TEMPLATES.'/vendas/topo_cadastro.html'); ?>
		<tbody id='tabela'>
			<tr>
				<td><input type='text' name='referencia[]' required /></td>
				<td><input type='text' name='quantidade[]' required /></td>
				<td><input type='text' name='desconto[]' placeholder='Ex.: 25%' /></td>
			</tr>
		</tbody>
	</table>
	<button type='submit'>Enviar</button>
	<a href='#' onClick='add_produto()'>Adicionar mais produto</a></td>
</form>