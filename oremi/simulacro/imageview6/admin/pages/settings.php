<?php
	if(!function_exists('authenticate')) exit;
	
	$tools = new tools();	
	$ConfigXML = $tools->xml('config.xml');
	$sLicense = $ConfigXML['imageview']['key'];
	$ConfigXML = $ConfigXML['imageview']['settings'];
	if(file_exists('license.key')){
		$KeyXML = $tools->xml('license.key');
		$sLicense = $KeyXML['imageview']['key'];
	}
?>
<script type="text/javascript">
//<![CDATA[
	function DoImgLib(){
		if($('imgLib').value == 'imagemagick'){
			$('iPathRow').style.display = '';
		}else{
			$('iPathRow').style.display = 'none';
		}
	}
	
	function MsgTimeout(){
		$('iMsg').innerHTML = '';
	}
	
	function SaveSettings(){
		var xmlhttp = new jXCore.XMLParser();
		var oPostData = new jXCore.SuperString();
		var bUpdate = true;
		oPostData.add('library=' + $('imgLib').value);
		oPostData.add('&impath=' + $('imPath').value);
		if(!parseInt($('tnWidth').value)){
			if(bUpdate){
				bUpdate = false;
				$('iMsg').innerHTML = '<font color="red">Thumbnail Width isn\'t valid!</font>';
			}
		}else{
			if(parseInt($('tnWidth').value) < 50){
				$('tnWidth').value = 50;	
			}
		}
		oPostData.add('&tnwidth=' + $('tnWidth').value);
		if(!parseInt($('tnHeight').value)){
			if(bUpdate){
				bUpdate = false;
				$('iMsg').innerHTML = '<font color="red">Thumbnail Height isn\'t valid!</font>';
			}
		}else{
			if(parseInt($('tnHeight').value) < 50){
				$('tnHeight').value = 50;	
			}
		}
		oPostData.add('&tnheight=' + $('tnHeight').value);
		if(!parseInt($('tnQuality').value)){
			if(bUpdate){
				bUpdate = false;
				$('iMsg').innerHTML = '<font color="red">Thumbnail Quality must be in range 50-100!</font>';
			}
		}else{
			if(parseInt($('tnQuality').value)  > 100){
				$('tnQuality').value = 100;	
			}
			if(parseInt($('tnQuality').value) < 50){
				$('tnQuality').value = 50;	
			}
		}
		oPostData.add('&tnquality=' + $('tnQuality').value);
		oPostData.add('&antext=' + $('anText').value);
		oPostData.add('&ancolor=' + $('anColor').value);
		oPostData.add('&cache=' + $('rbCache').checked);
		oPostData.add('&imgprotect=' + $('rbProtect').checked);
		oPostData.add('&defablum=' + encodeURIComponent($('defAlbum').value));
		oPostData.add('&template=' + encodeURIComponent($('skin').value));
		oPostData.add('&rss=' + $('rbRSS').checked);
		oPostData.add('&pl_ui=' + $('pl_ui').checked);
		oPostData.add('&pl_albums=' + $('pl_albums').checked);
		oPostData.add('&pl_images=' + $('pl_images').checked);
		oPostData.add('&pl_sizecheck=' + !$('pl_sizecheck').checked);
		oPostData.add('&encode=' + $('encode').value);
		if($('txtKey').value != '') oPostData.add('&license=' + encodeURIComponent("\n\t<key>"+$('txtKey').value+"</key>"));
		if(!parseInt($('slidetime').value)){
			if(bUpdate){
				bUpdate = false;
				$('iMsg').innerHTML = '<font color="red">Slideshow Time must isn\'t valid!</font>';
			}
		}else{
			if(parseInt($('slidetime').value) < 3){
				if(bUpdate){
					bUpdate = false;
					$('iMsg').innerHTML = '<font color="red">Slideshow Time must be 3 sec or more!</font>';
				}
			}
		}
		oPostData.add('&sstime=' + $('slidetime').value);
		
		//send update
		if(bUpdate){
			xmlhttp.oncomplete = function(oXML){
				$('iMsg').innerHTML = oXML['message'];
				setTimeout(MsgTimeout, 3000);
			}
			xmlhttp.setUnique(true);
			xmlhttp.load('?action=savecfg', true, oPostData.toString());
		}else setTimeout(MsgTimeout, 10000);
	}
//]]>
</script>
<div id="text_hr">Settings</div>
<div id="text_block">	
	<table width="100%" border="0" cellspacing="0" cellpadding="1">
	  <tr>
		<td colspan="2" class="tableHead">&nbsp;General</td>
	  </tr>
	  <tr>
		<td width="120">Image Library:</td>
		<td>
			<select id="imgLib" onchange="DoImgLib();">
				<option value="gd" <?php if($ConfigXML['library'] == 'gd') echo 'selected="selected"'; ?>>GD 2</option>
				<option value="imagemagick" <?php if($ConfigXML['library'] == 'imagemagick') echo 'selected="selected"'; ?>>ImageMagick</option>
			</select>
		</td>
	  </tr>
	  <tr id="iPathRow" <?php if($ConfigXML['library'] == 'gd' ){ echo 'style="display: none;"'; } ?>>
		<td>Imagemagick Path:</td>
		<td><input id="imPath" type="text" style="width: 317px;" value="<?php echo $ConfigXML['imagemagick']; ?>" />&nbsp;<label title="Enter the path to the convert binary from imagemagick."><img src="../system/images/interface/admin/info.png" alt="Enter the path to the convert binary from imagemagick." align="absmiddle" /></label></td>
	  </tr>
	  <tr>
		<td>Image Protection:</td>
		<td><input id="rbProtect" type="checkbox" value="true" <?php if($ConfigXML['imageprotection'] == 'true') echo 'checked="checked" '; ?>/>&nbsp;<label for="rbProtect">Enable</label></td>
	  </tr>
	  <tr>
		<td>Image Cache:</td>
		<td><input id="rbCache" type="checkbox" value="true" <?php if($ConfigXML['cache'] == 'true') echo 'checked="checked" '; ?>/>&nbsp;<label for="rbCache">Enable</label></td>
	  </tr>
	  <tr>
		<td>Image Annotation:</td>
		<td><input id="anText" type="text" style="width: 250px;" value="<?php echo $ConfigXML['annotation']['text']; ?>" /> <input id="anColor" type="text" style="width: 60px;" maxlength="7" value="<?php echo $ConfigXML['annotation']['color']; ?>" />&nbsp;<label title="The color must be enterd in hexadecimal format. (Click for examples)"><a href="http://www.w3schools.com/html/html_colors.asp" target="_blank"><img src="../system/images/interface/admin/info.png" alt="The color must be enterd in hexadecimal format. (Click for examples)" border="0" align="absmiddle" /></a></label></td>
	  </tr>
	  <tr>
		<td class="tableSpace">URI Encoding:</td>
		<td class="tableSpace">
			<select id="encode">
				<option value="uri" <?php if($ConfigXML['encode'] == 'uri') echo 'selected="selected"'; ?>>encodeURIComponent</option>
				<option value="escape" <?php if($ConfigXML['encode'] == 'escape') echo 'selected="selected"'; ?>>escape</option>
			</select>&nbsp;<label title="Leave at default unless thumbnails for file with special characters don't display."><img src="../system/images/interface/admin/info.png" alt="Leave at default unless thumbnails for files with special characters don't display." border="0" align="absmiddle" /></label>
		</td>
	  </tr>
	  <tr>
		<td colspan="2" class="tableHead">&nbsp;Display</td>
	  </tr>
	  <tr>
		<td>Template:</td> <!-- Display -> skin -->
		<td>
			<select id="skin">
				<?php
					$skinPath = '../system/skins/';
					$MySkins = dir($skinPath);
					while(false !== ($file = $MySkins->Read())){
						if(($file !== '.') && ($file !== '..')){
							if(is_dir($skinPath.$file)){
								if(file_exists($skinPath.$file.'/skin.xml')){
									echo '<option value="'.$file.'"';
									if($ConfigXML['display']['skin'] == $file) echo ' selected="selected"';
									echo '>'.$file.'</option>';
								}
							}
						}
					}
					$MySkins->close();

				?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td>Default Album:</td>
		<td>
			<select id="defAlbum">
			<?php
				//generate albumdrop
				function genDropDown($MyAlbums, $parent, $default){
					foreach ($MyAlbums as $key => $val) {
						if(!is_array($val)){
							if(file_exists('../albums/'.$parent.$val.'/index.xml')){
								$data .= '<option value="'.$parent.$val.'"';
								if($default == $parent.$val) $data .= ' selected="selected"';
								$data .= '>'.$parent.$val.'</option>';
							}else{
								if(is_array($MyAlbums[$val])){;
									$data .= genDropDown($MyAlbums[$val], $parent.$val.'/', $default);
								}
							}
						}
					}
					return $data;
				}
			
				$MyAlbums = $tools->GetAlbumArray('../albums/');
				echo genDropDown($MyAlbums, '', $ConfigXML['display']['default']);
			?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td>RSS Feeds:</td>
		<td><input id="rbRSS" type="checkbox" value="true" <?php if($ConfigXML['display']['rss'] == 'true') echo 'checked="checked" '; ?>/>&nbsp;<label for="rbRSS">Enable</label></td>
	  </tr>
	  <tr>
		<td class="tableSpace">Slideshow Time:</td>
		<td class="tableSpace"><input id="slidetime" type="text" style="width: 18px;" value="<?php echo $ConfigXML['display']['slideshow']; ?>"  />&nbsp;sec</td>
	  </tr>
	  <tr>
		<td colspan="2" class="tableHead">&nbsp;Thumbnails</td>
	  </tr>
	  <tr>
		<td>Size:</td>
		<td><input id="tnWidth" type="text" style="width: 30px;" value="<?php echo $ConfigXML['thumbnails']['width']; ?>"  />&nbsp;x&nbsp;<input id="tnHeight" type="text" style="width: 30px;" value="<?php echo $ConfigXML['thumbnails']['height']; ?>"  />&nbsp;<label title="Thumbnails have to be updated. (Click to see how)"><a href="javascript:OpenPage('troubleshooting');"><img src="../system/images/interface/admin/info.png" alt="Thumbnails have to be updated. (Click to see how)" border="0" align="absmiddle" /></a></label></td>
	  </tr>
	  <tr>
		<td class="tableSpace">Quality:</td>
		<td class="tableSpace"><input id="tnQuality" type="text" style="width: 30px;" value="<?php echo $ConfigXML['thumbnails']['quality']; ?>"  />&nbsp;%</td>
	  </tr>
	  <tr>
		<td colspan="2" class="tableHead">&nbsp;Preloading</td>
	  </tr>
 	  <tr>
		<td>Interface:</td>
		<td><input type="checkbox" id="pl_ui" value="true" <?php if($ConfigXML['display']['preload']['interface'] == 'true') echo 'checked="checked" '; ?>/>&nbsp;<label for="pl_ui">Enable</label></td>
	  </tr>
	  <tr>
		<td>Albums:</td>
		<td><input type="checkbox" id="pl_albums" value="true" <?php if($ConfigXML['display']['preload']['albums'] == 'true') echo 'checked="checked" '; ?>/>&nbsp;<label for="pl_albums">Enable</label></td>
	  </tr>	
	  <tr>
		<td>Images:</td>
		<td><input type="checkbox" id="pl_images" value="true" <?php if($ConfigXML['display']['preload']['images'] == 'true') echo 'checked="checked" '; ?>/>&nbsp;<label for="pl_images">Enable</label></td>
	  </tr>	
	  <tr>
		<td class="tableSpace">Quick Preload:</td>
		<td class="tableSpace">
			<input type="checkbox" id="pl_sizecheck" value="false" <?php if($ConfigXML['display']['preload']['sizecheck'] == 'false') echo 'checked="checked" '; ?>/>&nbsp;<label for="pl_sizecheck">Enable</label>
			<label title="This will disable the file size check. This will give a slightly faster preload but a not so accurate progress display."><img src="../system/images/interface/admin/info.png" alt="This will disable the file size check. This will give a slightly faster preload but a not so accurate progress display." border="0" align="absmiddle" /></label>
		</td>
	  </tr>	
	  <tr>
		<td colspan="2" class="tableHead">&nbsp;Registration</td>
	  </tr>
	  <tr>
		<td>License Key:</td>
		<td><input id="txtKey" type="text" maxlength="29" style="width: 200px;" value="<?php echo $sLicense; ?>" />&nbsp;<label title="You can obtain a license by clicking here."><a href="http://www.blackdot.be/?inc=projects/imageview&index=license.php" target="_blank"><img src="../system/images/interface/admin/info.png" alt="You can obtain a license by clicking here." border="0" align="absmiddle" /></a></label></td>
	  </tr>
	  <tr>
		<td colspan="2">&nbsp;</td>
	  </tr>
	  <tr>
		<td colspan="2" align="right"><span id="iMsg"></span>&nbsp;<input name="Save" type="submit" value="Save" onclick="SaveSettings();" /></td>
	  </tr>
	</table>
</div>
