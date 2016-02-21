<?php
	//$rpta="";

	include 'coneccion.php';
	$objeConexion = new Conexion();

	$valor=$_POST["elegido"];

	if ($valor=="0") {
		//$rpta= '
		echo '<option value="0">Elija una ciudad</option>';
	}else
		{
			echo '<option value="0">Elija una ciudad</option>';

			$query = "SELECT * FROM ciudad WHERE idProvincia = '".$valor."'";
			$result = mysqli_query($objeConexion->conectarse(), $query) or die(mysqli_error());;
			while($row = mysqli_fetch_array($result)){
?>
				<!--$rpta='<option value="2">holaaa</option>';-->
				<option title="<?php echo $row["descripcion"]; ?>" value="<?php echo $row["id"]; ?>"> 
					<?php echo $row[1]; ?> 
		        </option>

		<?php
			}

		}

/*


<option title="<?php echo $row["descripcion"]; ?>" value="<?php echo $row["id"]; ?>"> 
			<?php echo $row["descripcion"]; ?> 
        </option>



if ($_POST["elegido"]=="251") {
	$rpta= '
	<option value="op2_1">Option21</option>
	<option value="op2_2">Option22</option>
	<option value="op2_3">Option23</option>
	';	
}
if ($_POST["elegido"]=="1275") {
	$rpta= '
	<option value="op2_1">Option</option>
	<option value="op2_2">Option</option>
	';	
}
*/
	//echo $rpta;	
		?>