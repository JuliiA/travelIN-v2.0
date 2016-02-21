<?php
class reservacion
{
	function traerReservasUsuario($u)
	{
		$sql = sprintf('SELECT r.idReserva as id,r.fechaInicio fi,r.fechaFin ff,h.idHabitacion h,r.idEstado e, es.nombre establec,c.descripcion ciu FROM reserva r INNER JOIN habitacion h on r.idHabitacion = h.idHabitacion INNER JOIN establecimiento es on h.idEstableci = es.idEstableci INNER JOIN ciudad c on es.idCiudad = c.id WHERE r.idUsuario='.$u);
		return $this->ejecutarConsultaDevolviendoResult($sql);
	}
	
	function traerReservaron($u)
	{
		$q = sprintf('SELECT r.idReserva as id,r.fechaInicio fi,r.fechaFin ff,h.idHabitacion h,r.idEstado e, es.nombre establec,c.descripcion ciu,(SELECT u1.nick FROM usuario u1 WHERE u1.idUsuario = r.idUsuario) as us, (SELECT u2.email FROM usuario u2 WHERE u2.idUsuario = r.idUsuario) as mail FROM reserva r inner join habitacion h on r.idHabitacion = h.idHabitacion inner join establecimiento es on h.idEstableci = es.idEstableci inner join usuario u on es.idUsuario = u.idUsuario inner join ciudad c on es.idCiudad = c.id WHERE es.idUsuario ='.$u);
		return $this->ejecutarConsultaDevolviendoResult($q);
	}
	
	function puedeAdminReserva($u)
	{
		$qry = sprintf('SELECT idEstableci FROM establecimiento WHERE idUsuario ='.$u);
		$res = $this->ejecutarConsultaDevolviendoResult($qry);
		$con = mysqli_num_rows($res);
		if($con > 0)
			return true;
		else
			return false;
	}
	
	function periodEnReserva($confi,$conff,$h)
	{
		$c = sprintf('SELECT COUNT(idHabitacion) as num FROM reserva WHERE idHabitacion ='.$h.' and fechaInicio <= "'.$confi.'" and fechaFin >= "'.$conff.'"');
		//var_dump($c);//exit();
		$r = $this->ejecutarConsultaDevolviendoResult($c);
		$asoc = mysqli_fetch_assoc($r);
		if($asoc['num'] == 0)
			return false;
		else
			return true;
	}
	
	function nuevaReserva($fi, $ff, $m, $h)
	{
		$sqlNuevaReservaUS = 'SELECT idUsuario FROM usuario WHERE email LIKE "%'.$m.'%"';
		//var_dump($sqlNuevaReservaUS);
		$r = $this->ejecutarConsultaDevolviendoResult($sqlNuevaReservaUS);
		$asoc = mysqli_num_rows($r);
		//var_dump($asoc);exit();
		if($asoc == 0)
			return 'El usuario no esta activo ¿Desea crear la reserva de todos modos?';
			//si permite crear sin usuario en lugar de este mensaje generar la variable idEscribe = 0
		else{
			$RsReservasUS = mysqli_fetch_array($r);
			$idEscribe = $RsReservasUS['idUsuario'];
			//var_dump($RsReservasUS);exit();
			$sqlNuevaReserva = 'INSERT INTO reserva (fechaInicio, fechaFin, idUsuario, idHabitacion, idEstado)
								VALUES ("'.$fi.'", "'.$ff.'", '.$idEscribe.', '.$h.', 1)';
			//var_dump($sqlNuevaReserva);exit();
			$few = $this->ejecutarConsultaDevolviendoResult($sqlNuevaReserva);
			echo ('<html>
						<head>
							<script type="text/javascript">
									function confirm_alert()
									{
										alert("Reserva creada.");
									}
							</script>
							</head><body>							
							<script>
								confirm_alert();
								window.location="../panel.php"
							</script>
							</body></html>');
			}
	}
	
	public function cambiarEstado($id)
	{
		$c = new Conexion();
		$up = 'UPDATE reserva SET idEstado = 4 WHERE idReserva = '.$id;
		mysqli_query($c->conectarse(),$up);
	}
	
	function ejecutarConsultaDevolviendoResult($q)
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
