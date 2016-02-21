<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP
	session_start();
/*	include('head.php');
	include 'requires/coneccion.php';
	$db = new Conexion();
	
	if(!isset($_SESSION['idUsuario'])) header("location: ../index.html");
	*/
?>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<title>travelIN</title>
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
	<?php

	$idUsuario = $_SESSION['idUsuario'];
	$msj = $_GET['msj'];
	$from = $_GET['op'];
	
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>
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
							<h1><a href="mensajes.php">Continuar leyendo  <i class="glyphicon glyphicon-envelope"></i></a></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		<?php	
			/*$sqlMensajes3 = 'SELECT M.*, U.email mailOrigen FROM mensaje M INNER JOIN establecimiento E ON M.idEstableci = E.idEstableci 
							INNER JOIN usuario U ON M.idUsuarioEscrib = U.idUsuario
							WHERE M.idMensaje = '.$msj.' AND E.idUsuario = '.$idUsuario.' AND E.idEstado = 2';*/
			if($from == "sfdjdjep")
				$sqlMensajes3 =	'SELECT m.idMensaje id,m.descripcion texto, m.fechaEmitido f_emit, u.email emisor, u.nick usuario
							FROM mensaje m inner join usuario u on m.idUsuarioEscrib = u.idUsuario
							WHERE m.idMensaje ='.$msj.' and m.idUsuarioRecib = '.$idUsuario.'';

			if($from == "fowjbept")
				$sqlMensajes3 = 'SELECT m.idMensaje id,m.descripcion texto, m.fechaEmitido f_emit, u.email emisor, u.nick usuario
							FROM mensaje m inner join usuario u on m.idUsuarioEscrib = u.idUsuario
							WHERE m.idMensaje ='.$msj.' and m.idUsuarioEscrib = '.$idUsuario.'';

			if(!$resulMensajes3 = mysqli_query($db->conectarse(), $sqlMensajes3)){
				echo('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
		
			}else
				{
					$cantResulMensajes3 = $resulMensajes3->num_rows;
					if($cantResulMensajes3 == 0)
					{
						echo('<div class="row">
								<div class="container">
									<div class="col-sm-11">
										<div class="alert alert-warning">Mensaje no encontrado.</div>
									</div>
								</div>
							</div>');
						
					}else
						{
							$RsMensajes3 = mysqli_fetch_array($resulMensajes3);
		
							$idMensaje = $RsMensajes3['idMensaje'];
							$descripcion = $RsMensajes3['texto'];					
							$fecha = $RsMensajes3['f_emit'];
		
							$usuario = $RsMensajes3['usuario'];
							//$estableci = $RsMensajes3['idEstableci'];
		
							//$leido	= $RsMensajes3['leido'];
							$mailOrigen = $RsMensajes3['emisor'];
						
							echo ('<div class="row">
									<div class="container">
										<div class="blog-post blog-single-post">
											<div id="contMensajes1" name="contMensajes1 clas="col-md-7">
												<div id="msjMail" name="msjMail"><h5>De: </h5>'.$mailOrigen.'</div>
												<div id="msjFecha" name="msjFecha"><h5>Escrito el: </h5>'.$fecha.'</div>
											</div>
										</div>
										
										<div class="blog-post blog-single-post">
											<div>
												<div id="msjDescripcion" name="msjDescripcion"><h5>Mensaje: </h5>'.utf8_encode($descripcion).'</div>
											</div>
										</div>
									</div>
								</div>');
						}
				}

?>
					<br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
							<p class="m_14">
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
	   </div>
</body>
</html>