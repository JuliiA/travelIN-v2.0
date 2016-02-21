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
						
						$("#boxHide").hide();
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
<?php
	if(!(isset($_SESSION['idUsuario'])))
	{
		echo '			<li class="active"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
						<li class="page-scroll"><a href="login.php" class="scroll_">Ingreso<span> </span></a></li>
						<li class="page-scroll"><a href="reg.php" class="scroll_">Registro<span> </span></a></li>';
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
	if(isset($_GET['f'])){
		if($_GET['f'] == 99)
		{
			$sql1 = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, E.precio precioE, E.lat lat, E.lng lng, C.descripcion ciudad, P.descripcion provincia 
						FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id 
						WHERE MD5(concat("nvw42rbhfbhrefb3i34",E.idEstableci)) = '.$anuncio;
		}
	}else
		{
			$sql1 = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, E.precio precioE, E.lat lat, E.lng lng, C.descripcion ciudad, P.descripcion provincia 
						FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id 
						WHERE E.idEstado = 2 AND MD5(concat("nvw42rbhfbhrefb3i34",E.idEstableci)) = "'.$anuncio.'"';
//			var_dump($sql1);exit();
		}
	
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

		<div class="featurelist2" id="news">
			<div class="container">
	   			<h3 class="m_7"><?php echo($Rs['nombreE']); ?></h3>
      			<p class="m_8 titCiudad"><?php echo($Rs['ciudad'].", ".$Rs['provincia']); ?>.</p>
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
							<style>.error{ color:#FF0000; font-family:Georgia, "Times New Roman", Times, serif; font-size:12px;}</style>
							<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
							<script type="text/javascript" src="js/additional-methods.js"></script>
							<script src="js/jquery.validate.js"></script>
							<script src="js/messages_es.js"></script>
		   				<div id="contFormContacto" class="col-md-6">
		   					<div id="agrupFormPublic" name="agrupFormPublic">

					            <form class="form-horizontal" action="consultarAnuncio.php" method="post" enctype="multipart/form-data" id="consultar">
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
										<div class="pull-centro">
											<?php
												if($_GET != NULL)
												{
													if(isset($_GET['t']))
														echo('<div class="bs-example">
																	<div id="myAlert" class="alert alert-danger">
																		<a href="#" class="close" data-dismiss="alert">&times;</a>
																		<strong>!</strong><h3 class="label-important">HAY HABITACIONES DISPONIBLES</h3>
																		<h6 class="label-important">Para reservar, ingrese al sistema y contactese con su Administrador</h6>
																	</div>
																</div>');
													if(isset($_GET['m']))
														echo ('<div class="bs-example">
																	<div id="myAlert" class="alert alert-danger">
																		<a href="#" class="close" data-dismiss="alert">&times;</a>
																		<strong>!</strong><h3 class="label-important">NO HAY DISPONIBILIDAD PARA LA FECHA INGRESADA</h3>
																	</div>
																</div>');
													if(isset($_GET['l'])){
														echo('<div class="bs-example">
																	<div id="myAlert" class="alert alert-danger">
																		<a href="#" class="close" data-dismiss="alert">&times;</a>
																		<strong>!</strong><h3 class="label-important">HAY HABITACIONES DISPONIBLES</h3>
														<input type="submit" class="btn btn-danger" id="btnReservar" name="btnReservar" value="Enviar solicitud"/></div>
																</div>');
													}
												}
											?>
										</div>
									</fieldset>
					            </form>
								 <script type="text/javascript">
									$("#consultar").validate({
										rules: 
										{
										  fechaInic: {
												required: true,
											  },
										  fechaFin:{
											  required: true,
											},
										  ddlCantP: {
										  	 required: true,
										  },
										},//end rules
										
										submitHandler: function() {
										  login.submit();
										}
									  });
									</script>

							</div>
		   				</div>
		   			</div>
		   			</div>

	   			</div>
	   		</div>
<!--	*********************fin*************************	-->
			<div class="container">
				<div class="row">
					<div class="centrador2">
						<div class="centrador3">
							<div id="contDescripAnuncio" class="container__">
								<?php echo $Rs['descE']; ?>

							</div>
						</div>
					</div>
				</div>
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
					  <?php //echo $Rs['descE'];
							$sql2 = sprintf('select c.idComentario id, c.descripcion comentario,c.fecha_comenta fecha,u.nick nick,u.nombreFotoPerfil foto, c.voto_mas mas, c.voto_menos men from comentario c inner join usuario u on c.idUsuarioComenta = u.idUsuario inner join establecimiento e on c.idEstableci = e.idEstableci where  MD5(concat("nvw42rbhfbhrefb3i34",c.idEstableci)) = "'.$anuncio.'"');
		//var_dump($sql2);
							if(!$result2 = mysqli_query($db->conectarse(), $sql2)){
								echo('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
								
							}else
							  {
								  require('reserva/classFecha.php');
  								  require('reserva/classCalificacion.php');
								  $rv = new formato_fecha();
								  while($Rs2 = mysqli_fetch_array($result2))
								  {
									$fCom = $rv->cambiaf_a_normal($Rs2['fecha']);
									echo(' <div class="post-coments">
									<li>
										<div class="imgOpinion">');
												if($Rs2['foto'] == "" || $Rs2['foto'] == NULL)				
												echo('<img src="imagenes/imgPerfil/perfil1.jpg" class="imgFotoCalif">');
											else
												echo('<img src="imagenes/imgPerfil/'.$Rs2['foto'].'" class="imgFotoCalif">');
											
											echo $Rs2['nick'];
											echo('</div>
												<div class="textoOpinion">
												'.utf8_encode($Rs2['comentario']).'
												<span class="comment-date">'.$fCom.'</span>
												</div>
												<div class="contCalif">');
												if(isset($_SESSION["idUsuario"]))
												{
													echo ('<a href="reserva/classCalificacion.php?x='.$Rs2['id'].'&an='.$anuncio.'" data-toggle="tooltip" data-original-title="Me gusta" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-up"></i></a><span class="label label-success">+'.$Rs2['mas'].'</span>
												<a href="reserva/classCalificacion.php?y='.$Rs2['id'].'&an='.$anuncio.'" data-toggle="tooltip" data-original-title="No me gusta" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-down"></i></a>
												<span class="label label-danger">-'.$Rs2['men'].'</span></div>');
												
												echo ('<a href="#" id="responder" class="btn btn-micro btn-grey comment-reply-btn">
													  <i class="glyphicon glyphicon-share-alt"></i> Responder</a>');
												}
										echo ('</div>
											<div id="boxHide">
												<div class="contCrearOpinion">
													<div class="row" >
														<div class="well well-sm">
															<div class="row" id="post-review-box">
																<div class="col-md-12">
																	<form action="respondeAnuncioC.php" method="post" enctype="multipart/form-data">
																		<input id="ratings-hidden" name="rating" type="hidden"> 
																		<textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Escriba su opinión aquí..." rows="4"></textarea>
						
																		<input id="idEstableci" name="idEstableci" type="hidden" value="<?php echo $anuncio; ?>"> 
						
																		<div class="text-right">
																			<div class="stars starrr" data-rating="0">
																			</div>
																			<a class="btn btn-danger btn-sm_" href="#" id="close-review-box" style="margin-right: 10px;">
																				<span class="glyphicon glyphicon-remove"></span> Cancelar
																			</a>
																			<button class="btn btn-info btn-lg_" type="submit">Opinar</button>
																		</div>
																	</form>
																</div>
															</div>
														</div> 
														 
						
													</div>
												</div>
											</div>
											
										</div>
									</li>
									</div>');
								  }
								
							  }
		
					  ?>
					  
					</div>
					<script	language="javascript" type="text/javascript">
						$(document).ready(function() {
								
						      $("#responder").click({
								  $('#boxHide').show();
							  })
						})
					</script>
				</div>
			<!--<div class="container">
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
					<!--<br><br>
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
					<!--<br><br>
					<div class="contCalif">
						
					</div>

				</div>
				<br><br>
				<div class="contOpiniones2">
					<div class="imgOpinion">
						<img src="imagenes/imgPerfil/no_avatar.gif" class="imgPerfilRadio">

					</div>
					<div class="textoOpinion">
						La habitación estaba muy ordenada y limpia. Limpiaban todos los días. El lugar estaba impecable y los que trabajaban ahí fueron muy atentos.
						Enero de 2015

					</div>
					<!--<br><br>
					<div class="contCalif">
						
					</div>

				</div>

			</div>-->


		</div>
<!--
		<hr>
-->
		<?php include('pie.php');?>
	</body>
</html>

