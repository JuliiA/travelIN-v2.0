<?php 
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();
	$idUsuario = $_SESSION['idUsuario'];
	$palabra = $_GET['n'];

	$sqlValidarUs0 = 'SELECT * FROM usuario';
	//$sqlValidarUs0 = 'SELECT * FROM usuario WHERE idUsuario != '.$idUsuario;
		
	if(!($consultaValidarUs0 = mysqli_query($db->conectarse(), $sqlValidarUs0)))
	{
		echo('Ocurrio un error ejecutando el query de verificación de nombre de usuario [' . mysqli_error() . ']');
	}else
		{
			$encontrado = false;
			$logo = 0;
			while (($RsValidarUs0 = mysqli_fetch_assoc($consultaValidarUs0)) && ($encontrado == false))
			{
				if(($RsValidarUs0['nick'] == $palabra) AND ($RsValidarUs0['idUsuario'] == $idUsuario))
				{
					$encontrado = true;//es el mismo nick del usuario actual
					//echo '<div id="" style="width:18px;height:30px;background:green;border-radius:15px;position:absolute;" ></div>';
					//echo '<img class="imgNick" src="imagenes/Tilde_Verde.png" />';
				}else
					{
						if($RsValidarUs0['nick'] == $palabra)
						{
							//echo 'invalido';
							$encontrado = true;//el nick ya lo tiene otro usuario
							$logo = 1;
							//echo '<div id="" style="width:18px;height:30px;background:red;border-radius:15px;position:absolute;" ></div>';
							//echo '<img class="imgNick" src="imagenes/Cruz_Roja.png" />';
						}else
							{
								//echo 'permitido';
								$encontrado = false;
								$logo = 2;
								//echo '<div id="" style="width:18px;height:30px;background:green;border-radius:15px;position:absolute;" ></div>';
								//echo '<img class="imgNick" src="imagenes/Tilde_Verde.png" />';
							}
					}
			}

			if($logo == 1) {
				echo '<img class="imgNick" src="imagenes/Cruz_Roja.png" />	Nombre no disponible.';
				/*echo '<style>
						#txtHint
						{
							background-image: url(../imagenes/Cruz_Roja.png);
						}
					</style>';*/
			}else
				{
					if($logo == 2) {
						echo '<img class="imgNick" src="imagenes/Tilde_Verde.png" /> 	Nombre disponible.';
						/*echo '<style>
								#txtHint
								{
									background-image: url(../imagenes/Tilde_Verde.png);
								}
							</style>';*/
					}else
						{
							echo '<img class="imgNick" src="imagenes/Imagen_Nick_Vacia.png" />';
							/*echo '<style>
									#txtHint
									{
										background-image: url(../imagenes/Imagen_Nick_Vacia.png);
									}
								</style>';*/
						}
				}

			//$passDB = $RsPass0['password'];
		}

//		echo $logo;
/*
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
*/
?>