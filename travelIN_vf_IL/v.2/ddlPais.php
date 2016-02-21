<?php
	//$rpta="";
	
	include 'coneccion.php';
	$db = new Conexion();

	$valor=$_POST["elegido"];
	$marcado =(isset($_POST["elegPais"]))?$_POST["elegPais"] : null ;

	//echo($marcado);
	?>
	<!--<script> alert('  2'); </script>-->
<?php
	if ($valor=="0") {
		//$rpta= '
		echo '<option value="0">Elija una provincia</option>';
	}else
		{
			echo '<option value="0">Elija una provincia</option>';

			$query = "SELECT * FROM provincia WHERE idPais = '".$valor."'";
			$result = mysqli_query($db->conectarse(), $query) or die(mysqli_error());//;
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