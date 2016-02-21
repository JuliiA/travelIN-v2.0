<div class="footer" id="contact">
   	<div class="container containerPie">
	   	   <div class="row footer-top">
	   			<div class="col-md-6 footer_grid"><!--<div class="col-md-3 footer_grid">-->

	   				<h3 class="m_13"><img class="imgGloboRed" src="imagenes/logoUnlam.png"><div class="titJuntoLogo">Sobre nosotros</div></h3>

                  <p class="m_14">Travelin fu&eacute; creado como proyecto final de la "Tecnicatura en Desarrollo Web" de La Universidad Nacional de La Matanza, 
                  por los alumnos Avellaneda, Juliana y Quipildor, Leandro.</p>
	   			</div>
	   			<div class="col-md-6 footer_grid">
		   			<!--<ul class="f_grid1">-->
		   			<h3 class="m_13"><img class="imgGloboRed" src="imagenes/world.png"><div class="titJuntoLogo">Redes Sociales</div></h3>
						<p class="m_14">
						<div id="contImgRedes">
							<div>
							<?php 
								$url = "http://www.facebook.com/sharer.php?s=100&p[url]=url_contenido&p[title]=titulo_compartido&p[summary]=descripcion&p[images][0]=thumbnail_image_url";
								$url2 = "http://www.facebook.com/sharer.php?u=//http://www.google.com.ar";
							?>
								<a href="javascript: void(0);" onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.travelin.com.ar/','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');<?php /*?><?php echo $url2;?><?php */?>"><img class="logoRedes" src="imagenes/logoFace1.png"></a>
								<a href="https://twitter.com/travelin"><img class="logoRedes" src="imagenes/logoTwitter1.png"></a>
								<!--<a href="javascript:window.location.href='https://plus.google.com/share?url='+encodeURIComponent(location);void0;">-->
								<a href="https://plus.google.com/share?url=www.travelin.com.ar"><img class="logoRedes" src="imagenes/logoGoo1.png"></a>
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
