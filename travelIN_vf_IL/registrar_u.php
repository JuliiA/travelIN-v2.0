<?php 
//	session_destroy();
	session_start();
//  VERIFICAR QUE LOS 2 PASSWORDS SEAN IGUALES????
	$nombre = $_POST['nombre'];
	$email = $_POST['emailReg'];
	$pass = $_POST['password1'];
		
	include 'coneccion.php';
	
	$db = new Conexion();
 
 	$sql = 'SELECT * FROM usuario WHERE email="'.$email.'"';
	//$sql = 'SELECT * FROM usuario WHERE email="'.$email.'" and password="'.$pass.'"';
	
	if(!$resultado = mysqli_query($db->conectarse(), $sql)){
	    die('Ocurrio un error ejecutando el query para ver si ya existe el mail [' . mysqli_error() . ']');
	    //echo 'Ocurrio un error ejecutando el query';
	}
	/*if(!$resultado = mysqli_query($db->conectarse(), $sql)){
	    die('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
	    //echo 'Ocurrio un error ejecutando el query';
	}
	*/
	$cantResultados = $resultado->num_rows;
	if($cantResultados >= 1)
	{
		mysqli_close($db);

		die('El mail usado ya esta registrado.');
		//echo 'Datos malos, hay mas de un registro con esos datos.';
	}else
		{
			$sql2 = 'INSERT INTO usuario (nombre, email, password) VALUES ("'.$nombre.'", "'.$email.'", "'.$pass.'")';
 
			if(!mysqli_query($db->conectarse(), $sql2)){
			     die('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
			}else
				{
	//				mysqli_close($db);	//WARNING
					echo ('<html><head>
								<script type="text/javascript">
									function confirm_alert()
									{
										alert("Ya puede loguearse en el sistema.");
									}
								</script>
							</head><body>
							
							<script>
								confirm_alert();
								window.location="index.php"
							</script>
							</body></html>');

					
				}

			 
			//echo 'Filas Insertadas: '.$db->affected_rows;
		}

//	mysqli_close($db);	//WARNING

?>