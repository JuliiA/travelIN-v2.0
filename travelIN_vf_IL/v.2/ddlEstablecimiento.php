<?php
	//$rpta="";
	
	include 'coneccion.php';
	$objeConexion = new Conexion();

	$valor=$_POST["elegido"];
	$marcado =(isset($_POST["elegEstableci"]))?$_POST["elegEstableci"] : null ;

	//echo($marcado);
	?>
	<!--<script> alert('  2'); </script>-->
<?php
	if ($valor=="0") {
		//$rpta= '
		echo '<option value="0">Elija un Establecimiento</option>';
	}else
		{
			echo '<option value="0">Elija un Establecimiento</option>';

			$query = "SELECT * FROM establecimiento WHERE idCiudad = '".$valor."'";
			$result = mysqli_query($objeConexion->conectarse(), $query) or die(mysqli_error());//;
			while($row = mysqli_fetch_array($result)){
				//if($marcado== $row["id"]){

				//}
?>
				<!--$rpta='<option value="2">holaaa</option>';-->
				<option title="<?php echo $row["nombre"]; ?>" value="<?php echo $row["idEstableci"]; ?>" <?php
																										if($marcado == $row["idEstableci"]){
																											echo ('selected');
																										} ?> > 
					<?php echo $row["nombre"]; ?> 
		        </option>

		<?php
			}

			echo '<option value="-1">-- Otro Lugar --</option>';

		}


		?>