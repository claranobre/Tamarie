<br /><br />
<h2>Confirmar Venda</h2>
<?php

if ($_GET['action'] == 'cad'){
	$num = 0;
	$produto = array(array());
	foreach ($_POST['nome_produto'] as $value) {
		$produto[$num]['nome_produto'] = $_POST['nome_produto'][$num];
		$produto[$num]['referencia'] = $_POST['referencia'][$num];
		$produto[$num]['quantidade'] = $_POST['quantidade'][$num];
		$produto[$num]['desconto'] = $_POST['desconto'][$num];
		$num++;
	}
    // var_dump($produto);
?>

<table class='lista'>
	<form action='<?php echo $_SERVER['PHP_SELF'].'?action=arm'?>' method='post'>
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
	    				$preco_inicial = $preco['preco_produto'];
	    				settype($value['desconto'], 'int');
	    				$preco['preco_produto'] = $preco['preco_produto']-($preco['preco_produto']/100)*$value['desconto'];
	    				$preco['preco_produto'] = round($preco['preco_produto'], 2);
	    				echo 'R$ '.reverter_float($preco['preco_produto']); 
	    			?>
	    		</td>
	    	</tr>
	<?php
		$value['preco_produto_original'] = $preco_inicial;
		$value['preco_produto_descontado'] = $preco['preco_produto'];
		settype($value['quantidade'], 'int');
		settype($value['preco_produto_original'], 'float');
		$soma += $preco['preco_produto'];
		$quantidade += $value['quantidade'];
	    endforeach;
	    $soma *= $quantidade;
	    var_dump($produto);
	    echo '<br /><br /><br /><br />';
	    var_dump($_POST);
	?>
		
		<tr>
			<th>Total</th>
			<th></th>
			<th><?php echo $quantidade; ?></th>
			<th><?php echo 'R$ '.reverter_float($soma); ?></th>
		</tr>
		<tr>
			<td><button type='submit'>Confirmar Venda</button></td>
			<td><input type='button' value='Cancelar Venda' onclick='cancelar_venda()'/></td>
		</tr>
	</form>
</table>

<?php 
	} 
	else if  ($_GET['action'] == 'arm') {
		// INPUTS HIDDEN!!!!!!!!!!!!!
		echo 'VAI INSERT';
		// var_dump($_POST);
	}
?>

