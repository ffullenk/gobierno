/***********************************\
| jXCore :: Javascript Library      |
| By Jorge Schrauwen 2005 	        |
| -- http://blackdot.be		        |
|                                   |
| help from:                        |
| Jeremy McPeak                     |
| -- http://www.wdonline.com        |
|                                   |
| Erik Arvidsson                    |
| -- http://erik.eae.net            |
\***********************************/

//inistialize Parser
if (jXCore.XMLParser == undefined) {
	jXCore.namespace('XMLParser');
	jXCore.XMLParser = function(){
		//variables
		this.uniqueRequest = false;
	}
	jXCore.XMLParser.prototype = {
		load: function(sURI, bSync, oPOST, oUID, oPass){ //load a XML file
			var oThis = this;
			oThis.XMLDoc = null;
			oThis.xhr = new jXCore.XMLHttpRequest(); //create the XMLHttpRequest object
			oThis.xhr.onreadystatechange = function () {
				if(oThis.xhr.readyState == 4){
					try{
						if(oThis.xhr.status >= 200 && oThis.xhr.status < 300){
							oThis.XMLDoc = oThis.xhr.responseXML;
							if(oThis.XMLDoc == null || oThis.XMLDoc == undefined)
								oThis.oncomplete(); //no Doc, can't parse
							else
								oThis.oncomplete(oThis.XParse()); //XMLDoc
						}else{
							oThis.onerror(null);
						}
					}catch(err){
						oThis.onerror(err);
					}
				}
			}
			if((oPOST == undefined) || (oPOST == '') || (oPOST == false)){
				if((oUID == undefined) || (oPass == undefined)){
					oThis.xhr.open("GET", sURI, bSync);	
				}else{
					oThis.xhr.open("GET", sURI, bSync, oUID, oPass);	
				}
				if(oThis.uniqueRequest)
					oThis.xhr.setRequestHeader( "If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT" );
				oThis.xhr.send(null);
			}else{
				if((oUID == undefined) || (oPass == undefined)){
					oThis.xhr.open("POST", sURI, bSync);	
				}else{
					oThis.xhr.open("POST", sURI, bSync, oUID, oPass);	
				}
				oThis.xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				if(oThis.uniqueRequest)
					oThis.xhr.setRequestHeader( "If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT" );
				oThis.xhr.send(oPOST);
			}
		},
		
		oncomplete: function(oXML){}, //fires when done (must be overwritten)
		
		onerror: function(oError){ //fires when an error is encounterd (can be overwritten)
			var oThis = this;
			var sMsg = '';
			if(oError == null){
				switch(oThis.xhr.status){
					case 404: sMsg = 'Requested File Not Found On Server!'; break;
					case 500: sMsg = 'The Server Made An Error!'; break;
					default: sMsg = 'Error ' + oThis.xhr.status + ': ' + oThis.xhr.statusText;	break;
				}
			}else sMsg = oError.message;
			throw new Error(sMsg);
		},
		
		setUnique: function(bEnable){;
			var oThis = this;
			oThis.uniqueRequest = bEnable;
		},
		
		XParse: function(){ //xml parser
			var oThis = this;
			function buildObject(n){
				switch(n.nodeType){
					case 1: //Element
					case 9:	//Document
						return buildChildren(n);
					case 2: //Attr
					case 3: //Text
					case 4: //CDATA
						return n.nodeValue;
				}
			}
			
			function buildChildren(n){
				var cs = n.childNodes;
				var textRes = "";
				var hash = {};
				var bHash = false, c, i;
				
				function add(c){
					bHash = true;
					var name = c.nodeName;	
					//add
					if(name in hash){
						if(hash[name] instanceof Array){
							//add to array
							hash[name].push(buildObject(c));
						}else{
							//convert to array
							hash[name] = [hash[name], buildObject(c)];
						}
					}else{
						//add new key-value-pair
						hash[name] = buildObject(c);
					}
				}
				
				if(n.nodeType == 1){
					var attrs = n.attributes;	
					for (i = 0; i < attrs.length; i++) {
						add(attrs[i]);
					}
				}
				for(i = 0; i < cs.length; i++){
					c = cs[i];
					switch (c.nodeType) {
						case 1: // Element
							add(c);				
							break;
							
						case 3: // Text
						case 4: // CDATA
							// strip
							var s = c.nodeValue.replace(/(^\s+)|(\s+$)/, "");
							if (s != "") {
								textRes = s;
							}
							break;
					}
				}
				return bHash ? hash : textRes;
			};
			return buildObject(oThis.XMLDoc); 
		}	
	}
} else throw new Error("jXCore - PreFetch already loaded!");