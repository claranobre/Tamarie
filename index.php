<?php include_once('controle/rotas.php'); ?>


<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
            <!--<link rel="stylesheet" type="text/css" href="/<?php echo BASE?>/estaticos/estilo.css">-->
            <link rel="stylesheet" type="text/css" href="/<?php echo BASE?>/estaticos/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="/<?php echo BASE?>/estaticos/datepicker/css/datepicker.css">
        <title>Tamarie</title>
    </head>
    <body>
        <?php  
            if (!isset($_SESSION['login'])){
                header('LOCATION:/'.BASE.'/login.php');
            }
            include_once(TEMPLATES.'/geral/menu.php'); //adicionando menu
        	mostrar_conteudo(); //mostrar o template incluído
        ?>
        
    </body>
    <script type="text/javascript" src="/<?php echo BASE?>/estaticos/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/<?php echo BASE?>/estaticos/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/<?php echo BASE?>/estaticos/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/<?php echo BASE?>/estaticos/functions.js"></script>
</html>

