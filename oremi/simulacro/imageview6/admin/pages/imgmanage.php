<?php
	if(!function_exists('authenticate')) exit;
	
	$tools = new tools();	
	$ConfigXML = $tools->xml('config.xml');
	$ConfigXML = $ConfigXML['imageview']['settings'];
?>
<script type="text/javascript">	
//<![CDATA[
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
					oOption.value = 'GetImages(\'' + sParent + oXML['text'] + '\')';
					if(sParent + oXML['text'] == '<?php echo $ConfigXML['display']['default']; ?>'){
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
		
		//load the xml file
		var oXMLParser = new jXCore.XMLParser(); 
		oXMLParser.setUnique(true); 
		oXMLParser.oncomplete = function(oXML){
			parseXML(oXML, '');
			//fix opera selection bug
			if(oSelectBox.options[iSelectedIndex].selected == false)
				oSelectBox.options[iSelectedIndex].selected = true;
			GetImages(oSelectBox.options[oSelectBox.selectedIndex].text);
		}
		oXMLParser.load('../albumtree.php', true);
	}
	
	//check album
	function CheckAlbum(){
		var bUpdate = confirm("Checking the album can take a while!\nDo you want to continue?");
		
		if(bUpdate){
			var sAlbum = $('iAlbumSelect').options[$('iAlbumSelect').selectedIndex].text;
			$('iAlbumSelect').disabled = true;
			$('cmdCheck').disabled = true;
			$('iImageList').innerHTML = '<center>[Please wait while <strong>' + sAlbum + '</strong> is being checked...]</center>';

			var oXMLParser = new jXCore.XMLParser(); 
			oXMLParser.setUnique(true); 
			oXMLParser.oncomplete = function(oXML){
				if(oXML['message'] !== 'ERR'){
					//update thumbnails
					var httpRebuildRequest = new jXCore.XMLParser();
					httpRebuildRequest.setUnique(true);
					httpRebuildRequest.oncomplete = function(){
						//dispaly images + message
						$('iAlbumSelect').disabled = false;
						$('cmdCheck').disabled = false;
						eval($('iAlbumSelect').value);
						alert(oXML['message']);
					}
					httpRebuildRequest.load('?action=buildthumbs&album=' + sAlbum, false);
				}else{
					//nothing to do... display images
					$('iAlbumSelect').disabled = false;
					$('cmdCheck').disabled = false;
					eval($('iAlbumSelect').value);
				}
			}
			oXMLParser.load('?action=albcheck&album=' + top.frames.frImageview.oImageview.encode(sAlbum), true);
		}
	}
	
	//fetch images
	function GetImages(oAlbum){
		//load the xml file
		var oXMLParser = new jXCore.XMLParser(); 
		oXMLParser.setUnique(true); 
		oXMLParser.oncomplete = function(oXML){
			var oImage = oXML['imageview']['album']['files']['image'];
			if(oImage == undefined) var oImage = oXML['imageview']['album']['files']['img']; //Safari workaround
			
			//parse image list (if not empty)
			if(oImage != undefined){
				//remove the default msg
				var oUserMsg = $('iUserMsg');
				oUserMsg.style.display = 'none';
				//loop through oImages
				if(oImage.length == undefined){ //one image
					showImage(oImage, 0);	
				}else{ //more images
					for (i=0; i<oImage.length; ++i){
						showImage(oImage[i], i);
					}
				}
			}
		}
		
		//clear iImageList
		oTableObject = new jXCore.SuperString();
		if(jXCore.BrowserInfo.userAgent == 'Internet Explorer'){
			$('iHead').className = 'tableHead'; //reapply class to header
			oTableObject.add('<table width="100%" border="0" cellspacing="0" cellpadding="0">');
			oTableObject.add('<tbody id="iImgContent">');
		}else{
			oTableObject.add('<table id="iImgContent" width="100%" border="0" cellspacing="0" cellpadding="0">');
		}
		oTableObject.add('<tr style="background: #DDDDDD;">');
		oTableObject.add('<td width="150" style="border-bottom: 1px solid #CCCCCC;""><img src="../system/images/protect.gif" alt="" width="16" height="16" align="top" />&nbsp;Name</td>');
		oTableObject.add('<td style="border-left: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC;">&nbsp;Description</td>');
		oTableObject.add('</tr>');
		//add default message
		oTableObject.add('<tr id="iUserMsg">');
		oTableObject.add('<td colspan="2"><center>No images in this album!</center></td>');
		oTableObject.add('</tr>');
		if(jXCore.BrowserInfo.userAgent == 'Internet Explorer'){
			oTableObject.add('</tbody>');
		}
		oTableObject.add('</table>');
		$('iImageList').innerHTML = oTableObject;
		
		oXMLParser.load('../albums/' + top.frames.frImageview.oImageview.encode(oAlbum) + '/index.xml', true);
	}
	
	//display image row
	function showImage(oImage, oNum){
		//create ImgObj
		var oImgRow = document.createElement('tr'); 
		oImgRow.id = 'iImg_' + oNum;
		oImgRow.onclick = function(){
			editImage(oNum, oImage.file, $('iAlbumSelect').options[$('iAlbumSelect').selectedIndex].text);
		}
		oImgRow.style.background = '#EEEEEE';
		oImgRow.style.cursor = 'hand';
		oImgRow.style.cursor = 'pointer';
	
		var oImgName = document.createElement('td');
		oImgName.style.borderBottom = '1px solid #CCCCCC';
		oImgName.style.padding = '1px';
		var sNameTrunc = oImage.name;
		if(sNameTrunc.length > 25){
			sNameTrunc = sNameTrunc.substring(0, 25);
			sNameTrunc = sNameTrunc.replace(/\w+$/, '') + '...';
		}
		if(sNameTrunc == '') sNameTrunc = '<font color="#CCCCCC"><em>none</em></font>';
		oImgName.innerHTML = '<img src="../system/images/interface/admin/image.png" alt="" align="absmiddle" />&nbsp;' + sNameTrunc;

		var oImgDesc = document.createElement('td');
		oImgDesc.style.borderBottom = '1px solid #CCCCCC';
		oImgDesc.style.padding = '1px';
		var sDescTrunc = oImage.description;
		if(sDescTrunc.length > 85){
			sDescTrunc = sDescTrunc.substring(0, 85);
			sDescTrunc = sDescTrunc.replace(/\w+$/, '') + '...';
		}
		if(sDescTrunc == '') sDescTrunc = '<font color="#CCCCCC"><em>none</em></font>';
		oImgDesc.innerHTML = sDescTrunc;
		
		//merge
		oImgRow.appendChild(oImgName);
		oImgRow.appendChild(oImgDesc);			
			
		$('iImgContent').appendChild(oImgRow); //update page
		if(jXCore.BrowserInfo.userAgent == 'Internet Explorer'){//fix png
			if(jXCore.BrowserInfo.version < 7) correctPNG();
		}
	}
		
	//edit image dialog
	function editImage(oId, oFile, oAlbum){
		//update table row
		while($('iImg_' + oId).hasChildNodes())
			$('iImg_' + oId).removeChild($('iImg_' + oId).lastChild);
		$('iImg_' + oId).onclick = function(){};	
		$('iImg_' + oId).style.cursor = '';
		$('iImg_' + oId).style.height = '<?php echo $ConfigXML['thumbnails']['height']+5; ?>px';
		
		//fetch info
		var oXMLParser = new jXCore.XMLParser(); 
		oXMLParser.setUnique(true); 
		oXMLParser.oncomplete = function(oXML){
			var oImage = oXML['imageview']['album']['files']['image'];
			if(oImage == undefined) var oImage = oXML['imageview']['album']['files']['img']; //Safari workaround
			
			//parse image list
			if(oImage.length == undefined){ //one image
				if(oImage['file'] == oFile) var oImageData = oImage;
			}else{ //more images
				for (i=0; i<oImage.length; ++i){
					if(oImage[i]['file'] == oFile) var oImageData = oImage[i];
				}
			}
			
			//generate edit box
			var oImgEdit = document.createElement('td');
			oImgEdit.style.borderBottom = '1px solid #CCCCCC';
			oImgEdit.colSpan = 2;
				
			//thumbnail
			var oImgThumb = document.createElement('div');
			oImgThumb.style.width = '<?php echo $ConfigXML['thumbnails']['width']+5; ?>px';
			oImgThumb.style.height = '<?php echo $ConfigXML['thumbnails']['height']+5; ?>px';
			oImgThumb.style.background = '#FFFFFF center no-repeat';
			oImgThumb.style.backgroundImage  = 'url(\'../albums/' + top.frames.frImageview.oImageview.encode(oAlbum) + '/thumbs/tn_' + top.frames.frImageview.oImageview.encode(oFile) + '\')';
			oImgThumb.style.borderRight = '1px solid #CCCCCC';
			oImgThumb.style.styleFloat = 'left';
			oImgThumb.style.cssFloat = 'left';
			oImgEdit.appendChild(oImgThumb);
			
			//data container
			var oImgData = document.createElement('div');
			var iScroll = ($('iImageList').scrollHeight > $('iImageList').clientHeight) ? 3 : 20;
			if(jXCore.BrowserInfo.userAgent == 'Internet Explorer') iScroll = 20;
			oImgData.style.width = $('iImg_' + oId).offsetWidth - (parseInt(oImgThumb.style.width.replace('px', '')) + iScroll) + 'px';
			oImgData.style.height = '<?php echo $ConfigXML['thumbnails']['height']+3; ?>px';
			oImgData.style.styleFloat = 'left';
			oImgData.style.cssFloat = 'left';	
			oImgEdit.appendChild(oImgData);
			
			//from wrapper
			var oImgFrom = document.createElement('form');
			oImgFrom.onsubmit = function(){return false;}
			oImgData.appendChild(oImgFrom);
			
			//img label
			var oImgLabel = document.createElement('div');
			oImgLabel.innerHTML = '<div style="float: left; height: 16px; width: 68px; padding-top: 4px; padding-left: 2px;">Name:</div><input id="txtImgLabel' + oId + '" value="" maxlength="20" style="width: 250px;" />';
			oImgLabel.style.padding = '1px';
			oImgFrom.appendChild(oImgLabel);
			
			//img description
			var oImgDesc = document.createElement('div');
			oImgDesc.innerHTML = '<div style="float: left; height: 16px; width: 68px; padding-top: 4px; padding-left: 2px;">Description:</div><input id="txtImgDesc' + oId + '" value="" style="width: 250px" />';
			oImgDesc.style.padding = '1px';
			
			oImgFrom.appendChild(oImgDesc);
					
			//img visible
			var oImgVisible = document.createElement('div');
			var oCheckState = (oImageData['visible'] == 'false') ? '' : 'checked="checked"';
			oImgVisible.innerHTML = '<input id="chImgVisible' + oId + '" type="checkbox"' + oCheckState + '" style="margin: 0; margin-left: 1px;" />&nbsp;<label for="chImgVisible' + oId + '">Display Image</label>';
			oImgVisible.style.padding = '1px';
			oImgFrom.appendChild(oImgVisible);
			
			//button bar
			var oImgButtons = document.createElement('div');
			var sButtons = new jXCore.SuperString();
			sButtons.add('<input type="button" value="Cancel" onmouseup="cancelUpdateImage(' + oId + ', \'' + oFile + '\', \'' + oAlbum + '\');" />');
			sButtons.add('&nbsp;');
			sButtons.add('<input type="button" value="Delete" onclick="rmImage('+ oId +', \'' + oImageData['name'] + '\', \'' + oImageData['file'] + '\')" />');
			sButtons.add('&nbsp;');
			sButtons.add('<input type="submit" value="Save" onclick="updImage('+ oId +', \'' + oImageData['name'] + '\', \'' + oImageData['file'] + '\')" />');			
			oImgButtons.innerHTML = sButtons;
			oImgButtons.style.padding = '1px';
			oImgButtons.style.textAlign = 'right';
			oImgFrom.appendChild(oImgButtons);
			
			//update content	
			if($('iImg_' + oId).appendChild(oImgEdit)){
				$('txtImgLabel' + oId).value = oImageData['name'].unescapeHTML();
				$('txtImgDesc' + oId).value = oImageData['description'].unescapeHTML();
			}
			$('iHead').className = 'tableHead'; //reapply class to header (IE bug)
		}
		oXMLParser.load('../albums/' + top.frames.frImageview.oImageview.encode(oAlbum) + '/index.xml', true);
	}
	
	//remove image
	function rmImage(oId, oName, oFile){
		var doRm = confirm('Do you really want to delete "' + oName + '"?');
		if(doRm){
			var oXMLParser = new jXCore.XMLParser(); 
			oXMLParser.setUnique(true); 
			oXMLParser.oncomplete = function(oXML){
				if(oXML['message'] == 'ERR'){
					alert('Failed to remove "' + oName + '"!');
				}else{
					$('iImg_' + oId).parentNode.removeChild($('iImg_' + oId));
				}
			}
			var oPostData = new jXCore.SuperString();
			oPostData.add('file=' + encodeURIComponent(oFile));
			oPostData.add('&album=' + encodeURIComponent($('iAlbumSelect').options[$('iAlbumSelect').selectedIndex].text));
			oXMLParser.load('?action=rmImage', true, oPostData.toString());
		}
	}
	
	//update image
	function updImage(oId, oName, oFile){
		var oXMLParser = new jXCore.XMLParser(); 
		oXMLParser.setUnique(true); 
		oXMLParser.oncomplete = function(oXML){
			if(oXML['message'] == 'ERR'){
				alert('Failed to update "' + oName + '"!');
			}else{		
				var oImgName = document.createElement('td');
				oImgName.style.borderBottom = '1px solid #CCCCCC';
				oImgName.style.padding = '1px';
				var sNameTrunc = $('txtImgLabel' + oId).value.stripHTML();
				if(sNameTrunc.length > 25){
					sNameTrunc = sNameTrunc.substring(0, 25);
					sNameTrunc = sNameTrunc.replace(/\w+$/, '') + '...';
				}
				if(sNameTrunc == '') sNameTrunc = '<font color="#CCCCCC"><em>none</em></font>';
				oImgName.innerHTML = '<img src="../system/images/interface/admin/image.png" alt="" align="absmiddle" />&nbsp;' + sNameTrunc;
		
				var oImgDesc = document.createElement('td');
				oImgDesc.style.borderBottom = '1px solid #CCCCCC';
				oImgDesc.style.padding = '1px';
				var sDescTrunc = $('txtImgDesc' + oId).value.escapeHTML();
				if(sDescTrunc.length > 85){
					sDescTrunc = sDescTrunc.substring(0, 85);
					sDescTrunc = sDescTrunc.replace(/\w+$/, '') + '...';
				}
				if(sDescTrunc == '') sDescTrunc = '<font color="#CCCCCC"><em>none</em></font>';
				oImgDesc.innerHTML = sDescTrunc;

				//update table row
				var oImgRow = $('iImg_' + oId);
				while(oImgRow.hasChildNodes()) oImgRow.removeChild(oImgRow.lastChild);
				oImgRow.onclick = function(){
					editImage(oId, oFile, $('iAlbumSelect').options[$('iAlbumSelect').selectedIndex].text);
				}
				oImgRow.style.height = '';
				oImgRow.style.cursor = 'pointer';
				oImgRow.style.cursor = 'hand';
				oImgRow.appendChild(oImgName);
				oImgRow.appendChild(oImgDesc);			
				
				if(jXCore.BrowserInfo.userAgent == 'Internet Explorer'){//fix png
					if(jXCore.BrowserInfo.version < 7) correctPNG();
				}
			}
		}
		var oPostData = new jXCore.SuperString();
		oPostData.add('file=' + encodeURIComponent(oFile));
		oPostData.add('&album=' + encodeURIComponent($('iAlbumSelect').options[$('iAlbumSelect').selectedIndex].text));
		oPostData.add('&name=' + escape($('txtImgLabel' + oId).value.stripHTML()));
		oPostData.add('&desc=' + escape($('txtImgDesc' + oId).value.escapeHTML()));
		if($('chImgVisible' + oId).checked)
			oPostData.add('&visible=' + encodeURIComponent('true'));
		else
			oPostData.add('&visible=' + encodeURIComponent('false'));
		oXMLParser.load('?action=updImage', true, oPostData.toString());
	}

	//cancel update
	function cancelUpdateImage(oId, oFile, oAlbum){
		var oXMLParser = new jXCore.XMLParser(); 
		oXMLParser.setUnique(true); 
		oXMLParser.oncomplete = function(oXML){
			var oImage = oXML['imageview']['album']['files']['image'];
			if(oImage == undefined) var oImage = oXML['imageview']['album']['files']['img']; //Safari workaround
			
			//parse image list
			if(oImage.length == undefined){ //one image
				if(oImage['file'] == oFile) var oImageData = oImage;
			}else{ //more images
				for (i=0; i<oImage.length; ++i){
					if(oImage[i]['file'] == oFile) var oImageData = oImage[i];
				}
			}
			
			//reset form
			var oImgName = document.createElement('td');
			oImgName.style.borderBottom = '1px solid #CCCCCC';
			oImgName.style.padding = '1px';
			var sNameTrunc = oImageData['name'];
			if(sNameTrunc.length > 25){
				sNameTrunc = sNameTrunc.substring(0, 25);
				sNameTrunc = sNameTrunc.replace(/\w+$/, '') + '...';
			}
			if(sNameTrunc == '') sNameTrunc = '<font color="#CCCCCC"><em>none</em></font>';
			oImgName.innerHTML = '<img src="../system/images/interface/admin/image.png" alt="" align="absmiddle" />&nbsp;' + sNameTrunc;
	
			var oImgDesc = document.createElement('td');
			oImgDesc.style.borderBottom = '1px solid #CCCCCC';
			oImgDesc.style.padding = '1px';
			var sDescTrunc = oImageData['description'];
			if(sDescTrunc.length > 85){
				sDescTrunc = sDescTrunc.substring(0, 85);
				sDescTrunc = sDescTrunc.replace(/\w+$/, '') + '...';
			}
			if(sDescTrunc == '') sDescTrunc = '<font color="#CCCCCC"><em>none</em></font>';
			oImgDesc.innerHTML = sDescTrunc;
			
			//update table row
			var oImgRow = $('iImg_' + oId);
			while(oImgRow.hasChildNodes()) oImgRow.removeChild(oImgRow.lastChild);
			oImgRow.onclick = function(){
				editImage(oId, oFile, $('iAlbumSelect').options[$('iAlbumSelect').selectedIndex].text);
			}
			
			oImgRow.style.height = '';
			oImgRow.style.cursor = 'pointer';
			oImgRow.style.cursor = 'hand';
			oImgRow.appendChild(oImgName);
			oImgRow.appendChild(oImgDesc);			
			
			if(jXCore.BrowserInfo.userAgent == 'Internet Explorer'){//fix png
				if(jXCore.BrowserInfo.version < 7) correctPNG();
			}
		}
		oXMLParser.load('../albums/' + top.frames.frImageview.oImageview.encode(oAlbum) + '/index.xml', true);
	}

	//init
	if(window.addEventListener) 
		window.addEventListener('load', CreateDropDown, false);
	else if(window.attachEvent)
		window.attachEvent('onload', CreateDropDown);
//]]>
</script>
<div id="text_hr">Manage Images</div>
<div id="text_block">
	<div id="iHead" class="tableHead" style="text-align: right; padding: 1px;">
		<input id="cmdCheck" type="button" value="Check" onclick="CheckAlbum();" style="height: 22px;" />
		<select id="iAlbumSelect" onchange="eval(this.value);"></select>
	</div>
	<div id="iImageList">&nbsp;</div>
</div>
