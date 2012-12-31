<?php
	if(!function_exists('authenticate')) exit;
	
	$tools = new tools();	
	$ConfigXML = $tools->xml('config.xml');
	$ConfigXML = $ConfigXML['imageview'];
?>
<script type="text/javascript">
//<![CDATA[
	function MsgTimeout(){
		$('iMsg').innerHTML = '';
	}
	
	function GetUser(sName){
		if(sName == undefined){
			$('tbTitle').innerHTML = 'New User:';
			$('txtUID').value = '';
			$('txtUID').disabled = false;
			$('txtPW1').value = '';
			$('txtPW2').value = '';
			$('lType').value = 'user';
			$('lType').disabled = false;
			$('cmdDoUpdate').value = 'Create';
			$('lUsers').selectedIndex  = -1;
		}else{
			var xmlhttp = new jXCore.XMLParser();
			xmlhttp.oncomplete = function(oXML){
				$('tbTitle').innerHTML = 'Update User:';
				$('txtUID').value = oXML['userinfo']['name'];
				$('txtUID').disabled = true;
				$('txtPW1').value = '_iv6dummypw_';
				$('txtPW2').value = '_iv6dummypw_';
				if(oXML['userinfo']['name'] == '<?php echo $_SERVER['PHP_AUTH_USER']; ?>')
					$('lType').disabled = true
				else
					$('lType').disabled = false;
				$('lType').value = oXML['userinfo']['type'];
				$('cmdDoUpdate').value = 'Update';
				var i;
				for(i=0; i < $('lUsers').length; i++){
					if($('lUsers').options[i].value == sName){
						$('lUsers').selectedIndex = $('lUsers').options[i].index;
					}
				} 
			}
			xmlhttp.setUnique(true);
			xmlhttp.load('?action=getuser&user=' + escape(sName), true);
		}
	}
		
	function UpdateUser(){
		var xmlhttp = new jXCore.XMLParser();
		var oPostData = new jXCore.SuperString();
		var bUpdate = true;
		
		oPostData.add('type=' + $('lType').value);
		if($('txtPW1').value == $('txtPW2').value){
			oPostData.add('&password=' + $('txtPW1').value);
			if($('txtPW1').value == ''){
				bUpdate = false;
				$('iMsg').innerHTML = '<font color="red"><strong>Please enter a Password!</strong></font>';
			}
		}else{
			bUpdate = false;
			$('iMsg').innerHTML = '<font color="red"><strong>The passwords don\'t match!</strong></font>';
		}
		oPostData.add('&name=' + $('txtUID').value);
		if($('txtUID').value == ''){
			bUpdate = false;
			$('iMsg').innerHTML = '<font color="red"><strong>Please enter a Name!</strong></font>';
		}
		if($('txtUID').value.match("&") != null){
			bUpdate = false;
			$('iMsg').innerHTML = '<font color="red"><strong>The name can\'t contain an &amp;!</strong></font>';
		}	
				
		if(bUpdate){
			xmlhttp.oncomplete = function(oXML){
				$('iMsg').innerHTML = oXML['message'];
				setTimeout(MsgTimeout, 3000);
				UpdateList();
				setTimeout("GetUser('" + $('txtUID').value + "')", 150);
			}
			xmlhttp.setUnique(true);
			xmlhttp.load('?action=updateuser&mode=' + $('cmdDoUpdate').value.toLowerCase(), true, oPostData.toString());
		}else setTimeout(MsgTimeout, 10000);
	}
	
	function DeleteUser(){
		var sUser = $('lUsers').value;
		if(sUser!= '<?php echo $_SERVER['PHP_AUTH_USER']; ?>'){
			if($('lUsers').value != ''){
				var bRM = confirm('Delete ' + sUser + '?');
				if(bRM){
					var xmlhttp = new jXCore.XMLParser();
					xmlhttp.oncomplete = function(oXML){
						if(oXML['message'] !== 'OK'){
							alert("Error Removing User!\nCheck File Permissions.");
						}
						GetUser();
						UpdateList();
					}
					xmlhttp.setUnique(true);
					xmlhttp.load('?action=deleteuser&user=' + escape(sUser), true);
				}
			}
		}else{
			alert('You can\'t delete the active admin account!');
		}
	}
	
	function UpdateList(){
		var xmlhttp = new jXCore.XMLParser();
		xmlhttp.oncomplete = function(oXML){
			$('lUsers').options.length = 0;
			var oUsers = oXML['imageview']['users']['user'];
			if(oUsers.length == undefined){
				var oOption = new Option();
				oOption.text = oUsers.name;
				$('lUsers').options[$('lUsers').options.length] = oOption;
			}else{
				for (i=0; i<oUsers.length; ++i){
					var oOption = new Option();
					oOption.text = oUsers[i].name;
					$('lUsers').options[$('lUsers').options.length] = oOption;
				}
			}
		}
		xmlhttp.setUnique(true);
		xmlhttp.load('config.xml', true);
	}
	//init
	UpdateList();
//]]>
</script>
<div id="text_hr">User Manager</div>
<div id="text_block">
<table width="100%" border="0" cellspacing="2" cellpadding="1">
	  <tr>
		<td class="tableHead" width="180">&nbsp;User List:</td>
		<td class="tableHead" width="100%">&nbsp;<span id="tbTitle">New User:</span></td>
	  </tr>
	  <tr>
	  	<td>
		  <select id="lUsers" size="30" style="width: 178px; height: 500px;" onchange="GetUser(this.value);"></select>
		  <input id="cmdNew" type="button" value="+" onclick="GetUser();" style="width: 22px; height: 22px;" />&nbsp;<input id="cmdDelete" type="button" value="-" onclick="DeleteUser();" style="width: 22px; height: 22px;" />
	    </td>
		<td valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="1">
			  <tr>
				<td>Name:</td>
				<td><input id="txtUID" type="text" style="width: 180px;" /></td>
			  </tr>
			  <tr>
				<td>Password:</td>
				<td><input id="txtPW1" type="password" style="width: 180px;" /></td>
			  </tr>
			  <tr>
				<td>Re-enter Password:</td>
				<td><input id="txtPW2" type="password" style="width: 180px;" /></td>
			  </tr>
			  <tr>
				<td>Account Type:</td>
				<td>
					<select id="lType">
						<option value="user">User</option>
						<option value="admin">Admin</option>
					</select>
				</td>
			  </tr>
			  <tr>
				<td colspan="2">&nbsp;</td>
			  </tr>
			  <tr>
				<td colspan="2" align="right"><span id="iMsg"></span>&nbsp;<input id="cmdDoUpdate" type="submit" value="Create" onclick="UpdateUser();"  /></td>
			  </tr>
			</table>	
		</td>
	  </tr>
	</table>
</div>