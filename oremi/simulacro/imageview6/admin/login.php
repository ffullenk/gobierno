<?php
require_once('../system/core/extentions/tools.php');
//authentication
function authenticate($user, $pass){
	$tools = new tools();
	$userXML = $tools->xml('config.xml');
	$valid = false;
	
	if(is_array($userXML['imageview']['users']['user'][0])){
		foreach($userXML['imageview']['users']['user'] as $UID){
			if($user == $UID['name'])
				if($pass == $UID['password']){
					setcookie('ivAuthGroup', strtolower($UID['type']), 0, str_replace('index.php', '', $_SERVER['PHP_SELF']));
					$_COOKIE['ivAuthGroup'] = strtolower($UID['type']);
					return true;
				}
						
		}
	}else{
		if($user == $userXML['imageview']['users']['user']['name'])
			if($pass == $userXML['imageview']['users']['user']['password']){
				setcookie('ivAuthGroup', strtolower($userXML['imageview']['users']['user']['type']), 0, str_replace('index.php', '', $_SERVER['PHP_SELF']));
				$_COOKIE['ivAuthGroup'] = strtolower($userXML['imageview']['users']['user']['type']);
				return true;
			}
	}
}

//login procedure
if($_GET['action'] == 'login'){
	setcookie('ivAuthUser', $_POST['txtUID'], 0, str_replace('login.php', '', $_SERVER['PHP_SELF']));
	setcookie('ivAuthPass', sha1($_POST['txtPassword']), 0, str_replace('login.php', '', $_SERVER['PHP_SELF']));
	header('Location: login.php?action=check');
}elseif($_GET['action'] == 'logout'){
	setcookie('ivAuthUser', '', time()-60*60*24*100, str_replace('login.php', '', $_SERVER['PHP_SELF']));
	setcookie('ivAuthPass', '', time()-60*60*24*100, str_replace('login.php', '', $_SERVER['PHP_SELF']));
	setcookie('ivAuthGroup', '', time()-60*60*24*100, str_replace('login.php', '', $_SERVER['PHP_SELF']));
}elseif($_GET['action'] == 'check'){
	$bLogin = authenticate($_COOKIE['ivAuthUser'], $_COOKIE['ivAuthPass']);
	header('Content-Type: application/xml');
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n";
	if($bLogin){
		echo '<login>true</login>';
	}else{
		echo '<login>false</login>';
	}
}
?>