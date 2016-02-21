<?php 
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();

	$idUsuario = $_SESSION['idUsuario'];
	//$idUsuario = 2;
	$nombre = $_POST['nombreD'];
	$descripcion = $_POST['descripcionD'];
	
	$sqlDiarioN1 = 'INSERT INTO diarioDeViajero (nombre, descripcion, idUsuario) 
				VALUES ("'.$nombre.'", "'.$descripcion.'", '.$idUsuario.')';
	
	if(!mysqli_query($db->conectarse(), $sqlDiarioN1)){
	    echo('Ocurrio un error ejecutando el query de insert[' . mysqli_error() . ']');
		//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
	}else
		{
			echo '<html><head></head><body>
				<script language="javascript">
					window.location="diarios.php"
				</script>
				</body></html>';
		}

?>