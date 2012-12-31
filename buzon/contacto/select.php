<html>
<head>
  <title>JSRS Select Demo</title>
  <script language="javascript" src="jsrsClient.js"></script>
  <script language="javascript" src="selectphp.js"></script>
  <style>
    body{background:#dddddd;text-align:center;}
    #sel {width:100%;margin: 0px auto 0px auto;}
    #show {background-color:darkgray;width:80%;height:45px;text-align:center;margin-top:15px;padding-top:10px;}
  </style>
</head>
<?php
  $make = isset($_POST['lstMake']) ? $_POST['lstMake'] : -99;
  $model = isset($_POST['lstModel']) ? $_POST['lstModel'] : -99;
  $options = isset($_POST['lstOptions']) ? $_POST['lstOptions'] : -99;
?>
<body onload="preselect('<?php echo $make;?>', '<?php echo $model;?>', '<?php echo $options;?>', 1);" onhelp="jsrsDebugInfo();return false;">
<h2>JSRS Select Box Filling Demo - page #1</h2>
<form name="QForm" method="post" action="./result.php">
<div id="sel">
<table class="normal" width="575" BORDER="0" CELLSPACING="2" CELLPADDING="2" VALIGN="TOP">
<?php 
  SelectBox ("Make",    "lstMake");     
  SelectBox ("Model",   "lstModel");    
  SelectBox ("Options", "lstOptions");   
?>
</table>
<div id="show">
  <input type="submit" name="cmdSubmit" value="Submit" id="cmdSubmit" title="Show selects with preselected values" style="" /><br />
  (submits to second page which preselects current values in another form like this)
</div>
</div>
</form>

<p>
  Make your selections.  Dependent selections will be filled with data from the server.  
  Change selections and dependencies will change.
</p>
<p>
  <a href=jsrs_select.zip>Download</a> the files for this Select Demo.
</p>
<p>
  <a href=select_rs.php.txt>View</a> the source for the server-side file Select_rs.PHP
</p>
<p>
  <a href="http://www.ashleyit.com/rs">Return</a> to Brent's Remote Scripting page.
</p>
</body>
</html>
<?php

function SelectBox( $Label, $selectName ){
  ?>
  <tr ALIGN="LEFT">
    <td width="15%"><?php echo $Label ?></td>
    <td align="left">
      <select name="<?php echo $selectName ?>">
        <option></option><option></option><option></option>
        <option>--------- Not Yet Loaded ---------</option> 
      </select>
    </td>
  </tr>
<?php 
} 
?>

