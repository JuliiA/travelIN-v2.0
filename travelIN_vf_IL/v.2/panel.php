<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
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
						<h3><?php $_SESSION['nick'];?></h3>
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
							<div class="col-sm-9 col-md-10 affix-content">
								<div class="container">
									<div class="bg-success col-md-11">
										<div class="col-sm-1"></div>
											<div class="banner-wrap">
												<br/><div class="col-md-10"></div>
												<img class="img-circle" src="imagenes/f3.jpg" alt="Bienvenido"/>
											</div>
											<br/>
											<div class="text-muted"><h2>Recuerda ver como va tu publicacion de acuerdo a las calificaciones de tus inquilinos</h2><br/>
												<h4>Suma informacion para que te conozcan</h4><i class="glyphicon glyphicon-signal"></i>
											</div>
									</div>
									<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lectus orci, viverra nec neque non, tincidunt commodo leo. Nullam eleifend velit purus, id aliquam elit venenatis sit amet. Cras vel nisl eget eros tempus viverra. Phasellus in enim et nulla tempor blandit. Donec at lectus sit amet velit faucibus tincidunt quis sed est. Mauris placerat purus odio. In egestas, velit quis congue sodales, turpis lacus pellentesque neque, quis accumsan orci nibh sed mauris. Sed sit amet pulvinar felis. Aliquam consequat tellus non ligula elementum, at egestas quam vestibulum.
									Duis sed urna sit amet quam rutrum malesuada sed eu risus. Cras sit amet velit a neque tincidunt cursus sed ac nunc. Donec ac auctor purus. Proin viverra turpis sit amet dui sagittis, quis tempor elit suscipit. Curabitur rutrum lacus et diam lacinia, vel ullamcorper libero vulputate. Phasellus sem ligula, pharetra sed nisl sed, facilisis sagittis ante. Nullam egestas turpis et mauris aliquet cursus. Nullam vel eleifend neque.</p>
									<p>Pellentesque semper nisl eget auctor varius. Vivamus auctor venenatis rhoncus. Ut at elit eget justo placerat tincidunt. Etiam varius sapien lacus, eget vehicula diam tincidunt et. Integer at velit eu metus luctus bibendum. Mauris ornare hendrerit felis, at cursus enim tempor et. Nullam pretium at libero facilisis aliquet. Mauris malesuada eros sed erat laoreet blandit. Proin venenatis ac arcu sed tristique.</p>
									<p>In eget ullamcorper mi. Curabitur iaculis a eros in elementum. Pellentesque volutpat quam nec dolor pharetra, vitae iaculis lacus viverra. Aenean tristique felis sed leo ultricies lobortis. Phasellus ut libero dictum, dapibus elit et, pretium tellus. Donec fermentum neque dolor, vitae mattis odio blandit nec. Sed eget tellus ac dui pellentesque ultrices vitae eget arcu. Sed congue sit amet nunc eu sollicitudin. Praesent sit amet auctor purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque tincidunt erat sem, ac rhoncus nisi aliquet vel. Pellentesque at lectus faucibus, ultrices tellus non, accumsan justo. Curabitur vitae turpis aliquet, vehicula enim eu, rhoncus quam.</p>
									<p>Aenean vitae lorem a elit faucibus porta vitae nec risus. Mauris eget ligula nisi. Nunc eu egestas leo. In euismod consectetur sollicitudin. Curabitur sed justo eleifend, consequat tortor eu, semper massa. Proin rhoncus, odio eu pulvinar pulvinar, urna neque dignissim metus, eget porta libero justo non dolor. Phasellus rhoncus dui diam, at vehicula mauris rhoncus et. Cras quis varius mauris. Sed erat ante, mattis quis lacus nec, vehicula congue enim. Nam vel felis ultricies, sodales justo ac, tristique odio. Sed ullamcorper purus eget tortor posuere tempor. Donec at auctor felis, at iaculis quam. Proin fermentum sagittis sem vel varius. Proin enim nibh, mollis a nibh vitae, porta congue dui.</p>
									<p>Cras malesuada, est in placerat varius, risus nibh gravida tortor, et ullamcorper erat metus et velit. Fusce mollis mollis sem, non tincidunt nisi tristique eget. Aliquam erat volutpat. Vivamus mollis justo nunc, in commodo diam tristique ut. Proin at nunc dolor. Aenean dapibus commodo orci, in mollis odio volutpat in. Curabitur rutrum eu arcu vehicula interdum. Etiam eu imperdiet lacus, vel placerat magna. Duis molestie eu erat eu auctor. Sed cursus porta sem quis imperdiet. Cras pharetra ante urna, a tempus neque facilisis egestas. Proin vel nulla vitae eros luctus ornare ut vel sem. Donec eget erat in risus lobortis viverra. Mauris libero nisl, pretium in justo vel, porta euismod elit. Donec commodo porttitor metus, vel sagittis ante interdum ut.
									Vivamus sodales turpis et eros cursus, eu feugiat dolor rhoncus. Nulla nisi lectus, molestie eu quam nec, condimentum sagittis est. Cras eu volutpat quam, vehicula suscipit metus. Duis ornare urna arcu, non malesuada nunc bibendum at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer venenatis augue sed iaculis sodales. Donec nec turpis mi.</p>
									<p>Sed facilisis lorem in bibendum rutrum. Morbi ligula risus, aliquam a lorem quis, pulvinar varius odio. Sed facilisis mi sit amet elit euismod hendrerit. Vestibulum fermentum erat eu semper ultricies. Interdum et malesuada fames ac ante ipsum primis in faucibus. In tristique orci tortor, in mollis magna varius non. Nullam sed dui scelerisque, porta nunc id, iaculis urna. Nunc faucibus ac enim nec sollicitudin.
									Quisque nec ante arcu. Nullam aliquet et turpis nec pulvinar. Maecenas tellus velit, lobortis vitae laoreet eu, feugiat eu orci. Maecenas molestie malesuada nulla, id dignissim sem blandit at. Suspendisse hendrerit quis arcu ut malesuada. Nam porttitor magna et porttitor convallis. Curabitur gravida elementum lorem, in mattis turpis tristique tincidunt. Aliquam id neque euismod, consectetur diam sit amet, adipiscing felis. Phasellus sit amet sem elementum, elementum nisi non, aliquam ligula. Morbi in interdum mi, at pulvinar nunc.</p>
									<p>Praesent aliquet, sapien id pulvinar auctor, elit nisl imperdiet elit, id mattis felis lacus a neque. Fusce ullamcorper, urna vitae mollis tempus, sapien urna aliquam neque, sed dignissim nunc mauris sed nisi. Mauris malesuada congue mauris. Aenean vel justo tincidunt, euismod dolor ut, mattis purus. Vivamus eget adipiscing augue. Curabitur et neque faucibus nunc porta ultrices eu ut justo. Nam eu quam et urna consectetur convallis. Integer at fringilla erat, ut molestie nulla. Maecenas rutrum justo ut lectus gravida, vitae eleifend nulla ullamcorper. Sed consequat sit amet purus id congue. Integer condimentum, odio non pellentesque posuere, eros nisi porttitor nunc, ac laoreet nibh quam eu eros. Sed quis massa posuere, gravida erat non, varius turpis. Morbi venenatis vestibulum vulputate. Vestibulum arcu mauris, commodo commodo ligula nec, molestie blandit neque. Nulla imperdiet, massa nec placerat iaculis, odio lacus aliquam dui, eu vehicula velit dolor et augue.</p>-->

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

