<br /><br />
<h2>Confirmar Venda</h2>
<?php

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
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
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
	    		<td><?php echo $value['nome_produto']; ?></td>
	    		<td><?php echo $value['referencia']; ?></td>
	    		<td><?php echo $value['quantidade']; ?></td>
	    		<td>
	    			<?php 
	    				$preco = select('preco_produto', 'estoque', 'referencia', $value['referencia']);
	    				settype($value['desconto'], 'int');
	    				$preco['preco_produto'] = $preco['preco_produto']-($preco['preco_produto']/100)*$value['desconto'];
	    				$preco['preco_produto'] = round($preco['preco_produto'], 2);
	    				echo 'R$ '.reverter_float($preco['preco_produto']); 
	    			?>
	    		</td>
	    	</tr>
	<?php
		$soma += $preco['preco_produto'];
		$quantidade += $value['quantidade'];
	    endforeach;
	    $soma *= $quantidade;
	?>
		
		<tr>
			<th>Total</th>
			<th></th>
			<th><?php echo $quantidade; ?></th>
			<th><?php echo 'R$ '.reverter_float($soma); ?></th>
		</tr>
		<tr>
			<td><button type='submit'>Confirmar Venda</button></td>
			<td><input type='button' value='Cancelar Venda' onclick='location.aheaf'/></td>
		</tr>
	</form>
</table>
