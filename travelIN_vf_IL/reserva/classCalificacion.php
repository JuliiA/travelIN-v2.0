<?php
if($_GET != NULL)
{
/*
	x -> para positivo
	y -> para negativo
	*/
	if(isset($_GET['x']))
	{
		$id = $_GET['x'];
		$anuncio = $_GET['an'];
//		var_dump($anuncio);
		$res = actualizarCantidadComentarios($id);
		$asoc = mysqli_fetch_assoc($res);//var_dump($asoc);
		$a = $asoc['p']+1;
		$upd = realizarModificacion($id,$a,1); //1 para voto_mas
	//	var_dump($upd);
		if($upd)
			header("Location:location:detalles_publicacion.php?f='".$anuncio);
		else
			echo('No se pudo agregar el comentario');
	}	
	if(isset($_GET["y"]))
	{
		$id = $_GET["y"];
		$res = actualizarCantidadComentarios($id);
		$asoc = mysqli_fetch_assoc($res);
		$a = $asoc['n']-1;
		$upd = realizarModificacion($id,$a,2);	//2 para voto_menos
		if($upd)
			header("Location: ");
		else
			echo('No se pudo agregar el comentario');
	}
}


	function actualizarCantidadComentarios($id)
	{
	 $q = "SELECT voto_mas as p, voto_menos as n FROM comentario WHERE idComentario=".$id;
	  return ejecutarConsultaDevolviendoResult($q);
	}
		 
	function realizarModificacion($id,$nro,$v)
	{
		switch($v)
		{
			case 1: $sql = 'UPDATE comentario SET voto_mas = '.$nro.' WHERE idComentario ='.$id;break;
			case 2: $sql = 'UPDATE comentario SET voto_menos = '.$nro.' WHERE idComentario ='.$id;break;
			default;break;
		}
		//var_dump($sql);
		$conect = new Conexion();
		$rv = mysqli_query($conect->conectarse(),$sql);
		return $rv;
	}
	
	function ejecutarConsultaDevolviendoResult($q)
	{
		require('coneccion.php');
		$conect = new Conexion();
		if(!$result = mysqli_query($conect->conectarse(),$q))
		{
			die('Ocurrio un error ejecutando la consulta');
			return 0;
		}
		else
			return $result;
	}
?>
