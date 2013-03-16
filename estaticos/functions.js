$('#dp2').datepicker();
$('#dp3').datepicker();

function del_produto(link){
	td = link.parentNode;
	tr = td.parentNode;
	tr.remove();
}

function remover_cliente_endividado(){
	alert('Não é possível remover um cliente que possui dívida');
}

function pagar_cliente_sem_divida(){
	alert('Esse cliente não possui dívidas');
}

function logout(){
	var check = confirm('Deseja mesmo deslogar do sistema Tamarie?')
	if (check){
		window.location = '/tamarie/logout.php';
	}
}

function add_produto(){
	var tb = document.getElementById('tabela');
	var tr = document.createElement("tr");
	tr.innerHTML = "</td><td></td><td><input class='span2' type='text' name='referencia[]' required /></td><td><input class='span2' type='text' name='quantidade[]' required /></td><td><input class='span2' type='text' name='desconto[]' placeholder='Ex.: 25%' /></td><td><a class='btn btn-danger' href='#' onClick='del_produto(this)'>remover</a></td>";
	tb.appendChild(tr);
}

function cancelar_venda(){
	var check = confirm('Deseja cancelar a venda?')
	if (check){
		window.location = '/tamarie/index.php/estoque/listar/';
	}
}

function mask(str,textbox,tipo){
	if (tipo == 'cpf'){
		var loc = '3,7,11';
		var delim = '.,.,-';

		var locs = loc.split(',');
		var delims = delim.split(',');

		for (var i = 0; i <= locs.length; i++){
			for (var k = 0; k <= str.length; k++){
			 	if (k == locs[i]){
			  		if (str.substring(k, k+1) != delims[i]){
			    		str = str.substring(0,k) + delims[i] + str.substring(k,str.length);
			 	 	}
			 	}
			}
		}
		textbox.value = str;
	}

	if (tipo == 'telefone'){
		var loc = '0,3,4,9';
		var delim = '(,), ,-';

		var locs = loc.split(',');
		var delims = delim.split(',');

		for (var i = 0; i <= locs.length; i++){
			for (var k = 0; k <= str.length; k++){
			 	if (k == locs[i]){
			  		if (str.substring(k, k+1) != delims[i]){
			    		str = str.substring(0,k) + delims[i] + str.substring(k,str.length);
			 	 	}
			 	}
			}
		}
		textbox.value = str
	}	
}