<!DOCTYPE html>
<html lang="en">
<?php
/*Este formulario lo voy a usar para dar de alta una reserva, tanto como para mi establecimiento como si soy inquilino
la diferencia seria que si recibo un parametro por GET = "GO" es porque viene desde el formulario consultarReserva.php haciendo 
click sobre una de las habitaciones de la tabla resultante. Ese dato por GET es el id de la habitacion
SI recibo por parametro GET = "DO" es que soy un due�o y quiero dejar sentada un reserva con fecha desde-hasta, habitacion y mail 
del que va a alquilar -> AL PRESIONAR SOBRE EL BOTON GUARDAR SE GUARDARA EL REGISTRO EN LA TABLA RESERVA CON ESTADO 'PENDIENTE' Y SE LE ENVIARA UN MAIL AL 
USUARIO PARA QUE CONFIRME 
EL DUE�O VE EL MAIL DE CONFIRMACION Y PUEDE CAMBIAR EL ESTADO DE LA RESERVA EN RESERVACION.PHP DONDE SE LISTAN TODOS LAS RESERVAS EN CUALQUIER ESTADO 
*/
//include('head.php');
session_start();

require('coneccion.php');
$db = new Conexion();
//$time = $db->validoTiempo();
	
require('reserva/classReservacion.php');
$rv = new reservacion();

require('reserva/classHabitacion.php');
$nhab = new habitacion();
	
if(!isset($_SESSION['idUsuario'])) header("location: index.php");

$res = $rv->tieneEstablecimiento($_SESSION['idUsuario']);

$tiene = mysqli_num_rows($res);
if($tiene == 0)
echo('<html><head>
		<script type="text/javascript">
			function confirm_alert()
			{
				alert("Antes de crear la reservas debe crear el anuncio.");
			}
		</script>
		</head><body>
		
		<script>
			confirm_alert();
			window.location="publicacion.php"
		</script>
	</body></html>');
?>
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
											<span class="visible-xs navbar-brand"> Men� lateral </span>
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
												<li><a href="publicacion.php"><span class="glyphicon glyphicon-lock"></span> M� publicacion </a></li>
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
										<h3><span class="glyphicon glyphicon-th-list"></span> Reservas</h3>
									</div>						
									
					<!--	</div>
					</div>
				</div>
			</div>-->
			<!-- Script Datepicker -->
		<!--	<link rel="stylesheet" type="text/css" href="../css/datePicker.css"  />
			<script src="../js/date.js"></script>
			<script type="text/javascript" src="../js/jquery.datePicker.js"></script>
			<script type="text/javascript" src="../js/additional-methods.js"></script>
			<script src="../js/jquery.validate.js"></script>
			<script src="../js/messages_es.js"></script>
			<script type="text/javascript">
			  $(function()
			  {
				  $('.date-pick').datePicker({clickInput:true});
			 });
			</script>-->
			<!-- Script Datapicker -->
			<div class="container">
				<div class="row"> 
					<div class="col-md-2">
					</div>
					<div class="shop-item col-md-7">
						<div class="col-md-8" id="agrupFormPublic" name="agrupFormPublic">
						<!-- form -->
							<form class="form-horizontal" action="altaReserva.php" method="post" enctype="multipart/form-data">
              					<fieldset>
								<!-- Text input-->
								<div class="form-group col-md-9">
								  <label class="control-label" for="fechaIng">Fecha de ingreso</label>  
								  <input type="text" class="date-pick" id="fechaIng" name="fechaIng" value="" >
								</div>
								<!-- Text input-->
								<div class="form-group col-md-9">
								  <label class="control-label" for="fechaFin">Fecha de salida</label>
								  <input type="text" class="date-pick" id="fechaFin" name="fechaFin" value="" >
								</div>
								<!-- Text input-->
								<div class="form-group col-md-9">
								  <label class="control-label" for="mail">E-mail</label> 
								  <input id="mail" name="mail" placeholder="E-mail" class="form-control input-lg" 
										type="text" value="<?php //echo $mail; ?>">
								</div>
								<div class="form-group col-md-9">
								  <label class="control-label" for="ddlHabitacion">Habitacion</label>	
									<select id="ddlHabitacion" name="ddlHabitacion" class="form-control">
										<option value="0">Elija una habitacion</option>
									  <?php 
									  if(isset($_GET['go']))
									  {
									  	$idH = $_GET['go'];
									  	$rs = $nhab->obtenerParaCombo($idH);
										$arr = mysqli_fetch_array($rs);
										echo('<option selected="selected" title="'.utf8_encode($arr["d"]).'" value="'.$arr["id"].'">'.utf8_encode($arr["d"]).'
											</option>');
									  }
									  else
									  {
										$sqlHabit0 = 'SELECT H.* FROM habitacion H INNER JOIN establecimiento E ON H.idEstableci = E.idEstableci 
												  WHERE E.idUsuario = '.$_SESSION["idUsuario"];
										
										$resultHabit0 = mysqli_query($db->conectarse(), $sqlHabit0) or die(mysqli_error());;
										
										while($RsHabit0 = mysqli_fetch_array($resultHabit0)){
									  ?>
										  <option title="<?php echo utf8_encode($RsHabit0["descripcion"]); ?>" 
											  value="<?php echo $RsHabit0["idHabitacion"]; ?>" > 
											<?php echo utf8_encode($RsHabit0["descripcion"]); ?> <?php //echo $RsHabit0["descripcion"]; ?>
										  </option>
									  <?php
										}
									  }
									  ?>
									</select>
                				</div>
								
								<div class="pull-centro">
								<br /><br/>
								  <input type="submit" id="btnGuardar" name="btnGuardar" value="Guardar" class="btn-lg btn">
								  <input type="reset" id="btnCancelar" name="btnCancelar" value="Cancelar" class="btn btn-lg btn-grey">
								</div>
								</fieldset>
            				</form>
						</div>
					</div>
				</div>
			
			<?php
				if($_POST != NULL)
				{
					$fechaInicio = $_POST['fechaIng'];
					$fechaFin = $_POST['fechaFin'];
					$mail = $_POST['mail'];
					$idHabitacion = $_POST['ddlHabitacion'];
					
					$isP = $rv->periodEnReserva($fechaInicio, $fechaFin, $idHabitacion);
					//var_dump($isP);
					if(!$isP)
					{
						$prob = $rv->nuevaReserva($fechaInicio, $fechaFin, $mail, $idHabitacion);
					}
					else{
						echo '<div class="col-sm-11">
								<div class="alert alert-warning"><h4>No se puede reservar porque ya esta ocupada para esas fechas</h4>
								</div>
							</div>';
					}
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
	
		<div class="footer" id="contact">
			<div class="container containerPie">
				<div class="row footer-top">
		   			<div class="col-md-6 footer_grid"><!--<div class="col-md-3 footer_grid">-->

		   				<h3 class="m_13"><img class="imgGloboRed" src="imagenes/logoUnlam.png"><div class="titJuntoLogo">Sobre nosotros</div></h3>

						<p class="m_14">Travelin fu� creado como proyecto final de la "Tecnicatura en Desarrollo Web" de La Universidad Nacional de La Matanza, 
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
				