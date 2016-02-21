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
	
	$sqlParadaN1 = 'INSERT INTO parada (idDiario, descripcion, fecha, idEstado) 
				VALUES ('.$idDiario.', "'.$descripcion.'", "'.$fechaFormateada.'", 2)';
	
	if(!mysqli_query($db->conectarse(), $sqlParadaN1)){
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