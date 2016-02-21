 <?php
    function redimensionarI($rtOriginal, $max_ancho, $max_alto, $rtDestino, $tipo)//(origen, ancho deseado, alto deseado, ruta destino)
    {
        //Ruta de la original
        //$rtOriginal="/images/example.jpg";
        //$rtOriginal=$_FILES['fotoNueva']['tmp_name'][$imagen];
             
        //Crear variable de imagen a partir de la original|
        if($tipo == 1)
        {
            $original = imagecreatefromjpeg($rtOriginal);
        }else
            {
                $original = imagecreatefromgif($rtOriginal);
            }
             
        //Definir tamaño máximo y mínimo
        //$max_ancho = 150;
        //$max_alto = 150;
         
        //Recoger ancho y alto de la original
        list($ancho,$alto)=getimagesize($rtOriginal);
         
        //Calcular proporción ancho y alto
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;

        /*********************************************************
        Con esto ya tenemos los datos para mantener las proporciones de la imagen. Ahora toca calcular el tamaño:
        **********************************************************/
            
        if(($ancho <= $max_ancho) && ($alto <= $max_alto))
        {
            //Si es más pequeña que el máximo no redimensionamos
            $ancho_final = $ancho;
            $alto_final = $alto;
        }
        //si no calculamos si es más alta o más ancha y redimensionamos
            elseif (($x_ratio * $alto) < $max_alto)
            {
                $alto_final = ceil($x_ratio * $alto);//CEIL redondea al entero mas cercano para arriba
                $ancho_final = $max_ancho;
            }else
                {
                    $ancho_final = ceil($y_ratio * $ancho);
                    $alto_final = $max_alto;
                }

        /***********************************************************
        Con esto ya tenemos el tamaño de la imagen con las proporciones guardadas. Finalmente nos queda crear la imagen y guardarla:
        ************************************************************/
            
        //Crear lienzo en blanco con proporciones
        $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
         
        //Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
        imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
         
        //Limpiar memoria
        imagedestroy($original);
         
        //Definimos la calidad de la imagen final
        $cal=100;
         
        //Se crea la imagen final en el directorio indicado
        if($tipo == 1)
        {
            imagejpeg($lienzo, $rtDestino, $cal);
        }else
            {
                imagegif($lienzo, $rtDestino, $cal);
            }
        
        /*
        if(imagejpeg($lienzo, $rtDestino, $cal))
        {
            return 1;
        }else
            {
                return 0;
            }
        */
    }

   
?> 