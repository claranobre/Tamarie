<?php include_once('controle/globais.php') ?>
<br /><br />
<h2>Sistema TAMARIE</h2>
<table>
	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
		<tr>
			<td>Login: </td>
			<td><input name='login' required/></td>
		</tr>
		<tr>
			<td>Senha: </td>
			<td><input name='senha' type='password' required/></td>
		</tr>
		<tr>
			<td><button type='submit'>Enviar</button>
		</tr>
	</form>
</table>

<?php 

	if (count($_POST) > 0){

		$sql='SELECT * FROM users WHERE login =\''.$_POST['login'].'\';';
		$resultado=mysql_query($sql);
		$usuario=mysql_fetch_assoc($resultado);

		if ($usuario && $usuario['senha'] == md5($_POST['senha'])) {
			$_SESSION['login'] = $usuario['login'];
			ob_clean();
			header('LOCATION: /'.BASE.'/index.php/estoque/listar/');
		}
		else {
			ob_clean();
			header('LOCATION: /Tamarie/login.php/');
		}
	}

?>