/*
Correctly handle PNG transparency in Win IE 5.5 or higher.
http://homepage.ntlworld.com/bobosola. Updated 02-March-2004
*/

var sXLoc = location.href;
sXLoc = sXLoc.replace('main.php', 'system/images/protect.gif');
sXLoc = sXLoc.replace('help/index.htm', 'system/images/protect.gif');
sXLoc = sXLoc.replace('admin/index.php', 'system/images/protect.gif');

function correctPNG(){
	for(var i=0; i<document.images.length; i++){
		var img = document.images[i]
		var imgName = img.src.toUpperCase()
		if(imgName.substring(imgName.length-3, imgName.length) == "PNG"){
			var imgID = (img.id) ? "id='" + img.id + "' " : ""
			var imgClass = (img.className) ? "class='" + img.className + "' " : ""
			var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
			var imgStyle = "display:inline-block;" + img.style.cssText 
			if (img.align == "left") imgStyle = "float:left;" + imgStyle
			if (img.align == "right") imgStyle = "float:right;" + imgStyle
			if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle		
			var strNewHTML = "<span " + imgID + imgClass + imgTitle
			+ " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
			+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
			+ "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
			img.outerHTML = strNewHTML
			i = i-1
		}
	}
}

function correctBGPNG() {
	var rslt = navigator.appVersion.match(/MSIE (\d+\.\d+)/, '');
	var itsAllGood = (rslt != null && Number(rslt[1]) >= 5.5);
	for(var i = document.all.length - 1, obj = null; (obj = document.all[i]); i--){
		if(itsAllGood && obj.currentStyle.backgroundImage.match(/\.png/i) != null){
			if((obj !== document.body) && (obj.id != 'iImage')){
				this.fnFixPng(obj);
				obj.attachEvent("onpropertychange", this.fnPropertyChanged);
			}
		}
	}
}
	
function fnPropertyChanged() {
	if (window.event.propertyName == "style.backgroundImage") {
		var el = window.event.srcElement;
		if (!el.currentStyle.backgroundImage.match(/protect\.gif/i)) {
			var bg	= el.currentStyle.backgroundImage;
			var src = bg.substring(5,bg.length-2);
			el.filters.item(0).src = src;
			el.style.backgroundImage = "url(" + sXLoc + ")";
		}
	}
}
	
function fnFixPng(obj) {
	var bg	= obj.currentStyle.backgroundImage;
	var src = bg.substring(5,bg.length-2);
	obj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "', sizingMethod='scale')";
	obj.style.backgroundImage = "url(" + sXLoc + ")";
}

//hook to catch updating of content in iContent (jorge)
function attachHandles(){
	correctPNG();
	correctBGPNG();
	document.getElementById('iContent').attachEvent("onpropertychange", correctPNG);
}

window.attachEvent("onload", attachHandles);