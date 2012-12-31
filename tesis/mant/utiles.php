<?php
function func_generate_string() {
$auto_string = chr(mt_rand(ord('A'),ord('Z')));
for($i=0;$i<8;$i++) {
$ltr = mt_rand(1,3);
if($ltr==1) $auto_password.=chr(mt_rand(ord('A'),ord('Z')));
if($ltr==2) $auto_password.=chr(mt_rand(ord('a'),ord('z')));
if($ltr==3) $auto_password.=chr(mt_rand(ord('0'),ord('9')));
}
return $auto_string;
} ?>