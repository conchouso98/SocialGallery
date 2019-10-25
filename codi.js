
//Muestra un alert si alguno de los campos no esta relleno
function primeraValidacion(){
	var usr = document.getElementById('usr').value;
	var pwd = document.getElementById('pwd').value;

	if(usr==''){
		alert('USUARIO esta vacio!');
		return false;

	}else if(pwd == ''){
		alert('PASSWORD esta vacio!');
		return false;
	}else{
		return true;
	}
		

}
function segundaValidacion(){
	var tit = document.getElementById('titulo').value;
	var arc = document.getElementById('archivo').value;

	if(tit == ''){
		alert('TITULO esta vacio!');
		return false;

	}else if(arc == ''){
		alert('ARCHIVO esta vacio!');
		return false;
	}else{
		return true;
	}

}
