<?
echo " Vienes de: $REMOTE_ADDR";
echo "<BR>";
echo "Tu Host es: $REMOTE_HOST";
echo "<BR>";
echo " Valor de var = Hola";
echo "<BR>";
$var = "Hola";
$var1 = pwencrypt($var);
echo "$var1";
?>
