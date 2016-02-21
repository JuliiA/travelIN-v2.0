<?php 
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();

	$idUsuario = $_SESSION['idUsuario'];
	//$idUsuario = 2;
	$nombre = $_POST['nombreE'];
	$direccion = $_POST['direccionE'];
	$precio = $_POST['precio'];
	$tipoEst = $_POST['ddlTipoE'];
	$provincia = $_POST['ddlProvinciaP'];
	$ciudad	= $_POST['ddlCiudadP'];
	
	$fotoNombre = $_FILES['fileFotoEstableci']['name'];
	$tipoArchivo = $_FILES['fileFotoEstableci']['type'];
	//foreach($_FILES['fileFotoEstableci']['name'] as $imagen=>$fotoNombre)
	//{
	$op = $_POST['op'];

	//if($_POST['op'] != 1)/*******	MODIFICAR	*********** 	SI NO ES CREAR 	*/
	if($op != 1)
	{
		//echo "*****1******";
		$idEstableci = $_POST['idEstableci'];	

		if($fotoNombre != '')
		{
			//echo "*****2******";
			if( $tipoArchivo == "image/jpeg" OR $tipoArchivo =="image/gif")
			{
				$Extencion = explode('.' , $fotoNombre);
				//$destino = 'fotoEstablecimiento/Img-'.$idEstableci.'-'.rand(10, 30).'_'.rand(10, 30).'_'.rand(10, 30).'.'.$Extencion[1];
				$destino = 'fotoAnuncio/Img-'.$idEstableci.'.'.$Extencion[1];
/**** un if x si id es nulo **/
				if(!(($idEstableci < 1) || (is_null($idEstableci)) || ($idEstableci == '')))
				{			
					include 'redimensionar.php';

					$tipo = 0;
					if( $tipoArchivo == "image/jpeg")
					{
						$tipo = 1;
					}else
						{
							if( $tipoArchivo =="image/gif")
							{
								$tipo = 2;
							}
						}

					$origen=$_FILES['fileFotoEstableci']['tmp_name'];

					if(!redimensionarI($origen, 286, 165, $destino, $tipo))
					{
						//echo "*****3******";
						$valido = 1;
						$sql1 = 'UPDATE establecimiento SET nombre="'.$nombre.'", direccion="'.$direccion.'", 
								idTipoEstableci='.$tipoEst.', idCiudad='.$ciudad.', precio='.$precio.', rutaFotoEstableci="'.$destino.'" 
								WHERE idEstableci='.$idEstableci.' AND idUsuario='.$idUsuario;

						if(!mysqli_query($db->conectarse(), $sql1))
						{
							echo('Ocurrio un error ejecutando el query de actualizacion [' . mysqli_error() . ']');
						}
						//echo "lululu";
					//if(copy($_FILES['fileFotoEstableci']['tmp_name'][$imagen] , $destino))
					//if(copy($_FILES['fileFotoEstableci']['tmp_name'] , $destino))
					//{
					}else
						{
							echo('<Li>No se pudo subir la foto: <B>'.$fotoNombre.'</B> </Li>');
						}
				}
			}else
				{
					//echo "*****4******";
					$valido = 0;
					echo ('<html><head>
								<script type="text/javascript">
									function confirm_alert()
									{
										alert("Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos.");
									}
								</script>
							</head><body>
							
							<script>
								confirm_alert();
								window.location="panel.php"
							</script>
							</body></html>');

					//echo ($valido);
				}

		}else
			{
				//echo "*****5******";
				$valido = 1;
				/*
				$sql1 = 'UPDATE establecimiento SET nombre="'.$nombre.'", direccion="'.$direccion.'", 
						idTipoEstableci='.$tipoEst.', idCiudad='.$ciudad.', precio='.$precio.' 
						WHERE idEstableci='.$idEstableci.' AND idUsuario='.$idUsuario;
				*/
				$sql1 = 'UPDATE establecimiento SET nombre="'.$nombre.'", direccion="'.$direccion.'",
						idTipoEstableci='.$tipoEst.', idCiudad='.$ciudad.', precio="'.$precio.'"
						WHERE idEstableci='.$idEstableci;
				//$sql1 = 'SELECT nombre FROM establecimiento WHERE idEstableci = 3';

				//echo "*****6******";
				$resul1 = mysqli_query($db->conectarse(), $sql1) or die(mysqli_error());
				//$Rs1 = mysqli_fetch_array($resul1);
				//if(!($cons1 = mysqli_query($db->conectarse(), $sql1)))
				//{
					//echo ('Ocurrio un error ejecutando el query de actualizacion ['.mysqli_error().']');
				//	echo "error al actualizar";
				//}
				//echo "lololo";
				//echo $Rs1['nombre'];
				//echo "*****7******";
			}

	}else/*	SI ES CREAR 	****************************************/
		{
			/*	agregar que cambie de estado a inactivo si hay uno activo ya	*/
			$valido = 1;

			$sqlCR1 = 'INSERT INTO establecimiento (nombre, direccion, idUsuario, idTipoEstableci, idCiudad, precio, idEstado) 
						VALUES ("'.$nombre.'", "'.$direccion.'", "'.$idUsuario.'", "'.$tipoEst.'", "'.$ciudad.'", "'.$precio.'", 2)';
			
			if(!mysqli_query($db->conectarse(), $sqlCR1)){
			    echo('Ocurrio un error ejecutando el query de insert[' . mysqli_error() . ']');
				//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
			}else
				{
					if($fotoNombre != '')
					{
						$sqlCR2 = 'SELECT idEstableci FROM establecimiento WHERE idUsuario='.$idUsuario.' AND idEstado = 2';
								
						if(!($consultaCR2=mysqli_query($db->conectarse(), $sqlCR2)))
						{
							echo('Ocurrio un error ejecutando el query de busqueda del establecimiento[' . mysqli_error() . ']');
					//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
						}else
							{
								$RsCR2 = mysqli_fetch_assoc($consultaCR2);
									
								$idEstableci = $RsCR2['idEstableci'];
								//if(!(($idEstableciBD < 1) || (is_null($idEstableciBD)) || ($idEstableciBD == '')))
								//$fotoNombre = $_FILES['fileFotoEstableci']['name'];
								//$tipoArchivo = $_FILES['fileFotoEstableci']['type'];
			//foreach($_FILES['fileFotoEstableci']['name'] as $imagen=>$Nombre)
			//{
							//if($fotoNombre != '')
							//{
								if( $tipoArchivo == "image/jpeg" OR $tipoArchivo =="image/gif")
								{
									$Extencion = explode('.' , $fotoNombre);
									//$destino = 'fotoEstablecimiento/Img-'.$idEstableci.'-'.rand(10, 30).'_'.rand(10, 30).'_'.rand(10, 30).'.'.$Extencion[1];
									$destino = 'fotoAnuncio/Img-'.$idEstableci.'.'.$Extencion[1];

									/*************************************************/
									//$rtOriginal=$_FILES['fileFotoEstableci']['tmp_name'][$imagen];
									
									include 'redimensionar.php';

									$origen=$_FILES['fileFotoEstableci']['tmp_name'];

									//if(copy($_FILES['fileFotoEstableci']['tmp_name'][$imagen] , $destino))
									$tipo = 0;
									if( $tipoArchivo == "image/jpeg")
									{
										$tipo = 1;
									}else
										{
											if( $tipoArchivo =="image/gif")
											{
												$tipo = 2;
											}
										}

									if(!redimensionarI($origen, 286, 165, $destino, $tipo))
									{
										$valido =1;
										$sqlCR3 = 'UPDATE establecimiento SET rutaFotoEstableci="'.$destino.'" WHERE
											  		idEstableci='.$idEstableci.' AND idUsuario='.$idUsuario;

										if(!mysqli_query($db->conectarse(), $sqlCR3))
										{
											echo('Ocurrio un error ejecutando el query de actualizacion[' . mysqli_error() . ']');
										}
									}
									/*}else
										{
											echo('Ocurrio un error ejecutando la operacion de busqueda de establecimiento [' . mysqli_error() . ']');
										}*/
								}else
									{
										
										$valido = 0;
										echo ('<html><head>
													<script type="text/javascript">
														function confirm_alert()
														{
															alert("Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos.");
														}
													</script>
												</head><body>
												
												<script>
													confirm_alert();
													window.location="panel.php"
												</script>
												</body></html>');
										
										//echo ($valido);
									}
							}


					}else
						{
							$valido = 0;
							/*
							$sql1 = 'UPDATE establecimiento SET nombre="'.$nombre.'", direccion="'.$direccion.'", descripcion="'.$descripcion.'", 
									idTipoEstableci='.$tipoEstablecimiento.', idCiudad='.$ciudad.' 
									WHERE idEstableci='.$idEstableci.' AND idUsuario='.$idUsuario;
							*/
							//echo "lololo";
						}
				}
		}

	echo '<html><head></head><body>
			<script language="javascript">
				window.location="panel.php"
			</script>
			</body></html>';

/*			
echo 'id ususario ='.$idUsuario.'
	nombre ='.$nombre.'
	direccion='.$direccion.'
	precio='.$precio.'
	tipo establecimiento ='.$tipoEst.'
	provincia='.$provincia.'
	ciudad='.$ciudad.'
	operacion ='.$op;
*/	
	//$fotoNombre = $_FILES['fileFotoEstableci']['name'];
	//$tipoArchivo = $_FILES['fileFotoEstableci']['type'];

?>