<?php
	if(!function_exists('authenticate')) exit;
	
	$tools = new tools();	
	$ConfigXML = $tools->xml('config.xml');
	$ConfigXML = $ConfigXML['imageview']['settings'];
?>
<script type="text/javascript">
//<![CDATA[
	function procMessaging(sURL, oPostData){
		$('cmdAction').disabled = true;
		var oXMLParser = new jXCore.XMLParser(); 
		oXMLParser.setUnique(true); 
		oXMLParser.oncomplete = function(oXML){
			//display the message
			$('iMsg').innerHTML = oXML['message'];
			setTimeout(MsgTimeout, 3000);
			setTimeout(CreateDropDown, 250);
			$('cmdAction').disabled = false;
		}
		oXMLParser.load(sURL, true, oPostData.toString());	
	}

	function MsgTimeout(){
		$('iMsg').innerHTML = '';
	}

	//fill album dropdown
	function CreateDropDown(){
		var iSelectedIndex = 0;
		function parseXML(oXML, sParent){ 
			//set variables
			var iIndex = 0;
			var iLength = oXML.length;
			//parse xml tree
			if(oXML['text'] != undefined){
				if(oXML['tree'] == undefined){
					var oOption = new Option();
					oOption.text = sParent + oXML['text'];
					if(oXML['icon'] != undefined) oOption.style.background = 'url("../system/images/icons/password.png") #EEEEEE right center no-repeat';
					oOption.value = 'ModifyAlbum(\'' + sParent + oXML['text'] + '\')';
					if($('txtPath').value == sParent + oXML['text']){
						oOption.selected = true;
						iSelectedIndex = oSelectBox.options.length;
					}
					oOption.defaultSelected = false;
					oSelectBox.options[oSelectBox.options.length] = oOption;
				}
				sParent += oXML['text'] + '/';
			}
			if(oXML['tree'] != undefined) parseXML(oXML['tree'], sParent);
			if(iLength != undefined){
				while(iIndex < iLength){
					parseXML(oXML[iIndex], sParent)
					iIndex++;
				}
			}
		}
					
		oSelectBox = $('iAlbumSelect');
		//clear oSelectBox
		oSelectBox.options.length = 0;
		
		//fill in default item
		oSelectBox.options[oSelectBox.options.length] = new Option('[New Album]','CreateAlbum()', true);
		
		//load the xml file
		var oXMLParser = new jXCore.XMLParser(); 
		oXMLParser.setUnique(true); 
		oXMLParser.oncomplete = function(oXML){
			parseXML(oXML, ''); 
			//descide to fetch the info or not
			if($('txtPath').value != ''){
				if($('cmdAction').value = 'Create'){
					if(!$('iMsg').innerHTML.match('<font color="red">')) ModifyAlbum($('txtPath').value);
				}
				//fix opera selection bug
				if(oSelectBox.options[iSelectedIndex].selected == false)
					oSelectBox.options[iSelectedIndex].selected = true;
			}
		}
		oXMLParser.load('../albumtree.php', true);
	}
	
	//create a new album
	function CreateAlbum(){
		//change iAlbumSelect
		if($('iAlbumSelect').selectedIndex != 0) $('iAlbumSelect').selectedIndex = 0;
		//clear form
		$('txtPath').value = '';
		$('txtDescription').value = '';
		$('txtPassword').value = '';
		$('AllowUpload').checked = false;
		$('cmdAction').value = 'Create';
	}
	
	//delete active album
	function DeleteAlbum(){
		var sAlbum = $('iAlbumSelect').options[$('iAlbumSelect').selectedIndex].text;
		if(sAlbum != '[New Album]'){
			var bRemove = confirm('Are you sure you want to remove "' + sAlbum + '"?');
			if(bRemove){
				var oPostData = new jXCore.SuperString();
				oPostData.add('album=' + encodeURIComponent(sAlbum));
				procMessaging('?action=rmAlbum', oPostData);
				CreateAlbum(); //clear form
			}			
		}
	}
	
	//modify album
	function ModifyAlbum(sAlbum){
		var oXMLParser = new jXCore.XMLParser(); 
		oXMLParser.setUnique(true); 
		oXMLParser.oncomplete = function(oXML){
			oXML = oXML['imageview']['album'];
			$('txtPath').value = sAlbum;
			$('txtDescription').value = oXML['information']['description'].unescapeHTML();
			if(oXML['information']['password'] == 'no')
				$('txtPassword').value = ''
			else $('txtPassword').value = '_iv6_password_';
			if(oXML['information']['upload'] == 'yes')
				$('AllowUpload').checked = true
			else $('AllowUpload').checked = false;
			$('cmdAction').value = 'Update';
			
		}
		oXMLParser.load('../albums/' + top.frames.frImageview.oImageview.encode(sAlbum) + '/index.xml' , true);	
	}
	
	//process the form
	function ProcessForm(){ 
		if($('txtPath').value.match(/:|"|'|<|>|\?|\*|\|/)){ 
			$('iMsg').innerHTML = '<font color="red">Name can\'t contain : * ? " \' < > |';
			setTimeout(MsgTimeout, 3000);
		}else{
			if($('cmdAction').value == 'Create'){
				if($('txtPath').value != ''){ //send the data packet
					var oPostData = new jXCore.SuperString();
					oPostData.add('album=' + encodeURIComponent($('txtPath').value));
					oPostData.add('&desc=' + escape($('txtDescription').value.escapeHTML()));
					if($('txtPassword').value != '')
						sAlbumPw = $('txtPassword').value
					else 
						sAlbumPw = 'no'; 
					oPostData.add('&password=' + encodeURIComponent(sAlbumPw));
					if($('AllowUpload').checked)
						oPostData.add('&upload=' + encodeURIComponent('yes'))
					else
						oPostData.add('&upload=' + encodeURIComponent('no'));
					procMessaging('?action=mkAlbum', oPostData);
				}
			}else{
				if($('txtPath').value != ''){ //send the data packet
					var sAlbum = $('iAlbumSelect').options[$('iAlbumSelect').selectedIndex].text;
				
					var oPostData = new jXCore.SuperString();
					oPostData.add('album=' + encodeURIComponent(sAlbum));
					oPostData.add('&desc=' + escape($('txtDescription').value.escapeHTML()));
					if($('txtPassword').value != '')
						sAlbumPw = $('txtPassword').value
					else 
						sAlbumPw = 'no'; 
					oPostData.add('&password=' + encodeURIComponent(sAlbumPw));
					if($('AllowUpload').checked)
						oPostData.add('&upload=' + encodeURIComponent('yes'))
					else
						oPostData.add('&upload=' + encodeURIComponent('no'));
					if(sAlbum != $('txtPath').value){
						if(sAlbum + '/' != $('txtPath').value){
							oPostData.add('&move=' + encodeURIComponent($('txtPath').value));	
						}
					}
						
					procMessaging('?action=updAlbum', oPostData);
				}else{
					//display the message
					$('iMsg').innerHTML = '';
				}
			}
		}
	}
	
	//init
	if(window.addEventListener) 
		window.addEventListener('load', CreateDropDown, false);
	else if(window.attachEvent)
		window.attachEvent('onload', CreateDropDown);
//]]>
</script>

<div id="text_hr">Manage Albums</div>
<div id="text_block">
	<form name="frmAlbumManager" style="margin: 0px;" onsubmit="return false;">
	<table width="100%" border="0" cellspacing="0" cellpadding="1">
	  <tr>
		<td colspan="2" class="tableHead" style="text-align: right;">
			<input id="cmdNew" type="button" value="+" onclick="CreateAlbum();" style="width: 22px; height: 22px;" />
			<input id="cmdDelete" type="button" value="-" onclick="DeleteAlbum();" style="width: 22px; height: 22px;" />
			<select id="iAlbumSelect" onchange="eval(this.value);"></select>
		</td>
	  </tr>
	  <tr>
		<td width="80">Name:</td>
		<td>
			<input id="txtPath" type="text" style="width: 317px;" />&nbsp;
			<label title="Enter the full path for the album. e.g. Vacation/Africa/Kenja/">
				<img src="../system/images/interface/admin/info.png" alt="Enter the full path for the album. e.g. Vacation/Africa/Kenja/" align="absmiddle" />
			</label>
		</td>
	  </tr>
	  <tr>
		<td width="80">Description:</td>
		<td>
			<input id="txtDescription" type="text" style="width: 317px;" />&nbsp;
			<label title="Enter the description for this album here.">
				<img src="../system/images/interface/admin/info.png" alt="Enter the description for this album here." align="absmiddle" />
			</label>
		</td>
	  </tr>
	  <tr>
		<td width="80">Password:</td>
		<td>
			<input id="txtPassword" type="password" style="width: 120px;" />&nbsp;
			<label title="Leave empty for no password.">
				<img src="../system/images/interface/admin/info.png" alt="Leave empty for now password.." align="absmiddle" />
			</label>
		</td>
	  </tr>
	  <tr>
		<td width="80">Upload:</td>
		<td><input id="AllowUpload" type="checkbox" />&nbsp;<label for="AllowUpload">Allow Uploading</label></td>
	  </tr>
	  <tr>
		<td colspan="2">&nbsp;</td>
	  </tr>
	  <tr>
		<td colspan="2" style="text-align: right;"><span id="iMsg"></span>&nbsp;<input id="cmdAction" type="submit" value="Create" onclick="ProcessForm();" /></td>
	  </tr>
	 </table>
	 </form>
</div>
