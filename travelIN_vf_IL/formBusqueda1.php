<!--<div class="flex-caption">-->
<script type="text/javascript" src="js/select_dependientes.js"></script>
<script language="javascript">
	$(document).ready(function(){
		// Parametros para e combo1
	   $("#ddlProvincia").change(function () {
	   		$("#ddlProvincia option:selected").each(function () {
				//alert($(this).val());
					elegido=$(this).val();
					$.post("ddlProvincia.php", { elegido: elegido }, function(data){
					$("#ddlCiudad").html(data);
					$("#combo3").html("");
				});			
	        });
	   })
	});
</script>

<div id="contBusqSlider1">
	<form id="buscarDestino" method="POST" action="resulBusqueda1.php">
        <!--<h3></h3> -->
		<select class="dropDownlist" name="ddlProvincia" id="ddlProvincia">
			<option value="0">Elija una provincia</option>
				<?php 
					$query = "SELECT PR.id, PR.descripcion FROM provincia PR INNER JOIN pais PA ON PR.idPais = PA.id WHERE PA.codAlfa LIKE 'ARG'";
					$result = mysqli_query($db->conectarse(), $query) or die(mysqli_error());;
					while($row = mysqli_fetch_array($result)){
				?>
						<option title="<?php echo ($row["descripcion"]); ?>" value="<?php echo $row["id"]; ?>"> 
							<?php echo ($row["descripcion"]); ?>
                        </option>
				<?php
					}
				?>
		</select>
		<select class="dropDownList" name="ddlCiudad" id="ddlCiudad">
			<option value="0">Elija una ciudad</option>
		</select>
		<select class="dropDownList" name="ddlProveedor" id="ddlProveedor">
			<option value="0">Elija un rubro</option>
			<?php 
				$query3 = "SELECT * FROM tipoEstableci";
				$result3 = mysqli_query($db->conectarse(), $query3) or die(mysqli_error());;
				while($row3 = mysqli_fetch_array($result3)){
			?>
					<option title="<?php echo ($row3["descripcion"]); ?>" value="<?php echo $row3["idTipoEstableci"]; ?>"> 
						<?php echo utf8_encode($row3["descripcion"]); ?>
		            </option>
			<?php
				}
			?>
		</select>
	<!--	<a href="#" class="btn btn-warning" id="buscarSlider">Buscar</a>-->
		<input type="submit" class="btn btn-warning" name="buscarSlider" id="buscarSlider" value="Buscar">
	</form>
</div>
<!--</div>-->
