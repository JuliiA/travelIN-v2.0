<?php 
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();

	//$idUsuario = $_SESSION['idUsuario'];
	//$idUsuario = 2;
	$passActual = $_POST['passActual'];
	$passNuevo1 = $_POST['passNuevo1'];
	$passNuevo2 = $_POST['passNuevo2'];
	
	if (isset($_SESSION['idUsuario']))
	{
		$idUsuario = $_SESSION['idUsuario'];
	}else
		{
			echo ('<html><head>
						<script type="text/javascript">
							function confirm_alert3()
							{
								alert("Debe loguearse para modificar su password.");
							}
						</script>
					</head><body>
					
						<script>
							confirm_alert3();
							window.location="login.php"
						</script>
					</body></html>');
		}
	
	//$idDiario = $_GET['num'];

/***********************************************************************************************/
	if($passNuevo1 == $passNuevo2)
	{
		$sqlPass0 = 'SELECT password FROM usuario WHERE idUsuario='.$idUsuario;
		
		if(!($consultaPass0 = mysqli_query($db->conectarse(), $sqlPass0)))
		{
			echo('Ocurrio un error ejecutando el query de busqueda del perfil [' . mysqli_error() . ']');
		}else
			{
				$RsPass0 = mysqli_fetch_assoc($consultaPass0);

				$passDB = $RsPass0['password'];
			}

		if($passActual == $passDB)
		{
			$sqlPass1 = 'UPDATE usuario SET password = "'.$passNuevo1.'"
							WHERE idUsuario = '.$idUsuario;

			if(!mysqli_query($db->conectarse(), $sqlPass1))
			{
				echo('Ocurrio un error ejecutando el query de actualizacion [' . mysqli_error() . ']');
			}else
				{
					echo ('<html><head>
							<script type="text/javascript">
								function confirm_passCambiado()
								{
									alert("Su password se ha actualizado con exito.");
								}
							</script>
							</head><body>
							
								<script>
									confirm_passCambiado();
									window.location="perfilP.php"
								</script>
							</body></html>');
				}

		}else
			{
				echo ('<html><head>
						<script type="text/javascript">
							function confirm_passDist0()
							{
								alert("Su password es incorrecto.");
							}
						</script>
						</head><body>
						
							<script>
								confirm_passDist0();
								window.location="perfilPassP.php"
							</script>
						</body></html>');
			}
	}else
		{
			echo ('<html><head>
						<script type="text/javascript">
							function confirm_passDist1()
							{
								alert("El password nuevo no coincide con su repetición.");
							}
						</script>
					</head><body>
					
						<script>
							confirm_passDist1();
							window.location="perfilPassP.php"
						</script>
					</body></html>');
		}

?>