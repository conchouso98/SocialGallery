<html>
<head>
	<!-- En el head vamos a establecer la codificación del codifo y a coger la hoja de estilos que queremos utilizar en este caso bootstrap -->
	<meta charset="utf-8">
	<title>Social Gallery</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    	<!-- Scripts de bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script>
    	function repe(){
    		$('#repetida').modal('show');
    	}
		function orden_titu(){
			window.location.href = "index.php?query=order by name ASC";
		} 

		function orden_fech(){
			window.location.href = "index.php?query=order by date DESC";
		} 
    </script>

</head>
<?php include('header.php'); ?>
<body class="bg-secondary">
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4 rounded bg-primary d-flex justify-content-center border border-dark m-5 p-3 "><h1>Social Gallery</h1></div>
		<div class="col-4"></div>
	</div>

<!-- Modal -->
<div class="modal fade" id="repetida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto ya existente!!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>Esta foto ya existe en la base de datos.</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<div class="row m-5">
		<div class="col-3 bg-primary border border-dark rounded p-3">
			<form enctype="multipart/form-data" action="index.php" method="POST">
				<input type="file" name="archivo" id="archivo" accept="image/png, .jpeg, .jpg, image/gif" required="required"><br /><br />
				<input type="hidden" name="MAX_FILE_SIZE" value="3000" />
				<input type="text" name="titulo" id="titulo" placeholder="Introduce el titulo." required="required"><br /><br />
				<input type="submit" name="Enviar">
			</form>
		</div>
		<div class="col-6 d-flex justify-content-center"></div>
		<div class="col-3"></div>
	</div>
	<div class="row m-5">
		<div class="col-3"></div>
		<div class="col-6"></div>
		<div class="col-3 bg-primary border border-dark rounded d-flex align-items-center">
			<p class="m-3" style="font-style: bold;font-size: 16px;">Ordenar por:</p>
			<button id="titulo_orden" type="button" class="btn btn-secondary btn-sm mx-2 px-2" onclick="orden_titu()">Titulo</button>
			<button id="fecha_orden" type="button" class="btn btn-secondary btn-sm mx-2 px-2" onclick="orden_fech()">Fecha más reciente</button>
		</div>
	</div>
	<div class="row m-5 text-center">
	<?php
 		include("connect.php"); 
		$usr = $_SESSION['usr'];
		if(!empty($_REQUEST['titulo']) AND isset($_REQUEST['titulo'])){
			$nombre = $_REQUEST['titulo'];
			$fecha =  date("Y-m-d");

					$fichero = 'imagenes/'.basename($_FILES['archivo']['name']);
					$sql ="SELECT count(*) as name, path FROM gallery WHERE path ='".$fichero."' AND user='$usr';";
					$result = $conn->query($sql);
				while ($fila = mysqli_fetch_row($result)) {			 
						if ($fila[0] != 0) {
							echo '<meta http-equiv="Refresh" content="0;URL=./index.php?error=1">';           					
						}else{
		 					if(move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero)){
								$sql ="INSERT INTO `gallery` (`id`, `name`, `path`, `date`,`user`) VALUES (NULL,'$nombre','$fichero','$fecha','$usr');";
									if ($conn->query($sql) === TRUE) {
			 							echo '<meta http-equiv="Refresh" content="0;URL=./index.php">';
									}else {
			    						echo "Error al insertar: " . $sql . "<br>Error:" . $conn->error;
											
									}
							}    
					}
				}				
		} else {

			if (!empty($_REQUEST['query']) AND isset($_REQUEST['query'])){
				$order = $_REQUEST['query'];
				$sql ="SELECT * FROM gallery ".$order." WHERE user='$usr';";
			}else{
				$sql ="SELECT * FROM gallery WHERE user='$usr';";
			}
			$result = $conn->query($sql);
			$i = 0;
			$e = 1;
			while($row = $result->fetch_assoc()) {
	    		echo '<div class="col-3 bg-primary p-5 justify-content-center align-items-center"><img class="m-3" style="max-width:100px;"src="'.$row["path"].'"><div class="bg-secondary"><h3>'.$row['name'].'</h3></div></div>';
	    		if ($i == 3){

	    			echo '</div><div class="row m-5 text-center">';
	    			$e++;
	    			$i = -1;
	    		}
	    		$i++;
		    }
		    $conn->close();
		}

		
				if (!empty($_REQUEST['error'])){
					echo "<script>repe();</script>";
				}
	?>
	</div>

</body>
</html>