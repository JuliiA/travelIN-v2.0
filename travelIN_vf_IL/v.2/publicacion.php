<!DOCTYPE HTML>
<html>
<head>
	<?php
		session_start();
		include 'coneccion.php';
		$db = new Conexion();
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>travelIN</title>
<!--Icon-->
<link rel="icon" href="imagenes/travelin-ico.png" type="image/x-icon">
<link rel="shortcut icon" href="imgagenes/travelin-ico.png" type="image/x-icon" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
			    <script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
						});
					});
				</script>
<!---- start-smoth-scrolling---->
 <!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!----webfonts---->
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<!----//webfonts---->
	<!----- start-Share-instantly-slider---->
					 <!-- Prettify -->
						<link href="css/owl.carousel.css" rel="stylesheet">
					    <script src="js/owl.carousel.js"></script>
					    <script>
						    $(document).ready(function() {
						      $("#owl-demo , #owl-demo1").owlCarousel({
						        items : 1,
						        lazyLoad : true,
						        autoPlay : true,
						      });
						    });
					    </script>
					    <script>
						    $(document).ready(function() {
						      $("#owl-demo3").owlCarousel({
						        items : 4,
						        lazyLoad : true,
						        autoPlay : true,
						        navigation: false,
						        pagination: false,
						      });
						    });
					    </script>
					<!----- //End-Share-instantly-slider---->
             
				<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->

		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	    <script type="text/javascript">
		    $(document).ready(function () {
		        $('#horizontalTab').easyResponsiveTabs({
		            type: 'default', //Types: default, vertical, accordion           
		            width: 'auto', //auto or any width like 600px
		            fit: true   // 100% fit in a container
		        });
		    });
		</script>

		<script language="javascript">
			$(document).ready(function(){
				// Parametros para e combo1
				$("#ddlProvinciaP").ready(function () {
					$("#ddlProvinciaP option:selected").each(function () {
						//alert($(this).val());
						//alert('1');
						elegido=$(this).val();
						elegCiudad = $('#ciuEleg').val();
						$.post("ddlProvincia2.php", { elegido: elegido, elegCiudad: elegCiudad }, function(data){
							$("#ddlCiudadP").html(data);
							$("#combo3").html("");
						});
					});
				});

				$("#ddlProvinciaP").change(function () {
					$("#ddlProvinciaP option:selected").each(function () {
						//alert($(this).val());
						//alert('1');
						elegido=$(this).val();
						elegCiudad = $('#ciuEleg').val();
						$.post("ddlProvincia2.php", { elegido: elegido, elegCiudad: elegCiudad }, function(data){
							$("#ddlCiudadP").html(data);
							$("#combo3").html("");
						});
					});
				});
			});
		</script>
		
		<script type="text/javascript" src="js/mapa.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			$(document).ready(function() {
		          initialize();
		      });
		</script>

		<?php
			$idUsuario = $_SESSION['idUsuario'];

			$sql0 = 'SELECT idEstableci, nombre, direccion, precio, idTipoEstableci, idCiudad, rutaFotoEstableci, COUNT(1) AS cantEstableci FROM establecimiento WHERE idUsuario = '.$idUsuario.' AND idEstado = 2';

			if(!$resul0 = mysqli_query($db->conectarse(), $sql0))
			{
				echo('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
			}else
				{
					$reg0 = mysqli_fetch_assoc($resul0);
					//$cantResultados = $resultado->num_rows;

					if($reg0['cantEstableci'] == 1)//AL CREAR YA ESTA ACTIVO X ESO NO PREGUNTO X ESE ESTADO ACÁ TAL VEZ FALTARIA POR SUSPENDIDO
					{
						$existeP = 1;
						if(($reg0['idCiudad'] != NULL) || ($reg0['idCiudad'] != ''))
						{
							$sql1 = 'SELECT idProvincia FROM ciudad WHERE id = '.$reg0['idCiudad'];
							if(!$resul1 = mysqli_query($db->conectarse(), $sql1))
							{
								echo('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
							}else
								{
									$reg1 = mysqli_fetch_assoc($resul1);
									$provincia = $reg1['idProvincia'];
								}
						}
						$idEstableci = $reg0['idEstableci'];
						$nombre = $reg0['nombre'];
						$direccion = $reg0['direccion'];
						$precio = $reg0['precio'];
						$tipoEstableci = $reg0['idTipoEstableci'];
						$ciudad = $reg0['idCiudad'];
						$foto = $reg0['rutaFotoEstableci'];
/*
						if($ciudad > 0)
						{
							echo '<script language="javascript">
										$(document).ready(function(){
										// Parametros para e combo1
											$("#ddlProvinciaP").ready(function () {
												$("#ddlProvinciaP option:selected").each(function () {
													elegido=$(this).val();
													elegCiudad = $("#ciuEleg").val();
													$.post("ddlProvincia2.php", { elegido: elegido, elegCiudad: elegCiudad }, function(data){
														$("#ddlCiudadP").html(data);
														$("#combo3").html("");
													});			
												});
											});
										});
									</script>';
						}
*/						
					}else
						{
							$existeP = 0;
							/*	NO ENCONTRO UN ANUNCIO SE DEBE CREAR UNO NUEVO	*/
							$nombre = '';
							$direccion = '';
							$precio = '';
							$tipoEstableci = 0;
							$ciudad = 0;
							$provincia = 0;
							$foto = '';
						}
				}
		?>
		
<!--
	<link href="css/menuLateral1.css" rel='stylesheet' type='text/css' />
	<script src="js/menuLateral1.js" type="text/javascript"></script>
-->
	<link href="css/menuVertical1.css" rel='stylesheet' type='text/css' />
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
	<body>
		
    	<div class="header">
     		<div class="container">
		 		<div class="logo">
					<a href="index.php"><img src="imagenes/seven_1.png" class="img-responsive" alt="Travel In"/></a>
		 		</div>
            	<nav class="top-nav">
					<ul class="top-nav">
					<!--
						<li class="active"><a href="#home" class="scroll">Home <span> </span></a></li>
						<li class="page-scroll"><a href="#fea" class="scroll">Features<span> </span></a></li>
						<li class="page-scroll"><a href="#screen" class="scroll">Screenshots<span> </span></a></li>
						<li class="page-scroll"><a href="#about" class="scroll">About <span> </span></a></li>
						<li class="page-scroll"><a href="#price" class="scroll">Pricing<span> </span></a></li>
						<li class="page-scroll"><a href="#news" class="scroll">News<span> </span></a></li>
						<li class="contatct-active" class="page-scroll"><a href="#contact" class="scroll">Contact </a></li>
					-->
<?php
	if(!(isset($_SESSION['idUsuario'])))
	{
		echo '		<script language="javascript">
						window.location="login.php"
					</script>';
	}else {
			echo '<li class="page-scroll"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
					<li class="active"><a href="panel.php" class="scroll_">Panel<span> </span></a></li>
					<li class="page-scroll"><a href="diarios.php" class="scroll_">Diarios<span> </span></a></li>
					<li class="page-scroll"><a href="mensajes.php" class="scroll_">Mensajes<span> </span></a></li>
					<li class="page-scroll"><a href="logout.php" class="scroll_">Salir<span> </span></a></li>';
			}
?>						
					</ul>
					<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
				</nav>			
            	<div class="clearfix"></div>
	  		</div>
	  	
   		</div>
   	
		<div class="main">
			<div class="featurelist2" id="news">
	   			<div class="container">
	   				<div class="contTitulo1">
						<h3><?php echo $_SESSION['nick']; ?></h3>
					</div>
					<div class="lineaSeparadora"></div>

					<div class="contCuerpoConMenu">

						<div class="row affix-row">
							<div class="col-sm-3 col-md-3 affix-sidebar">
								<div class="sidebar-nav">
									<div class="navbar navbar-default" role="navigation">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
											<span class="sr-only">Toggle navegacion</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											</button>
											<span class="visible-xs navbar-brand"> Menú lateral </span>
										</div>
										<div class="navbar-collapse collapse sidebar-navbar-collapse">
											<ul class="nav navbar-nav" id="sidenav01">
												<li class="active">
													<a href="#" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
														<h4>
														Panel de Usuario
														<br>
														<!--<small> <span class="caret"></span></small>-->
														</h4>
													</a>
													<!--<div class="collapse" id="toggleDemo0" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="#">ProfileSubMenu1</a></li>
															<li><a href="#">ProfileSubMenu2</a></li>
															<li><a href="#">ProfileSubMenu3</a></li>
														</ul>
													</div>-->
												</li>
												<!--<li>
													<a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-cloud"></span> Submenu 1 <span class="caret pull-right"></span>
													</a>
													<div class="collapse" id="toggleDemo" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="#">Submenu1.1</a></li>
															<li><a href="#">Submenu1.2</a></li>
															<li><a href="#">Submenu1.3</a></li>
														</ul>
													</div>
												</li>-->
												<li class="active"><a href="#" data-toggle="collapse" data-target="#toggleMiPublic" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Mí publicación <span class="caret pull-right"></span>
													</a>
													<div id="toggleMiPublic" style="height: auto;">
														<ul class="nav nav-list">
															<li><a href="publicacion.php">Mi Publicación.</a></li>
															<li><a href="publicacionDescripcion.php">Descripción.</a></li>
															<li><a href="publicacionMapaP.php">Ubicar en Mapa.</a></li>
															<li><a href="publicacionGaleriaP.php">Fotos.</a></li>
														</ul>
													</div>
												</li>
												<li>
													<a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Diarios <span class="caret pull-right"></span>
													</a>
													<div class="collapse" id="toggleDemo2" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="diarios.php">Mis diarios.</a></li>
															<li><a href="diarioNuevo.php">Crear diario.</a></li>
															<li><a href="listaDiarios.php">Buscar diarios.</a></li>
														</ul>
													</div>
												</li>
												<li>
													<a href="#" data-toggle="collapse" data-target="#toggleDemo3" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Mensajes <span class="badge pull-right"><?php
															include('reserva/classMensaje.php');
															$msg = new mensajeria();	
															$c = $msg->obtenerRecibidos($_SESSION['idUsuario']);
															$cant = mysqli_num_rows($c);
															echo($cant);
														?></span>
													</a>
													<div class="collapse" id="toggleDemo3" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="mensajes.php">Recibidos.</a></li>
															<li><a href="mensajes.php">Enviados.</a></li>
														</ul>
													</div>
												</li>
												<li>
													<a href="#" data-toggle="collapse" data-target="#toggleDemo4" data-parent="#sidenav01">
														<span class="glyphicon glyphicon-filter"></span> Reservas<span class="caret pull-right"></span> 
													</a>
													<div class="collapse" id="toggleDemo4" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="reservacion.php">Mis Reservas.</a></li>
															<li><a href="altaReserva.php">Crear Reserva.</a></li>
															<li><a href="consultarReserva.php">Consultar Reserva.</a></li>
														</ul>
													</div>												
												</li>
<!--												<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Normalmenu</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> WithBadges <span class="badge pull-right">42</span></a></li>
												<li><a href=""><span class="glyphicon glyphicon-cog"></span> PreferencesMenu</a></li>-->
											</ul>
										</div><!--/.nav-collapse -->
									</div>
								</div>
							</div>
							<div class="col-sm-9 col-md-9 affix-content">
								<div class="container">

									<div>
										<div id="contFormPublicacion" class="contFormulario1">
						   					<div id="agrupFormPublicacion" name="agrupFormPublicacion" class="contAgrupForm">

									            <form class="form-horizontal" action="publicacionC.php" method="post" enctype="multipart/form-data">
													<fieldset>

										                <!-- Form Name -->
										                <legend id="tituloForm">Mí Publicación.</legend>
										                <!--<div id="tituloFormulario" class="lineaSeparadora">Contáctenos.</div>-->
										                <!--
										                <div class="centrador1">
										                	<h3 class="titH3">Precio por noche $ </h3>
										                </div>
														-->
										                <!-- Text input-->
										                <div class="form-group sep2">
										                	<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="nombreE">Nombre del establecimiento</label>  
															</div>
															<div class="elementFormP">
																<input type="text" id="nombreE" name="nombreE" value="<?php echo($nombre); ?>" >
										                    
															</div>
										                </div>

										                <br>

										                <!-- Text input-->
										                <div class="form-group sep2">
										                	<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="direccionE">Dirección</label>  
															</div>
															<div class="elementFormP">
																<input type="text" id="direccionE" name="direccionE" value="<?php echo($direccion); ?>" >
										                    
															</div>
										                </div>
										                
										                <br>

														<!-- Text input-->
														<div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="precio">Precio $ </label>  
															</div>
															<div class="elementFormP">
																<input type="text" id="precio" name="precio" <?php if($existeP == 1)
																													{
																														echo('value = '.$precio);
																													}else
																														{
																															echo('placeholder="Precio por día"');
																														}
																												?> >
														    
															</div>
														</div>

														<br>

										                <!-- Select Basic -->
										                <div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="ddlTipoE">Tipo de Establecimiento</label>
															</div>
															<div class="elementFormP">
																<select id="ddlTipoE" name="ddlTipoE" class="form-control_">
																	<?php
																		echo '<option value="0" ';
																		if($tipoEstableci == 0 || $tipoEstableci == '')/*	AGREGAR EL SI ES is_null(var)	*/
																		{
																			echo 'selected';
																		}
																		echo '>Seleccione Tipo</option>';
														      		 
																		$sqlTE = "SELECT idTipoEstableci, descripcion FROM tipoEstableci";
																		$resulTE = mysqli_query($db->conectarse(), $sqlTE) or die(mysqli_error());;
																		while($RsTE = mysqli_fetch_array($resulTE)){
																	?>
																			<option title="<?php echo $RsTE["descripcion"]; ?>" value="<?php echo $RsTE["idTipoEstableci"]; ?>"
																																		<?php 
																																			if($RsTE["idTipoEstableci"] == $tipoEstableci)
																																			{
																																				echo ("selected");
																																			}
																																		?> > 
																				<?php echo ($RsTE["descripcion"]); ?>
																	        </option>
																	<?php
																		}
																	?>
																</select>

																<br>
															</div>
										                </div>
										                
										                <br>

										                <!-- Select Basic -->
										                <div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="ddlProvinciaP">Provincia</label>
															</div>
															<div class="elementFormP">
																<select id="ddlProvinciaP" name="ddlProvinciaP" class="form-control_">
																	<?php
																		echo '<option value="0" ';
																		if($provincia == 0 || $provincia == '')/*	AGREGAR EL SI ES is_null(var)	*/
																		{
																			echo 'selected';
																		}
																		echo '>Elija una provincia</option>';
														      		 
																		$sqlPR = "SELECT PR.id, PR.descripcion FROM provincia PR INNER JOIN pais PA ON PR.idPais = PA.id WHERE PA.codAlfa LIKE 'ARG'";
																		$resulPR = mysqli_query($db->conectarse(), $sqlPR) or die(mysqli_error());;
																		while($RsPR = mysqli_fetch_array($resulPR)){
																	?>
																			<option title="<?php echo $RsPR["descripcion"]; ?>" value="<?php echo $RsPR["id"]; ?>"
																																		<?php 
																																			if($RsPR["id"] == $provincia)
																																			{
																																				echo ("selected");
																																			}
																																		?> > 
																				<?php echo $RsPR["descripcion"]; ?>
																	        </option>
																	<?php
																		}
																	?>

																</select>

																<br>
															</div>
										                </div>
										                
										                <br>

										                <!-- Select Basic -->
										                <div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="ddlCiudadP">Ciudad</label>
															</div>
															<div class="elementFormP">
																<select id="ddlCiudadP" name="ddlCiudadP" class="form-control_">
																<?php
																	if ($existeP == 1)
																	{
																		$sqlCI = "SELECT id, descripcion FROM ciudad WHERE idProvincia = ".$provincia;
																		$resulCI = mysqli_query($db->conectarse(), $sqlCI) or die(mysqli_error());;

																		echo '<option value="0" ';
																		if($ciudad == 0 || $ciudad == '')/*	AGREGAR EL SI ES is_null(var)	*/
																		{
																			echo 'selected';
																		}
																		echo '>Elija una ciudad</option>';
														      		 
																		while($RsCI = mysqli_fetch_array($resulCI))
																		{
																			echo '<option title="'.$RsCI["descripcion"].'" value="'.$RsCI["id"].'"';
																			if($RsCI["id"] == $ciudad){
																				echo ('selected');
																			}
																			echo '>'.$RsCI["descripcion"].'</option>';
																		}
																	}
																?>
																</select>

																<br>
																<div class="labelIzqFormP">
																	<label class="control-label labelFormC"></label>
																</div>
														    	<div class="linkNuevaCiudad2">
																	<a href="nuevaCiudad.php"> ¿La ciudad que busca no figura? </a>
																</div>
															</div>
										                </div>
										                
										                <br>

										                <!-- File Button --> 
														<div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="fileFotoEstableciActual">Foto actual del anuncio</label>
															</div>
															<div class="elementFormP">
																<div class="contFotoP">
																	<div class="fotoP">
																		<img src="<?php 
																						if($foto =='')
																						{
																							echo ('fotoAnuncio/Imagen-para-sin-imagen.png');
																						}else
																							{
																								echo($foto);
																							}
																					?>" id="imgFotoActual" name="imgFotoActual">
																	</div>
																</div>
															</div>
														</div>

														<br><br>

														<div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="fileFotoEstableci">Cambiar foto del anuncio</label>
															</div>
															<div class="elementFormP">
																<input id="fileFotoEstableci" name="fileFotoEstableci" type="file">
																<!--<input id="fileFotoEstableci" name="fileFotoEstableci" type="file">-->
															</div>
														</div>

														<br><br>

										                <div class="pull-centro">
										                	<?php
										                		$op = 0;/* 1=Crear - 2=Modificar	*/
										                		if($existeP == 1)
										                		{
										                			$op = 2;
										                			echo '<input type="hidden" id="op" name="op" value="'.$op.'">';
										                			echo '<input type="hidden" id="idEstableci" name="idEstableci" value="'.$idEstableci.'">';
										                			echo '<input type="submit" id="btnActualizar" name="btnActualizar" value="Actualizar Publicación" >';
										                		}else
										                			{
										                				$op = 1;
										                				echo '<input type="hidden" id="op" name="op" value="'.$op.'">';
										                				echo '<input type="submit" id="btnCrear" name="btnCrear" value="Crear Publicación" >';
										                			}
															?>
															<input type="reset" id="btnCancelar" name="btnCancelar" value="Cancelar" >
										                </div>

										                <br>

													</fieldset>
									            </form>


											</div>
						   				</div>

									</div>

								</div>
							</div>
						</div>

					</div>
					
<!--
					<div class="contMenuSide1">
				  		<div class="container2">
				  		</div>
					</div>
-->
				</div>
			</div>

		</div>
	
		<?php include("pie.php"); ?>
	</body>
</html>