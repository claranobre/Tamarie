<table><tr><td style='height: 60px;'></td></tr><tr><td style='height: 100px; width: 590px;'></td><td><h2>Clientes</h2></td></tr></table>


<table class='table table-bordered'>
	<tr>
		<th style='text-align: center;'>Nome</th>
		<th style='text-align: center;'>Telefone</th>
		<th style='text-align: center;'>Cpf</th>
		<th style='text-align: center;'>Endereço</th>
		<th style='text-align: center;'>Divida</th>
		<th style='text-align: center;'>Data de Pagamento</th>	
		<th style='text-align: center;'>Alterar</th>
		<th style='text-align: center;'>Remover</th>
		<th style='text-align: center;'>Pagar Dívida</th>
	</tr>

<?php 
	$clientes = select_all('clientes');
	foreach ($clientes as $cliente):
		if ($cliente['divida'] == 0){
			$cliente['status'] = 'quite'; 
		}
		
?>
	<tr>
		<td style='text-align: center;'><?php echo $cliente['nome']?></td>
		<td style='text-align: center;'><?php echo $cliente['telefone']?></td>
		<td style='text-align: center;'>
			<?php
				if ($cliente['cpf'] == ''){
					echo 'Cpf nao informado';
				}
				else{
				echo $cliente['cpf'];
				}
			?>
		</td>
		<td style='text-align: center;'><?php echo $cliente['endereco']?></td>
		<td style='text-align: center;'>
			<?php 
				if ($cliente['status'] == 'quite'){
					echo 'sem divida';
				}
				else{
				echo 'R$ '.$cliente['divida'];
				}
			?>
		</td>
		<td style='text-align: center;'>
			<?php 
				if ($cliente['status'] == 'quite' || $cliente['data_pagamento'] == '0000-00-00'){
					echo 'sem pagamento agendado';
				}
				else{
				echo converter_data($cliente['data_pagamento']);
				}
			?>
		</td style='text-align: center;'>	
		<?php 
		    if ($cliente['status'] == 'quite'):
		?>
		<td style='text-align: center;'><a class='btn' href='/<?php echo BASE; ?>/index.php/clientes/alterar/?id=<?php echo $cliente['id']; ?>'>Alterar</a></td>
		<td style='text-align: center;'><a class='btn btn-danger' href='/<?php echo BASE; ?>/index.php/clientes/remover/?id=<?php echo $cliente['id']; ?>'>Remover</a></td>
		<td style='text-align: center;'><a class='btn btn-success disabled' disabled='disabled' href='#' onclick='pagar_cliente_sem_divida()'>Pagar</a></td>
		<?php  
		    endif;
		    if ($cliente['status'] == 'em divida'):
		?>
		<td style='text-align: center;'><a class='btn' href='/<?php echo BASE; ?>/index.php/clientes/alterar/?id=<?php echo $cliente['id']; ?>'>Alterar</a></td>
		<td style='text-align: center;'><a class='btn btn-danger disabled' disabled='disabled' href='#' onclick='remover_cliente_endividado()'>Remover</a></td>
		<td style='text-align: center;'><a class='btn btn-success' href='/<?php echo BASE; ?>/index.php/clientes/pagar_divida/?id=<?php echo $cliente['id']; ?>'>Pagar</a></td>
		<?php  
		    endif;
		?>
	</tr>
	
<?php  
    endforeach;
?>
			
</table>

