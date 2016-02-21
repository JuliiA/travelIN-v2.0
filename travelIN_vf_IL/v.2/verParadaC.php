<?php 
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();

	$idUsuario = $_SESSION['idUsuario'];
	//$idUsuario = 2;
	$idDiario = $_POST['idDiario'];
	$fecha = $_POST['fechaP'];
	$descripcion = $_POST['descripcionP'];
	$estado = $_POST['ddlEstado'];
	//$provincia = $_POST['ddlProvinciaP'];
	//$ciudad = $_POST['ddlCiudadP'];
	$idEstableci = $_POST['ddlEstableciP'];
	$otroLugar = $_POST['otroLugarP'];
	$idParada = $_POST['idParada'];

	$fecha = str_replace("ENE","JAN",$fecha);
	$fecha = str_replace("ABR","APR",$fecha);
	$fecha = str_replace("AGO","AUG",$fecha);
	$fecha = str_replace("DIC","DEC",$fecha);

	$fecha = strtotime($fecha);
	$aaaa = date("Y", $fecha);
	$mm = date("m", $fecha);
	$dd = date("d", $fecha);

	$fechaFormateada = $aaaa.'/'.$mm.'/'.$dd;
	//$fechaFormateada = strtotime($fechaFormateada);
	//echo $fechaFormateada;
	$nulo = "NULL";

	if(($idEstableci != 0) && ($idEstableci != -1)) {
		$sqlParadaM1 = 'UPDATE parada SET descripcion = "'.$descripcion.'", fecha = "'.$fechaFormateada.'", idEstado = '.$estado.', 
						idEstableci = '.$idEstableci.', defaultLugar = NULL WHERE idParada = '.$idParada;
	}else
		{
			if($idEstableci == -1) {
				$sqlParadaM1 = 'UPDATE parada SET descripcion = "'.$descripcion.'", fecha = "'.$fechaFormateada.'", idEstado = '.$estado.', 
								idEstableci = "NULL", defaultLugar = "'.$otroLugar.'" 
								WHERE idParada = '.$idParada;
			}else
				{
					$sqlParadaM1 = 'UPDATE parada SET descripcion = "'.$descripcion.'", fecha = "'.$fechaFormateada.'", idEstado = '.$estado.', 
									idEstableci = "NULL", defaultLugar = "NULL" 
									WHERE idParada = '.$idParada;
				}
		}
/*
	$sqlParadaM1 = 'UPDATE parada SET descripcion = '.$descripcion.', fecha = '.$fechaFormateada.', idEstado = '.$estado.', 
					idEstableci = '.$idEstableci.', defaultLugar = '.$otroLugar.' 
					WHERE idParada = '.$idParada;
*/
	if(!mysqli_query($db->conectarse(), $sqlParadaM1)){
	    echo('Ocurrio un error ejecutando el query de insert[' . mysqli_error() . ']');
	}else
		{
			echo '<html><head></head><body>
				<script language="javascript">
					window.location="paradas.php?num='.$idDiario.'"
				</script>
				</body></html>';
		}
		
/*
	echo $fecha;
	$fecha = str_replace("ENE","JAN",$fecha);
	$fecha = str_replace("ABR","APR",$fecha);
	$fecha = str_replace("AGO","AUG",$fecha);
	$fecha = str_replace("DIC","DEC",$fecha);
	//$fecha = str_replace("-"," ",$fecha);
	echo '<br>'.$fecha.'<br>';
	//$ahora= $fecha;
	//$ahora = strtotime('12-feb-2015');
	$ahora = strtotime($fecha);
	$anno = date("Y",$ahora);
	$mes = date("m",$ahora);
	$dia = date("d",$ahora);
	echo '<br>Día: '.$dia.'<br>Mes: '.$mes.'<br>Año: '.$anno;
*/
?>