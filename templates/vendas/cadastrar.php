<br /><br />
<h2>Cadastrar Venda</h2>
<form action='/<?php echo BASE; ?>/index.php/vendas/confirmar/' method='post'>
	<table>
		<thead>
			<tr>
				<th>Referencia</th>
				<th>Quantidade</th>
				<th>Desconto</th>
			</tr>
		</thead>
		<tbody id='tabela'>
			<tr>
				<td><input type='text' name='referencia[]' required /></td>
				<td><input type='text' name='quantidade[]' required /></td>
				<td><input type='text' name='desconto[]' placeholder='Ex.: 25%' /></td>
			</tr>
		</tbody>
	</table>
	<button type='submit'>Enviar</button><a href='#' onClick='add_produto()'>Adicionar mais produto</a></td>
</form>