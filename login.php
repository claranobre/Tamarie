<?php include_once('controle/globais.php') ?>
<html>
	<link rel="stylesheet" type="text/css" href="/<?php echo BASE?>/estaticos/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/<?php echo BASE?>/estaticos/datepicker/css/datepicker.css">	

	<table><tr><td style='height: 160px;'></td></tr><tr><td style='width: 500px;'></td><td><h2>Sistema TAMARIE</h2><td></tr></table>
	<table>
		<form class="navbar-form pull-left" action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>
			<tr>
				<td style='width: 520px;'></td>
				<td style='text-align: right'>Login: </td>
				<td><input class='span2' name='login' required/></td>
			</tr>
			<tr>
				<td></td>
				<td style='text-align: right'>Senha: </td>
				<td><input class='span2' name='senha' type='password' required/></td>
			</tr>
			<tr>
				<td></td>
				<td><button class="btn"  type='submit'>Enviar</button>
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
</html>