<table><tr><td style='height: 60px;'></td></tr><tr><td style='height: 100px; width: 590px;'></td><td><h2>Relatorio de Vendas</h2></td></tr></table>


<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
	<table class='form'>
		<tr>
			<td style='width: 420px;'></td>
			<td style='text-align: center;'>Data Inicial:</td>
			<td style='width: 10px;'></td>
			<td style='text-align: center;'>Data Limite:</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<div class="input-append date" id="dp2" data-date="12-03-2013" data-date-format="dd-mm-yyyy">
	  				<input class="span2" size="16" type="text" name='data_inicial' />
	  				<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</td>
			<td style='width: 10px;'></td>
			<td>
				<div class="input-append date" id="dp2" data-date="12-03-2013" data-date-format="dd-mm-yyyy">
	  				<input class="span2" size="16" type="text" name='data_limite' />
	  				<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</td>
		</tr>
	</table>
	<table><tr><td style='width: 420px;'></td><td><button class='btn btn-primary'  type='submit'>Filtar</button></td></tr><tr><td style='height: 100px;'></td></tr></table>
</form>

<?php if (count($_POST) > 0): ob_start(); ?>
<table class='table table-bordered'>
	<tr>
		<th style='text-align: center;'>Data de Venda</th>
		<th style='text-align: center;'>Atendente</th>
		<th style='text-align: center;'>Produto</th>
		<th style='text-align: center;'>Referencia</th>
		<th style='text-align: center;'>Quantidade</th>
		<th style='text-align: center;'>Desconto</th>
		<th style='text-align: center;'>Preço Unidade</th>
		<th style='text-align: center;'>Preço Total</th>
	</tr>
<?php 
	$quantidade = 0;
	$preco_total_vendas = 0;
	$vendas = buscar_relatorio_vendas($_POST['data_inicial'], $_POST['data_limite']);
	foreach ($vendas as $produto):
		$produto['data_venda'] = converter_data($produto['data_venda']);
		reverter_data($produto['data_venda']);
		$quantidade += $produto['quantidade'];
		$preco_total_vendas += ($produto['preco_total']);
?>
	<tr>
		<td style='text-align: center;'><?php echo $produto['data_venda']; ?></td>
		<td style='text-align: center;'><?php echo $produto['atendente']; ?></td>
		<td style='text-align: center;'><?php echo $produto['nome_produto']; ?></td>
		<td style='text-align: center;'><?php echo $produto['referencia']; ?></td>
		<td style='text-align: center;'><?php echo $produto['quantidade']; if($produto['quantidade'] == 1){ echo ' unidade';} else {echo ' unidades';} ?></td>
		<td style='text-align: center;'><?php echo $produto['desconto']; ?></td>
		<td style='text-align: center;'><?php echo 'R$ '.reverter_float($produto['preco_unidade']); ?></td>
		<td style='text-align: center;'><?php echo 'R$ '.reverter_float($produto['preco_total']); ?></td>
	</tr>

<?php  
    endforeach;
?>
	<tr>
		<th style='text-align: center;'>Total:</th>
		<th></th>
		<th></th>
		<th></th>
		<th style='text-align: center;'><?php echo $quantidade; if($quantidade == 1){ echo ' unidade';} else {echo ' unidades';} ?></th>
		<th></th>
		<th></th>
		<th style='text-align: center;'><?php echo 'R$ '.reverter_float($preco_total_vendas); ?></th>
	</tr>
</table>
<table><tr><td><a href='<?php echo $_SERVER['PHP_SELF']?>' class='btn btn-primary'>Limpar Relatorio</a></td></tr></table>
<?php endif; ?>