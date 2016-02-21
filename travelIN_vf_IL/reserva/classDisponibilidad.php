<?php

class disponibilidad
{
	/*var $id;
	var $periodoDesde;
	var $periodoHasta;
	var $idHabitacion;
	var $idEstableci;

	function __construct($id,$periodoDesde,$periodoHasta,$idHabitacion,$idEstableci){
		$this->id = $id;
		$this->periodoDesde = $periodoDesde;
		$this->periodoHasta = $periodoHasta;
		$this->habitacion = $idHabitacion;
		$this->idEstableci = $idEstableci;
	}*/
	
	function existenDisponibles($idestablecimiento)
	{
		require('coneccion.php');
		$con = new Conexion();
		$sql = sprintf('SELECT d.idDisponibilidad as dis,d.idHabitacion as habi,d.periodoDesde as desde,d.periodoHasta as hasta FROM disponibilidad d inner join habitacion h on d.idHabitacion = h.idHabitacion WHERE d.idEstableci='.$idestablecimiento.'');
		if(!$res = mysqli_query($con->conectarse(),$sql))
			die('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
		else
			{
				return $retorno = mysqli_num_rows($res); 
			}
	}
	
	function puedeReservar($to, $from, $u)
	{
		require('classFecha.php');
		$data = new formato_fecha();
		$correcto = $data->cambiaf_a_mysql($to);
		$correcfrom = $data->cambiaf_a_mysql($from);
		//var_dump($correcto);
//		var_dump($correcfrom);
		
		$stm = sprintf('SELECT d.idDisponibilidad as dis,d.idHabitacion as habi,d.periodoDesde as desde,d.periodoHasta as hasta FROM disponibilidad d inner join establecimiento e on d.idEstableci = e.idEstableci WHERE e.idUsuario = '.$u.' and d.periodoDesde >= "'.$correcto.'" and d.periodoHasta <= "'.$correcfrom.'"');
		//var_dump($stm);
		//exit();
		return $this->ejecutarConsultaDevolviendoResult($stm);
	}
	
	function ingresarNuevo($fi,$ff,$h,$e)
	{
		$con = new Conexion();
		require('classFecha.php');
		$data = new formato_fecha();
		$correcfi = $data->cambiaf_a_mysql($fi);
		$correcff = $data->cambiaf_a_mysql($ff);
		//var_dump($correcfi);var_dump($correcff);exit();
		$stm = sprintf('INSERT INTO disponibilidad (periodoDesde,periodoHasta,idHabitacion,idEstableci) VALUES ("'.$correcfi.'","'.$correcff.'",'.$h.','.$e.')');
		if (!$few = mysqli_query($con->conectarse(),$stm)) {
			print("Ocurrio un error al ingresar los datos: " . $stm->error . "n");
			exit;
		}
		else
		{	
			return 'Los datos se han guardado satisfactoriamente';
		}
	}
	
	function editarDatos($d)
	{
		$sql = sprintf('SELECT periodoDesde pd, periodoHasta ph, idHabitacion h, idEstableci e FROM disponibilidad WHERE idDisponibilidad ='.$d.'');
		return $this->ejecutarConsultaDevolviendoResult($sql);
	}
	
	function actualizarDatos($d,$fi,$ff,$h,$e)
	{
		$con = new Conexion();
		require('classFecha.php');
		$data = new formato_fecha();
		$correcfi = $data->cambiaf_a_mysql($fi);
		$correcff = $data->cambiaf_a_mysql($ff);
		$upd = 'UPDATE disponibilidad SET periodoDesde = "'.$correcfi.'",periodoHasta = "'.$correcff.'" WHERE idDisponibilidad ='.$d.'';
		
		if (!$few = mysqli_query($con->conectarse(),$upd)) {
			print("Ocurrio un error al ingresar los datos: " . $upd->error . "n");
			exit;
		}
		else
		{
			print('Los datos se han actualizado satisfactoriamente');
		}
	}
	
	function borrarSeleccionado($d)
	{
		$con = new Conexion();
		$del = 'DELETE FROM disponibilidad WHERE idDisponibilidad ='.$d;
		if (!$few = mysqli_query($con->conectarse(),$del)) {
			print("Ocurrio un error al ingresar los datos: " . $del->error . "n");
			exit;
		}	
		else
			print('El objeto se ha borrado correctamente');
	}
	
	function armarMensajeDisponibilidad($e,$fi,$ff,$c,$o,$em)
	{
		require('coneccion.php');
		$con = new Conexion();
		
		//require('classFecha.php');
		$data = new formato_fecha();
		$correcfi = $data->cambiaf_a_mysql($fi);
		$correcff = $data->cambiaf_a_mysql($ff);
		
		$user = sprintf('SELECT nombre,apellido from usuario where idUsuario ='.$em.'');
		$ejec = mysqli_query($con->conectarse(),$user);
		$rs = mysqli_fetch_assoc($ejec);
		
		$descripcion = "Este mensaje lo ha enviado ".$rs['apellido'].",".$rs['nombre']." para solicitar informacion sobre tu establecimiento. Más precisamente busca disponibilidad para las fechas comprendidas entre ".$fi." y " .$ff." y con capacidad para ".$c." personas. Para ello desea saber qué tipo(privada o publica) y cuantas habitaciones hay disponibles. Observacion particular : ".$o."";
		
		$stm = sprintf('insert into mensaje (descripcion,fechaEmitido,fec_consultaIni,fec_consultaFin,idUsuarioEscrib,idEstableci,leido) values ("'.$descripcion.'" ,NOW(),"'.$fi.'","'.$ff.'",'.$em.','.$e.',1)');
 
 		//var_dump($stm);exit();
		if (!$few = mysqli_query($con->conectarse(),$stm)) {
			print("Ocurrio un error en ejecutar la consulta: " . $stm->error . "n");
			exit;
		}
	}
	
	function todoDisponibleParaHabitacion($idH)
	{
		$con = new Conexion();
		$qry = sprintf('SELECT * FROM disponibilidad WHERE md5(concat("dheu8efwfhw",idHabitacion))="'.$idH.'"');
		return $this->ejecutarConsultaDevolviendoResult($qry);
	}
	
	public function ejecutarConsultaDevolviendoResult($q)
	{
		$conect = new Conexion();
		if(!$result = mysqli_query($conect->conectarse(),$q))
		{
			die('Ocurrio un error ejecutando la consulta');
			return 0;
		}
		else
			return $result;
	}
}
?>