
<!DOCTYPE html>
<html>

<head>
	<!-- En el head vamos a establecer la codificación del codifo y a coger la hoja de estilos que queremos utilizar en este caso bootstrap -->
	<meta charset="utf-8">
	<title>LOGIN</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    	<!-- Scripts de bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="codi.js"></script>

</head>
<body class="bg-secondary">
	<form action="login1.php" method="POST" onsubmit="return primeraValidacion()">
		<div class="row m-5" >
			<div class="col-4"></div>
			<div class="col-4 bg-primary form-control p-5 text-center" style="height: 90px;">
				<h1 class="text-white">LOGIN DE USUARIO</h1>
			</div>
			<div class="col-4"></div>
		</div>
		<div class="row m-5">
			<div class="col-4"></div>
			<div class="col-4 bg-primary form-control p-5">
				<input type="text" name="usr" id="usr" placeholder="conchouso">
				<input type="password" name="pwd" id="pwd">
				<input type="submit" name="enviar">
			</div>
			<div class="col-4"></div>
		</div>
	</form>
</body>
</html>