<?php

class mensajeria
{	
	function obtenerRecibidos($user)
	{
		$recibidos = sprintf('SELECT DISTINCT  m.idMensaje idMsj, m.leido estado, m.descripcion texto, m.fechaEmitido fechaEnvio, u.nick usEnvio, m.idEstableci estableci
							FROM mensaje m 
							INNER JOIN usuario u on m.idUsuarioEscrib = u.idUsuario
							WHERE m.idUsuarioRecib ='.$user.'');
		//var_dump($recibidos);exit();
		return $this->ejecutarConsultaDevolviendoResult($recibidos);
	}
	
	function obtenerCantidadRecibidos($user)
	{
		$recibidos = sprintf('SELECT DISTINCT m.idMensaje receptor,m.leido leido,m.descripcion texto,m.fechaEmitido fecha, u.nick user FROM mensaje m INNER JOIN establecimiento e on m.idUsuarioEscrib = e.idUsuario INNER JOIN usuario u on m.idUsuarioEscrib = u.idUsuario WHERE e.idUsuario ='.$user.'');
		return $this->ejecutarConsultaDevolviendoResult($recibidos);
	}
	
	function obtenerEnviados($user)
	{
		$enviados = sprintf('SELECT DISTINCT m.idMensaje emisor, m.descripcion texto,m.fechaEmitido fecha FROM mensaje m WHERE m.idUsuarioEscrib ='.$user.'');
		//var_dump($enviados);exit();
		return $this->ejecutarConsultaDevolviendoResult($enviados);
	}
	
	function obtenerPendiente($user)
	{
		return 0;
	}
	
	function obtenerEstablecimiento($user)
	{
		$s = sprintf('SELECT idEstableci FROM establecimiento WHERE idUsuario ='.$user);
		return $this->ejecutarConsultaDevolviendoResult($s);
	}
	
	function obtenerReceptores($user)
	{
		$v = sprintf('SELECT DISTINCT m.idUsuarioEscrib as id, u.email as mail FROM mensaje m INNER JOIN usuario u on m.idUsuarioEscrib = u.idUsuario WHERE m.idUsuarioRecib='.$user);
		return $this->ejecutarConsultaDevolviendoResult($v);
	}
	
	function enviarNuevoMensaje($a,$t,$dest,$s,$es)
	{
		require('coneccion.php');
		$con = new Conexion();
		$desc = "_".$a."---\n".$t."\n atte.Dueno esto. Inquilino"; 
		$ins = 'INSERT INTO mensaje(descripcion,fechaEmitido,idUsuarioEscrib,idUsuarioRecib,idEstableci,leido) VALUES ("'.$desc.'",NOW(),'.$s.','.$dest.','.$es.',1)';	
		//var_dump($ins);exit();		
		if (!$few = mysqli_query($con->conectarse(),$ins)) {
			print("Ocurrio un error en ejecutar la consulta: " . $ins->error . "n");
			exit;
		}
		else
			return true;
	}
	
	public function cambiarALeido($id)
	{
		$cambiar = 'UPDATE mensaje SET leido = 0 WHERE idMensaje ='.$id.'';
		$this->ejecutarConsultaDevolviendoResult($cambiar);
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
	
	public function ejecutarConsultaDevolviendoArray($query)
	{
		//require('coneccion.php');
		$conect = new Conexion();
		if(!$result = mysqli_query($conect->conectarse(),$query))
		{
			die('Ocurrio un error ejecutando la consulta');
			return 0;
		}
		else
		{
			$Rs = mysqli_fetch_array($result);
			return $Rs;
		}
	}

}

if(isset($_POST['Enviar']))
{
$asunto = $_POST['asunto'];
$texto = $_POST['cuerpoForm'];
$dest = $_POST['dest'];
$us = $_POST['user'];
$es = $_POST['est'];
 
$msg = new mensajeria();
if($msg->enviarNuevoMensaje($asunto,$texto,$dest,$us, $es))
	{
	echo '<html><head></head><body>';
						echo '<script language="javascript">';
						echo 'alert("Se ha enviado el mensaje correctamente")';
						echo 'window.location="mensajes.php"';
						echo '</script>';
						echo '</body></html>';
	}
}

?>
