<?php
$FormFieldList = $_POST["FormFieldList"];
$FormFieldCount = $_POST["FormFieldCount"];
$TextInput = $_POST["TextInput"];
$aLista=array_keys($_POST['TextInput']);

echo "Uno: " . $FormFieldList . " <br /> Dos: " . $FormFieldCount . "<br />";

for($i=0;$i<$FormFieldCount;$i++) {
	echo $TextInput[$i] . "<br />";
}
?>