<br /><br />
<h2>Confirmar Venda</h2>
<?php
	$num = 0;
	$produtos = array(array());
	foreach ($_POST['nome_produto'] as $value) {
		$produtos[$num]['nome_produto'] = $_POST['nome_produto'][$num];
		$produtos[$num]['referencia'] = $_POST['referencia'][$num];
		$produtos[$num]['quantidade'] = $_POST['quantidade'][$num];
		$produtos[$num]['desconto'] = $_POST['desconto'][$num];
		$num++;
	}
?>
<table class='lista'>
	<form action='/<?php echo BASE; ?>/index.php/vendas/inserir' method='post'>
		<tr>
			<th>Produto</th>
			<th>Referencia</th>
			<th>Quantidade</th>
			<th>Preço</th>
		</tr>

	<?php 
		$string = array();
		$preco_original = array();
		$preco_descontado = array();
		$quantidade = 0; 
	    $soma = 0;
	    foreach ($produtos as $value):
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
		$string[] = '';
		$preco_original[] = $preco_inicial;
		$preco_descontado[] = $preco['preco_produto'];
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
			<?php 	
				foreach ($produtos as $key => $value): 
					$string[$key] .= 'nome_produto=>'.$value['nome_produto'].';';
					$string[$key] .= 'referencia=>'.$value['referencia'].';';
					$string[$key] .= 'quantidade=>'.$value['quantidade'].';';
					$string[$key] .= 'desconto=>'.$value['desconto'].';';
					$string[$key] .= 'preco_original=>'.$preco_original[$key].';';
					$string[$key] .= 'preco_descontado=>'.$preco_descontado[$key];
			?>

			<input type='text' name='produtos[]' value='<?php echo $string[$key]; ?>' hidden required />

			<?php endforeach; ?>
		</tr>
		<tr>
			<td><button type='submit'>Confirmar Venda</button></td>
			<td><input type='button' value='Cancelar Venda' onclick='cancelar_venda()'/></td>
		</tr>
	</form>
</table>