<?php
#//////////////////////////////////////////////////////////////////////////////////////////
# Function encrypt() v2.0
# CREADA: Mayo 4 de 2005
# ESCRITO POR: Marco A. Castillo
# EMAIL: dellasera@gmail.com
# EXPLICACION: algoritmo para poder encrypta los valores pasados por url y no enviar los reales.
# NOTAS:
#		1- Para encryptar un texto se utiliza:
#          $texto = "id3546";
#          $textoencryptado = encrypt($texto,0);
#		2- Para desencryptar un texto se utiliza:
#          $texto = encrypt($textoencryptado,1);
#		3- Solo acepta textos alphanumericos entre a - z y 0 - 9
#       4- En esta versión indexado el parametro $tarea para detectar si se va a encryptar
#          o si se va a desencryptar ya que repare un error de mapeo de los errores al detectar
#          si se esta queriendo obtener los valores reales desde otro server.
#       5- Se le agrego un $key de hardware para elevar el algoritmo de encryptacion.
#//////////////////////////////////////////////////////////////////////////////////////////

function encrypt($texto,$tarea) {
 
 $extraSignos = array(".",",","/","-","@","$","!","?","&","*","(",")","_","-");
 $extraValue = "";
 $keyLen = strlen($texto);

 $tempA[0] = substr($texto,0,strlen(ObtenerKey()));
 if($tempA[0] == ObtenerKey()){
 	$tempA[1] = substr($texto,strlen(ObtenerKey()));
 }
 else{
 	unset($tempA[1]);
 	if($tarea==1){
 	$setKey_es = false;
 	}
 }

 if(strlen($tempA[1])<1){
  $texto = $texto;
  unset($tempA[0]);	
 }
 else{
  $texto = $tempA[1];	
 }
 
 $i = 0;
 while($i<strlen($texto)){
  if(isset($tempA[0])){
   $t = 0;
   while($t<count($extraSignos)){
    if($texto[$i]==$extraSignos[$t]){
	 $extraValue = "ok";
	 break;
	}
	else{
	 unset($extraValue);
	}
   $t++;
   }
   if(isset($extraValue)){
      if($texto[$i]=="@"){
       $texto[$i] = " ";
      }
      else{
       $texto[$i] = $texto[$i];
	  }
   }
   else{
   $texto[$i] = desencryptLetra($texto[$i]);
   }
   $temp[$i] = $temp[$i].$texto[$i];
   $i++;
  }
  else{
   $t = 0;
   while($t<count($extraSignos)){
    if($texto[$i]==$extraSignos[$t]){
	 $extraValue = "ok";
	 break;
	}
	else{
	 unset($extraValue);
	}
   $t++;
   }
    if(isset($extraValue)){
     $texto[$i] = $texto[$i];
    }
    else{
     if($texto[$i]==" "){
      $texto[$i] = "@";
     }
     else{
      $texto[$i] = encryptLetra($texto[$i]);
      }
    }
   $temp[$i] = $temp[$i].$texto[$i];
   $i++;
  }
 }
 
 $e = count($temp);
 while($e>=0){
  $encrypt = $encrypt.$temp[$e];
 $e--;
 }

 if($tarea==1 && $setKey_es==false){
 $keyVer = ObtenerKey();
  if(strlen($keyVer)==strlen($tempA[0])){
 	return trim($encrypt);
  }
  else{
  	$d = 0;
    while($d<$keyLen){
     $random = rand(0,$keyLen);
     $rnd = $rnd.$random;
     $d++;
    }
    return $rnd;
  }
 }
 else{
 $key = ObtenerKey();
 return trim($key.$encrypt);
 }
}

function ObtenerKey(){
 	$keySys = _palabraSecreta_;
 	for($i=strlen($keySys);$i>=0;$i--){
 	 $encryptKey = encryptLetra($keySys[$i]);
 	 $key = $key.$encryptKey;
 	}
 	return $key;
}

function encryptLetra($letra){
 $temp = array (
    "a" => array("z"),
    "b" => array("y"),
	"c" => array("x"),
	"d" => array("w"),
	"e" => array("v"),
	"f" => array("u"),
	"g" => array("t"),
	"h" => array("s"),
	"i" => array("r"),
	"j" => array("q"),
	"k" => array("p"),
	"l" => array("o"),
	"m" => array("n"),
	"n" => array("m"),
	"o" => array("l"),
	"p" => array("k"),
	"q" => array("j"),
	"r" => array("i"),
	"s" => array("h"),
	"t" => array("g"),
	"u" => array("f"),
	"v" => array("e"),
	"w" => array("d"),
	"x" => array("c"),
	"y" => array("b"),
	"z" => array("a"),
	"A" => array("Z"),
    "B" => array("Y"),
	"C" => array("X"),
	"D" => array("W"),
	"E" => array("V"),
	"F" => array("U"),
	"G" => array("T"),
	"H" => array("S"),
	"I" => array("R"),
	"J" => array("Q"),
	"K" => array("P"),
	"L" => array("O"),
	"M" => array("N"),
	"N" => array("M"),
	"O" => array("L"),
	"P" => array("K"),
	"Q" => array("J"),
	"R" => array("I"),
	"S" => array("H"),
	"T" => array("G"),
	"U" => array("F"),
	"V" => array("E"),
	"W" => array("D"),
	"X" => array("C"),
	"Y" => array("B"),
	"Z" => array("A"),
	"0" => array("9"),
	"1" => array("8"),
	"2" => array("7"),
	"3" => array("6"),
	"4" => array("5"),
	"5" => array("4"),
	"6" => array("3"),
	"7" => array("2"),
	"8" => array("1"),
	"9" => array("0")
 );
 foreach($temp as $key => $value) {
  if($letra==$key){
   $letra = $value[0];
   return $letra;
   break;
  }
 }
 return $letra;
}

function desencryptLetra($letra){
 $temp = array (
    "a" => array("z"),
    "b" => array("y"),
	"c" => array("x"),
	"d" => array("w"),
	"e" => array("v"),
	"f" => array("u"),
	"g" => array("t"),
	"h" => array("s"),
	"i" => array("r"),
	"j" => array("q"),
	"k" => array("p"),
	"l" => array("o"),
	"m" => array("n"),
	"n" => array("m"),
	"o" => array("l"),
	"p" => array("k"),
	"q" => array("j"),
	"r" => array("i"),
	"s" => array("h"),
	"t" => array("g"),
	"u" => array("f"),
	"v" => array("e"),
	"w" => array("d"),
	"x" => array("c"),
	"y" => array("b"),
	"z" => array("a"),
	"A" => array("Z"),
    "B" => array("Y"),
	"C" => array("X"),
	"D" => array("W"),
	"E" => array("V"),
	"F" => array("U"),
	"G" => array("T"),
	"H" => array("S"),
	"I" => array("R"),
	"J" => array("Q"),
	"K" => array("P"),
	"L" => array("O"),
	"M" => array("N"),
	"N" => array("M"),
	"O" => array("L"),
	"P" => array("K"),
	"Q" => array("J"),
	"R" => array("I"),
	"S" => array("H"),
	"T" => array("G"),
	"U" => array("F"),
	"V" => array("E"),
	"W" => array("D"),
	"X" => array("C"),
	"Y" => array("B"),
	"Z" => array("A"),
	"0" => array("9"),
	"1" => array("8"),
	"2" => array("7"),
	"3" => array("6"),
	"4" => array("5"),
	"5" => array("4"),
	"6" => array("3"),
	"7" => array("2"),
	"8" => array("1"),
	"9" => array("0")
 );
 foreach($temp as $key => $value) {
  if($letra==$value[0]){
   $letra = $key;
   return $letra;
   break;
  }
  else{
   $letra = $letra;
  }
 }
 return $letra;
}
?>