<?php

// Estos son los valores a graficar
$valores = array(
    'ENE' => 55,
    'FEB' => 40,
    'MAR' => 65,
    'ABR' => 110,
    'MAY' => 85,
    'JUN' => 70,
    'JUL' => 60,
    'AGO' => 45,
    'SEP' => 50
    );

header("Content-type: image/gif");

// Definimos las dimensiones de la grafica
$im_w = 420; // Ancho de la imagen
$im_h = 200; // Alto de la imagen
$im_margen = 50; // Margen lateral
$origen = $im_h-35; // Origen de las barras

// Creamos la imagen
$imagen = imagecreate($im_w,$im_h);

// Definimos los colores
$bg = imagecolorallocate($imagen,245,245,245);
$negro = imagecolorallocate($imagen,0,0,0);
$rojo = imagecolorallocate($imagen,255,0,0);
$sombra = imagecolorallocate($imagen,195,195,195);
$gris = imagecolorallocate($imagen,150,150,150);

// Obtenemos la cantidad de valores
$cant = count($valores);

// Distancia entre las barras
$dist = ($im_w - ($im_margen*2))/$cant;

// Máximo y Mínimo de los valores
$max = max($valores);
$min = min($valores);

// Obtenemos la escala según el valor máximo
// y el espacio vertical de la imagen desde
// el origen dejando un margen superior de 10px
$escala = ($origen - 10)/$max;

// Definimos la fuente
$f = 3;
// Obtenemos el ancho y alto de la fuente
$f_w = imagefontwidth($f);
$f_h = imagefontheight($f);

// A continuación el código que no expliqué y lo
// que hace es dibujar la línea de los límites
// mínimo y máximo

// línea del máximo
imageline($imagen,40,$origen-($max*$escala),
$im_w-40,$origen-($max*$escala),$sombra);
// línea del mínimo
imageline($imagen,40,$origen-($min*$escala),
$im_w-40,$origen-($min*$escala),$sombra);

// texto del valor máximo
imagestring($imagen,$f,35-($f_w*strlen($max)),
$origen-($max*$escala)-($f_h/2),$max,$gris);

imagestring($imagen,$f,$im_w-35,
$origen-($max*$escala)-($f_h/2),$max,$gris);

// texto del valor mínimo
imagestring($imagen,$f,35-($f_w*strlen($min)),
$origen-($min*$escala)-($f_h/2),$min,$gris);

imagestring($imagen,$f,$im_w-35,
$origen-($min*$escala)-($f_h/2),$min,$gris);

// ==========================================

// Definimos el ancho de las barras
imagesetthickness($imagen,16);

// Por cada valor, dibujamos una barra
$barra = 0;
foreach($valores as $mes => $valor) {
    // Obtenemos las coordenadas de la barra
    $x = intval($im_margen+($dist/2)+
    ($dist*$barra));
    $y = intval($origen-($valor*$escala));
    // Dibujamos la sombra de la barra
    imageline($imagen,$x-6,$y+6,$x-6,
    $origen,$sombra);
    // Dibujamos la barra
    imageline($imagen,$x,$y,$x,$origen,$rojo);
    // Escribimos el mes
    imagestringup($imagen,$f,$x-($f_h/2),
    $origen+5+(strlen($mes)*$f_w),$mes,$negro);
    // Escribimos el valor
    imagestringup($imagen,$f,$x-($f_h/2),
    $origen-5,$valor,$bg);

    $barra++;
    }

imagesetthickness($imagen,1);
imageline($imagen,10,$origen,$im_w-10,$origen,
$negro);

imagegif($imagen);

imagedestroy($imagen);

?>