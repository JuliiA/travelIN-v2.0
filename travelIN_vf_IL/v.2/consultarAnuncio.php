<?php
session_start();
//include('coneccion.php');
require_once('reserva/classDisponibilidad.php');
require_once('reserva/classFecha.php');
//require_once('reserva/classHabitacion.php');
$clave = "nvw42rbhfbhrefb3i34";
$res = new disponibilidad(); 
$rv = new formato_fecha();

if(isset($_POST['btnReservar']))
{
	$estableci = $_POST['idEstableci'];
	$fechaInicio = $_POST['fechaInic'];
	$fechaFin = $_POST['fechaFin'];
	$cPersonas = $_POST['ddlCantP'];
	$observaciones = $_POST['observaciones'];
	$em = $_SESSION['idUsuario'];
	
	$fIni = $rv->cambiaf_a_mysql($fechaInicio);
	$fFin = $rv->cambiaf_a_mysql($fechaFin);
	
	$res->armarMensajeDisponibilidad($estableci,$fIni,$fFin,$cPersonas,$observaciones,$em);
	echo('<html><head><script type="text/javascript"> alert("Se ha enviado la solicitud de reserva ha su Administrador.\nEspere respuesta en su casilla de mensaje");window.location="index.php"</script></head><body></body></html>');
}
else
{
	if($_POST)
	{		
		$estableci = $_POST['establecimiento'];
	
		$consulta = $res->existenDisponibles($estableci);
		$idE = md5($clave.$estableci);
		if($consulta > 0)
			{			
				session_start();
				if(!isset($_SESSION['idUsuario']))
					header('location:verAnuncio.php?anuncio='.$estableci.'&t=suc');
				else{
					header('location:verAnuncio.php?anuncio='.$estableci.'&l=suc');
				}
			}
		else
			header('location:verAnuncio.php?anuncio='.$estableci.'&m=wr');
		//var_dump($consulta);
		/*if($res->puedeReservar($fechaInicio,$fechaFin))
		{
			
		}*/
	}
}
?>