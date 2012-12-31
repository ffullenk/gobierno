/***********************************\
| jXCore :: Javascript Library      |
| By Jorge Schrauwen 2006 			|
| -- http://blackdot.be				|
\***********************************/

//short form of document.getElementById
$ = function () { //$('elementID')
  var elements = new Array();
  for (var i = 0; i < arguments.length; i++) {
    var element = arguments[i];
    if (typeof element == 'string')
      element = document.getElementById(element);
    if (arguments.length == 1)
      return element;

    elements.push(element);
  }
  return elements;
}

$$ = function () { //$$('elementname')
  var elements = new Array();
  for (var i = 0; i < arguments.length; i++) {
    var element = arguments[i];
    if (typeof element == 'string')
      element = document.getElementsByName(element);
    if (arguments.length == 1)
      return element;

    elements.push(element);
  }
  return elements;
}


//creation of jXCore
var jXCore = {
	//variables
	baseDirectory: "",
	
	//namespace generator
	namespace: function(sNameSpace) {
		if(!sNameSpace || !sNameSpace.length)
			return null;
	
		var levels = sNameSpace.split(".");
	
		var currentNS = jXCore;
	
		for (var i=(levels[0] == "jXCore") ? 1 : 0; i<levels.length; ++i) {
			currentNS[levels[i]] = currentNS[levels[i]] || {};
			currentNS = currentNS[levels[i]];
		}
		
		return currentNS;
	},
	
	//import modules
	include: function(sClass, sPath){
		// update baseDirectory
		if(sPath != undefined) jXCore.baseDirectory = sPath;
		
		// build include
		var includePath = ( (jXCore.baseDirectory !== undefined) ? jXCore.baseDirectory : '' ) + 'jXCoreModules/';
				
		// loop through classes
		var Classes = sClass.replace('.', '/').split(',');
		for(var i = 0; i<Classes.length; i++){
			var sInclude = includePath + Classes[i] + '.js';
			document.write('<script type="text/javascript" src="' + sInclude + '"></script>');
		}
	},
	
	//import libraries
	includeLibrary: function(sLibrary, sPath){
		// update baseDirectory
		if(sPath != undefined) jXCore.baseDirectory = sPath;
		
		// build include
		var includePath = ( (jXCore.baseDirectory !== undefined) ? jXCore.baseDirectory : '' ) + 'jXCoreLibraries/';
		
		// loop through classes
		var Libraries = sLibrary.replace('.', '/').split(',');
		for(var i = 0; i<Libraries.length; i++){
			var sInclude = includePath + Libraries[i] + '.js';
			document.write('<script type="text/javascript" src="' + sInclude + '"></script>');
		}
	}
}

//initialize XMLHttpRequest :: Core
jXCore.namespace('XMLHttpRequest');
jXCore.XMLHttpRequest = function(){
	var MyXMLHttpRequest = null;
	try{
		if(window.XMLHttpRequest){ //native XMLHttpRequest
			MyXMLHttpRequest = new XMLHttpRequest();
		}else{
			if(window.ActiveXObject){ //ActiveX Object (IE5.5 -> 6)
				var versions = ["MSXML2.XmlHttp.5.0", "MSXML2.XmlHttp.4.0", 
								"MSXML2.XmlHttp.3.0", "MSXML2.XmlHttp",
								"Microsoft.XMLHTTP"];
							 
				for(var i = 0; i < versions.length; i++){
					try{
						MyXMLHttpRequest = new ActiveXObject(versions[i]);
						break;
					}catch(err){
						//catch broken MSXML2
						if(err.number !== -2146827859) throw new Error(err.description);
					}
				}
			}
		}
	}catch(err){
		throw new Error("jXMLHttpRequest - " + err.description);
	}
	if(MyXMLHttpRequest !== null) return MyXMLHttpRequest;
}