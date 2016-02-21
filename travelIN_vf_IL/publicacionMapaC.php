<?php 
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();

	$idUsuario = $_SESSION['idUsuario'];
	$idEstableci = $_POST['idEstableci'];
	/*
	$lat = $_POST['loglat'];
	$lng = $_POST['loglong'];

	$sqlMapa1 = 'UPDATE establecimiento SET lat ="'.$lat.'", lng ="'.$lng.'" 
					WHERE idEstableci = '.$idEstableci.' AND idUsuario = '.$idUsuario;

	if(!(mysqli_query($db->conectarse(), $sqlMapa1)))
	{
		echo('Ocurrio un error ejecutando el query de actualizacion [' . mysqli_error() . ']');
//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
	}else
		{
			echo '<html><head></head><body>
					<script language="javascript">
						window.location="publicacion.php"
					</script>
				</body></html>';
		}
	*/


	switch($_POST["btnFormMapa"]) { 
		case "Borrar Posición":
			$sqlMapa1 = 'UPDATE establecimiento SET lat = NULL, lng = NULL 
					WHERE idEstableci = '.$idEstableci.' AND idUsuario = '.$idUsuario;
		break; 
		case "Guardar Posición":
			$lat = $_POST['loglat'];
			$lng = $_POST['loglong'];
			$sqlMapa1 = 'UPDATE establecimiento SET lat ="'.$lat.'", lng ="'.$lng.'" 
					WHERE idEstableci = '.$idEstableci.' AND idUsuario = '.$idUsuario;
		break; 
		case "Cancelar": 
			echo '<html><head></head><body>
					<script language="javascript">
						window.location="publicacion.php"
					</script>
				</body></html>';
		break; 
	}

	if(!(mysqli_query($db->conectarse(), $sqlMapa1)))
	{
		echo('Ocurrio un error ejecutando el query de actualizacion [' . mysqli_error() . ']');
	}else
		{
			echo '<html><head></head><body>
					<script language="javascript">
						window.location="publicacion.php"
					</script>
				</body></html>';
		}

?>