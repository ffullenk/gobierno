/***********************************\
| jXCore :: Cookies			        |
| By Jorge Schrauwen 2005 			|
| -- http://blackdot.be				|
\***********************************/

//inistialize Cookies
if (jXCore.CookieManager == undefined) {
	jXCore.namespace('CookieManager');
	jXCore.CookieManager = {
		create: function(name, value, time, units, path){
			if(time){
				var date = new Date();
				if(units == 'm' || units == 'minute' || units == 'minutes')
					date.setTime(date.getTime()+(time*60*1000));
				else if(units == 'h' || units == 'hour' || units == 'hours')
					date.setTime(date.getTime()+(time*60*60*1000));
				else if(units == 'd' || units == 'day' || units == 'days')
					date.setTime(date.getTime()+(time*24*60*60*1000));
				else
					date.setTime(date.getTime()+(time*1000));
				var expires = "; expires="+date.toGMTString();
			}
			else var expires = "";
			if(!path) path = '/'
			document.cookie = name+"="+value+expires+"; path="+path;
		},
		
		read: function(name){
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++)
			{
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		},
		
		remove: function(name){
			this.create(name,"",-1);
		}
	}
} else throw new Error("jXCore - PreFetch already loaded!");