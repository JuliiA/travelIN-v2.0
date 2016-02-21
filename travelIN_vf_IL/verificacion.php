<?php 
	//session_destroy();
	session_start();

	$email = $_POST['email'];
	$pass = $_POST['password'];
	
	include 'coneccion.php';
	$db = new Conexion();
/*
	$db = new mysqli($dbServidor, $dbUsuario, $dbPassword, $dbAUsar);

	if($db->connect_errno > 0){
	    die('Imposible conectar [' . $db->connect_error . ']');
	    //echo 'Imposible conectar';
	}
*/	 
	$sql = 'SELECT * FROM usuario WHERE email="'.$email.'" and password="'.$pass.'"';
	 
	if(!$resultado = mysqli_query($db->conectarse(), $sql)){
	    die('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
	    //echo 'Ocurrio un error ejecutando el query';
	}
	
	$cantResultados = $resultado->num_rows;
	if($cantResultados > 1)
	{
		die('Datos malos, hay mas de un registro con esos datos.');
		//echo 'Datos malos, hay mas de un registro con esos datos.';
	}else
		{
			if($cantResultados != 1)
			{
				mysqli_close($db);
				header("location: index.php?error=f");
				/*die('No se encontró un registro con esos datos.');
				//echo 'No se encontró un registro con esos datos.';
				echo '<html><head></head><body>';
				echo '<script language="javascript">';
				echo 'window.location="error.php"';
				echo '</script>';
				echo '</body></html>';*/
			}else
				{
					if($cantResultados == 1)
					{
						$fila = $resultado->fetch_assoc();
						
						$_SESSION['idUsuario'] = $fila['idUsuario'];
						$_SESSION['nick'] = $fila['nick'];
						$_SESSION['fotoPerfil'] = $fila['nombreFotoPerfil'];
						
						mysqli_close($db);

						//echo 'logueado!!';
						echo '<html><head></head><body>';
						echo '<script language="javascript">';
						echo 'window.location="index.php"';
						echo '</script>';
						echo '</body></html>';
					}
				}
		}

	mysqli_close($db);

?>