<?php 
		class Conexion{
			var $host;
			var $usuario;
			var $contrasena;
			var $baseDatos;
		
			function Conexion(){
				$this->host="localhost"; //
				$this->usuario="root"; //usuario que tengas definido
				$this->contrasena=""; //contraseña que tengas definidad
				$this->baseDatos="travelin"; //base de datos personas, si quieres utilizar otra base de datos solamente cambiala
			}
			
			function conectarse(){
				$enlace = mysqli_connect($this->host, $this->usuario, $this->contrasena, $this->baseDatos);
				if($enlace){
					//echo "Conexion exitosa";	//si la conexion fue exitosa nos muestra este mensaje como prueba, despues lo puedes poner comentarios de nuevo: //
				}else{
					die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
				}
				return($enlace);
				mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un ounto de seguridad importante.
			}
			
			function liberarResultado($r)
			{
				$r->close();
			}
			
			function validoTiempo(){
					if(isset($_SESSION['ultimoAcceso']))
					{
							 $fechaGuardada = $_SESSION["ultimoAcceso"]; 
							 $ahora = date("Y-n-j H:i:s"); 
							 $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 
		
								//comparamos el tiempo transcurrido 
			 				 if($tiempo_transcurrido >= 3000) 
							 { 
									 //si pasaron 20 minutos o más 
									  session_destroy(); // destruyo la sesión 
									  header("Location: ../index.html"); //envío al usuario a la pag. de autenticación 
									  //sino, actualizo la fecha de la sesión 
							 }
							 else { 
										$_SESSION["ultimoAcceso"] = $ahora; 
		   							} 
							//return($_SESSION["ultimoAcceso"]);
					} 
					else
						die("No tiene iniciada una sesion");
				}
				
			function replace_specials_characters($s) 
			{
				$s = mb_convert_encoding($s, 'UTF-8','');
				$s = preg_replace("/á|à|â|ã|ª/","a",$s);
				$s = preg_replace("/Á|À|Â|Ã/","A",$s);
				$s = preg_replace("/é|è|ê/","e",$s);
				$s = preg_replace("/É|È|Ê/","E",$s);
				$s = preg_replace("/í|ì|î/","i",$s);
				$s = preg_replace("/Í|Ì|Î/","I",$s);
				$s = preg_replace("/ó|ò|ô|õ|º/","o",$s);
				$s = preg_replace("/Ó|Ò|Ô|Õ/","O",$s);
				$s = preg_replace("/ú|ù|û/","u",$s);
				$s = preg_replace("/Ú|Ù|Û/","U",$s);
				$s = str_replace(" ","_",$s);
				$s = str_replace("ñ","n",$s);
				$s = str_replace("Ñ","N",$s);
		
				$s = preg_replace('/[^a-zA-Z0-9_\.-]/', '', $s);
				return $s;
			}
			
		}

		
?>

<!--
$dbServidor = "localhost";

$dbUsuario = "root";
$dbPassword="";

$dbAUsar="travelin";
*/
-->