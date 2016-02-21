<?php
			include('reserva/classMensaje.php');
			$msg = new mensajeria();
			?>
  			<h2 id="tabs-examples">Casilla de Mensajes</h2>
  			<p>Para su mejor comunicaci&oacute;n. Utilice sus casilla de mensajes adem&aacute;s de su correo personal</p>
  			<div class="col-md-13">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
				  <li role="presentation" class="active">	  
				  	<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
						<i class="icon-inbox"></i>Recibidos
						<?php
							$c = $msg->obtenerRecibidos($_SESSION['idUsuario']);
							$cant = mysqli_num_rows($c);
							echo('<span class="badge">'.$cant.'</span>');
						?>
					</a>
				  </li>
				  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><i class="icon-pencil"></i>Escribir</a></li>
				  <li role="presentation">
				  	<a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
					<i class="icon-comment"></i>Enviados
					<?php
						$r = $msg->obtenerEnviados($_SESSION['idUsuario']);
						$num = mysqli_num_rows($r);
						echo('<span class="badge">'.$num.'</span>');
					?>
					</a>
				  </li>
				  <li role="presentation"><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2"><i class="icon-list"></i>Pendientes</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
						  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<!--Recibidos-->
							<?php
							if($cant > 0)
							{
								$sec = "sfdjdjep";
								echo '<div class="table-responsive margenTabla2"> 
									  <table class="table table-striped span3">
										<thead>
											<tr>
												<th><h5 class="text-info">E-mail</h5></th>
												<th><h5 class="text-info">Mensaje</h5></th>
												<th><h5 class="text-info">Fecha</h5></th>
												<th><h5 class="text-info">Estado</h5></th>
												<th><h5></h5></th>
											</tr>
										</thead>
										<tbody>';
								while($array = mysqli_fetch_array($c))
								{
									$textoRed = substr($array['texto'],0,25);
									echo'<tr>											
											<td>
												<div>
													<a href="misMensajes.php?msj='.$array['idMsj'].'&op='.$sec.'">'.$array['usEnvio'].'</a>
												</div>	
											</td>
											<td>
												<div class="cart-item-title">
													<a href="misMensajes.php?msj='.$array['idMsj'].'&op='.$sec.'">'.utf8_encode($textoRed).'{...}</a>
												</div>		
											</td>	
											<td>
												<div class="quantity">
													<b>'.$array['fechaEnvio'].'</b>
												</div>		
											</td>';
											$estado = "ninguno";
											switch($array['estado'])
											{
												case 1: $estado = "Sin Leer";break;
												case 0: $estado = "Leido";break;
											}
											if($array['estado'] == 1)
												echo '<td class="price"><a href="mensajes.php" onClick="'.$msg->cambiarALeido($array['idMsj']).'">'.$estado.'</a></td>';
											else
												echo '<td class="price">'.$estado.'</td>';	
									echo	'</tr>';
//									var_dump($array);exit();
									/*if($array['leido'] == 1)
										echo('<div class="badge tab-content">
											<span>'.$array['fecha'].'</span>
											<div>'.utf8_encode($textoRed).'  {...}</div>
											<div class="text-success">Enviado por: '.$array['user'].'</div>
											<a href="mensajes.php" onClick="'.$msg->cambiarALeido($array['receptor']).'">Ver detalle</a>
											</div>
											<div class="row">
										        <div class="span9 detalleSeparador">
										          <hr class="linea1" id="linea1">
										        </div>
      										</div>
										');
									else
										echo('<div class="tab-content">
											<span>'.$array['fecha'].'</span>
											<div>'.utf8_encode($textoRed).'</div>
											<div class="text-success">Enviado por: '.$array['user'].'</div><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Responder</a>
											</div>
											<div class="row">
										        <div class="span9 detalleSeparador">
										          <hr class="linea1" id="linea1">
										        </div>
      										</div>
										');*/
								}
								echo '</tbody>
									</table>
								</div>';
							}
							else
								echo('<h2>No tienes mensajes nuevos!</h2>');
							?>
						  </div>
						  <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
						  	<br/>
							<?php
									$res = $msg->obtenerEstablecimiento($_SESSION['idUsuario']); 
									$getEst = mysqli_fetch_assoc($res);
									if($getEst != NULL)
									{
										$est = $getEst['idEstableci'];
									}
									else
										$est = NULL;
									//var_dump($getEst);exit();
								?>
							<style>.error{ color:#FF0000; font-family:Georgia, "Times New Roman", Times, serif; font-size:12px;}</style>
							<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
							<script type="text/javascript" src="js/additional-methods.js"></script>
							<script src="js/jquery.validate.js"></script>
							<script src="js/messages_es.js"></script>
							<script src="ckeditor/samples/sample.js" type="text/javascript"></script>
							<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
							<h4>Redactar mensaje</h4>
							<form action="reserva/classMensaje.php" method="post" id="nuevoMsj"><!---->
								<label>Asunto</label>
								<input type="text" name="asunto" class="span6" id="asunto" required /><br/>
								<label>Redactar</label>
								<br>
								<div class="elementFormP_Editor">
									<textarea class="ckeditor" cols="80" id="editor1" name="cuerpoForm" rows="10"></textarea>
									<script>
										// Replace the <textarea id="editor1"> with a CKEditor
										// instance, using default configuration.
										CKEDITOR.replace( 'editor1' );
									</script>
								</div>
								<div class="col-md-7">
								
								<?php
									$lp = $msg->obtenerReceptores($_SESSION['idUsuario']);
									
//									var_dump($lp);
									
									$res = mysqli_num_rows($lp);
									//exit();
									if($res != 0)
									{
//									var_dump(mysqli_fetch_row($lp));
										echo '<br/><br/>';
										echo 'Destinatario <select id="dest" name="dest"><option>Seleccione destinatario</option>';

										while($row = mysqli_fetch_array($lp)){
													var_dump($row);
													?>
													<option title="<?php echo $row["mail"]; ?>" value="<?php echo $row["id"]; ?>"> 
															<?php echo $row["mail"]; ?>
														</option>
													<?php	
													}
										echo '</select>';
									}
								?>
								<br/>
								<br/>
								<input type="hidden" id="user" name="user" value="<?php echo $_SESSION['idUsuario'];?>" />
								<input type="hidden" id="est" name="est" value="<?php echo $est;?>" />
								<input type="submit" class="btn" id="Enviar" name="Enviar" value="Enviar"/>
								<input type="reset" class="btn btn-grey" id="cancelar" name="cancelar" value="Cancelar"/>
								</div>
							</form>
							 <script type="text/javascript">
								$("#nuevoMsj").validate({
									rules: 
									{
									  asunto: {
											required: true,
										  },
									  dest: {
										  required: true,
										}
									},//end rules
									debug: true,
									messages: 
									{
									 	dest: { required: 'Debe Seleccionar un destinatario', }
									},
									
									submitHandler: function() {
									  nuevoMsj.submit();
									}
								  });
							  </script>
							<?php
								
							?>
						  </div>
						  <div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
							<?php
								if($num > 0)
									{
									$sec = "fowjbept";
									echo '<div class="table-responsive margenTabla2"> 
											  <table class="table table-striped span3">
												<thead>
													<tr>
														<th><h5 class="text-info">Fecha</h5></th>
														<th><h5 class="text-info">Mensaje</h5></th>
													</tr>
												</thead>
												<tbody>';
												
												while($rs = mysqli_fetch_array($r))
												{
													$textoRed = substr($rs['texto'],0,25);
													echo'<tr>											
															<td class="image><a href="misMensajes.php?msj='.$rs['emisor'].'&op='.$sec.'">'.$rs['fecha'].'</a></td>
															<td>
																<div class="cart-item-title">
																	<a href="misMensajes.php?msj='.$rs['emisor'].'&op='.$sec.'">'.utf8_encode($textoRed).'{...}</a>
																</div>
															</td>
														</tr>';
												}
										  echo '</tbody>
										  	</table>
										</div>';
									}
								else
									echo('<h2>No tienes mensajes nuevos!</h2>');
							?>
						  </div>
						  <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab">
							<p>NO tiene mensajes pendientes!</p>
						  </div>
    			</div>
  </div><!-- /example -->
