<br /><br />
<h2>Confirmar Venda</h2>


<?php
	var_dump($_POST);
	echo '<br /><br /><br />';
	$referencia = $_POST['referencia'][0];
	$qant_estoque = select('quantidade_produto', 'estoque', 'referencia', $referencia);
	var_dump($qant_estoque);
	// $num = 0;
	// $produtos = array(array());
	// foreach ($_POST['referencia'] as $value) {
	// 	$nome_produto[] = select('nome_produto', 'estoque', 'referencia', $value);
	// 	$produtos[$num]['nome_produto'] = $nome_produto[$num]['nome_produto'];
	// 	$produtos[$num]['referencia'] = $_POST['referencia'][$num];
	// 	$produtos[$num]['quantidade'] = $_POST['quantidade'][$num];
	// 	$produtos[$num]['desconto'] = $_POST['desconto'][$num];
	// 	$num++;
	// }
?>
<!-- <form action='/<?php echo BASE; ?>/index.php/vendas/inserir' method='post'>
	<table class='lista'>
		<tr>
			<th>Produto</th>
			<th>Referencia</th>
			<th>Quantidade</th>
			<th>Preço</th>
		</tr>

	<?php 
		$string = array();
		$preco_unidade = array();
		$preco_total = array();
		$quantidade = array(); 
		$quantidade_total = 0;
	    $soma = 0;
	    foreach ($produtos as $key => $value):
	    	$string[] = '';

	    	$preco = select('preco_produto', 'estoque', 'referencia', $value['referencia']);
			settype($value['desconto'], 'int');
			$preco['preco_produto'] = $preco['preco_produto']-($preco['preco_produto']/100)*$value['desconto'];
			$preco['preco_produto'] = round($preco['preco_produto'], 2);
	    	$preco_unidade[] = $preco['preco_produto'];

	    	$quantidade[$key] = $value['quantidade'];
	    	$quantidade_total += $quantidade[$key];

	    	$preco_total[] = ($quantidade[$key]*$preco['preco_produto']);			
			
			$soma += ($preco_total[$key]);
	?>
	    	<tr>
	    		<td><?php echo $value['nome_produto']; ?></td>
	    		<td><?php echo $value['referencia']; ?></td>
	    		<td><?php echo $value['quantidade']; ?></td>
	    		<td><?php echo 'R$ '.reverter_float($preco['preco_produto']); ?></td>
	    	</tr>
	<?php
	    endforeach;
	?>
		
		<tr>
			<th>Total</th>
			<th></th>
			<th><?php echo $quantidade_total; ?></th>
			<th><?php echo 'R$ '.reverter_float($soma); ?></th>
		</tr>
		<tr>
			<?php 	
				foreach ($produtos as $key => $value): 
					$string[$key] .= 'nome_produto=>'.$value['nome_produto'].';';
					$string[$key] .= 'referencia=>'.$value['referencia'].';';
					$string[$key] .= 'quantidade=>'.$value['quantidade'].';';
					$string[$key] .= 'desconto=>'.$value['desconto'].';';
					$string[$key] .= 'preco_unidade=>'.$preco_unidade[$key].';';
					$string[$key] .= 'preco_total=>'.$preco_total[$key];
			?>

			<input type='text' name='produtos[]' value='<?php echo $string[$key]; ?>' hidden required />

			<?php endforeach; ?>
		</tr>
		<tr>
			<td><button type='submit'>Confirmar Venda</button></td>
			<td><input type='button' value='Cancelar Venda' onclick='cancelar_venda()'/></td>
		</tr>
	</table>
</form> -->