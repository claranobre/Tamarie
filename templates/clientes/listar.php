<br /><br />
<h2>Lista de Clientes</h2>


<table class='lista'>
	<tr>
		<th>Nome</th>
		<th>Telefone</th>
		<th>Cnpj</th>
		<th>Endereço</th>
		<th>Divida</th>
		<th>Data de Pagamento</th>
		<th>Status de Pagamento</th>
	</tr>

<?php 
	$clientes = select_all('clientes');
	foreach ($clientes as $cliente):
?>
	<tr>
		<td><?php echo $cliente['nome']?></td>
		<td><?php echo $cliente['telefone']?></td>
		<td><?php echo $cliente['cnpj']?></td>
		<td><?php echo $cliente['endereco']?></td>
		<td>Divida</td>
		<td>Data Pagamento</td>
		<td>Status Pagamento</td>
		<td><a href='/<?php echo BASE; ?>/index.php/clientes/pagar_divida/?id=<?php echo $cliente['id']; ?>'>Pagar Divida</a></td>
		<td><a href='/<?php echo BASE; ?>/index.php/clientes/alterar/?id=<?php echo $cliente['id']; ?>'>Alterar</a></td>
		<td><a href='/<?php echo BASE; ?>/index.php/clientes/remover/?id=<?php echo $cliente['id']; ?>'>Remover</a></td>
	</tr>
	
<?php  
    endforeach;
?>
			
</table>

