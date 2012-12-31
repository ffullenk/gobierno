<?


#----------COMMENTS---------------------------------------
/*
This code came from the portfolio of John Skrzypek
Use it as you wish, but I ask that you keep my contact information intact
John Skrzypek
location:  http://www.johnplanetorb.com/portfolio/tablereader/tablereader.zip
portfolio: http://www.johnplanetorb.com
email:	   johns@johnplanetorb.com
*/	
#---------------------------------------------------------

#----------NOTES------------------------------------------
/*
Written for MYSQL
This script assumes the primary key field (named 'id' in my table) is set to autoincrement
*/
#---------------------------------------------------------

#----------FILES------------------------------------------
/*
table.php
styles.css
down.gif
drop.gif
up.gif
*/
#---------------------------------------------------------

#----------INSTRUCTIONS-----------------------------------
/*
unzip and set custom variables to your database information.
*/
#---------------------------------------------------------
	
#----------FUNCTIONS--------------------------------------
/*
	drawrow($primary, $value, $width, $maxlength, $type,$count,$name,$originalcolor,$column,$mode)
	
	parameter descriptions
	$primary: 		1 if column is a primary key.  used to hide id columns
	$value: 		field result
	$width: 		width of the textbox, based on the longest value return in that field
	$maxlength: 	the length of the field
	$type: 			datatype of field
	$count:			row number
	$name:			name of the field
	$originalcolor: background color of the row to return to if user starts to modify then resets back to default value	
	$column:		column number, based on total amount of fields
	$mode:			0 = normal display for editing , 1 = readonly for confirmation form, 2 = blank for adding a row
*/
#---------------------------------------------------------

#----------DECLARATIONS-----------------------------------
//set custom table variables here
$server 	= "localhost";//server
$database	= "grbuzon";//database
$userid 	= "grbc_coqbo";//userid
$password 	= "g0r3citzen";//password
$table 		= "FUNCIONARIO";//table
$d_sort		= "COD_FUNCIONARIO";//hardcode default column to sort by - usually date
//the rest can be left blank
$subtitle 	= "";
$modinfo 	= "";
$errormes	= "";
$message	= "";
$fieldname	= "";
$fieldvalue = "";
$emails		= "";
$dates		= "";
#----------END DECLARATIONS-------------------------------

#----------POST AND GET RETRIEVALS------------------------
$order 		  = 	(isset($_GET['order'])) ? $_GET['order'] : $d_sort; //hardcode default column to sort by - usually date
$direction    = 	(isset($_GET['direction'])) ? $_GET['direction'] : "ASC";  //sort direction
$action 	  = 	(isset($_POST['mode'])) ? $_POST['mode'] : "initial";
$confirmation =		(isset($_POST['confirmation'])) ? $_POST['confirmation'] : ""; //populated after form is posted with a change/add/delete
#----------END POST AND GET RETRIEVALS--------------------

//establish db connection
if(!($success = mysql_connect($server,$userid ,$password))){
$errormes = "Error connecting to server on $server";	
}
//select database
if(!mysql_select_db($database)){
$errormes = "Error selecting to database on $server";		
}

//table will be updated
if($confirmation){
$total = $_POST['total']; //total number of records being updated

$sql = "Select * from $table order by $order $direction"; //get column names
$result = mysql_query($sql);
$num = mysql_num_fields($result);


	for($x=0;$x<($num);$x++){  //get all column information
	$fetchfield = mysql_fetch_field($result,$x);
	$fieldtitle[$x] = $fetchfield->name;
	$fieldprimary[$x] = $fetchfield->primary_key;
	$fieldtype[$x] = $fetchfield->type;
	}
	
		for($x=0;$x<$total;$x++){ //loop through rows to modify

		$set = "";
			for($y=0;$y<count($fieldtitle);$y++){ //loop through 
				if($fieldprimary[$y]) {
				} else {
					if($fieldtype[$y] == "datetime") {  //format date as format YYYY-MM-DD
					$fieldname  .= $fieldtitle[$y] . ",";
					$dateformat = $_POST['year' . $x] . "-" . $_POST['month' . $x] . "-" . $_POST['day' . $x] . " 00:00:00";
					$fieldvalue .= "'" . $dateformat . "',";
					$set .= " $fieldtitle[$y] = '" . $dateformat . "', ";
					} else {
					$fieldname  .= $fieldtitle[$y] . ",";
					$fieldval = $_POST[$fieldtitle[$y] . $x];
					$fieldvalue .= "'" . html_entity_decode(str_replace($escape,"''",$fieldval)) . "',";
					$set .= " $fieldtitle[$y] = '" . html_entity_decode(magicconversion($fieldval)) . "',";			
					}
				}
		
			}	
	
		$set 		= substr($set,0,(strlen($set)-1));
		$fieldname	= substr($fieldname,0,(strlen($fieldname)-1));
		$fieldvalue	= substr($fieldvalue,0,(strlen($fieldvalue)-1));

			if($action == "adding_confirmed") {
			$sql = "INSERT INTO $table ($fieldname) VALUES ($fieldvalue)";
			} else {
				if($action == "deleting_confirmed"){
				$sql = "DELETE FROM $table WHERE id = " . $_POST['id' . $x];
				} else {
				$sql = "UPDATE $table SET $set WHERE id = " . $_POST['id' . $x];
				}
			}
		
		//for DEMO version
		//echo "<div class=TOCHeader align=center>DEMO Version only - This will not modify table.  The following SQL was generated:</div>";
		//echo "<table class=demotable border=1 cellspacing=0 cellpadding=0><tr><td>$sql</td></tr></table>";
			if($result = mysql_query($sql)){
			$message  = "Table updated successfully.";
			} else {
			$errormes = "Unable to update table.";
			}
			
		
		
		}  // end for
		

} // end confirmation


$sql = "Select * from $table order by $order $direction";
//get all records
$result = mysql_query($sql);

//get number of columns
$num = mysql_num_fields($result);
//get number of records, but set to 1 if just adding a record
$total = ($action == "adding") ? 1 : mysql_num_rows($result);

for($x=0;$x<($num);$x++){
	
//retrieve field statistics
$fetchfield 	= mysql_fetch_field($result);
//find length of data field
$maxlength[$x]  = mysql_field_len($result, $x);
//get column name
$fieldinfo[$x]  = $fetchfield->name;
//get primary key
$primary[$x] 	= $fetchfield->primary_key;
//get type
$type[$x] 		= $fetchfield->type;


//get the biggest value from that column 
if($type[$x]!="int"){
$sql = "SELECT MAX( CHAR_LENGTH(" . $fieldinfo[$x] . ")) FROM interface"; 	
} else {
$sql = "SELECT MAX( CHAR_LENGTH(CHAR(" . $fieldinfo[$x] . "))) FROM interface "; 	
}

$result2 = mysql_query($sql);
$row = mysql_fetch_row($result2);
//set width for text boxes
$width[$x] = ($row[0]>0) ? $row[0]:2;

//handle sortpicture and link

	if($x==($order-2)){
	$arrow[$x+1] = ($direction == "DESC") ? "<img src='down.gif'>" : "<img src='up.gif'>";
	$sortdirection[$x+1] = ($direction == "DESC") ? "ASC" : "DESC";

	} else {
	$arrow[$x+1] = "";
	$sortdirection[$x+1] = "ASC";
	}
}


//check if modifying rows - for Confirm Changes page

if((!($action=="adding_confirmed")) && (!($action=="initial")) && (!($action=="deleting_confirmed"))){

$z = 0;
	for($x=0;$x<$total;$x++){
	//check for modified values - the hidden input 'rowmod + x' will be set to true for the changed row.
	$rowmod = ($action == "adding") ? ($_POST['add_rowmod0']) : ($_POST['rowmod' . $x]);
	
	
		if($rowmod == "true"){
		
		//fill $modinfo variable with new row information to post.  format = modinfo[rownumber][fieldname]
		$add = ($action == "adding") ? "add_" : "";
			for($y=0;$y<count($fieldinfo);$y++) {
				if(strtoupper($fieldinfo[$y]) == "DATE"){
				$modinfo[$z][$fieldinfo[$y]]  = $_POST[$add . 'month' . $x] . "/" . $_POST[$add . 'day' . $x] . "/" . $_POST[$add . 'year' . $x]; 
				} else {
				$modifiedcolumn = $fieldinfo[$y] . $x;
				$modinfo[$z][$fieldinfo[$y]] = str_replace($escape,"'",$_POST[$add . $modifiedcolumn]);
				}
			}
		$z++;
		}
	}
}  // end posting

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?=$table?> Table Update</title>
<link rel="stylesheet" type="text/css" href="file:///C|/Documents%20and%20Settings/ljimenez/Configuraci%F3n%20local/Temp/styles.css">
<!--
This code came from the portfolio of John Skrzypek
Use it as you wish, but I ask that you keep my contact information intact
John Skrzypek
location:  http://www.johnplanetorb.com/portfolio/tablereader/tablereader.zip
portfolio: http://www.johnplanetorb.com
email:	   johns@johnplanetorb.com
-->


</head>

<body>

<? 

if($message) {
echo "<div class=success align=center>$message</div>";
} elseif($errormes){
echo "<div class=error align=center>$errormes</div>";
}


//will display the 'Confirm Changes' page
if($modinfo) {

$title = ($action == "adding") ? "Confirm Record to Add" : (($action=="deleting") ? "Confirm Records to <font style=\"color:#FF0000\">Delete</font>" : "Confirm Changes");
$addingparameter = ($action == "adding") ? "<input type=\"hidden\" id=\"mode\" name=\"mode\" value=\"adding_confirmed\">\n" : (($action=="deleting") ? "<input type=\"hidden\" id=\"mode\" name=\"mode\" value=\"deleting_confirmed\">\n" : "");

	for($x=0;$x<count($modinfo);$x++) {
		for($y=0;$y<count($fieldinfo);$y++){
		}
	}
?>
<br>
<form id=update name=update method=post action="<?php $_SERVER['PHP_SELF'];?>">
<input type="hidden" id="confirmation" name="confirmation" value="1">
<?php $addingparameter;?>
<div class=boldheader align="center"><?php $title; ?></div>


<table cellpadding="0" cellspacing="0" border="2" style="border-collapse:collapse" bordercolor="#4A7FAB" width="100%">

<tr><td>
<table width=100% border="0" cellpadding="3" cellspacing="0">

<?
// show the rows to delete/modify/add

	//build the header row
	for($x=0;$x<count($fieldinfo);$x++){

		if($primary[$x]){
		} else {
		//datetime fields are parsed out into "mm/dd/yyyy" format
			if($type[$x]=="datetime"){
			echo "<td colspan=3 background='drop.gif' align=center class=rboldwhite>$fieldinfo[$x]</td>";
			} else {
			echo "<td background='drop.gif' align=center class=rboldwhite>$fieldinfo[$x]</td>";	
			}
	
		}	
	}	

	//display the rows
	for($x=0;$x<count($modinfo);$x++) {

  		if($x%2==0){
 		 $bgcolor = "#E5F4FF";
 		 } else {
 		 $bgcolor = "#C8E6FF";
  		}
	echo "<tr bgcolor=$bgcolor>";
		for($y=0;$y<count($fieldinfo);$y++){
		$value = ($modinfo[$x][$fieldinfo[$y]]) ? $modinfo[$x][$fieldinfo[$y]] : "";
		//calls drawrow() with 1 for the confirm parameter which displays it as readonly
		drawrow($primary[$y], $value, $width[$y], $maxlength[$y] , $type[$y],$x,$fieldinfo[$y],$bgcolor,$y,1);
		}
	
	echo "\n";
	}

?></table>
</td></tr></table>
<div align="center">
<br>
<input type="hidden" id="total" name="total" value="<?php $x;?>">
<input type="button" onClick="window.location.href='<?php $_SERVER['PHP_SELF'];?>'"  value="Go Back">
<input type="submit" value="Commit Changes" style="font-weight:bold;color:#009900">
</div>
<?
} else {
//not in an editing state, display the table initially
?>


<form id=update name=update method=post action="<?php $_SERVER['PHP_SELF'];?>">

<br>
<input type="hidden" id="mode" name="mode" value="modifying">
<font class="footer">Click on the column headers to sort</font>
<table cellpadding="0" cellspacing="0" border="3" style="border-collapse:collapse" bordercolor="#4A7FAB" width="100%"><tr><td>
<Table width=100% border="0" cellpadding="3" cellspacing="0">
<tr><td colspan=<?php count($fieldinfo)+2;?>  bgcolor="#4A7FAB">
<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr>
<td width="20%"><input type="button" class="clbuttonbig" onClick="window.location.href='<?php $_SERVER['PHP_SELF'];?>'" value="Add New Record"></td>
<td width="60%" align="center"><input type="button" class="clbuttonbig" onClick="checkrow()" value="Make Changes" id="changestop" name= "changestop" disabled=true></td>
<td width="20%" align="right"><input type="button" class="clbuttonbig" onClick="deleterecords()" id="deleterecord" name="deleterecord" value="Delete Records" disabled=true></td>
</tr></table>


</td></tr>
<tr>
<?
//draws the header row of the edit table
for($x=0;$x<count($fieldinfo);$x++){

if($primary[$x]){
} else {
	//datetime fields are parsed out into "mm/dd/yyyy" format
	if($type[$x]=="datetime"){
	echo "<td colspan=3 background='drop.gif' align=center class=rboldwhite><a style=\"color:#FFFFFF\" href=\"" . $_SERVER['PHP_SELF'] . "?order=" . ($x + 1) . "&direction=" . $sortdirection[$x] . "\"> " . $fieldinfo[$x] . "</a>" . $arrow[$x] . "</td>";
	} else {
	echo "<td background='drop.gif' align=center class=rboldwhite><a style=\"color:#FFFFFF\"  href=\"" . $_SERVER['PHP_SELF'] . "?order=" . ($x + 1) . "&direction=" . $sortdirection[$x] . "\"> " . $fieldinfo[$x] . "</a>" . $arrow[$x] . "</td>";	
	}

}
}
echo "<td background='drop.gif' align=center class=rboldwhite>Delete<br>Record</td>";
?>
</tr>
<?
$z=0;
//list out all the fields in the result set - THIS IS THE MAIN INITIAL READOUT OF ALL ROWS
while ($rowobj = mysql_fetch_row($result)) {
  if($z%2==0){
  $bgcolor = "#E5F4FF";
  } else {
  $bgcolor = "#C8E6FF";
  } 

echo "<tr bgcolor=$bgcolor id=\"row" . $z . "\"><input type=hidden id=rowmod" . $z . " name=rowmod" . $z . " value=false>";
$colcount = 0;
	for($y=0;$y<count($fieldinfo);$y++){
	$value = ($rowobj[$y]) ? $rowobj[$y] : "";
//echo "drawrow(".$primary[$y].",".$value.",".$width[$y].",".$maxlength[$y].",".$type[$y].",".$z.",".$fieldinfo[$y].",".$bgcolor.",".$y.",0)<br>";
	drawrow($primary[$y], $value, $width[$y], $maxlength[$y] , $type[$y],$z,$fieldinfo[$y],$bgcolor,$y,0);
	}

echo "<td align=center><input type=\"checkbox\" id=\"delete$z\" name=\"delete$z\" onClick=\"deleterow($z,this,'$bgcolor')\"></td>";
echo "</tr>";

$z++;
}

?>
</Table>
</td></tr></table>
<? //only display bottom 'Make Changes' button if there are 30 or more records
if($z>29){ ?>
<br><div align="center"><input type="button" class="clbuttonbig" onClick="checkrow()" value="Make Changes" disabled="true" id="changesbottom" name="changesbottom"></div>
<? } ?>
</form>
<br>


<form id="add" name="add" action="<?php $_SERVER['PHP_SELF'];?>" method="post" onSubmit="return datecheck('add_month0','add_day0','add_year0');">
<a name=#1></a>
<div class="boldheader" align="center">Add New Record</div>
<table cellpadding="0" cellspacing="0" border="3" style="border-collapse:collapse" bordercolor="#4A7FAB" width="100%">
<tr><td>
<Table width=100% border="0" cellpadding="0" cellspacing="0">
<tr>
<?
//draws the header row of the ADD table
for($x=0;$x<count($fieldinfo);$x++){

if($primary[$x]){
} else {
	//datetime fields are parsed out into "mm/dd/yyyy" format
	if($type[$x]=="datetime"){
	echo "<td colspan=3 background='drop.gif' align=center class=rboldwhite>" . $fieldinfo[$x] . "</td>";
	} else {
	echo "<td background='drop.gif' align=center class=rboldwhite>" . $fieldinfo[$x] . "</td>";	
	}

}
}
?>
</tr>

<tr style="background-color:#E5F4FF"><input type=hidden id="add_rowmod0" name="add_rowmod0" value=true>
<?
	for($y=0;$y<count($fieldinfo);$y++){
	//calls drawrow() with 2 for the mode parameter
	drawrow($primary[$y], "", $width[$y], $maxlength[$y] , $type[$y],0,"add_" . $fieldinfo[$y],"",$y,2);
	}	
?>
</tr>
</table>
</td></tr></table>
<br>
<div align="center">
<input name="addrecord" id="addrecord" type="submit"  class="clbuttonbig" value="Add Record"  disabled=true></div>
<input type=hidden name="mode" id="mode" value="adding">
</form>


<? } // END MODIFY OR DISPLAY IF ?>
</body>
<script language="javascript">

/* 
Javascript functions descriptions
checkrow() 		= checks for modified rows before posting form.
deleterecords()	= checks for 'delete records' checks before posting form.
checkvalue()	= handles modifications to rows and marks which columns/rows are being modified.
addrowcheck()	= verifies that atleast one text field in the add new row (in addition to the datetime field) is populated.
datecheck()		= makes sure date is valid.
deleterow()		= marks off rows which will be deleted.
*/

var modlist = new Array(<?=$z;?>); 
var rowchange = new Array(<?=$z;?>);
var rowdelete = new Array(<?=$z;?>);

	//prepopulates modlist, rochange, and rowdelete arrays with 0 values
   for (i=0; i < <?=$z;?>; i++) 
   { 
   rowchange[i] = 0;
   rowdelete[i] = 0;
       modlist[i] = new Array(<?=count($fieldinfo) - 1?>); 
       for (j=0; j < <?=count($fieldinfo) - 1?>; j++) 
       { 
       modlist[i][j] = 0; 
       } 
   } 


function checkrow(){ // checks rows to see if any have been modified before posting - called from Make Changes button
var modified = 0;
var dateproblems = "";
	for (var x=0;x<rowchange.length;x++){
		if(rowchange[x]){
		month =  "month" + x;
		day =  "day" + x;
		year = "year" + x;
			if(!datecheck(month,day,year)){
			dateproblems = "Please check all modified dates before attempting to make changes.";
			} else {
			obj = document.getElementById("rowmod" + x);
			obj.value = true;
			}
		modified = 1;
		}
	}

	if(modified && (!dateproblems)){
	obj = document.getElementById('update');
	obj.submit();
	} else {
		if(dateproblems){
		alert(dateproblems);
		} else {
		alert("No records have been modified.");		
		}	
	}

}

function deleterecords(){  //checks rows to see if any have been checked before posting - called from Delete Records button
var delchecked = 0;
	for(var x=0;x<rowdelete.length;x++){
		if(rowdelete[x]){
		obj = document.getElementById("rowmod" + x);
		obj.value = true;
		delchecked = 1;
		}
	}
	
	if(delchecked) {
	obj = document.getElementById('mode');
	obj.value = "deleting";
	obj = document.getElementById('update');
	obj.submit();
	} else {
	alert("No records have been checked.");
	}


}


function checkvalue(defaultval, textval, row, originalcolor, column) {  //checks if values in row are being modified or set back to default - called from any text box onKeyUp event

	//checks value against default
	if(!(defaultval == textval)){
	obj = document.getElementById("row" + row);
	obj.style.background = "#00FF00";
	//sets assigned row/column index to 1
	modlist[row][column] = 1;
	} else {
	modlist[row][column] = 0;
	}
	
	stillnew = 0;
	rowchange[row] = 0;
	//runs through the columns in the row to see if any are still in a modifed state
	for(x=0;x<modlist[row].length;x++){
		if(modlist[row][x]){
		rowchange[row] = 1;
		stillnew = 1;
		break;
		}
	}
	
	//if no columns have been modified (or text is edited back to its original state) backgroundcolor is reset
	if(!stillnew) {
	obj = document.getElementById("row" + row);
	obj.style.background = originalcolor;
	}
	
	editing = 0;
	//check if any row is still being modified in the entire table
	for (var x=0;x<rowchange.length;x++){
		if(rowchange[x]){
		editing = 1;
		break
		}
	}

	obj = document.getElementById("changestop");
	<?= ($z>29) ? "obj2 = document.getElementById(\"changesbottom\");" : ""; ?>

	//undisable 'Make Changes' buttons is something is still modified
	if(editing){
	obj.disabled = false;
	<?= ($z>29) ? "obj2.disabled = false;" : ""; ?>
	} else {
	obj.disabled = true;
	<?= ($z>29) ? "obj2.disabled = true;" : ""; ?>
	}
	
}

function addrowcheck(){ //checks all columns on the addrow section - at least one must be populated (including date) to add a row
<?
$arrayval = "";
//builds a javasacript array of field names
for($x=0;$x<count($fieldinfo);$x++){
	if(!$primary[$x]){
		if($type[$x]=="datetime"){
		$arrayval .= "\"add_month0\",\"add_day0\",\"add_year0\",";
		} else {
		$value = $fieldinfo[$x];
		$arrayval .= "\"add_" . $value . "0\",";
		}
	}
}
$arrayval = substr($arrayval,0,strlen($arrayval)-1);
?>
populate = 0;
	fieldname = new Array(<?=$arrayval?>);

	for(x=0;x<(modlist[0].length+2);x++){
	
	obj = document.getElementById(fieldname[x]);
		if(obj.value.length > 0){
		populate = 1;
		break;
		}
	}
		
	obj = document.getElementById("addrecord");
	if(populate){
	obj.disabled = false;
	} else {
	obj.disabled = true;
	}

}


function datecheck(month,day,year){ //checks for illegal dates

	obj = document.getElementById(month);
	if(obj.value > 12 || obj.value < 1 || obj.value == "") {
	alert('Enter valid month.');
	return false;
	}
	
	obj = document.getElementById(day);
	if(obj.value > 31 || obj.value < 1 || obj.value == "") {
	alert('Enter valid day.');
	return false;
	}
	
	obj = document.getElementById(year);
	if(obj.value > 2050 || obj.value < 1980 || obj.value == "") {
	alert('Enter valid year.');
	return false;
	}

return true;

}

function deleterow(row,checkbox,originalcolor){
editing = 0;
obj = document.getElementById("row" + row);

	if(checkbox.checked){
	obj.style.background = "#D71919";
	rowdelete[row] = 1;
	} else {
	obj.style.background = originalcolor;
	rowdelete[row] = 0;
	}
	
	
	
	for (var x=0;x<rowdelete.length;x++){
		if(rowdelete[x]){
		editing = 1;
		break
		}
	}
	
	obj = document.getElementById("deleterecord");
	if(editing){
	obj.disabled = false;
	} else {
	obj.disabled = true;
	}

}

</script>

</html>

<?
function drawrow($primary, $value, $width, $maxlength, $type,$count,$name,$originalcolor,$column,$mode){
	$add = "";
	//if this a confirmation page, disable editing
	if($mode == 1) {
	$edit = "readonly=true";
	$background = "background-color:#eaeaea";
	} elseif ($mode == 2) {
	$add = "add_";
	$edit = "";
	$background = "";	
	} else {
	$edit = "";
	$background = "";	
	}

//handle double quotes to dispaly correctly in input fields


global $colcount;
if($primary){
echo "<input type=\"hidden\" value=\"" . $value . "\" name=\"". $name . $count . "\">";
$colcount++;
} else {
	//draw row
	if($type == "datetime"){
	$m_num = (!($mode == 2)) ? date("m",strtotime($value)) : "";
	$d_num = (!($mode == 2)) ? date("d", strtotime($value)): "";
	$year  = (!($mode == 2)) ? date("Y", strtotime($value)): "";
		if($mode==0){
		$action =  "onkeyup=\"checkvalue('" . $m_num  . "',this.value, " . $count . ",'" . $originalcolor . "'," . $colcount . ");\""; 
		} elseif ($mode==2){
		$action =  "onkeyup=\"addrowcheck();\"";
		} else {
		$action = "";
		}
	echo "<td><input $edit $action type=\"text\" style=\"font-family: Courier New; font-size: 8pt;$background \" size=\"2\" maxlength=\"2\" name=\"" . $add . "month" . $count . "\" id=\"" . $add . "month" . $count . "\" value=\"" . $m_num . "\" ></td>";
	$colcount++;
		if($mode==0){
		$action =  "onkeyup=\"checkvalue('" . $d_num  . "',this.value, " . $count . ",'" . $originalcolor . "'," . $colcount . ");\""; 
		} elseif ($mode==2){
		$action =  "onkeyup=\"addrowcheck();\"";
		} else {
		$action = "";
		}
	echo "<td><input $edit $action type=\"text\" style=\"font-family: Courier New; font-size: 8pt;$background \" size=\"2\" maxlength=\"2\" name=\"" . $add . "day" . $count . "\" id=\"" . $add . "day" . $count . "\" value=\"" . $d_num . "\" ></td>";
	$colcount++;
		if($mode==0){
		$action =  "onkeyup=\"checkvalue('" . $year  . "',this.value, " . $count . ",'" . $originalcolor . "'," . $colcount . ");\""; 
		} elseif ($mode==2){
		$action =  "onkeyup=\"addrowcheck();\"";
		} else {
		$action = "";
		}
	echo "<td><input $edit $action type=\"text\" style=\"font-family: Courier New; font-size: 8pt;$background \" size=\"4\" maxlength=\"4\" name=\"" . $add . "year" . $count . "\" id=\"" . $add . "year" . $count . "\" value=\"" . $year . "\" ></td>";
	$colcount++;
	} else {
		if($mode==0){
		$action =  "onkeyup=\"checkvalue('" .  javascript_escape($value) . "',this.value, " . $count . ",'" . $originalcolor . "'," . $colcount . ")\""; 
		} elseif ($mode==2){
		$action =  "onkeyup=\"addrowcheck();\"";
		} else {
		$action = "";
		}
	echo "<td align=center style=normal><input $edit $action style=\"font-family: Courier New; font-size: 8pt;$background \" size=\"" . $width ."\" maxlength=\"" . $maxlength ."\" type=\"text\" name=\"" . $name . $count . "\" id=\"" . $name . $count . "\" value=\"" . single_display($value) . "\" ></td>\n";
	$colcount++;
	}
	echo "\n";

}


}

//functions to deal with escape characters

function javascript_escape($value) {
$value = str_replace("'","\'",$value);
$value = htmlentities($value);
return $value;
}

function single_display($value) {
	if(get_magic_quotes_gpc()){
	$value = str_replace("\'","'",$value);
	$value = str_replace('\"','"',$value);
	}
	
	$value = htmlentities($value);
	return $value;
}

function magicconversion($value){
	if(get_magic_quotes_gpc()){
	$value	= ereg_replace('\\\"','"',$value);
	$value	= ereg_replace("\\\'","''",$value);
	}
	return $value;
}


?>
