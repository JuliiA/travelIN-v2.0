<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<title>travelIN</title>
<!--Icon-->
<link rel="icon" href="imagenes/travelin-ico.png" type="image/x-icon">
<link rel="shortcut icon" href="imgagenes/travelin-ico.png" type="image/x-icon" />
	<?php
		session_start();
		include 'coneccion.php';
		$db = new Conexion();

		$idUsuario = $_SESSION['idUsuario'];	
	?>
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
	<?PHP
		if(!isset($_SESSION['idUsuario'])) header("location: index.php");
?>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="imagenes/seven_1.png" class="img-responsive" alt="Travel In"/></a>
			</div>
			<nav class="top-nav">
				<ul class="top-nav">
					<?php
						if(!(isset($_SESSION['idUsuario'])))
						{
							echo '		<script language="javascript">
											window.location="login.php"
										</script>';
						}else {
								include("menu_log.php");
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
														</h4>
													</a>
												</li>
												<li class="active"><a href="#" data-toggle="collapse" data-target="#toggleMiPublic" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Mi publicaci&oacute;n <span class="caret pull-right"></span>
													</a>
													<div id="toggleMiPublic" style="height: auto;">
														<ul class="nav nav-list">
															<li><a href="publicacion.php">Mi Publicaci&oacute;n.</a></li>
															<li><a href="publicacionDescripcion.php">Descripci&oacute;n.</a></li>
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
														<span class="glyphicon glyphicon-inbox"></span> Mensajes <span class="badge pull-right">42</span>
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
	<!--											<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> WithBadges <span class="badge pull-right">42</span></a></li>
												<li><a href=""><span class="glyphicon glyphicon-cog"></span> PreferencesMenu</a></li>-->
											</ul>
										</div><!--/.nav-collapse -->
									</div>
								</div>
							</div><!-- fin menu collapse-->

							<div class="col-sm-10 col-md-9 affix-content">
								<div class="container">
									<div>
										<div id="contFormPublicacion" class="contFormulario1">
						   					<div id="agrupFormPublicacion" name="agrupFormPublicacion" class="contAgrupForm">
												<form id="busquedaDiario" method="post" action="listaDiarios.php">
													<div class="col-md-4">
														<label>Provincia</label>
														<select class="dropDownlist" name="ddlProvincia" id="ddlProvincia">
															<option value="0">Elija una provincia</option>
																<?php 
																	$query = "SELECT PR.id, PR.descripcion FROM provincia PR INNER JOIN pais PA ON PR.idPais = PA.id WHERE PA.codAlfa LIKE 'ARG'";
																	$result = mysqli_query($db->conectarse(), $query) or die(mysqli_error());
																	//var_dump($result);
																	while($row = mysqli_fetch_array($result)){
																?>
																		<option title="<?php echo ($row["descripcion"]); ?>" value="<?php echo $row["id"]; ?>"> 
																			<?php echo ($row["descripcion"]); ?>
																		</option>
																<?php
																	}
																?>
														</select>
													</div>
													<div class="col-md-4">
														<label>Nombre</label>
														<input type="text" name="txtBusDiario" class="input-md" id="txtBusDiario" placeholder="Buscar Diario" autocomplete="off"/><i class="fa fa-search"></i>
													</div>
													<div class="col-md-4">
														<label>Usuario</label>
														<input type="text" name="txtBusUsuario" class="input-md" id="txtBusUsuario" placeholder="Buscar Usuario" autocomplete="off"/><i class="fa fa-search"></i>								</div>
														<input type="hidden" name="idDiario" id="idDiario" />
													</div>
													<div class="col-md-11">
														<label>   </label>
														<div align="center"><input type="submit" class="btn btn-inverse btn-sm" value="Buscar diarios"/></div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<br />
									<div class="row">
										<div class="col-lg-13">
											<div class="solidline">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-13">
											<div class="thumbnail">
												<h3 class="text-info">Lista/Resultados</h3>
												<br />
												<div id="listaAjax">
													<?php 
														include('paginador.php');
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- divider -->
				
			</div>
		</div>
	</div>
<?php include('pie.php');?>
</body>
</html>
