<br /><br />
<h2>Cadastrar Venda</h2>
<?php  
    if ($_GET['action'] == 'reg'):
?>
<table>
	<form action='<?php echo $_SERVER['PHP_SELF'].'?action=pos'; ?>' method='post'>
		<tr>
			<td>
				Referencia dos produtos <br />
				(separadas por ponto e virgulas):
			</td>
			<td><input type='text' name='referencia' required /></td>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button>
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
<table>
	<form action='<?php echo $_SERVER['PHP_SELF'].'?action=con'; ?>' method='post'>
		<tr>
			<td></td>
			<?php  
			    foreach ($referencias as $key => $value) {
			    	echo '<td>Produto '.($key+1).'</td>'; 
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
			<td><button type='submit'>Enviar</button>
		</tr>
	</form>
</table>
<?php
    endif;






















    if ($_GET['action'] == 'con'):
    	$num = 0;
    	$produto = array(array());
    	foreach ($_POST['nome_produto'] as $value) {
    		$produto[$num]['nome_produto'] = $_POST['nome_produto'][$num];
    		$produto[$num]['referencia'] = $_POST['referencia'][$num];
    		$produto[$num]['quantidade'] = $_POST['quantidade'][$num];
    		$produto[$num]['desconto'] = $_POST['desconto'][$num];
    		$num++;
    	}
?>

<table class='lista'>
	<tr>
		<th>Produto</th>
		<th>Referencia</th>
		<th>Quantidade</th>
		<th>Preço</th>
	</tr>

<?php 
	$quantidade = 0; 
    $soma = 0;
    foreach ($produto as $value):
?>
    	<tr>
    		<td><?php echo $value[0]; ?></td>
    		<td><?php echo $value[1]; ?></td>
    		<td><?php echo $value[2]; ?></td>
    		<td>
    			<?php 
    				$preco = select('preco_produto', 'estoque', 'referencia', $value[1]);
    				echo 'R$ '.reverter_float($preco['preco_produto']); 
    			?>
    		</td>
    	</tr>
<?php
	$soma += $preco['preco_produto'];
	$quantidade += $value[2];
    endforeach;
?>
	
	<tr>
		<th>Total</th>
		<th></th>
		<th><?php echo $quantidade; ?></th>
		<th><?php echo 'R$ '.reverter_float($soma); ?></th>
	</tr>

</table>


<?php

    endif;
?>