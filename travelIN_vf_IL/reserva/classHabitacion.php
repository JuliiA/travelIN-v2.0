<?php
//include ('coneccion.php');

class habitacion
{
	var $id;
	var $idEstableci;
	var $descripcion;
	var $nroCamas;
	var $clase; //publica-privada
	
	function obtenerID($id)
	{
		$sql = sprintf('SELECT idHabitacion,idEstableci FROM habitacion WHERE MD5(concat("dheu8efwfhw",idHabitacion)) = "'.$id.'"');
		return $this->ejecutarConsultaDevolviendoResult($sql);
	} 
	
	function hay_disponible($idest)
	{
		$con = new Conexion();
		$stm = sprintf("SELECT * FROM habitacion WHERE idEstableci = ".$idest);
		
		$cant = mysqli_query($con->conectarse(),$stm);
		if(mysqli_num_rows($cant) > 0)
		{		 	
			return true;
		}
		else
			return false;
		
	}
	
	function listarHabitaciones($list)
	{
		$fil = implode(",",$list);	
		$q = sprintf('SELECT idHabitacion i, descripcion d,camas c, privada t FROM habitacion WHERE idHabitacion in ('.$fil.')');
		return $this->ejecutarConsultaDevolviendoResult($q);
	}
	
	function obtenerTodas($id)
	{
		$sql = sprintf('SELECT idHabitacion i, descripcion d,camas c, privada t FROM habitacion WHERE idEstableci = '.$id.' AND idEstado = 2 ');
		return $this->ejecutarConsultaDevolviendoResult($sql);
	}
	
	function obtenerParaCombo($idH)
	{
		$sql = sprintf('SELECT idHabitacion id, descripcion d FROM habitacion WHERE idHabitacion ='.$idH.' AND idEstado = 2');
		return $this->ejecutarConsultaDevolviendoResult($sql);
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