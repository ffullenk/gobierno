<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
  <meta name="author" content="Milfson web: http://www.milfcz.com e-mail: milf@milfcz.com" />
  <title>JSRS Select Demo - page #2</title>
<style type="text/css">
		/* <![CDATA[ */
		@import url(./style.css);
		/* ]]> */
</style>
<script type="text/javascript" src="jsrsClient.js"></script>
<script type="text/javascript" src="selectphp.js"></script>
</head>
<?php
  $make = isset($_POST['lstMake']) ? $_POST['lstMake'] : -99;
  $model = isset($_POST['lstModel']) ? $_POST['lstModel'] : -99;
  $options = isset($_POST['lstOptions']) ? $_POST['lstOptions'] : -99;
?>
<body onload="preselect('<?php echo $make;?>', '<?php echo $model;?>', '<?php echo $options;?>', 1);">
<h2>JSRS Select Box Filling Demo - page #2</h2>
<form name="QForm" action="./select.php" method="post">
<fieldset>
  <legend>Result from previous selects</legend>
  	<p>
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" size="30" maxlength="30">
	</p>
	<p>
	<label for="apellido">Apellido</label>
	<input type="text" name="apellido" size="30" maxlength="30">
	</p>
	<p>
<select name="edad" class="caja_form3" id="edad2" >
		<option value="-">Seleccione</option>
		<option value="6 - 14">6 - 14</option>
		<option value="15 - 29">15 - 29</option>
		<option value="30 - 50">30 - 50</option>
		<option value="51 - 65">51 - 65</option>
		<option value="> 66">> 66</option>
	</select>
	</p>
	<p>
<input type=radio value=M name="genero" id="genero2" checked>
					</font><span class="txt-verd10azul">M</span><font color="#000066">
					<input type=radio value=F name="genero" id="genero2" {check2}>
					</font><span class="txt-verd10azul">F</span>
	</p>
	<p>
<select name="educa" class="caja_form3" id="educa2" >
		<option value="-">Seleccione</option>
		<option value="Básica">Básica</option>
		<option value="Media">Media</option>
		<option value="Universitaria Completa">Universitaria Completa</option>
		<option value="Universitaria Incompleta">Universitaria Incompleta</option>
	</select>	</p>
    <p>
      <label for="lstMake">Make</label>
      <select name="lstMake" id="lstMake">
        <option>--------- Not Yet Loaded ---------</option>
      </select>
    </p>
    <p>
      <label for="lstModel">Model</label>
      <select name="lstModel" id="lstModel">
        <option>--------- Not Yet Loaded ---------</option>
      </select>
    </p>
    <p>
      <label for="lstOptions">Options</label>
      <select name="lstOptions" id="lstOptions">
        <option>--------- Not Yet Loaded ---------</option>
      </select>
    </p>
</fieldset>
<p><input type="submit" name="cmdBack" value="Back" id="cmdSubmit" /></p>
</form>
Thanks to Milfson (milf@milfcz.com) for the preselection code!
</body>
</html>
