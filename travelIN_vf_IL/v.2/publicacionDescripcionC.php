<?php 
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();

	$idUsuario = $_SESSION['idUsuario'];

	$sqlDesc1 = 'SELECT idEstableci FROM establecimiento WHERE idUsuario='.$idUsuario.' AND idEstado = 2';
								
	if(!($consultaDesc1 = mysqli_query($db->conectarse(), $sqlDesc1)))
	{
		echo('Ocurrio un error ejecutando el query de busqueda del establecimiento[' . mysqli_error() . ']');
//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
	}else
		{
			$RsDesc1 = mysqli_fetch_assoc($consultaDesc1);
				
			$idEstableci = $RsDesc1['idEstableci'];
			$descripcion = $_POST['editor1'];
			//$descripcion = mysqli_real_escape_string($db, $descripcion0);
			//$descripcion = $mysqli->real_escape_string($descripcion);
			$descripcion = mysql_real_escape_string($descripcion);

			//echo 'idEstableci ='.$idEstableci.'<br>usuario='.$idUsuario.'<br>descripcion='.$descripcion.'<br>FIN............';

			$sqlDesc2 = 'UPDATE establecimiento SET descripcion ="'.$descripcion.'" 
						WHERE idEstableci ='.$idEstableci.' AND idUsuario ='.$idUsuario;

			if(!mysqli_query($db->conectarse(), $sqlDesc2))
			{
				    echo('Ocurrio un error ejecutando la query de actualizacion [' . mysqli_error() . ']');
			}else
				{
					echo '<html><head></head><body>
							<script language="javascript">
								window.location="panel.php"
							</script>
						</body></html>';
				}

		}

?>