<?php 
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();

	$idUsuario = $_SESSION['idUsuario'];
	//$idUsuario = 2;
	$nombre = $_POST['nombreU'];
	$apellido = $_POST['apellidoU'];
	$nick = $_POST['nickU'];
	$ciudad = $_POST['ddlCiudadP'];

	$fotoNombre = $_FILES['fileFotoPerfil']['name'];
	$tipoArchivo = $_FILES['fileFotoPerfil']['type'];

	if($fotoNombre != '')
	{
		//echo "*****2******";
		if( $tipoArchivo == "image/jpeg" OR $tipoArchivo =="image/gif")
		{
			$Extencion = explode('.' , $fotoNombre);
			//$destino = 'fotoEstablecimiento/Img-'.$idEstableci.'-'.rand(10, 30).'_'.rand(10, 30).'_'.rand(10, 30).'.'.$Extencion[1];
			$destino = 'imagenes/imgPerfil/perfil_'.$idUsuario.'.'.$Extencion[1];
/**** un if x si id es nulo **/
			if(!(($idUsuario < 1) || (is_null($idUsuario)) || ($idUsuario == '')))
			{			
				include 'redimensionar.php';

				$tipo = 0;
				if( $tipoArchivo == "image/jpeg")
				{
					$tipo = 1;
				}else
					{
						if( $tipoArchivo == "image/gif")
						{
							$tipo = 2;
						}
					}

				$origen = $_FILES['fileFotoPerfil']['tmp_name'];

				if(!redimensionarI($origen, 68, 68, $destino, $tipo))
				{
					//echo "*****3******";
					//$valido = 1;
					$sql1 = 'UPDATE usuario SET nombre = "'.$nombre.'", apellido = "'.$apellido.'", 
							nick = "'.$nick.'", idCiudad = '.$ciudad.', nombreFotoPerfil = "'.$destino.'" 
							WHERE idUsuario = '.$idUsuario;

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
				//$valido = 0;
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
							window.location="perfilP.php"
						</script>
						</body></html>');

				//echo ($valido);
			}

	}else
		{
			//echo "*****5******";
			//$valido = 1;
			/*
			$sql1 = 'UPDATE establecimiento SET nombre="'.$nombre.'", direccion="'.$direccion.'", 
					idTipoEstableci='.$tipoEst.', idCiudad='.$ciudad.', precio='.$precio.' 
					WHERE idEstableci='.$idEstableci.' AND idUsuario='.$idUsuario;
			*/
			$sql1 = 'UPDATE usuario SET nombre = "'.$nombre.'", apellido = "'.$apellido.'", 
							nick = "'.$nick.'", idCiudad = '.$ciudad.' 
							WHERE idUsuario = '.$idUsuario;
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

	echo '<html><head></head><body>
			<script language="javascript">
				window.location="perfilP.php"
			</script>
			</body></html>';

?>