<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<?php
		session_start();
		include 'coneccion.php';
		$db = new Conexion();

		$idUsuario = $_SESSION['idUsuario'];

		$sqlDiario0 = 'SELECT D.*, COUNT(P.idParada) AS cantParadas FROM diarioDeViajero D LEFT JOIN parada P ON D.idDiario=P.idDiario 
						WHERE D.idUsuario='.$idUsuario.' GROUP BY D.idDiario';

		if(!($consultaDiario0 = mysqli_query($db->conectarse(), $sqlDiario0)))
		{
			echo('Ocurrio un error ejecutando el query de busqueda del establecimiento [' . mysqli_error() . ']');
	//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
		}else
			{
				//$RsDiario0 = mysqli_fetch_assoc($consultaDiario0);
				$filasD0 = mysqli_num_rows($consultaDiario0);

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
					<li class="page-scroll"><a href="panel.php" class="scroll_">Panel<span> </span></a></li>
					<li class="active"><a href="diarios.php" class="scroll_">Diarios<span> </span></a></li>
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
						   					<div id="agrupFormPublicacion" name="agrupFormPublicacion" class="contAgrupForm_">

									            <form class="form-horizontal" action="diarioNuevoC.php" method="post" enctype="multipart/form-data">
													<!--<fieldset>-->

										                <!-- Form Name -->
										                <legend id="tituloForm">Diarios.</legend>
										                <!--<div id="tituloFormulario" class="lineaSeparadora">Contáctenos.</div>-->
										                <!--
										                <div class="centrador1">
										                	<h3 class="titH3">Precio por noche $ </h3>
										                </div>
														-->
										                <div class="contEncabezadoTabla1">
															<div class="tituloTabla1">
																<h4>Mis Diarios.</h4>
															</div>
															<div class="btnTituloTabla1">
																<input type="button" id="btnDiarioNuevo" name="btnDiarioNuevo" value="Crear Diario" onClick="location.href='diarioNuevo.php'">
															</div>
														</div>

														<br>
									
													<!--</fieldset>-->
												</form>
											</div>
										</div>
									</div>

									<br>

														<!--<section>-->
															<table class="table table-striped span3">
																<thead>
																	<tr>
																		<th>Nombre</th>
																		<th>Descripcion</th>
																		<th>Paradas</th>
																	</tr>
																</thead>
																<tbody>
																<?php
																	if($filasD0 == 0)
																	{
																		echo ('<tr><td>No se encontraron diarios guardados.</td></tr>');
																	}else
																		{
																			while ($RsDiario0 = mysqli_fetch_assoc($consultaDiario0)) {
																				echo '<tr>
																						<td><a href="paradas.php?num='.$RsDiario0['idDiario'].'">'.$RsDiario0['nombre'].'</a></td>
																						<td><a href="paradas.php?num='.$RsDiario0['idDiario'].'">'.$RsDiario0['descripcion'].'</a></td>
																						<td><a href="paradas.php?num='.$RsDiario0['cantParadas'].'">'.$RsDiario0['cantParadas'].'</a></td>
																					</tr>';
																			}
																		}
																	/*
																	<tr>
																		<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
																		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
																		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
																		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
																		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
																		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
																		<td>2</td>
																		<td>Amarillo</td>
																	</tr>
																	<tr>
																		<td>Hola 2</td>
																		<td>3</td>
																		<td>Verde</td>
																	</tr>
																	<tr>
																		<td>Adios</td>
																		<td>5</td>
																		<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
																		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
																		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
																		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
																		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
																		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
																	</tr>
																	<tr>
																		<td>Eooo</td>
																		<td>3</td>
																		<td>Gris</td>
																	</tr>
																	<tr>
																		<td>Hasta luego</td>
																		<td>5</td>
																		<td>Naranja</td>
																	</tr>
																	*/
																?>
																</tbody>
															</table>
														<!--</section>-->




<!--
													</fieldset>

												</form>


											</div>
										</div>

									</div>
-->
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
	
		<?php include("pie.php");?>
	</body>
</html>

