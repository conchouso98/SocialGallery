<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="text-align: right;">
		<?php
		//Mantengo la sesión. Por ende puedo utilizar la variable $_SESSION anteriormente configurada
		session_start();
		if(isset($_SESSION['usr'])){
			echo "<a href='logout.php'>Cerrar sesión de ".$_SESSION['usr']."</a>&nbsp;&nbsp;";
		}else{
			header("Location: ./login.php");
		}
		?>
	</div> 
</body>
</html>