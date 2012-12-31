<?php
	if(!function_exists('authenticate')) exit;
	
	$tools = new tools();	
	$ConfigXML = $tools->xml('config.xml');
	$ConfigXML = $ConfigXML['imageview']['settings'];

?>
<script type="text/javascript">	
//<![CDATA[
	//globals
	var iId = 0;
	
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
					oOption.value = sParent + oXML['text'];
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
			//setup table
			oTableObject = new jXCore.SuperString();
			if(jXCore.BrowserInfo.userAgent == 'Internet Explorer'){
				$('iHead').className = 'tableHead'; //reapply class to header
				oTableObject.add('<table width="100%" border="0" cellspacing="0" cellpadding="0">');
				oTableObject.add('<tbody id="iImgContent">');
			}else{
				oTableObject.add('<table id="iImgContent" width="100%" border="0" cellspacing="0" cellpadding="0">');
			}
			oTableObject.add('<tr style="background: #DDDDDD;">');
			oTableObject.add('<td style="border-bottom: 1px solid #CCCCCC;""><img src="../system/images/protect.gif" alt="" width="16" height="16" align="top" />&nbsp;File</td>');
			oTableObject.add('<td width="180" style="border-left: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC;">&nbsp;Status</td>');
			oTableObject.add('</tr>');
			//add default message
			oTableObject.add('<tr id="iUserMsg">');
			oTableObject.add('<td colspan="2"><center>Please click the + button to add a file to an album.</center></td>');
			oTableObject.add('</tr>');
			if(jXCore.BrowserInfo.userAgent == 'Internet Explorer'){
				oTableObject.add('</tbody>');
			}
			oTableObject.add('</table>');
			$('iImageList').innerHTML = oTableObject;
		}
		oXMLParser.load('../albumtree.php', true);
	}
	
	function rmFile(oFile){
		var oFrame = window.frames[oFile.replace('oFile', 'imgFrame')];
		if(oFrame == undefined){ //IE needs another way (go figure)
			oFrame = $(oFile.replace('oFile', 'imgFrame'));
		}
		oFrame.location.reload();
		$(oFile).parentNode.removeChild($(oFile));
	}
	
	function addFile(){
		if($('iAlbumSelect').disabled == false){
			var oUserMsg = $('iUserMsg');
			oUserMsg.style.display = 'none';
			$('iAlbumSelect').disabled = true;
		}
		
		var iFileId = iId++;
		var oFileContainer = document.createElement('tr'); 
		oFileContainer.id = 'oFile_' + iFileId;
		oFileContainer.style.background = '#EEEEEE';
		
		var oFileBrowse = document.createElement('td');
		oFileBrowse.style.borderBottom = '1px solid #CCCCCC';
		oFileBrowse.style.padding = '0px';

		var oFileStatus = document.createElement('td');
		oFileStatus.style.borderBottom = '1px solid #CCCCCC';
		oFileStatus.style.padding = '1px';
		oFileStatus.style.textAlign = 'right';
			oFileStatus.innerHTML = '<a style="cursor: hand; cursor: pointer;" onclick="rmFile(\'oFile_' + iFileId + '\');">[x]</a>';
		//oFileStatus.innerHTML = '<input type="button" value="-" style="width: 16px; height: 16px;" onclick="rmFile(\'oFile_' + iFileId + '\');" />';
		
		var oFileFrame = document.createElement('iframe');
		oFileFrame.id = 'imgFrame_' + iFileId;
		oFileFrame.name = 'imgFrame_' + iFileId;
		oFileFrame.frameBorder = 0;
		oFileFrame.scrolling = 'no';
		oFileFrame.style.width = '415px';
		oFileFrame.style.height = '18px';
		oFileFrame.src = '?action=uplform&id=' + iFileId + '&album=' + encodeURIComponent($('iAlbumSelect').value);
		oFileBrowse.appendChild(oFileFrame);
		
		//update
		oFileContainer.appendChild(oFileBrowse);
		oFileContainer.appendChild(oFileStatus);		
		$('iImgContent').appendChild(oFileContainer);	
	}
		
	//init
	if(window.addEventListener) 
		window.addEventListener('load', CreateDropDown, false);
	else if(window.attachEvent)
		window.attachEvent('onload', CreateDropDown);
//]]>
</script>
<div id="text_hr">Upload Images</div>
<div id="text_block">
	<div id="iHead" class="tableHead" style="text-align: right;">
		<input id="cmdNew" type="button" value="+" onclick="addFile()" style="width: 22px; height: 22px; margin-top: 1px;" />&nbsp;<select id="iAlbumSelect"></select>
	</div>
	<div id="iImageList">&nbsp;</div>
</div>
