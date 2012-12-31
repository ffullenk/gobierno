/***********************************\
| jXCore :: BrowserInfo			    |
| By Jorge Schrauwen 2006 			|
| -- http://blackdot.be				|
\***********************************/

//inistialize BrowserInfo
if (jXCore.BrowserInfo == undefined) {
	function GetUserAgent(iIndex){
		var detect = navigator.userAgent.toLowerCase();
		var OS,browser,version,total,thestring;
		
		if(checkIt('konqueror')){
			browser = "Konqueror";
			OS = "Linux";
		}
		else if (checkIt('safari')) browser = "Safari"
		else if (checkIt('omniweb')) browser = "OmniWeb"
		else if (checkIt('opera')) browser = "Opera"
		else if (checkIt('webtv')) browser = "WebTV";
		else if (checkIt('icab')) browser = "iCab"
		else if (checkIt('msie')) browser = "Internet Explorer"
		else if (!checkIt('compatible')){
			version = detect.charAt(8);
			if(version > 4)
				browser = "Mozilla"
			else
				browser = "Netscape Navigator"
		}
		else if (checkIt('Minimo')) browser = "Minimo"
		else browser = "An unknown browser";
		
		if (!version) version = detect.charAt(place + thestring.length);
		
		if (!OS)
		{
			if (checkIt('linux')) OS = "Linux";
			else if (checkIt('x11')) OS = "Unix";
			else if (checkIt('mac')) OS = "Mac"
			else if (checkIt('win')) OS = "Windows"
			else OS = "an unknown operating system";
		}
		
		function checkIt(string)
		{
			place = detect.indexOf(string) + 1;
			thestring = string;
			return place;
		}
		var Obj = new Array(browser, version, OS);
		
		return Obj[iIndex];
	}
	
	//inistialize BrowserInfo
	jXCore.namespace('BrowserInfo');
	jXCore.BrowserInfo = {
		userAgent: GetUserAgent(0),
		version: GetUserAgent(1),
		OS: GetUserAgent(2)	
	}
} else throw new Error("jXCore - PreFetch already loaded!");