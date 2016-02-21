<!DOCTYPE HTML>
<html>
<head>
	<?php
		session_start();
		include 'coneccion.php';
		$db = new Conexion();

		$idUsuario = $_SESSION['idUsuario'];
		$idParada = $_GET['num'];

		$sqlParada2 = 'SELECT P.* FROM parada P INNER JOIN diarioDeViajero D ON P.idDiario = D.idDiario 
						WHERE P.idParada='.$idParada.' AND D.idUsuario = '.$idUsuario;

		if(!($consultaParada2 = mysqli_query($db->conectarse(), $sqlParada2)))
		{
			echo('Ocurrio un error ejecutando el query de busqueda de las paradas [' . mysqli_error() . ']');
	//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
		}else
			{
				$RsParada2 = mysqli_fetch_assoc($consultaParada2);
				$filas2 = mysqli_num_rows($consultaParada2);

				if($filas2 == 0)
				{
					echo ('<html><head>
								<script type="text/javascript">
									function confirm_alert()
									{
										alert("No se han encontrado datos de la parada, ó pertenece a otro usuario.");
									}
								</script>
								</head><body>
								
								<script>
									confirm_alert();
									window.location="diarios.php"
								</script>
							</body></html>');
				}else
					{
						if(($RsParada2['idEstableci'] != 0 ) || ($RsParada2['idEstableci'] != NULL))
						{
							//$provincia = 0;
							$idEstableci = $RsParada2['idEstableci'];
							$sqlParada3 = 'SELECT C.idProvincia idProvincia, C.id idCiudad FROM establecimiento E INNER JOIN ciudad C ON C.id = E.idCiudad
											WHERE E.idEstableci = '.$RsParada2['idEstableci'];

							if(!$consultaParada3 = mysqli_query($db->conectarse(), $sqlParada3))
							{
								echo('Ocurrio un error ejecutando el query de busqueda [' . mysqli_error() . ']');
							}else
								{
									$filasP3 = mysqli_num_rows($consultaParada3);
									if($filasP3 == 1)
									{
										$RsParada3 = mysqli_fetch_assoc($consultaParada3);
										$idProvincia = $RsParada3['idProvincia'];
										$idCiudad = $RsParada3['idCiudad'];
									}else
										{
											$idProvincia = 0;
											$idCiudad = 0;
										}
								}
						}else
							{
								$idProvincia = 0;
								$idCiudad = 0;
								$idEstableci = 0;
							}
					}
			}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Seven Bootstarp Website Template | Home :: w3layouts</title>
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

		<link rel="stylesheet" href="colorbox.css" />
		<script src="js/jquery.colorbox.js"></script>

		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
		
<!--
	<link href="css/menuLateral1.css" rel='stylesheet' type='text/css' />
	<script src="js/menuLateral1.js" type="text/javascript"></script>
-->
	<link href="css/menuVertical1.css" rel='stylesheet' type='text/css' />
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
    
    <link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="jquery.1.4.2.js"></script>
	<script type="text/javascript" src="jsDatePick.jquery.min.1.3.js"></script>
	<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"fechaP",
			dateFormat:"%d-%M-%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
	</script>

	<script language="javascript">
		$(document).ready(function(){
			// Parametros para e combo1
			/*
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
*/
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

			$("#ddlCiudadP").change(function () {
		   		$("#ddlCiudadP option:selected").each(function () {
					//alert($(this).val());
					//alert('1');
						elegido=$(this).val();
						elegEstableci = $('#estableciEleg').val();
						$.post("ddlEstablecimiento.php", { elegido: elegido, elegEstableci: elegEstableci }, function(data){
						$("#ddlEstableciP").html(data);
						$("#combo3").html("");
					});			
		        });
		    });
		});
	</script>
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
			echo '	<li class="page-scroll"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
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
														Panel de Control
														<br>
														<small> <span class="caret"></span></small>
														</h4>
													</a>
													<div class="collapse" id="toggleDemo0" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="#">ProfileSubMenu1</a></li>
															<li><a href="#">ProfileSubMenu2</a></li>
															<li><a href="#">ProfileSubMenu3</a></li>
														</ul>
													</div>
												</li>
												<li>
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
												</li>
												<li><a href="#" data-toggle="collapse" data-target="#toggleMiPublic" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Mí publicacion <span class="caret pull-right"></span>
													</a>
													<div class="collapse" id="toggleMiPublic" style="height: 0px;">
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
															<li><a href="#">Mis diarios.</a></li>
															<li><a href="#">Crear diario.</a></li>
															<li><a href="#">Buscar diarios.</a></li>
														</ul>
													</div>
												</li>
												<li>
													<a href="#" data-toggle="collapse" data-target="#toggleDemo3" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Mensajes <span class="badge pull-right">42</span>
													</a>
													<div class="collapse" id="toggleDemo3" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="#">Recibidos.</a></li>
															<li><a href="#">Enviados.</a></li>
														</ul>
													</div>
												</li>
												<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Normalmenu</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> WithBadges <span class="badge pull-right">42</span></a></li>
												<li><a href=""><span class="glyphicon glyphicon-cog"></span> PreferencesMenu</a></li>
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

									            <form class="form-horizontal" action="verParadaC.php" method="post" enctype="multipart/form-data">
													<fieldset>

										                <!-- Form Name -->
										                <legend id="tituloForm">Paradas.</legend>
										                <!--<div id="tituloFormulario" class="lineaSeparadora">Contáctenos.</div>-->
										                <!--
										                <div class="centrador1">
										                	<h3 class="titH3">Precio por noche $ </h3>
										                </div>
														-->
														<!--
										                <div class="form-group sep2">
															<div class="labelTitFormP">
																<h4>Modificar Parada.</h4>
															</div>
															<div class="btnTituloTabla1">
																<input type="button" id="btnGaleriaP" name="btnGaleriaP" value="Administrar Fotos" onclick="location.href='verFotosParadaP.php?num=<?php echo $idParada; ?>'">
															</div>
														</div>
														-->
														<div class="contEncabezadoTabla1">
															<div class="tituloTabla1">
																<h4>Modificar Parada.</h4>
															</div>
															<div class="btnTituloTabla1">
																<input type="button" id="btnGaleriaP" name="btnGaleriaP" value="Administrar Fotos" onClick="location.href='verFotosParadaP.php?num=<?php echo $idParada; ?>'">
															</div>
														</div>
														
														<br><br>
														<!-- Text input-->
														<div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="fechaP">Fecha</label>  
															</div>
															<div class="elementFormP">
																<input type="text" class="date-pick" id="fechaP" name="fechaP" value="<?php
																				if($RsParada2['fecha'] != NULL) {
																					$fecha2 = $RsParada2['fecha'];
																					$fecha2 = strtotime($fecha2);
																					$aaaa = date("Y", $fecha2);
																					$mm = date("m", $fecha2);
																					$dd = date("d", $fecha2);

																					switch ($mm) {
																						case 01:
																							$mm = 'ENE';
																							break;
																						case 02:
																							$mm = 'FEB';
																							break;
																						case 03:
																							$mm = 'MAR';
																							break;
																						case 04:
																							$mm = 'ABR';
																							break;
																						case 05:
																							$mm = 'MAY';
																							break;
																						case 06:
																							$mm = 'JUN';
																							break;
																						case 07:
																							$mm = 'JUL';
																							break;
																						case 08:
																							$mm = 'AGO';
																							break;
																						case 09:
																							$mm = 'SEP';
																							break;
																						case 10:
																							$mm = 'OCT';
																							break;
																						case 11:
																							$mm = 'NOV';
																							break;
																						case 12:
																							$mm = 'DIC';
																							break;
																					}

																					$fechaFormateada2 = $dd.'-'.$mm.'-'.$aaaa;
																					echo $fechaFormateada2;
																				}
																																		?>" >
															</div>
														</div>

														<br>

														<!-- Textarea -->
														<div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="descripcionP">Descripción</label>  
															</div>

															<div class="elementFormP">
																<textarea class="" cols="80" id="descripcionP" name="descripcionP" rows="10"><?php
																		if($RsParada2['descripcion'] != NULL) {
																			echo $RsParada2['descripcion'];
																		}
																	?></textarea>
															</div>
														</div>

														<br>

														<!-- Select Basic -->
														<div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="ddlEstado">Estado</label>
															</div>
															<div class="elementFormP">
																<select id="ddlEstado" name="ddlEstado" class="">
																	<option value="0" <?php if($RsParada2['idEstado'] == 0) echo "selected"; ?> >Estado de la Parada</option>
																	<option value="1" <?php if($RsParada2['idEstado'] == 1) echo "selected"; ?> >Pendiente</option>
																	<option value="2" <?php if($RsParada2['idEstado'] == 2) echo "selected"; ?> >En Curso</option>
																	<option value="5" <?php if($RsParada2['idEstado'] == 5) echo "selected"; ?> >Realizada</option>
																</select>

																<br>

															</div>

														</div>

														<br>

														<legend>Ubicación.</legend>

														<!-- Select Basic -->
										                <div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="ddlProvinciaP">Provincia</label>
															</div>
															<div class="elementFormP">
																<select id="ddlProvinciaP" name="ddlProvinciaP" class="form-control_">
																	<?php
																		echo '<option value="0" ';
																		if($idProvincia == 0 || $idProvincia == '')/*	AGREGAR EL SI ES is_null(var)	*/
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
																																			if($RsPR["id"] == $idProvincia)
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
																	if ($idCiudad != 0)
																	{
																		$sqlCI = "SELECT id, descripcion FROM ciudad WHERE idProvincia = ".$idProvincia;
																		$resulCI = mysqli_query($db->conectarse(), $sqlCI) or die(mysqli_error());

																		echo '<option value="0" ';
																		if($idCiudad == 0 || $idCiudad == '')/*	AGREGAR EL SI ES is_null(var)	*/
																		{
																			echo 'selected';
																		}
																		echo '>Elija una ciudad</option>';

																		while($RsCI = mysqli_fetch_array($resulCI))
																		{
																			echo '<option title="'.$RsCI["descripcion"].'" value="'.$RsCI["id"].'"';
																			if($RsCI["id"] == $idCiudad){
																				echo ('selected');
																			}
																			echo '>'.$RsCI["descripcion"].'</option>';
																		}
																	}
																?>
																</select>

															</div>
														</div>

														<br>

														<!-- Select Basic -->
														<div class="form-group sep2">
															<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="ddlEstableciP">Establecimiento</label>
															</div>
															<div class="elementFormP">
																<select id="ddlEstableciP" name="ddlEstableciP" class="form-control_">
																<?php
																	if ($idEstableci != 0)
																	{
																		$sqlEST = "SELECT * FROM establecimiento WHERE idCiudad = ".$idCiudad;
																		$resulEST = mysqli_query($db->conectarse(), $sqlEST) or die(mysqli_error());

																		echo '<option value="0" ';
																		if($idEstableci == 0 || $idEstableci == '')/*	AGREGAR EL SI ES is_null(var)	*/
																		{
																			echo 'selected';
																		}
																		echo '>Elija un Establecimiento</option>';

																		while($RsEST = mysqli_fetch_array($resulEST))
																		{
																			echo '<option title="'.$RsEST["nombre"].'" value="'.$RsEST["idEstableci"].'"';
																			if($RsEST["idEstableci"] == $idEstableci){
																				echo ('selected');
																			}
																			echo '>'.$RsEST["nombre"].'</option>';
																		}

																		echo '<option value="-1">-- Otro Lugar --</option>';
																	}else
																		{
																			echo '<option value="0"></option>';
																		}
																?>
																</select>

															</div>
														</div>

														<br>

														<!-- Text input-->
										                <div class="form-group sep2">
										                	<div class="labelIzqFormP">
																<label class="control-label labelFormP" for="otroLugarP"></label>  
															</div>
															<div class="elementFormP">
																<input type="text" id="otroLugarP" name="otroLugarP" placeholder="Otro Lugar" value="" >
										                    
															</div>
										                </div>
										                
										                <br>

														<input type="hidden" id="idParada" name="idParada" value="<?php echo $idParada; ?>">
														<input type="hidden" id="idDiario" name="idDiario" value="<?php echo $RsParada2['idDiario']; ?>">
														<!--
														<input type="hidden" id="idEstableci" name="idEstableci" value="">
														-->
														<div class="pull-centro">
															<input type="submit" id="modificarP" name="modificarP" value="Modificar Parada">
															<input type="reset" id="btnCancelar" name="btnCancelar" value="Cancelar" >
														</div>

														<br/>

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
	
		<?php include('pie.php');?>
	</body>
</html>

