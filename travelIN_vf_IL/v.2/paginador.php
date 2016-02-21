<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

	try{
		$resulPorPagina = 4;
		//estos valores los recibo por GET
		if (isset($_GET['pos']))
	  		$ini=$_GET['pos'];
		else
	 		$ini=1;
		
		$db = new Conexion();
		
		$init = ($ini-1) * $resulPorPagina;
		//==============================================================
		if(!isset($_POST['ddldiarios']) && !isset($_POST['txtBusDiario']) && !isset($_POST['txtBusUsuario']))
		{	
			$query = sprintf("SELECT distinct d.idDiario as id,d.nombre as diario,d.descripcion as descripcion, u.nombre as usuario, d.cantidadParadas as paradas, d.calificacion as likes, d.listaProvincias as provincias FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario LIMIT $init, $resulPorPagina");
			$count = 'SELECT count(d.idDiario) FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario';
		}
		else
		{
			//-------------------------------------------------------
			//datos por post
			$busqProvincia = $_POST['ddldiarios'];
			$busqDiario = $_POST['txtBusDiario'];
			$busqUsuario = $_POST['txtBusUsuario'];
			//-------------------------------------------------------
			//======================================================
			//		CONTROL DE DATOS PARA FILTRO DE BUSQUEDA
			//======================================================
			if($busqProvincia == "Seleccione provincia")
			{
				$busqProvincia = "";
				if($busqDiario == "" and $busqUsuario != "")
				{
					$query = "SELECT distinct d.idDiario as id,d.nombre as diario,d.descripcion as descripcion, u.nombre as usuario, d.cantidadParadas as paradas, d.calificacion as likes, d.listaProvincias as provincias FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where u.nombre like '%".$busqUsuario."%' LIMIT $init, $resulPorPagina";
					$count = "SELECT count(d.idDiario) FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where u.nombre like '%".$busqUsuario."%'";
				}
				
				if($busqDiario != "" and $busqUsuario != "")
				{
					$query = "SELECT distinct d.idDiario as id,d.nombre as diario,d.descripcion as descripcion, u.nombre as usuario, d.cantidadParadas as paradas, d.calificacion as likes, d.listaProvincias as provincias FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.nombre like '%".$busqDiario."%' and u.nombre like '%".$busqUsuario."%' LIMIT $init, $resulPorPagina";
					$count = "SELECT count(d.idDiario) FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.nombre like '%".$busqDiario."%' and u.nombre like '%".$busqUsuario."%'";
				}
				
				if($busqDiario != "" and $busqUsuario == "")
				{
					$query = "SELECT distinct d.idDiario as id,d.nombre as diario,d.descripcion as descripcion, u.nombre as usuario, d.cantidadParadas as paradas, d.calificacion as likes, d.listaProvincias as provincias FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.nombre like '%".$busqDiario."%' LIMIT $init, $resulPorPagina";
					$count = "SELECT count(d.idDiario) FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.nombre like '%".$busqDiario."%'";
				}
			}
			else
			{
				$b = mysqli_query($db->conectarse(),"select p.descripcion as descripcion from provincia p where p.id= $busqProvincia");
				$busqProvincia = mysqli_fetch_assoc($b);

				$busqProvincia = $busqProvincia['descripcion'];

				if($busqDiario == "")
				{
					$query = "SELECT distinct d.idDiario as id,d.nombre as diario,d.descripcion as descripcion, u.nombre as usuario, d.cantidadParadas as paradas, d.calificacion as likes, d.listaProvincias as provincias FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.listaProvincias like '%".$busqProvincia."%' LIMIT $init, $resulPorPagina";
					$count = "SELECT count(d.idDiario) FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.listaProvincias like '%".$busqProvincia."%'";
				}
				else
				{
					if($busqUsuario == "")
					{
						$query = "SELECT distinct d.idDiario as id,d.nombre as diario,d.descripcion as descripcion, u.nombre as usuario, d.cantidadParadas as paradas, d.calificacion as likes, d.listaProvincias as provincias FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.listaProvincias like '%".$busqProvincia."%' and d.nombre like '%".$busqDiario."%' LIMIT $init, $resulPorPagina";
						$count = "SELECT count(d.idDiario) FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.listaProvincias like '%".$busqProvincia."%' and d.nombre like '%".$busqDiario."%'";
					}
					else
					{
						$query = "SELECT distinct d.idDiario as id,d.nombre as diario,d.descripcion as descripcion, u.nombre as usuario, d.cantidadParadas as paradas, d.calificacion as likes, d.listaProvincias as provincias FROM diariodeviajero d inner join usuario u on d.idUsuario = u.idUsuario where d.listaProvincias like '%".$busqProvincia."%' and d.nombre like '%".$busqDiario."%' and u.nombre like '%".$busqUsuario."%' LIMIT $init, $resulPorPagina";
						$count = "SELECT count(d.idDiario) FROM diariodeviajero d inner join usuario u on idUsuario = u.idUsuario where d.listaProvincias like '%".$busqProvincia."%' and d.nombre like '%".$busqDiario."%' and u.nombre like '%".$busqUsuario."%'";
					}
				}
			}				
		}
		//ejecuto las consultas
		$NroRegistros = mysqli_query($db->conectarse(),$count);
		$res = mysqli_query($db->conectarse(),$query); 
		
		//guardo cantidad de diarios
		$hay =mysqli_num_rows($res);
	
		//asocio resultado a un array
		$x = mysqli_fetch_array($NroRegistros);
		//calculo la cantidad de paginas segun el resultado obtenido
		$total_paginas = ceil($x[0]/$resulPorPagina);
			
		if($hay == 0)
		{
			echo "<h2>No se hallaron diarios para la b&uacute;squeda ingresada. Int&eacute;ntelo nuevamente</h2>";
			echo "<br/>";
			//echo "<a href='listaDiarios.php'>";
		}
		else
		{
			echo '<table class="table table-hover">';
				echo "<thead>";
				echo "<td>NOMBRE</td>";
				echo "<td>DESCRIPCION</td>";
				echo "<td>PROVINCIAS</td>";
				echo "<td>USUARIO</td>";
				//echo "<td>FECHA CREACION</td>";
				echo "<td>ETAPAS</td>";
				echo "<td>LIKES</td>";
				echo "</thead>";
				$clave = "a12b34dsakcsuklmdsa";
				while($MostrarFila = mysqli_fetch_array($res)){
					//$idal = $MostrarFila['id'];
					//$s = mysqli_query($mysqli,"SELECT count(*) FROM parada WHERE idDiario = $idal");
					$id_protegido = md5($clave.$MostrarFila['id']);
					echo "<tr>";
					echo '<td><a href="detalleDiario.php?x='.$id_protegido.'">'.$MostrarFila['diario'].'</a></td>';
					echo '<td>'.$MostrarFila['descripcion']."</td>";
					echo '<td>'.$MostrarFila['provincias'].'</td>';
					echo "<td>".$MostrarFila['usuario']."</td>";
					echo "<td>".$MostrarFila['paradas']."</td>";
					echo "<td>".$MostrarFila['likes']."</td>";
					echo "</tr>";
				}
			echo "</table>";
			
			$url = "listaDiarios.php";

			echo '<div class="pagination-wrapper ">
					<ul class="pagination pagination-lg">';

			if(($ini - 1) == 0)
				echo "<li><a href='#'>&laquo;</a></li>";
			else
				echo "<li><a href='$url?pos=".($ini-1)."'><b>&laquo;</b></a></li>";

			for($k=1; $k <= $total_paginas; $k++)
			{
				if($ini == $k)
					echo "<li><a href='#'><b>".$k."</b></a></li>";
				else
					echo "<li><a href='$url?pos=$k'>".$k."</a></li>";
			}

			if($ini == $total_paginas)
				echo "<li><a href='#'>&raquo;</a></li>";
			else
				echo "<li><a href='$url?pos=".($ini+1)."'><b>&raquo;</b></a></li>";
			echo '</ul></div>';
		}
	}
	catch(Exception $ex)
	{
		echo 'Ha ocurrido un error en la conexion';
	}
?>
