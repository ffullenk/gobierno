/***********************************\
| jXCore :: SuperString		        |
| By Jorge Schrauwen 2006 			|
| -- http://blackdot.be				|
\***********************************/

//inistialize Cookies
if (jXCore.SuperString == undefined) {
	jXCore.namespace('SuperString');
	jXCore.SuperString = function(){
		this.text = [];
	}
	jXCore.SuperString.prototype = {
		add: function(str){
			this.text.push(str);
			return this; 
		},
		
		wipe: function(){
			this.text = [];
		},
		
		toString: function(){
			return this.text.join("");
		}
	
	}
} else throw new Error("jXCore - PreFetch already loaded!");