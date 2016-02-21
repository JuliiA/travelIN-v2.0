<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<head>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<title>travelIN</title>
<!--Icon-->
<link rel="icon" href="imgagenes/travelin-ico.png" type="image/x-icon">
<link rel="shortcut icon" href="imagenes/travelin-ico.png" type="image/x-icon" />
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
						<li class="active"><a href="login.php" class="scroll_">Ingreso<span> </span></a></li>
						<li class="page-scroll"><a href="reg.php" class="scroll_">Registro<span> </span></a></li>';
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
							<style>.error{ color:#FF0000; font-family:Georgia, "Times New Roman", Times, serif; font-size:12px;}</style>
							<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
							<script type="text/javascript" src="js/additional-methods.js"></script>
							<script src="js/jquery.validate.js"></script>
							<script src="js/messages_es.js"></script>
							<!-- BEGIN LOGIN -->
							<div class="content contForm1">
								<!-- BEGIN LOGIN FORM -->
								<?php	
									if ($_GET!=NULL)
										{
											if(isset($_GET["error"]))
												$error=$_GET["error"];
											else
												$error ="";
										}
									else 
										$error="";
								?>
								<form class="login-form" action="verificacion.php" method="post" autocomplete="on" id="login">
									<h3 class="form-title">Ingrese a su cuenta.</h3>
									<div class="alert alert-error hide">
										<button class="close" data-dismiss="alert"></button>
										<span>Ingrese un e-mail y password.</span>
									</div>
									<div class="control-group">
										<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
										<label class="control-label visible-ie8 visible-ie9"><!--E-mail--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-user"></i>
												<input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="E-mail" id="email" name="email"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label visible-ie8 visible-ie9"><!--Password--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-lock"></i>
												<input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="password" name="password"/>
											</div>
										</div>
									</div>
									<?php
										if ($error =="f") 
											{
											echo '<span>';
											echo '<br/><strong class="text-danger">*ERROR AL INGRESAR  </strong><b class="text-danger">-Verifique su nombre de usuario y/o contrase&ntilde;a.</b>';
											echo '</span>';
											};
									?>
									<div class="form-actions_ chkBox1">
										<label class="checkbox_">
											<input type="checkbox" name="remember" value="1"/> Recordarme
										</label>

										</br>
										<div class="centrador1">
											<button type="submit" class="boton1">Enviar</button>
<!--
										<button type="submit" class="btn blue pull-right">
											Enviar <i class="m-icon-swapright m-icon-white"></i>
										</button>
-->										</div>

									</div>
									</br>

									<div class="forget-password">
										<h4>Olvid&oacute; su password?</h4>
										
									</div>
									<div class="create-account">
										<p>
											No tiene una cuenta ?&nbsp; <br>
											<a href="reg.php" id="register-btn" >Crear cuenta</a>
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
            <script type="text/javascript">
			$("#login").validate({
				rules: 
				{
				  email: {
						required: true,
						email: true,
					  },
				  password:{
					  required: true,
					}
				},//end rules
				
				submitHandler: function() {
				  login.submit();
				}
			  });
			</script>
			<script src="js/jquery.wmuSlider.js"></script> 
			<script>
				$('.example1').wmuSlider();         
			</script> 	           	      


		</div>



	
	<div class="main">
   

<?php 
	$contador = 1;

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
//					var_dump(utf8_encode($Rs['descE']));exit();
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
				                    	<div class="feature_btn"><a href="verAnuncio.php?anuncio='.$idEst.'">Mas...</a></div>
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
	   <?php include("pie.php");?>
	</body>
</html>

