<?php
	$num = 0;
	$produtos = array(array());
	foreach ($_POST['referencia'] as $value) {
		$nome_produto[] = select('nome_produto', 'estoque', 'referencia', $value);
		$produtos[$num]['nome_produto'] = $nome_produto[$num]['nome_produto'];
		$produtos[$num]['referencia'] = $_POST['referencia'][$num];
		$produtos[$num]['quantidade'] = $_POST['quantidade'][$num];
		$produtos[$num]['desconto'] = $_POST['desconto'][$num];
		$num++;
	}
?>
<form class="navbar-form pull-left" action='/<?php echo BASE; ?>/index.php/vendas/inserir' method='post'>
	<table>
		<tr>
			<td style='width: 400px;'></td>
			<td>
				<table class='table table-bordered'>
					<tr>
						<th style='text-align: center;'>Produto</th>
						<th style='text-align: center;'>Referencia</th>
						<th style='text-align: center;'>Quantidade</th>
						<th style='text-align: center;'>Preço</th>
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
				    		<td style='text-align: center;'><?php echo $value['nome_produto']; ?></td>
				    		<td style='text-align: center;'><?php echo $value['referencia']; ?></td>
				    		<td style='text-align: center;'><?php echo $value['quantidade']; ?></td>
				    		<td style='text-align: center;'><?php echo 'R$ '.reverter_float($preco['preco_produto']); ?></td>
				    	</tr>
			<?php
				    	endforeach;
			?>
					
					<tr>

						<th style='text-align: center;'>Total:</th>
						<th></th>
						<th style='text-align: center;'><?php echo $quantidade_total; ?></th>
						<th style='text-align: center;'><?php echo 'R$ '.reverter_float($soma); ?></th>
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

						<input class='invisible' type='text' name='produtos[]' value='<?php echo $string[$key]; ?>' required />

						<?php endforeach; ?>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button class='btn btn-success' type='submit'>Confirmar Venda</button>
				<a class='btn btn-danger' href='#' onclick='cancelar_venda()'>Cancelar Venda</a>
			</td>
		</tr>
	</table>
</form>