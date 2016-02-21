<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?PHP
	session_start();
	include 'coneccion.php';
	$db = new Conexion();
?>
<!DOCTYPE HTML>
<html>
<head>
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

	<script type="text/javascript" src="js/mapa.js"></script>
    <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
    <script type="text/javascript" src="js/api_js.js?sensor=false"></script><!-- este reemplaza al comentado arriba -->
	
    <script type="text/javascript" src="js/jquery.js"></script>
    
    <link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="jquery.1.4.2.js"></script>
	<script type="text/javascript" src="jsDatePick.jquery.min.1.3.js"></script>
	<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"fechaInic",
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
		new JsDatePick({
			useMode:2,
			target:"fechaFin",
			dateFormat:"%d-%M-%Y"
		});
	};
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
		echo '			<li class="active"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
						<li class="page-scroll"><a href="login.php" class="scroll_">Ingreso<span> </span></a></li>
						<li class="page-scroll"><a href="reg.php" class="scroll_">Registro<span> </span></a></li>';
	}else {
			echo '		<li class="active"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
						<li class="page-scroll"><a href="panel.php" class="scroll_">Panel<span> </span></a></li>
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

   	
<!--
	<div id="contDivBusqueda1">
		<div id="contDivBusqueda2">
		    <?php
		    	//include("formBusqueda1.php");
		    ?>
	    </div>
	</div>

	<br>
-->
	<div class="main">

      	
<!--	************ Inicio de Busqueda *****************	-->

<?php
	$anuncio = $_GET['anuncio'];
	//$anuncio = 13;

	$sql1 = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, E.precio precioE, E.lat lat, E.lng lng, C.descripcion ciudad, P.descripcion provincia 
				FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id 
				WHERE E.idEstado = 2 AND E.idEstableci = '.$anuncio;

	if(!$result = mysqli_query($db->conectarse(), $sql1)){
		//echo('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
		echo("MALLLLL");
	}else
		{
			//echo '<div id="infoBusqueda" name="infoBusqueda">Cantidad de resultados encontrados: '.mysqli_num_rows($result).'<br/></div>';
			if(mysqli_num_rows($result) > 0)
			{
				$Rs = mysqli_fetch_array($result);

				$direFoto = "imagenes/Imagen-para-sin-imagen.jpg";
				//$contadorTotal += 1;

				//$textoRed = substr($Rs['descE'],0,280);

				if (!(($Rs['fotoE'] == '') || ($Rs['fotoE'] == null)))
				{
					$direFoto = $Rs['fotoE'];
				}
			}
		}

?>

		<div class="featurelist2" id="news"
			<div class="container">
	   			<h3 class="m_7"><?php echo($Rs['nombreE']); ?></h3>
      			<p class="m_8 titCiudad"><?php echo($Rs['ciudad'].", ".$Rs['provincia']); ?>.</p>
				<!-- #region zona redes sociales -->
				<script type="text/javascript">
					var dir = window.document.URL;
					var dir2 = encodeURIComponent(dir);
					var tit = window.document.title;
					var tit2 = encodeURIComponent(tit);
				</script>
				<p class="btn-sm btn btn-info" onclick="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);window.location.href=('http://twitter.com/?status='+tit2+'%20'+dir+'');"><i class="glyphicon glyphicon-star"></i>twitter</p>
				<!--<p class="m_5 btn btn-primary"><i class="glyphicon glyphicon-hand-up"></i>Compartir FB</p>-->
				<div id="fb-root"></div>
					<script type="text/javascript">
					(function() {
					var element = document.createElement('script'); 
					element.type = "text/javascript"; 
					element.async = true;
					element.id = "facebook-jssdk"
					element.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
					var s = document.getElementsByTagName('script')[0]; 
					s.parentNode.insertBefore(element, s);
					})();
					</script>
				<div class="fb-like" data-href="http://www.travelin.com.ar" data-width="292"></div>
				<!--<a class="m_5 btn btn-primary" href="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);var dir2= encodeURIComponent(dir);window.location.href=('http://www.facebook.com/share.php?u='+dir2+'&amp;t='+tit2+'');">Compartir en Facebook</a>-->
				 
				<p><a class="btn-sm btn btn-danger" href="https://plus.google.com/108737684927125225876/"><img src="https://ssl.gstatic.com/images/icons/gplus-32.png" width="20" height="12" alt="Compartir en Google+" title="Da un clic para entrar en Google+" /></a></p>

				<!-- #endregion zona redes sociales -->
	   			<div class="row">
	   				<div id="agrup1">
	   				<div id="agrup2">
		   				<div id="contImagenAnuncio1" class="col-md-6 about_top">
		   					<div id="contImagenAnuncio2">
		   						<img id="imgAnuncio1" src="<?php echo($direFoto); ?>">
		   					</div>
		   					<div id="lnkGaleria">
		   						<a href="galeria.php?anuncio=<?php echo $anuncio; ?>" class="lnkGaleria2"><h4>Galeria</h4></a>
		   					</div>
		   				</div>

		   				<div id="contFormContacto" class="col-md-6">
		   					<div id="agrupFormPublic" name="agrupFormPublic">

					            <form class="form-horizontal" action="consultarAnuncio.php" method="post" enctype="multipart/form-data">
									<fieldset>

						                <!-- Form Name -->
						                <legend id="tituloForm">Contáctenos.</legend>
						                <!--<div id="tituloFormulario" class="lineaSeparadora">Contáctenos.</div>-->
						                
						                <div class="centrador1">
						                	<h3 class="titH3">Precio por noche $ <?php echo $Rs['precioE']; ?> </h3>
						                </div>

						                <!-- Text input-->
						                <div class="form-group sep1">
						                	<div class="labelIzqForm">
												<label class="control-label labelFormC" for="fechaIng">Fecha de ingreso</label>  
											</div>
											<div class="elementForm">
												<input type="text" class="date-pick" id="fechaInic" name="fechaInic" value="" >
						                    
											</div>
						                </div>
						                <!--
						                <input type="hidden" id="idEstableci" name="idEstableci" value="<?php echo $idEstableci ?>">
						                <input type="hidden" id="ciuEleg" name="ciuEleg" value="<?php echo $ciudad ?>">
						                </br>
						                -->

						                <br>

						                <!-- Text input-->
						                <div class="form-group sep1">
											<div class="labelIzqForm">
												<label class="control-label labelFormC" for="fechaSal">Fecha de salida</label>
											</div>
											<div class="elementForm">
												<input type="text" class="date-pick" id="fechaFin" name="fechaFin" value="" >

											</div>
						                </div>

						                <br>

						                <!-- Select Basic -->
						                <div class="form-group sep1">
											<div class="labelIzqForm">
												<label class="control-label labelFormC" for="ddlCantP">Cantidad de personas</label>
											</div>
											<div class="elementForm">
												<select id="ddlCantP" name="ddlCantP" class="form-control_">
													<option value="0">Elija una cantidad</option>
													<option value="1">1 Persona</option>
													<option value="2">2 Personas</option>
													<option value="3">3 Personas</option>
													<option value="4">4 Personas</option>
													<option value="5">5 Personas</option>
													<option value="6">6 Personas</option>
												</select>
						                    
						                    <br>

											</div>
						                  
						                </div>
						                
						                <br>

						                <!-- Textarea -->
						                <div class="form-group sep1">
											<div class="labelIzqForm">
												<label class="control-label labelFormC" for="observaciones">Observaciones</label>
											</div>
											<div class="elementForm">                     
												<textarea class="form-control_" id="observaciones" name="observaciones" placeholder="¿Quiere agregar algo más?"></textarea>
											</div>
						                </div>

						                <br>

						                <input type="hidden" id="establecimiento" name="establecimiento" value="<?php echo $anuncio; ?>" >

						                <div class="pull-centro">
											<input type="submit" id="btnConsultar" name="btnConsultar" value="Consultar" >
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
<!--	*********************fin*************************	-->
			<div id="contDescripAnuncio" class="container">
				<?php echo $Rs['descE']; ?>

			</div>

			<br><br>

			<div id="contMapaAnuncio" class="container">
				<script type="text/javascript">
					$(document).ready(function() {
					
					<?php
						if(($Rs['lat'] == null && $Rs['lng'] == null) || ($Rs['lat'] == '' && $Rs['lng'] == ''))
						{
							//echo("initialize();");
							echo("initialize_sin_Marc();");
						}else
							{
								//echo("initialize2(".$Rs['lat'].", ".$Rs['lng'].");");
								echo("initialize_Marc_Quieto(".$Rs['lat'].", ".$Rs['lng'].");");
							}
					?>

					});
				</script>

				<!--      <div class="row">-->
				<div class="span_6">
					<div id="contMapa1">
					<!--
					<div id="map_canvas" name="map_canvas" style="width:600px; height:400px;">
					</div>
					-->
						<div id="map_canvas" name="map_canvas" class="mapaDesc">

						</div>
					</div><!--  contMapa1 -->

				</div>

			</div>

			<br><br>

			<div class="container">
				<h3>Opiniones</h3>

				<br>
				
				<div class="contOpiniones2">
					<div class="imgOpinion">
						<img src="imagenes/imgPerfil/perfil1.jpg" class="imgPerfilRadio">

					</div>
					<div class="textoOpinion">
						Un lugar muy accesible, la habitación amplia, limpia y cómoda; La ubicación es excelente a un lado del metro para moverse a todos los destinos turísticos y Cristine es excelente anfitriona muy amable y muy al pendiente de todo.
						Abril de 2015

					</div>
					
					<div class="contCalif">
						
					</div>

				</div>

				<br><br>

				<div class="contOpiniones2">
					<div class="imgOpinion">
						<img src="imagenes/imgPerfil/perfil2.jpg" class="imgPerfilRadio">

					</div>
					<div class="textoOpinion">
						La habitación estaba muy ordenada y limpia. Limpiaban todos los días. El lugar estaba impecable y los que trabajaban ahí fueron muy atentos.
						Enero de 2015

					</div>
					<!--<br><br>-->
					<div class="contCalif">
						
					</div>

				</div>

				<br><br>

				<div class="contOpiniones2">
					<div class="imgOpinion">
						<img src="imagenes/imgPerfil/perfil2.jpg" class="imgPerfilRadio">

					</div>
					<div class="textoOpinion">
						La habitación estaba muy ordenada y limpia. Limpiaban todos los días. El lugar estaba impecable y los que trabajaban ahí fueron muy atentos.
						Enero de 2015

					</div>
					<!--<br><br>-->
					<div class="contCalif">
						
					</div>

				</div>

				<br><br>

				<div class="contOpiniones2">
					<div class="imgOpinion">
						<img src="imagenes/imgPerfil/perfil2.jpg" class="imgPerfilRadio">

					</div>
					<div class="textoOpinion">
						La habitación estaba muy ordenada y limpia. Limpiaban todos los días. El lugar estaba impecable y los que trabajaban ahí fueron muy atentos.
						Enero de 2015

					</div>
					<!--<br><br>-->
					<div class="contCalif">
						
					</div>

				</div>

			</div>


		</div>
<!--
		<hr>
-->
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

