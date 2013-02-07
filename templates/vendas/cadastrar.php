<br /><br />
<h2>Cadastrar Venda</h2>
<?php  
    if ($_GET['action'] == 'reg'):
?>
<table class='form'>
	<form action='<?php echo $_SERVER['PHP_SELF'].'?action=pos'; ?>' method='post'>
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
<?php  
    endif;











    if ($_GET['action'] == 'pos'):
    	if (count($_POST) > 0){
			$referencias = trim_post('referencia');
    	}
?>
<table class='form'>
	<form action='/<?php echo BASE; ?>/index.php/vendas/confirmar/?action=cad' method='post'>
		<tr>
			<th></th>
			<?php  
			    foreach ($referencias as $key => $value) {
			    	echo '<th>Produto '.($key+1).'</th>'; 
			    }
			?>
		</tr>
		<tr>
			<td>Nome dos produtos:</td>
			<?php  
			    foreach ($referencias as $value):
			    	$produto = select('nome_produto', 'estoque', 'referencia', $value);
			?>

			<td><input type='text' name='nome_produto[]' value='<?php echo $produto['nome_produto']; ?>' required /></td>

			<?php
			    endforeach;
			?>
		</tr>
		<tr>
			<td>
				Referencia dos produtos:
			</td>
			<?php  
			    foreach ($referencias as $value):
			?>
	
			<td><input type='text' name='referencia[]' value='<?php echo $value; ?>' required /></td>

			<?php 
				endforeach;
			?>
			
		</tr>
		<tr>
			<td>Quantidade dos produtos:</td>
			<?php  
			    foreach ($referencias as $value):
			?>

			<td><input type='text' name='quantidade[]'  required /></td>

			<?php 
				endforeach;
			?>
		</tr>
		<tr>
			<td>Digite os descontos:</td>
			<?php  
			    foreach ($referencias as $value):
			?>

			<td><input type='text' name='desconto[]' placeholder='Ex.: 25%'  /></td>

			<?php 
				endforeach;
			?>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button></td>
		</tr>
	</form>
</table>
<?php endif; ?>
