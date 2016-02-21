<!DOCTYPE HTML>
<html>
<head>
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
		echo '		<li class="active"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
						<li class="page-scroll"><a href="login.php" class="scroll_">Ingreso<span> </span></a></li>
						<li class="page-scroll"><a href="reg.php" class="scroll_">Registro<span> </span></a></li>';
	}else {
			echo '	<li class="active"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
						<li class="page-scroll"><a href="panel.php" class="scroll_">Panel<span> </span></a></li>
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

   	

	<div id="contDivBusqueda1">
		<div id="contDivBusqueda2">
		    <?php
		    	include("formBusqueda1.php");
		    ?>
	    </div>
	</div>

	<br>

	<div class="main">

      	
<!--	************ Inicio de Busqueda *****************	-->

<?php 
	$provincia = $_POST['ddlProvincia'];
	$ciudad = $_POST['ddlCiudad'];
	$tipoEstableci = $_POST['ddlProveedor'];

	$contador = 1;
	$eleccion = 0;
	//$contadorTotal = 0;

	//$sql = 'SELECT * FROM establecimiento WHERE idCiudad = '.$ciudad.' AND idTipoEstableci = '.$tipoEstableci.' AND idEstado = 2';
	if($provincia == 0)//E.idEstado el valor 2 es activo, 1 pendiente, ............
	{
		if($tipoEstableci == 0)
		{
			//echo "Muestra todo";
			$sql = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, C.descripcion ciudad, P.descripcion provincia FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id WHERE E.idEstado = 2';
			$eleccion = 1;
		}else
			{
				//echo("filtra solo por rubro");
				$sql = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, C.descripcion ciudad, P.descripcion provincia FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id WHERE E.idTipoEstableci = '.$tipoEstableci.' AND E.idEstado = 2';
				$eleccion = 2;
			}
	}else
		{
			if($ciudad == 0)
			{
				if($tipoEstableci == 0)
				{
					//echo "filtra por provincia solamente".$provincia;
					$sql = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, C.descripcion ciudad, P.descripcion provincia FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id WHERE E.idEstado = 2 AND P.id ='.$provincia;
					$eleccion = 3;
				}else
					{
						//echo("filtra por provincia y rubro");
						$sql = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, C.descripcion ciudad, P.descripcion provincia FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id WHERE E.idEstado = 2 AND P.id ='.$provincia.' AND E.idTipoEstableci = '.$tipoEstableci;
						$eleccion = 4;
					}
			}else
				{
					if($tipoEstableci == 0)
					{
						//echo("filtra por (provincia) ciudad prov= ".$provincia." ciu= ".$ciudad);
						$sql = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, C.descripcion ciudad, P.descripcion provincia FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id WHERE E.idEstado = 2 AND C.id = '.$ciudad;
						$eleccion = 4;
					}else
						{
							//echo("filtra por (provincia) ciudad y rubro");
							$sql = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, C.descripcion ciudad, P.descripcion provincia FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id WHERE E.idEstado = 2 AND C.id = '.$ciudad.' AND E.idTipoEstableci = '.$tipoEstableci;
							$eleccion = 5;
						}
				}
		}


/*
	$sql = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, C.descripcion ciudad, P.descripcion provincia FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id WHERE E.idEstado = 2';
*/	
	
	if(!$result = mysqli_query($db->conectarse(), $sql)){
	    //echo('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
	    echo("MALLLLL");
	}else
		{
			//echo '<div id="infoBusqueda" name="infoBusqueda">Cantidad de resultados encontrados: '.mysqli_num_rows($result).'<br/></div>';
			if(mysqli_num_rows($result) > 0)
			{
				echo '<div class="featurelist2" id="news">
				   		<div class="container">
				   			<h3 class="m_7">Resultados de la busqueda.</h3>
				   			
			      			<!--<p class="m_8">-->
			      			<!--	<div class="pull-centro">
				      				<div class="contTextoBuscado1">Provincia: </div>
				      				<div class="contTextoBuscado2">Ciudad: </div><br>
				      				<div class="contTextoBuscado3">Rubro: </div>
				      			</div>-->
			      			<!--</p>-->
			      			<div class="sep3"></div>
				   			<div class="row">';

				while($Rs = mysqli_fetch_array($result))
				{
					
					$direFoto = "imagenes/Imagen-para-sin-imagen.jpg";
					//$direFoto = "imagenes/f3.jpg";
					$contador += 1;
					$clave = "nvw42rbhfbhrefb3i34";
					$idEst = md5($clave.$Rs['idE']);

					$textoRed = substr($Rs['descE'],0,280);
					$textoRed = strip_tags($textoRed);

					if (!(($Rs['fotoE'] == '') || ($Rs['fotoE'] == null)))
					{
						$direFoto = $Rs['fotoE'];
					}

					echo '		<div class="col-md-4 featurelist_top anuncioResum">

						   			<div class="view view-fifth_">
				         	            
				         	            <div class="mask2">
				            	            <h2>'.$Rs['nombreE'].'</br><p>'.$Rs['ciudad'].', '.$Rs['provincia'].'</p></h2>
										</div>
				                  	   
										<a href="verAnuncio.php?anuncio='.$Rs['idE'].'">
											<img src="'.$direFoto.'" class="img-responsive imgAnuncio1" alt="'.$Rs['nombreE'].'"/>
										</a>

									</div>
			                    	<p class="m_11">'.$textoRed.' </p>
			                    	<div class="feature_btn"><a href="verAnuncio.php?anuncio='.$idEst.'">Mas...</a></div>
			                	</div>';
				//}

					if($contador == 4) {
						echo '	</div>
								<p></p>
								<div class="row">';

						$contador =1;
					}
				}

          	echo '			</div>
          				</div>
          			</div>';//esto cerró todo el cuerpo que empezó en el titulo sobre los artículos

			}
		}
?>


<!--	*********************fin*************************	-->

	   </div>
	   <div class="footer" id="contact">
	   	<div class="container containerPie">
	   	   <div class="row footer-top">
	   			<div class="col-md-6 footer_grid"><!--<div class="col-md-3 footer_grid">-->

	   				<h3 class="m_13"><img class="imgGloboRed" src="imagenes/logoUnlam.png"><div class="titJuntoLogo">Sobre nosotros</div></h3>

                  <p class="m_14">Travelin fué creado como proyecto final de la "Tecnicatura en Desarrollo Web" de La Universidad Nacional de La Matanza, 
                  por los alumnos Avellaneda, Juliana y Quipildor, Leandro.</p>

<!--	   			
		   			<h3 class="m_13">About ios7 page</h3>
		   			<p class="m_14">aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.</p>
		   			<div class="address">
							<p>500 Lorem Ipsum Dolor Sit,</p>
							<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 		<p>Email: <span>support[at]seven.com</span></p>
						</div>
-->						
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
	   			<!--
	   			<div class="col-md-3 footer_grid">
	   				<ul class="f_grid1">
							<li><i class="f-link"> </i>
								<div class="extra-wrap">
									<p>Quick Links</p>
								</div>
								<div class="clearfix"> </div>
							</li>
						</ul>
						<div class="footer_lists">
							<ul class="list">
					   		<li><a href="#">Home</a></li>
					   		<li><a href="#">Features</a></li>
					   		<li><a href="#">Screenshots</a></li>
					   		<li><a href="#">About</a></li>
							</ul>
				    		<ul class="list1">
					   		<li><a href="#">Pricing</a></li>
					   		<li><a href="#">News</a></li>
					   		<li><a href="#">Stats</a></li>
					   		<li><a href="#">Contact</a></li>
				    		</ul>
				    		<div class="clearfix"> </div>
						</div>
	   			</div>
	   			<div class="col-md-3 footer_grid">
	   				<ul class="f_grid1">
							<li><i class="f-msg"> </i>
								<div class="extra-wrap">
									<p>Newsletter</p>
								</div>
								<div class="clearfix"> </div>
							</li>
						</ul>
						<p class="m_14">aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut</p>
						<div class="footer_search">
						   <form>
				     			<input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
				     			<input type="submit" value="Submit">
				   		</form>
			    		</div>
	   		 	</div>
	   		 	-->
	   		</div>
	   		<div class="footer_bottom">
	   		<!--
		   		<div class="copy">
			      	<p>2014 Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
			    	</div>
			    	<div class="social">	
				   	<ul>	
					  		<li class="s1"><a href="#"><span> </span></a></li>
					  		<li class="s2"><a href="#"><span> </span></a></li>
					  		<li class="s3"><a href="#"><span> </span></a></li>	
					  		<li class="s4"><a href="#"><span> </span></a></li>
					  		<li class="s5"><a href="#"><span> </span></a></li>
					  		<li class="s6"><a href="#"><span> </span></a></li>	
					  		<li class="s7"><a href="#"><span> </span></a></li>	
					  		<li class="s8"><a href="#"><span> </span></a></li>	
					  		<li class="s9"><a href="#"><span> </span></a></li>							
				   	</ul>
			    	</div>
			   -->
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

