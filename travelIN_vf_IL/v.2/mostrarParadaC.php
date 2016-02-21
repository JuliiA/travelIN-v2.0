<?php
	//session_destroy();
	session_start();

	include 'coneccion.php';
	
	$db = new Conexion();

	//$idUsuario = $_SESSION['idUsuario'];
	$idParada = $_POST['idParada'];
	$texto = $_POST['comment'];
	$rating = "NULL";

	if(isset($_SESSION['idUsuario']))
	{
		$idUsuario = $_SESSION['idUsuario'];
	}else
		{
			echo ('<html><head>
						<script type="text/javascript">
							function confirm_alert3()
							{
								alert("Debe ser un usuario logueado para poder opinar.");
							}
						</script>
					</head><body>
					
					<script>
						confirm_alert3();
						window.location="mostrarParada.php?num='.$idParada.'"
					</script>
					</body></html>');
		}

		//$fecha = date('d-m-Y_H_i_s');

	$sqlOpinar1 = 'INSERT INTO opinionParada (descripcion, fechaOpinion, idAutor, idParada) 
					VALUES("'.$texto.'", CURDATE(), '.$idUsuario.', '.$idParada.')';

	if(!mysqli_query($db->conectarse(), $sqlOpinar1)){
	    echo('Ocurrio un error ejecutando el query de insert[' . mysqli_error() . ']');
	}else
		{
			echo '<html><head></head><body>
				<script language="javascript">
					window.location="MostrarParada.php?num='.$idParada.'"
				</script>
				</body></html>';
		}
?>
