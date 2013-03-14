<div class="navbar">
	<div class="navbar-inner">
	    <a class="brand" href="\<?php echo BASE; ?>">Tamarie</a>
        <ul class="nav">
        	<li class="dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cliente<b class="caret"></b></a>
    			<ul class="dropdown-menu">
			     	<li><a href='/<?php echo BASE; ?>/index.php/clientes/listar/'>Listar Clientes</a></li>
			     	<li><a href='/<?php echo BASE; ?>/index.php/clientes/cadastrar/'>Cadastrar Cliente</a></li>
    			</ul>
  			 </li>
  			 <li class="dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Estoque<b class="caret"></b></a>
    			<ul class="dropdown-menu">
			     	<li><a href='/<?php echo BASE; ?>/index.php/estoque/listar/'>Listar Estoque</a></li>
			     	<li><a href='/<?php echo BASE; ?>/index.php/estoque/cadastrar/'>Cadastrar Estoque</a></li>
    			</ul>
  			 </li>
  			 <li class="dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Vendas<b class="caret"></b></a>
    			<ul class="dropdown-menu">
			     	<li><a href='/<?php echo BASE; ?>/index.php/vendas/listar/'>Listar Vendas</a></li>
			     	<li><a href='/<?php echo BASE; ?>/index.php/vendas/cadastrar/'>Cadastrar Venda</a></li>
			     	<li><a href='/<?php echo BASE; ?>/index.php/vendas/relatorio/'>Relatorio de Vendas</a></li>
    			</ul>
  			 </li>
          <li><a href='#' onclick='logout()'><?php echo $_SESSION['login'].' (Logout)'; ?></a></li> 
        </ul>
	</div>
</div>