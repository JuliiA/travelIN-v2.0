<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<head>
<title>travelIN</title>
<!--Icon-->
<link rel="icon" href="imgagenes/travelin-ico.png" type="image/x-icon">
<link rel="shortcut icon" href="imagenes/travelin-ico.png" type="image/x-icon" />
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
							<style>.error{ color:#FF0000; font-family:Georgia, "Times New Roman", Times, serif; font-size:12px;}</style>
							<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
							<script src="js/jquery.validate.js"></script>
							<script src="js/messages_es.js"></script>
							
							<!-- BEGIN LOGIN -->
							<div class="content contForm1">
								<!-- BEGIN LOGIN FORM -->
								<form class="login-form" id="reg" action="registrar_u.php" method="post" autocomplete="off"><!-- -->
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
												<input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre" id="nombre" name="nombre"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
										<label class="control-label visible-ie8 visible-ie9"><!--E-mail--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-user"></i>
												<input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="E-mail" id="emailReg" name="emailReg"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label visible-ie8 visible-ie9"><!--Password--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-lock"></i>
												<input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="password1" name="password1"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label visible-ie8 visible-ie9"><!--Password--></label>
										<div class="controls">
											<div class="input-icon left">
												<i class="icon-lock"></i>
												<input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Repita el password" id="password2" name="password2"/>
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
			<script type="text/javascript" src="js/additional-methods.js"></script>
            <script type="text/javascript">
				$("#reg").validate({
					rules: 
						{
						  nombre:{
								required: true,
						  },
						  emailReg: {
								required: true,
								email: true,
							  },
						  password1:{
							  required: true,
							},
						  password2: {
								required: true,
								equalTo: password1
							  }
						},//end rules
						
						submitHandler: function() {
						  reg.submit();
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
				   			<h3 class="m_7">Algunas de nuestras publicaciones.</h3>
				   			<div class="row">';

				while($Rs = mysqli_fetch_array($result))
				{
					
					$direFoto = "imagenes/Imagen-para-sin-imagen.jpg";
					//$direFoto = "imagenes/f3.jpg";
					$contador += 1;

					$textoRed = substr($Rs['descE'],0,280);
					$textoRed = strip_tags($textoRed);

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


			}
		}
?>
   	
	   </div>
	   <?php include("pie.php");?>
	</body>
</html>

