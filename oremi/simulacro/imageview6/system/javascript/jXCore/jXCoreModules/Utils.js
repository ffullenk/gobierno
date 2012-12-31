/***********************************\
| jXCore :: Utils                   |
| By Jorge Schrauwen 2008			|
| -- http://blackdot.be				|
\***********************************/

//inistialize Utils
if (jXCore.Utils == undefined) {
	jXCore.namespace('Utils');
	
	//extend string object
	String.prototype.stripHTML = function(){
		return this.replace(/<\/?[^>]+>/gi, '');	
	}
		
	String.prototype.escapeHTML = function(){
		var oContainer = document.createElement('div');
		var sText = document.createTextNode(this);
		oContainer.appendChild(sText);
		return oContainer.innerHTML;
	}
		
	String.prototype.unescapeHTML = function(){
		var oContainer = document.createElement('div');
		oContainer.innerHTML = this.stripHTML();
		return oContainer.childNodes[0] ? oContainer.childNodes[0].nodeValue : '';
	}
	
	//extend HTMLElement
	/*
	!!! Busted in IE
	if(!window.Element) var Element = new Object();
	
	Element.prototype.getStyle = function(sProperty){				
		if(this.currentStyle){
			var styleProperty = this.currentStyle[sProperty];
		}else{
			if(window.getComputedStyle){
				var styleProperty = document.defaultView.getComputedStyle(this,null).getPropertyValue(sProperty);
			}
		} 	
		return styleProperty;
	}
	*/
} else throw new Error("jXCore - PreFetch already loaded!");