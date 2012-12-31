<?php
	if(!function_exists('authenticate')) exit;
	
	$tools = new tools();	
	$ConfigXML = $tools->xml('config.xml');
	$ConfigXML = $ConfigXML['imageview']['settings'];
	
	//get ingo
	if(@ini_get('safe_mode') == 0){
		$safe_mode = false;
		//permissions
		$proot = substr(sprintf('%o', @fileperms('../')), -4);
		if(($proot !== '0777') && ($proot !== '0755')){
			$proot = '<a style="color: red; text-decoration: none;" href="javascript:FixPath(\'%root%/\');">Fix</a>';	
		}else{
			$proot = '<font color="green">Ok</font>';
		}
		$palbums = substr(sprintf('%o', @fileperms('../albums/')), -4);
		if(($palbums !== '0777') && ($palbums !== '0755')){
			$palbums = '<a style="color: red; text-decoration: none;" href="javascript:FixPath(\'%root%/albums/\');">Fix</a>';	
		}else{
			$palbums = '<font color="green">Ok</font>';
		}
		$pcache = substr(sprintf('%o', @fileperms('../cache/')), -4);
		if(($pcache !== '0777') && ($pcache !== '0755')){
			$pcache = '<a style="color: red; text-decoration: none;" href="javascript:FixPath(\'%root%/cache/\');">Fix</font>';	
		}else{
			$pcache = '<font color="green">Ok</font>';	
		}
		$padmin = substr(sprintf('%o', @fileperms('config.xml')), -4);
		if(($padmin !== '0777') && ($padmin !== '0755') && ($padmin !== '0666')){
			$padmin = '<a style="color: red; text-decoration: none;" href="javascript:FixPath(\'config.xml\');">Fix</a>';		
		}else{
			$padmin = '<font color="green">Ok</font>';	
		}
		//gd info
		if(function_exists('gd_info')){
			$gdinfo = gd_info();
			if (function_exists('imagettftext')) {
				$gd_inst = '<font color="green">'.$gdinfo['GD Version'].'</font>';
			} else {
				$gd_inst = '<font color="red">Installed, but missing annotation support</font>';
			}
		}else{
			$gd_inst = '<font color="red">Not Installed</font>';
		}
		//imagemagick
		@exec($ConfigXML['imagemagick'].' -version', $im_inst);
		$im_inst = $im_inst[0];
		if(strtolower(substr($im_inst, 0, 7)) == 'version'){
			$im_inst = '<font color="green">'.substr($im_inst, 9, -27).'</font>';
		}else{
			$im_inst = '<font color="red">Not Installed</font>';
		}
		
	}else{
		$safe_mode = true;
	}
?>
<script type="text/javascript">
//<![CDATA[
	function FixPath(sTarget){
		var xmlhttp = new jXCore.XMLParser();
		xmlhttp.oncomplete = function(oXML){
			location.reload();
		}
		xmlhttp.setUnique(true);
		xmlhttp.load('?action=fixperms&target=' + sTarget, true);
	}
	
	function rebuilt(oCaller){
		function parseXML(oXML, sParent, oArray){ 
			//set variables
			var iIndex = 0;
			var iLength = oXML.length;
			//parse xml tree
			if(oXML['text'] != undefined){
				if(oXML['tree'] == undefined){
					oArray[oArray.length] = encodeURI(sParent + oXML['text']);
				}
				sParent += oXML['text'] + '/';
			}
			if(oXML['tree'] != undefined) parseXML(oXML['tree'], sParent, oArray);
			if(iLength != undefined){
				while(iIndex < iLength){
					parseXML(oXML[iIndex], sParent, oArray)
					iIndex++;
				};
			}
		}
		
		function complete(){
			if($('iCount').value == $('iTotal').value){
				alert('Thumbnails have been updated!');
				oCaller.disabled = false;
			}else setTimeout(complete, 1000);
				
		}
		
		var bUpdate = confirm("This can take a long time!\nDo you want to continue?");
		
		if(bUpdate){
			oCaller.disabled = true;
			var xmlhttp = new jXCore.XMLParser();
			xmlhttp.oncomplete = function(oXML){
			 	//generate array
				var oAlbums = new Array();
				parseXML(oXML, '', oAlbums);
				//monitor progress
				$('iTotal').value = oAlbums.length;
				setTimeout(complete, 1000);
				//update thumbnauls
				for (i=0;i<oAlbums.length;i++){
					var httpRebuildRequest = new jXCore.XMLParser();
					httpRebuildRequest.setUnique(true);
					httpRebuildRequest.oncomplete = function(oXML){
						$('iCount').value = (parseInt($('iCount').value)+1);	
					}
					httpRebuildRequest.load('?action=buildthumbs&album=' + oAlbums[i], true);
				}				
			}
			xmlhttp.setUnique(true);
			xmlhttp.load('../albumtree.php', true);
		}
	}
//]]>
</script>
<div id="text_hr">Troubleshooting</div>
<div id="text_block">
	<?php
		if($safe_mode){
			echo 'Safe_Mode is <strong>Enabled</strong>!<br /><br />';
			echo 'Imageview doesn\'t work with Safe_Mode enabled, there is nothing I can do about that.<br />';
			echo 'If you can disable Safe_Mode please do some reading on the subject. There should be no problems disabling it.';
		}else{
	?>
	<table width="100%" border="0" cellspacing="0" cellpadding="1">
	  <tr>
		<td colspan="2" class="tableHead">&nbsp;Permissions</td>
	  </tr>
	  <tr>
		<td width="120">[o] Imageview 6</td>
		<td><?php echo $proot; ?></td>
	  </tr>
	  <tr>
		<td width="120">&nbsp;|-&nbsp;admin/config.xml</td>
		<td><?php echo $padmin; ?></td>
	  </tr>
	  <tr>
		<td width="120">&nbsp;|-&nbsp;albums</td>
		<td><?php echo $palbums; ?></td>
	  </tr>
	  <?php if(strtolower($ConfigXML['cache']) == 'true'){ ?>
	  <tr>
		<td width="120">&nbsp;|-&nbsp;cache</td>
		<td><?php echo $pcache; ?></td>
	  </tr>
	  <?php } ?>
	  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td colspan="2" class="tableHead">&nbsp;Image Libraries</td>
	  </tr>
	  <tr>
		<td width="120">GD Library:</td>
		<td><?php echo $gd_inst; ?></td>
	  </tr>
	  <tr>
		<td width="120">ImageMagick:</td>
		<td><?php echo $im_inst; ?></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td colspan="2" class="tableHead">&nbsp;Thumbnails</td>
	  </tr>
	  <tr>
		<td width="120">Update Thumbnails</td>
		<td><input name="cmdThumbs" type="button" value="Update" onclick="rebuilt(this);" /><input id="iCount" type="hidden" value="0" /><input id="iTotal" type="hidden" value="0" /></td>
	  </tr>
	 </table>
	 <?php
	 	}
	 ?>
</div>
