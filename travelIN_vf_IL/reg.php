<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
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
		echo '			<li class="page-scroll"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
						<li class="page-scroll"><a href="login.php" class="scroll_">Ingreso<span> </span></a></li>
						<li class="active"><a href="reg.php" class="scroll_">Registro<span> </span></a></li>';
	}else {
			echo '	<script language="javascript">
						window.location="index.php"
					</script>';
			}
?>	

					</ul>
					<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
				</nav>			
            <div class="clearfix"></div>
	  		</div>
   	</div>
   	<!--
   	<link href="css/login-soft.css" rel='stylesheet' type='text/css' />
   	<link href="css/style2.css" rel='stylesheet' type='text/css' />
   	-->
   		<div class="slider" id="home">
  			<div class="slider_container">
  				<div class="wmuSlider example1">

  					<div id="divImgSlider1"> 
  						<!--<img src="imagenes/obelisco_noche_blur.jpg" id="imgSlider1" class="imgBlur" />-->

<div class="login" id="contForm0">
				<div class="formulario1">
							<div class="logo">
								<!-- PUT YOUR LOGO HERE -->
							</div>
							<!-- END LOGO -->
							<!-- BEGIN LOGIN -->
							<div class="content contForm1">
								<!-- BEGIN LOGIN FORM -->
								<form class="login-form" action="registrar_u.php" method="post" autocomplete="off">
									<h3 class="form-title">Cree su cuenta.</h3>
									<div class="alert alert-error hide">
										<button class="close" data-dismiss="alert"></button>
										<!--<span>Ingrese un e-mail y password.</span>-->
									</div>
									<div class="control-group">
										<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
										<label class="control-label visible-ie8 visible-ie9"><!--Nombre--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-user"></i>
												<input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre" name="nombre"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
										<label class="control-label visible-ie8 visible-ie9"><!--E-mail--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-user"></i>
												<input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="E-mail" name="emailReg"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label visible-ie8 visible-ie9"><!--Password--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-lock"></i>
												<input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password1"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label visible-ie8 visible-ie9"><!--Password--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-lock"></i>
												<input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Repita el password" name="password2"/>
											</div>
										</div>
									</div>

									<div class="form-actions_ chkBox1">
										
										</br>
										<div class="centrador1">
											<button type="submit" class="boton1">Crear</button>
<!--
										<button type="submit" class="btn blue pull-right">
											Enviar <i class="m-icon-swapright m-icon-white"></i>
										</button>
-->										</div>

									</div>
									</br>

									<div class="create-account">
										<p>
											Ya tiene una cuenta ?&nbsp; <br>
											<a href="login.php" id="register-btn" >Ingresar a mi cuenta</a>
										</p>
									</div>
								</form>
								<!-- END LOGIN FORM -->    

							</div>
	
	</div>		
</div>



  					</div>
			




				</div>
	
			</div>
            
			<script src="js/jquery.wmuSlider.js"></script> 
			<script>
				$('.example1').wmuSlider();         
			</script> 	           	      


		</div>



	
	<div class="main">
      <!--
      	<div class="content-top" id="fea">
      		<div class="container">
      			<h2 class="m_1">Lorem ipsum dolor sit amet, consectetuer adipiscing</h2>
      			<p class="m_2">liquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper<br>
      				suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
		-->
      			<!--
      			<ul class="icons">
      				<li><a href="#"><i class="icon1"> </i></a></li>
      				<li><a href="#"><i class="icon2"> </i></a></li>
      				<li><a href="#"><i class="icon3"> </i></a></li>
      				<li><a href="#"><i class="icon4"> </i></a></li>
      				<li><a href="#"><i class="icon5"> </i></a></li>
      				<li><a href="#"><i class="icon6"> </i></a></li>
      				<div class="clearfix"> </div>
      			</ul>
      			<div class="m_3">
      				<span class="left_line"> </span>
      				<div class="border"> 
      				</div>
      				<span class="right_line"> </span>
      			</div>
      			<div class="row feature">
      				<h3 class="m_4">Feature</h3>
      				<div class="col-md-8 feature_top">
      					<h3>Lorem ipsum dolor sit amet, <br>consectetuer adipiscing elit, sed di </h3>
      					<p>nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat null</p>
      				</div>
      				<div class="col-md-4 feature_img">
      					<img src="images/world.png" class="img-responsive" alt=""/>
      				</div>
      			</div>
      			-->
      <!--
      		</div>
      	</div>
      -->	
      	<!-- start-gallery-->
<!--*******************************************************-->
<!--      	
			<div id="screen" class="work">
				<div class="container">
					<h2 class="m_1">Lorem ipsum dolor sit amet, consectetuer adipiscing</h2>
      			<p class="m_2">liquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper<br>suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
				</div>
			   <div id="owl-demo3" class="owl-carousel owl-carousel2">
					<div class="item">
						<img class="lazyOwl" data-src="images/s1.jpg" alt="Lazy Owl Image">
						<p class="img_slider"><span class="g-title">Mauris euismod ultrices </span><br><span class="g-title1">10 June 2014, <span class="g-title2">Design, Web</span></span></p>
					</div>
					<div class="item">
						<img class="lazyOwl" data-src="images/s2.jpg" alt="Lazy Owl Image">
						<p class="img_slider"><span class="g-title">Mauris euismod ultrices </span><br><span class="g-title1">10 June 2014, <span class="g-title2">Design, Web</span></span></p>
					</div>
					<div class="item">
						<img class="lazyOwl" data-src="images/s3.jpg" alt="Lazy Owl Image">
						<p class="img_slider"><span class="g-title">Mauris euismod ultrices </span><br><span class="g-title1">10 June 2014, <span class="g-title2">Design, Web</span></span></p>
					</div>
					<div class="item">
						<img class="lazyOwl" data-src="images/s4.jpg" alt="Lazy Owl Image">
						<p class="img_slider"><span class="g-title">Mauris euismod ultrices </span><br><span class="g-title1">10 June 2014, <span class="g-title2">Design, Web</span></span></p>
					</div>

					<div class="item">
						<img class="lazyOwl" data-src="images/s5.jpg" alt="Lazy Owl Image">
						<p class="img_slider"><span class="g-title">Mauris euismod ultrices </span><br><span class="g-title1">10 June 2014, <span class="g-title2">Design, Web</span></span></p>
					</div>
					<div class="item">
						<img class="lazyOwl" data-src="images/s6.jpg" alt="Lazy Owl Image">
						<p class="img_slider"><span class="g-title">Mauris euismod ultrices </span><br><span class="g-title1">10 June 2014, <span class="g-title2">Design, Web</span></span></p>
					</div>
					<div class="item">
						<img class="lazyOwl" data-src="images/s1.jpg" alt="Lazy Owl Image">
						<p class="img_slider"><span class="g-title">Mauris euismod ultrices </span><br><span class="g-title1">10 June 2014, <span class="g-title2">Design, Web</span></span></p>
						<div class="clearfix"> </div>
					</div>
					<div class="item">
						<img class="lazyOwl" data-src="images/s2.jpg" alt="Lazy Owl Image">
						<p class="img_slider"><span class="g-title">Mauris euismod ultrices </span><br><span class="g-title1">10 June 2014, <span class="g-title2">Design, Web</span></span></p>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
	   	
	   	<div class="about" id="about">
				<div class="container">
					<h3 class="m_7">Lorem ipsum dolor sit amet, consectetuer adipiscing</h3>
      			<p class="m_8">liquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper<br>suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
		   		<div class="sap_tabs">	
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<ul class="resp-tabs-list">
			  					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>About</span></li>
								<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Service</span></li>
			   			</ul>				  	 
							<div class="resp-tabs-container">
				      		<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
										<div class="row">
											<div class="col-md-6 about_top">
								   			<div class="tab_left-top">
													<ul class="tab1">
														<h3>Worldwide<br><span class="m_5">Business</span></h3>
														<i class="a1"> </i>
														<div class="clearfix"></div>
													</ul>
													<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorp</p>
												</div>
												<ul class="tab1">
													<h3>Creative<br><span class="m_5">Solutions</span></h3>
													<i class="a2"> </i>
													<div class="clearfix"></div>
												</ul>
												<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorp</p>
											</div>
											<div class="col-md-6">
								   			<div class="tab_left-top">
													<ul class="tab1">
														<h3>Program <br><span class="m_5">Management</span></h3>
														<i class="a3"> </i>
														<div class="clearfix"></div>
													</ul>
													<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorp</p>
												</div>
												<ul class="tab1">
													<h3>Regulatory<br><span class="m_5">Support</span></h3>
													<i class="a4"> </i>
													<div class="clearfix"></div>
												</ul>
												<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorp</p>
											</div>
										</div>
				        			</div>
				     			</div>	
				     			<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
					 				<div class="facts">
										<div class="row">
											<div class="col-md-6 about-top1">
								   			<div class="tab_left-top">
													<ul class="tab1">
														<h3>Program <br><span class="m_5">Management</span></h3>
														<i class="a3"> </i>
														<div class="clearfix"></div>
													</ul>
													<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorp</p>
												</div>
												<ul class="tab1">
													<h3>Regulatory<br><span class="m_5">Support</span></h3>
													<i class="a4"> </i>
													<div class="clearfix"></div>
												</ul>
												<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorp</p>
											</div>
											<div class="col-md-6">
								   			<div class="tab_left-top">
													<ul class="tab1">
														<h3>Worldwide<br><span class="m_5">Business</span></h3>
														<i class="a1"> </i>
														<div class="clearfix"></div>
													</ul>
													<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorp</p>
												</div>
												<ul class="tab1">
													<h3>Creative<br><span class="m_5">Solutions</span></h3>
													<i class="a2"> </i>
													<div class="clearfix"></div>
												</ul>
												<p class="m_6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorp</p>
											</div>
										</div>	
									</div>
				      		</div>				        					 
				   		</div>	
		        		</div>
					</div>
				</div>
	   	</div>
	   	<div class="price" id="price">
	   		<div class="container">
	   			<h3 class="m_9">Features & Price</h3>
   				<p class="m_10">liquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper<br>suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
	   			<div class="row">
	   				<div class="col-md-4 price-grid text-center">
				   		<i class="website"> </i>
				   		<h3><a href="#">Website Building </a></h3>
				   		<p>aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut</p>
				   		<div class="price_but"><a href><label>$</label>500</a></div>
						</div>
	   				<div class="col-md-4 price-grid text-center">
				    		<i class="promote"> </i>
				   		<h3><a href="#">Promotion</a></h3>
				   		<p>aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut</p>
				   		<div class="price_but1"><a href><label>$</label>250</a></div>
						</div>
	   				<div class="col-md-4 price-grid text-center">
				   		<i class="people"> </i>
				   		<h3><a href="#">Engage People </a></h3>
				   		<p>aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut</p>
				   		<div class="price_but1"><a href><label>$</label>150</a></div>
						</div>
	   			</div>
	   		</div>
	   	</div>
-->
<!--	*********************inicio**********************	-->

<?php 
	//session_destroy();

	//include 'coneccion.php';
	
//	$db = new Conexion();

	//$idUsuario = $_SESSION['idUsuario'];
	//$idUsuario = 2;
	//$provincia = $_POST['ddlProvincia'];
	//$ciudad = $_POST['ddlCiudad'];
	//$tipoEstableci = $_POST['ddlProveedor'];

	$contador = 1;
	//$contadorTotal = 0;

	$sql = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, C.descripcion ciudad, P.descripcion provincia 
			FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id 
			WHERE E.idEstado = 2 ORDER BY RAND() LIMIT 6';



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
				echo '<div class="featurelist" id="news">
				   		<div class="container">
				   			<h3 class="m_7">Awesome 3 Column Feature List</h3>
			      			<p class="m_8">liquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper<br>suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
				   			<div class="row">';

				while($Rs = mysqli_fetch_array($result))
				{
					
					$direFoto = "imagenes/Imagen-para-sin-imagen.jpg";
					//$direFoto = "imagenes/f3.jpg";
					$contador += 1;

					$textoRed = substr($Rs['descE'],0,280);

					if (!(($Rs['fotoE'] == '') || ($Rs['fotoE'] == null)))
					{
						$direFoto = $Rs['fotoE'];
					}

					echo '			<div class="col-md-4 featurelist_top anuncioResum">

						   				<div class="view view-fifth_">
				         	            
				         	            <div class="mask2">
				            	            <h2>'.$Rs['nombreE'].'</br><p>'.$Rs['ciudad'].', '.$Rs['provincia'].'</p></h2>
				                  	   </div>
				                  	   
				                  	   <a href="verAnuncio.php?anuncio='.$Rs['idE'].'">
				                  	   	<img src="'.$direFoto.'" class="img-responsive imgAnuncio1" alt="'.$Rs['nombreE'].'"/>
				                  	   </a>

				                     </div>
				                    	<p class="m_11">'.$textoRed.' </p>
				                    	<div class="feature_btn"><a href="verAnuncio.php?anuncio='.$Rs['idE'].'">Mas...</a></div>
				                	</div>';
          	}

          	if($contador == 4) {
          		echo '		</div>
          						<p></p>
          						<div class="row">';
          	}

          	echo '			</div>
          					</div>
          				</div>';


/*
					if($contador == 4)
					{
						echo '	<div class="row">
							      	<div class="span12">        
							        	<ul class="thumbnails">';
					}

							echo '			<li class="span4">
						            			<div class="thumbnail">
						              				<div class="caption">
<!--	-->
						              					<a href="detalles_publicacion.php?anuncio='.$Rs['idE'].'">

											              	<!--<img src="img/img-1.png" alt="">-->
											                <h3>'.($Rs['nombreE']).'</h3>
											                <h5>'.($Rs['ciudad']).', '.($Rs['provincia']).'</h5>
											                <!--<img src="'.$direFoto.'" >-->
									                	</a>
											                </br>
											                <div class="imgAnuncio">
												                <!--<figure class="img-indent">-->
												                	<img src="'.$direFoto.'" alt="'.utf8_encode($Rs['nombreE']).'" class="img-radius">
												                	<!--'.$Rs['descE'].'-->
												                <!--</figure>-->
												            </div>
<!--												            
														
-->														
													</div>  
											        <div class="thumbnail-pad" id="contTextArt">
											        	<div id="contTextArt_1">
												              	
											                <p>'.$textoRed.'</p>
											                </br>
										                </div>
										                <div id="linkMas">
											            	<a href="detalles_publicacion.php?anuncio='.$Rs['idE'].'" class="btn btn_">más....</a>
											            </div>
										            </div>
							            		</div>
						          			</li>';

		          	if($contador == 3)
		          	{
		          		echo '		</ul>
		          				</div>
		          			  </div>';
		          	}

		          	$contador++;
				}

				if($contador != 4)
				{
					echo '		</ul>
		          				</div>
		          			  </div>';
				}
*/				
			}
		}
?>


<!--	*********************fin*************************	-->
<!--
	   	<div class="featurelist" id="news">
	   		<div class="container">
	   			<h3 class="m_7">Awesome 3 Column Feature List</h3>
      			<p class="m_8">liquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper<br>suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
	   			<div class="row">
	   				<div class="col-md-4 featurelist_top">
		   				<div class="view view-fifth_">
   		               <img src="imagenes/tafi-del-valle-2.jpg" class="img-responsive" alt=""/>
         	            <div class="mask">
            	            <h2>Hover Style #5</h2>
               	         <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  	   </div>
                     </div>
                    	<p class="m_11">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    	quis nostrud exercitation ullamco . </p>
                    	<div class="feature_btn"><a href="#">Mas...</a></div>
                	</div>

                	<div class="col-md-4 featurelist_top">
		   				<div class="view view-fifth_">
   		               <img src="imagenes/tafi-del-valle-2.jpg" class="img-responsive" alt=""/>
         	            <div class="mask">
            	            <h2>Hover Style #5</h2>
               	         <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  	   </div>
                     </div>
                    	<p class="m_11">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    	<div class="feature_btn"><a href="#">Mas...</a></div>
                	</div>

                	<div class="col-md-4 featurelist_top">
		   				<div class="view view-fifth_">
   		               <img src="imagenes/tafi-del-valle-2.jpg" class="img-responsive" alt=""/>
         	            <div class="mask">
            	            <h2>Hover Style #5</h2>
               	         <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  	   </div>
                     </div>
                    	<p class="m_11">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    	<div class="feature_btn"><a href="#">Mas...</a></div>
                	</div>

                	<div class="col-md-4 featurelist_top">
		   				<div class="view view-fifth_">
   		               <img src="imagenes/tafi-del-valle-2.jpg" class="img-responsive" alt=""/>
         	            <div class="mask">
            	            <h2>Hover Style #5</h2>
               	         <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  	   </div>
                     </div>
                    	<p class="m_11">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    	<div class="feature_btn"><a href="#">Mas...</a></div>
                	</div>

                	<div class="col-md-4 featurelist_top">
		   				<div class="view view-fifth_">
   		               <img src="imagenes/tafi-del-valle-2.jpg" class="img-responsive" alt=""/>
         	            <div class="mask">
            	            <h2>Hover Style #5</h2>
               	         <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  	   </div>
                     </div>
                    	<p class="m_11">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    	<div class="feature_btn"><a href="#">Mas...</a></div>
                	</div>
-->                	
                	<!--
                	<div class="col-md-4 featurelist_top">
		   				<div class="view view-fifth">
   		               <img src="images/f1.jpg" class="img-responsive" alt=""/>
         	            <div class="mask">
            	            <h2>Hover Style #5</h2>
               	         <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                  	   </div>
                     </div>
                    	<p class="m_11">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod </p>
                    	<div class="feature_btn"><a href="#">Read More</a></div>
                	</div>
	   				<div class="col-md-4 featurelist_top">
	   					<div class="view view-fifth">
                    		<img src="images/f2.jpg" class="img-responsive" alt=""/>
                      	<div class="mask">
                        	<h2>Hover Style #5</h2>
                        	<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      	</div>
                     </div>
                    	<p class="m_11">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod </p>
                    	<div class="feature_btn"><a href="#">Read More</a></div>
                	</div>
	   				<div class="col-md-4">
	   					<div class="view view-fifth">
                    		<img src="images/f3.jpg" class="img-responsive" alt=""/>
                      	<div class="mask">
                        	<h2>Hover Style #5</h2>
                        	<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      	</div>
                     </div>
                    	<p class="m_11">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod </p>
                    	<div class="feature_btn"><a href="#">Read More</a></div>
                	</div>
                	-->
<!--                	
	   			</div>
	   		</div>
	   	</div>
-->
<!--
	   	<div class="testimonial">
	   		<div class="container">
	   	  		<div class="testimonial_top">
	   				<i class="quot"> </i>
	   				<p class="m_12">diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendreri</p>
	   				<p class="ceo">quis nostrud, <span class="ceo1">tation - ullamcorper</span></p>
	   	  		</div>
	   	    	<ul id="flexiselDemo3">
			   		<li><img src="images/client1.png" /></li>
			   		<li><img src="images/client2.png" /></li>
			   		<li><img src="images/client3.png" /></li>
			   		<li><img src="images/client4.png" /></li>
			   		<li><img src="images/client5.png" /></li>
					</ul>
					<script type="text/javascript">
						$(window).load(function() {
							$("#flexiselDemo3").flexisel({
								visibleItems: 5,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
				    			responsiveBreakpoints: { 
				    				portrait: { 
						    			changePoint:480,
						    			visibleItems: 1
						    		}, 
				    				landscape: { 
						    			changePoint:640,
						    			visibleItems: 2
						    		},
						    		tablet: { 
						    			changePoint:768,
						    			visibleItems: 3
						    		}
						    	}
				    		});
				    
						});
		 			</script>
         		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	   	 	</div>
	    	</div>
-->	    	
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
					/*
						var defaults = {
			  				containerID: 'toTop', // fading element id
							containerHoverID: 'toTopHover', // fading element hover id
							scrollSpeed: 1200,
							easingType: 'linear' 
			 			};
					*/
					
						$().UItoTop({ easingType: 'easeOutQuart' });
					
					});
				</script>
		    	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;">Arriba </span></a>
	   	</div>
	   </div>
	</body>
</html>

