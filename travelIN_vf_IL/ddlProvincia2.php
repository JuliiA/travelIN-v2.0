<?php
	//$rpta="";
	
	include 'coneccion.php';
	$objeConexion = new Conexion();

	$valor=$_POST["elegido"];
	$marcado =(isset($_POST["elegCiudad"]))?$_POST["elegCiudad"] : null ;

	//echo($marcado);
	?>
	<!--<script> alert('  2'); </script>-->
<?php
	if ($valor=="0") {
		//$rpta= '
		echo '<option value="0">Elija una ciudad</option>';
	}else
		{
			echo '<option value="0">Elija una ciudad</option>';

			$query = "SELECT * FROM ciudad WHERE idProvincia = '".$valor."'";
			$result = mysqli_query($objeConexion->conectarse(), $query) or die(mysqli_error());//;
			while($row = mysqli_fetch_array($result)){
				//if($marcado== $row["id"]){

				//}
?>
				<!--$rpta='<option value="2">holaaa</option>';-->
				<option title="<?php echo $row["descripcion"]; ?>" value="<?php echo $row["id"]; ?>" <?php
																										if($marcado== $row["id"]){
																											echo ('selected');
																										} ?> > 
					<?php echo $row[1]; ?> 
		        </option>

		<?php
			}

		}


		?>