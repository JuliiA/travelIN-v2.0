<!DOCTYPE HTML>
<html>
<head>
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
<!--
	<link href="css/menuLateral1.css" rel='stylesheet' type='text/css' />
	<script src="js/menuLateral1.js" type="text/javascript"></script>
-->
	<link href="css/menuVertical1.css" rel='stylesheet' type='text/css' />
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
	<body>
		<?PHP
		  session_start();
		  include 'coneccion.php';
		  $db = new Conexion();
		?>
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
			echo '	<li class="page-scroll"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
					<li class="active"><a href="panel.php" class="scroll_">Panel<span> </span></a></li>
					<li class="page-scroll"><a href="diario.php" class="scroll_">Diarios<span> </span></a></li>
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
						<h3>Mi nombre</h3>
					</div>
					<div class="lineaSeparadora"></div>

					<div class="contCuerpoConMenu">

						<div class="row affix-row">
							<div class="col-sm-3 col-md-2 affix-sidebar">
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
												<li><a href="publicacion.php"><span class="glyphicon glyphicon-lock"></span> Mí publicacion </a></li>
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
												<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> WithBadges <span class="badge pull-right">42</span></a></li>
												<li><a href=""><span class="glyphicon glyphicon-cog"></span> PreferencesMenu</a></li>
											</ul>
										</div><!--/.nav-collapse -->
									</div>
								</div>
							</div>
							<div class="col-sm-9 col-md-10 affix-content">
								<div class="container">

									<div class="page-header">
										<h3><span class="glyphicon glyphicon-certificate"></span> Reservas</h3>
										<ul class="nav nav-tabs product-details-nav">
								<li class="active"><a href="#tab1" data-toggle="tab">Como viajero</a></li>
								<li><a href="#tab2" data-toggle="tab">Como inquilino</a></li>
							</ul>
							<!-- Tab Content (Full Description) -->
							<div class="tab-content product-detail-info">
								<div class="tab-pane active" id="tab1">
									<?php
									require('reserva/classReservacion.php');
									$rv = new reservacion();
									
									$res = $rv->traerReservasUsuario($_SESSION['idUsuario']);
									try
									{
										$cant = mysqli_num_rows($res);
										if($cant == 0)
											echo('<br/><h3>No ha realizado ningun reserva hasta ahora</h3>');
										else
										{
										echo '<br/><br/><div class="table-responsive margenTabla"> 
      											<table class="table table-bordered">
													<thead>
														<tr>
															<td>Estado</td>
															<td>Fecha Desde</td>
															<td>Fecha Hasta</td>
															<td>Lugar</td>
														</tr>
													</thead>
								        			<tbody>';
														while($row = mysqli_fetch_array($res))
														{
															switch ($row['e']) 
															{
																case "1":
																	$estado = "Pendiente";
																	break;
																case "2":
																	$estado = "En curso";
																	break;
																case "3":
																	$estado = "Suspendida";
																	break;
																default:
																	$estado = "Sin especificar";
															 }
														
															  $lugar = "".$row['establec']." - ".$row['ciu'];
															  echo('<tr>
																	<td>'.$estado.'</td>
																	<td>'.$row['fi'].'</td>
																	<td>'.$row['ff'].'</td>
																	<td>'.$lugar.'</td>
															  		</tr>');
														}
											echo('</tbody>
											   </table>
											  </div>');
										}
									}
									catch(Exception $ex)
									{
										die('Ha ocurrido un error en el servidor');
									}									
									?>
								</div>
								<!-- Tab Content (Specification) -->
								<div class="tab-pane" id="tab2">
									<?php
										$stm = $rv->puedeAdminReserva($_SESSION['idUsuario']);
//										var_dump($stm);
										if($stm)
										{
											$few = $rv->traerReservaron($_SESSION['idUsuario']);
											$ct = mysqli_num_rows($few);
											if($ct == 0)
												echo('<br/><br/><h4>No han realizado ninguna reserva para su establecimiento</h4>');
											else
											{
												echo('<br/><br/><div class="table-responsive margenTabla"> 
														<table class="table table-bordered textoTabla">
														<thead>
															<tr>
																<th><h5>Estado</h5></th>
																<th><h5>Viajero</h5></th>
																<th><h5>Fecha Desde</h5></th>
																<th><h5>Fecha Hasta</h5></th>
																<th><h5>Lugar</h5><th>
															</tr>
														</thead>
														<tbody>');
												while($row = mysqli_fetch_array($few))
												{
													$img1 = '<i class="icon-chevron-up">';
													switch ($row['e']) 
													{
														case "1":
															$estado = "Pendiente";
															break;
														case "2":
															$estado = "En curso";$img1 = '<a href="#" onClick="$rv->cambiarEstado('.$row['id'].');"><img class="imgTabla" src="imagenes/tilde_verde.png" alt="Activar"></a>';
															break;
														case "3":
															$estado = "Suspendida";
															break;
														case "4": $estado = "Concluida";break;
														default:
															$estado = "Sin especificar";
													 }
												
													  $lugar = "".$row['establec']." - ".$row['ciu'];
													  echo('<tr>
															<td>'.$estado.'</td>
															<td>'.$row['us'].' - '.$row['mail'].'</td>
															<td>'.$row['fi'].'</td>
															<td>'.$row['ff'].'</td>
															<td>'.$lugar.'</td>
															<td>'.$img1.'</td>
													  </tr>');
												}
												echo('</tbody>
												   </table>
												 </div>');
											}
											
											echo ('<div class="team-member">
																<div class="team-member-info">
																	 <a href="consultarReserva.php" alt="consultar" class="nav">
																	 <b>Consultar Disponibilidad</b>
																	 </a>
																</div>
														</div>');
										}
										else{
											echo '<h3>No tiene creado un establecimiento.</h3><b>No puede administrar reservas</b>';
											}
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

		</div>
	
		<div class="footer" id="contact">
			<div class="container containerPie">
				<div class="row footer-top">
		   			<div class="col-md-6 footer_grid"><!--<div class="col-md-3 footer_grid">-->

		   				<h3 class="m_13"><img class="imgGloboRed" src="imagenes/logoUnlam.png"><div class="titJuntoLogo">Sobre nosotros</div></h3>

						<p class="m_14">Travelin fué creado como proyecto final de la "Tecnicatura en Desarrollo Web" de La Universidad Nacional de La Matanza, 
							por los alumnos Avellaneda, Juliana y Quipildor, Leandro.</p>
					</div>
					<div class="col-md-6 footer_grid"><!--<div class="col-md-3 footer_grid">-->
						<!--<ul class="f_grid1">-->
						<h3 class="m_13"><img class="imgGloboRed" src="imagenes/world.png"><div class="titJuntoLogo">Redes Sociales</div></h3>
	
								
							<p class="m_14"><!--aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut <span class="m_15">aliquip ex ea commodo</span> consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat-->
							<div id="contImgRedes">
								<div>
									<a href="#"><img class="logoRedes" src="imagenes/logoFace1.png"></a>
									<a href="#"><img class="logoRedes" src="imagenes/logoTwitter1.png"></a>
									<a href="#"><img class="logoRedes" src="imagenes/logoGoo1.png"></a>
									<a href="#"><img class="logoRedes" src="imagenes/logoPint1.png"></a>
								</div>
							</div>
							</p>
					</div>
	   		</div>
	   		<div class="footer_bottom">
		       	<div class="clearfix"> </div>
		    	</div>
		    	<script type="text/javascript">
					$(document).ready(function() {
					
						var defaults = {
			  				containerID: 'toTop', // fading element id
							containerHoverID: 'toTopHover', // fading element hover id
							scrollSpeed: 1200,
							easingType: 'linear' 
			 			};
					
					
						$().UItoTop({ easingType: 'easeOutQuart' });
					
					});
				</script>
		    	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;">Arriba </span></a>
	   	</div>
	   </div>
	</body>
</html>
