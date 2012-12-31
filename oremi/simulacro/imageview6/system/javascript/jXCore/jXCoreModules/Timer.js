/***********************************\
| jXCore :: Timer    		        |
| By Jorge Schrauwen 2006 			|
| -- http://blackdot.be				|
\***********************************/
	
//inistialize Cookies
if (jXCore.Timer == undefined) {
	jXCore.namespace('Timer');
	jXCore.Timer = function(){
		this.oTimer = null;
	}
	jXCore.Timer.prototype = {
		setInterval: function(iInterval){
			this.interval = iInterval;
		},
		
		onTick: function(){}, //user must overwrite this
		
		start: function(iInterval){
			if(iInterval == undefined) 
				var iInterval = 1000;
			this.stop();
			this.oTimer = setInterval(this.onTick, iInterval);
		},
		
		stop: function(){
			clearInterval(this.oTimer);
		}
	}
} else throw new Error("jXCore - PreFetch already loaded!");