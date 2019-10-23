
//Muestra un alert si alguno de los campos no esta relleno
function primeraValidacion(){
	var usr = document.getElementById('usr').value;
	var pwd = document.getElementById('pwd').value;

	if(usr=='' || pwd == ''){
		alert('algun campo esta vacio!');
		return false;

	}else{
		return true;
	}	

}
