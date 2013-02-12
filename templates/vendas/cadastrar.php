<br /><br />
<h2>Cadastrar Venda</h2>
<table class='form'>
	<form action='/<?php echo BASE; ?>/index.php/vendas/armazenar/' method='post'>
		<tr>
			<td>
				Referencia dos produtos <br />
				(separadas por ponto e virgulas):
			</td>
			<td><input type='text' name='referencia' required /></td>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button></td>
		</tr>
	</form>
</table>