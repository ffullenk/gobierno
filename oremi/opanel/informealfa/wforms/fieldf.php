<?php 
    include ('fieldforwared.php');
?>
<HTML>
<HEAD>
<TITLE>Multi-page Form - Page Two</TITLE>
</HEAD>
<BODY>
<p>Please fill in the following information</p>
<FORM METHOD="POST" ACTION="final.php">
Address: <INPUT TYPE="text" SIZE="50" name="cust_address"><BR>
Phone: <INPUT TYPE="text" SIZE="20" name="cust_phone"><BR>
<?php echo field_forwarder(); ?>
<INPUT TYPE="submit" name="submit2" value="Proceed">
</FORM>
</BODY>
</HTML>