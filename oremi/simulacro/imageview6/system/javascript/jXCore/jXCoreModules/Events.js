/***********************************\
| jXCore :: SuperString		        |
| By Jorge Schrauwen 2006 			|
| -- http://blackdot.be				|
\***********************************/

//inistialize Events
if (jXCore.Events == undefined) {
	jXCore.namespace('Events');
	jXCore.Events = {
		add: function(oObj, sEvent, oFunction){
			if(!oObj) oObj = document;
			if(window.addEventListener) 
				oObj.addEventListener(sEvent, oFunction, false);
			else if(window.attachEvent)
				oObj.attachEvent('on' + sEvent, oFunction);
		},
		
		remove: function(oObj, sEvent, oFunction){
			if(!oObj) oObj = document;
			if(window.removeEventListener) 
				oObj.removeEventListener(sEvent, oFunction, false);
			else if(window.detachEvent)
				oObj.detachEvent('on' + sEvent, oFunction);	
		}
	
	}
} else throw new Error("jXCore - PreFetch already loaded!");