/***********************************\
| jXCore :: Encoder                 |
| By Jorge Schrauwen 2007			|
| -- http://blackdot.be				|
\***********************************/

//inistialize Encoder
if (jXCore.Encoder == undefined) {
	jXCore.namespace('Encoder');
	jXCore.namespace('Encoder.Base64');
	
	jXCore.Encoder = {
		sha1: function(sStr, bUnicode){
			/*
			 * A JavaScript implementation of the Secure Hash Algorithm, SHA-1, as defined
			 * in FIPS PUB 180-1
			 * Version 2.1a Copyright Paul Johnston 2000 - 2002.
			 * Other contributors: Greg Holt, Andrew Kepert, Ydnar, Lostinet
			 * Distributed under the BSD License
			 * See http://pajhome.org.uk/crypt/md5 for details.
			 */
			
			var hexcase = 0;  /* hex output format. 0 - lowercase; 1 - uppercase */
			var b64pad  = ""; /* base-64 pad character. "=" for strict RFC compliance */
			if(bUnicode)
				var chrsz   = 16;  /* bits per input character. 16 = Unicode */
			else
				var chrsz   = 8;  /* bits per input character. 8 = ASCII */	
			
			function hex_sha1(s){return binb2hex(core_sha1(str2binb(s),s.length * chrsz));}
			function b64_sha1(s){return binb2b64(core_sha1(str2binb(s),s.length * chrsz));}
			function str_sha1(s){return binb2str(core_sha1(str2binb(s),s.length * chrsz));}
			function hex_hmac_sha1(key, data){ return binb2hex(core_hmac_sha1(key, data));}
			function b64_hmac_sha1(key, data){ return binb2b64(core_hmac_sha1(key, data));}
			function str_hmac_sha1(key, data){ return binb2str(core_hmac_sha1(key, data));}
			
			function core_sha1(x, len){
			  /* append padding */
			  x[len >> 5] |= 0x80 << (24 - len % 32);
			  x[((len + 64 >> 9) << 4) + 15] = len;
			
			  var w = Array(80);
			  var a =  1732584193;
			  var b = -271733879;
			  var c = -1732584194;
			  var d =  271733878;
			  var e = -1009589776;
			
			  for(var i = 0; i < x.length; i += 16)
			  {
				var olda = a;
				var oldb = b;
				var oldc = c;
				var oldd = d;
				var olde = e;
			
				for(var j = 0; j < 80; j++)
				{
				  if(j < 16) w[j] = x[i + j];
				  else w[j] = rol(w[j-3] ^ w[j-8] ^ w[j-14] ^ w[j-16], 1);
				  var t = safe_add(safe_add(rol(a, 5), sha1_ft(j, b, c, d)),
								   safe_add(safe_add(e, w[j]), sha1_kt(j)));
				  e = d;
				  d = c;
				  c = rol(b, 30);
				  b = a;
				  a = t;
				}
			
				a = safe_add(a, olda);
				b = safe_add(b, oldb);
				c = safe_add(c, oldc);
				d = safe_add(d, oldd);
				e = safe_add(e, olde);
			  }
			  return Array(a, b, c, d, e);
			
			}
			
			function sha1_ft(t, b, c, d){
			  if(t < 20) return (b & c) | ((~b) & d);
			  if(t < 40) return b ^ c ^ d;
			  if(t < 60) return (b & c) | (b & d) | (c & d);
			  return b ^ c ^ d;
			}
			
			function sha1_kt(t){
			  return (t < 20) ?  1518500249 : (t < 40) ?  1859775393 :
					 (t < 60) ? -1894007588 : -899497514;
			}
			
			function core_hmac_sha1(key, data){
			  var bkey = str2binb(key);
			  if(bkey.length > 16) bkey = core_sha1(bkey, key.length * chrsz);
			
			  var ipad = Array(16), opad = Array(16);
			  for(var i = 0; i < 16; i++)
			  {
				ipad[i] = bkey[i] ^ 0x36363636;
				opad[i] = bkey[i] ^ 0x5C5C5C5C;
			  }
			
			  var hash = core_sha1(ipad.concat(str2binb(data)), 512 + data.length * chrsz);
			  return core_sha1(opad.concat(hash), 512 + 160);
			}
			
			function safe_add(x, y){
			  var lsw = (x & 0xFFFF) + (y & 0xFFFF);
			  var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
			  return (msw << 16) | (lsw & 0xFFFF);
			}
			
			function rol(num, cnt){
			  return (num << cnt) | (num >>> (32 - cnt));
			}
			
			function str2binb(str){
			  var bin = Array();
			  var mask = (1 << chrsz) - 1;
			  for(var i = 0; i < str.length * chrsz; i += chrsz)
				bin[i>>5] |= (str.charCodeAt(i / chrsz) & mask) << (32 - chrsz - i%32);
			  return bin;
			}
			
			function binb2str(bin){
			  var str = "";
			  var mask = (1 << chrsz) - 1;
			  for(var i = 0; i < bin.length * 32; i += chrsz)
				str += String.fromCharCode((bin[i>>5] >>> (32 - chrsz - i%32)) & mask);
			  return str;
			}
			
			function binb2hex(binarray){
			  var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
			  var str = "";
			  for(var i = 0; i < binarray.length * 4; i++)
			  {
				str += hex_tab.charAt((binarray[i>>2] >> ((3 - i%4)*8+4)) & 0xF) +
					   hex_tab.charAt((binarray[i>>2] >> ((3 - i%4)*8  )) & 0xF);
			  }
			  return str;
			}
			
			function binb2b64(binarray){
			  var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
			  var str = "";
			  for(var i = 0; i < binarray.length * 4; i += 3)
			  {
				var triplet = (((binarray[i   >> 2] >> 8 * (3 -  i   %4)) & 0xFF) << 16)
							| (((binarray[i+1 >> 2] >> 8 * (3 - (i+1)%4)) & 0xFF) << 8 )
							|  ((binarray[i+2 >> 2] >> 8 * (3 - (i+2)%4)) & 0xFF);
				for(var j = 0; j < 4; j++)
				{
				  if(i * 8 + j * 6 > binarray.length * 32) str += b64pad;
				  else str += tab.charAt((triplet >> 6*(3-j)) & 0x3F);
				}
			  }
			  return str;
			}
			
			// jXCore return
			if(hex_sha1("abc") == "a9993e364706816aba3e25717850c26c9cd0d89d"){
				return hex_sha1(sStr);
			}else{
				throw new Error('sha1 test failed!');
				return null;	
			}
		},
		
		md5: function(sStr, bUnicode){
			/*
			 * A JavaScript implementation of the RSA Data Security, Inc. MD5 Message
			 * Digest Algorithm, as defined in RFC 1321.
			 * Version 2.1 Copyright (C) Paul Johnston 1999 - 2002.
			 * Other contributors: Greg Holt, Andrew Kepert, Ydnar, Lostinet
			 * Distributed under the BSD License
			 * See http://pajhome.org.uk/crypt/md5 for more info.
			 */
			
			var hexcase = 0;  /* hex output format. 0 - lowercase; 1 - uppercase */
			var b64pad  = ""; /* base-64 pad character. "=" for strict RFC compliance   */
			if(bUnicode)
				var chrsz = 16;  /* bits per input character. 16 = Unicode */
			else
				var chrsz = 8;  /* bits per input character. 8 = ASCII */
	
			function hex_md5(s){ return binl2hex(core_md5(str2binl(s), s.length * chrsz));}
			function b64_md5(s){ return binl2b64(core_md5(str2binl(s), s.length * chrsz));}
			function str_md5(s){ return binl2str(core_md5(str2binl(s), s.length * chrsz));}
			function hex_hmac_md5(key, data) { return binl2hex(core_hmac_md5(key, data)); }
			function b64_hmac_md5(key, data) { return binl2b64(core_hmac_md5(key, data)); }
			function str_hmac_md5(key, data) { return binl2str(core_hmac_md5(key, data)); }
					
			function core_md5(x, len){
			  /* append padding */
			  x[len >> 5] |= 0x80 << ((len) % 32);
			  x[(((len + 64) >>> 9) << 4) + 14] = len;
			
			  var a =  1732584193;
			  var b = -271733879;
			  var c = -1732584194;
			  var d =  271733878;
			
			  for(var i = 0; i < x.length; i += 16)
			  {
				var olda = a;
				var oldb = b;
				var oldc = c;
				var oldd = d;
			
				a = md5_ff(a, b, c, d, x[i+ 0], 7 , -680876936);
				d = md5_ff(d, a, b, c, x[i+ 1], 12, -389564586);
				c = md5_ff(c, d, a, b, x[i+ 2], 17,  606105819);
				b = md5_ff(b, c, d, a, x[i+ 3], 22, -1044525330);
				a = md5_ff(a, b, c, d, x[i+ 4], 7 , -176418897);
				d = md5_ff(d, a, b, c, x[i+ 5], 12,  1200080426);
				c = md5_ff(c, d, a, b, x[i+ 6], 17, -1473231341);
				b = md5_ff(b, c, d, a, x[i+ 7], 22, -45705983);
				a = md5_ff(a, b, c, d, x[i+ 8], 7 ,  1770035416);
				d = md5_ff(d, a, b, c, x[i+ 9], 12, -1958414417);
				c = md5_ff(c, d, a, b, x[i+10], 17, -42063);
				b = md5_ff(b, c, d, a, x[i+11], 22, -1990404162);
				a = md5_ff(a, b, c, d, x[i+12], 7 ,  1804603682);
				d = md5_ff(d, a, b, c, x[i+13], 12, -40341101);
				c = md5_ff(c, d, a, b, x[i+14], 17, -1502002290);
				b = md5_ff(b, c, d, a, x[i+15], 22,  1236535329);
			
				a = md5_gg(a, b, c, d, x[i+ 1], 5 , -165796510);
				d = md5_gg(d, a, b, c, x[i+ 6], 9 , -1069501632);
				c = md5_gg(c, d, a, b, x[i+11], 14,  643717713);
				b = md5_gg(b, c, d, a, x[i+ 0], 20, -373897302);
				a = md5_gg(a, b, c, d, x[i+ 5], 5 , -701558691);
				d = md5_gg(d, a, b, c, x[i+10], 9 ,  38016083);
				c = md5_gg(c, d, a, b, x[i+15], 14, -660478335);
				b = md5_gg(b, c, d, a, x[i+ 4], 20, -405537848);
				a = md5_gg(a, b, c, d, x[i+ 9], 5 ,  568446438);
				d = md5_gg(d, a, b, c, x[i+14], 9 , -1019803690);
				c = md5_gg(c, d, a, b, x[i+ 3], 14, -187363961);
				b = md5_gg(b, c, d, a, x[i+ 8], 20,  1163531501);
				a = md5_gg(a, b, c, d, x[i+13], 5 , -1444681467);
				d = md5_gg(d, a, b, c, x[i+ 2], 9 , -51403784);
				c = md5_gg(c, d, a, b, x[i+ 7], 14,  1735328473);
				b = md5_gg(b, c, d, a, x[i+12], 20, -1926607734);
			
				a = md5_hh(a, b, c, d, x[i+ 5], 4 , -378558);
				d = md5_hh(d, a, b, c, x[i+ 8], 11, -2022574463);
				c = md5_hh(c, d, a, b, x[i+11], 16,  1839030562);
				b = md5_hh(b, c, d, a, x[i+14], 23, -35309556);
				a = md5_hh(a, b, c, d, x[i+ 1], 4 , -1530992060);
				d = md5_hh(d, a, b, c, x[i+ 4], 11,  1272893353);
				c = md5_hh(c, d, a, b, x[i+ 7], 16, -155497632);
				b = md5_hh(b, c, d, a, x[i+10], 23, -1094730640);
				a = md5_hh(a, b, c, d, x[i+13], 4 ,  681279174);
				d = md5_hh(d, a, b, c, x[i+ 0], 11, -358537222);
				c = md5_hh(c, d, a, b, x[i+ 3], 16, -722521979);
				b = md5_hh(b, c, d, a, x[i+ 6], 23,  76029189);
				a = md5_hh(a, b, c, d, x[i+ 9], 4 , -640364487);
				d = md5_hh(d, a, b, c, x[i+12], 11, -421815835);
				c = md5_hh(c, d, a, b, x[i+15], 16,  530742520);
				b = md5_hh(b, c, d, a, x[i+ 2], 23, -995338651);
			
				a = md5_ii(a, b, c, d, x[i+ 0], 6 , -198630844);
				d = md5_ii(d, a, b, c, x[i+ 7], 10,  1126891415);
				c = md5_ii(c, d, a, b, x[i+14], 15, -1416354905);
				b = md5_ii(b, c, d, a, x[i+ 5], 21, -57434055);
				a = md5_ii(a, b, c, d, x[i+12], 6 ,  1700485571);
				d = md5_ii(d, a, b, c, x[i+ 3], 10, -1894986606);
				c = md5_ii(c, d, a, b, x[i+10], 15, -1051523);
				b = md5_ii(b, c, d, a, x[i+ 1], 21, -2054922799);
				a = md5_ii(a, b, c, d, x[i+ 8], 6 ,  1873313359);
				d = md5_ii(d, a, b, c, x[i+15], 10, -30611744);
				c = md5_ii(c, d, a, b, x[i+ 6], 15, -1560198380);
				b = md5_ii(b, c, d, a, x[i+13], 21,  1309151649);
				a = md5_ii(a, b, c, d, x[i+ 4], 6 , -145523070);
				d = md5_ii(d, a, b, c, x[i+11], 10, -1120210379);
				c = md5_ii(c, d, a, b, x[i+ 2], 15,  718787259);
				b = md5_ii(b, c, d, a, x[i+ 9], 21, -343485551);
			
				a = safe_add(a, olda);
				b = safe_add(b, oldb);
				c = safe_add(c, oldc);
				d = safe_add(d, oldd);
			  }
			  return Array(a, b, c, d);
			}
			
			function md5_cmn(q, a, b, x, s, t){
			  return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s),b);
			}
			function md5_ff(a, b, c, d, x, s, t){
			  return md5_cmn((b & c) | ((~b) & d), a, b, x, s, t);
			}
			function md5_gg(a, b, c, d, x, s, t){
			  return md5_cmn((b & d) | (c & (~d)), a, b, x, s, t);
			}
			function md5_hh(a, b, c, d, x, s, t){
			  return md5_cmn(b ^ c ^ d, a, b, x, s, t);
			}
			function md5_ii(a, b, c, d, x, s, t){
			  return md5_cmn(c ^ (b | (~d)), a, b, x, s, t);
			}
			
			function core_hmac_md5(key, data){
			  var bkey = str2binl(key);
			  if(bkey.length > 16) bkey = core_md5(bkey, key.length * chrsz);
			
			  var ipad = Array(16), opad = Array(16);
			  for(var i = 0; i < 16; i++)
			  {
				ipad[i] = bkey[i] ^ 0x36363636;
				opad[i] = bkey[i] ^ 0x5C5C5C5C;
			  }
			
			  var hash = core_md5(ipad.concat(str2binl(data)), 512 + data.length * chrsz);
			  return core_md5(opad.concat(hash), 512 + 128);
			}
			
			function safe_add(x, y)	{
			  var lsw = (x & 0xFFFF) + (y & 0xFFFF);
			  var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
			  return (msw << 16) | (lsw & 0xFFFF);
			}
			
			function bit_rol(num, cnt){
			  return (num << cnt) | (num >>> (32 - cnt));
			}
			
			function str2binl(str){
			  var bin = Array();
			  var mask = (1 << chrsz) - 1;
			  for(var i = 0; i < str.length * chrsz; i += chrsz)
				bin[i>>5] |= (str.charCodeAt(i / chrsz) & mask) << (i%32);
			  return bin;
			}
			
			function binl2str(bin){
			  var str = "";
			  var mask = (1 << chrsz) - 1;
			  for(var i = 0; i < bin.length * 32; i += chrsz)
				str += String.fromCharCode((bin[i>>5] >>> (i % 32)) & mask);
			  return str;
			}
			
			function binl2hex(binarray){
			  var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
			  var str = "";
			  for(var i = 0; i < binarray.length * 4; i++)
			  {
				str += hex_tab.charAt((binarray[i>>2] >> ((i%4)*8+4)) & 0xF) +
					   hex_tab.charAt((binarray[i>>2] >> ((i%4)*8  )) & 0xF);
			  }
			  return str;
			}
			
			function binl2b64(binarray){
			  var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
			  var str = "";
			  for(var i = 0; i < binarray.length * 4; i += 3)
			  {
				var triplet = (((binarray[i   >> 2] >> 8 * ( i   %4)) & 0xFF) << 16)
							| (((binarray[i+1 >> 2] >> 8 * ((i+1)%4)) & 0xFF) << 8 )
							|  ((binarray[i+2 >> 2] >> 8 * ((i+2)%4)) & 0xFF);
				for(var j = 0; j < 4; j++)
				{
				  if(i * 8 + j * 6 > binarray.length * 32) str += b64pad;
				  else str += tab.charAt((triplet >> 6*(3-j)) & 0x3F);
				}
			  }
			  return str;
			}
			
			// jXCore return
			if(hex_md5("abc") == "900150983cd24fb0d6963f7d28e17f72"){
				return hex_md5(sStr);
			}else{
				throw new Error('md5 test failed!');
				return null;	
			}
		}
	}
	/*
	PROJECT: Javascript Based Base64 Encoding and Decoding Engine
	
	DATE: 02/10/2004
	
	AUTHOR: Adrian Bacon
	
	DESCRIPTION:Encode and decode data to and from the Base64 format
	in Javascript. This could be used to convert encrypted
	data to text for submitting via http gets or posts or
	for sending via email or other text only mediums.
	
	COPYRIGHT: You are free to use this code as you see fit provided
	that you send any changes or modifications back to me.
	*/
	
	//First things first, set up our array that we are going to use.
	var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";	
	jXCore.Encoder.Base64 = {
		encode: function(inp){
			var out = ""; //This is the output
			var chr1, chr2, chr3 = ""; //These are the 3 bytes to be encoded
			var enc1, enc2, enc3, enc4 = ""; //These are the 4 encoded bytes
			var i = 0; //Position counter
		
			do { //Set up the loop here
				chr1 = inp.charCodeAt(i++); //Grab the first byte
				chr2 = inp.charCodeAt(i++); //Grab the second byte
				chr3 = inp.charCodeAt(i++); //Grab the third byte
		
				//Here is the actual base64 encode part.
				//There really is only one way to do it.
				enc1 = chr1 >> 2;
				enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
				enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
				enc4 = chr3 & 63;
		
				if (isNaN(chr2)) {
					enc3 = enc4 = 64;
				} else if (isNaN(chr3)) {
					enc4 = 64;
				}
		
				//Lets spit out the 4 encoded bytes
				out = out + keyStr.charAt(enc1) + keyStr.charAt(enc2) + keyStr.charAt(enc3) +
				keyStr.charAt(enc4);
		
				// OK, now clean out the variables used.
				chr1 = chr2 = chr3 = "";
				enc1 = enc2 = enc3 = enc4 = "";
		
			} while (i < inp.length); //And finish off the loop
		
			//Now return the encoded values.
			return out;
		},
		
		decode: function(inp){
			var out = ""; //This is the output
			var chr1, chr2, chr3 = ""; //These are the 3 decoded bytes
			var enc1, enc2, enc3, enc4 = ""; //These are the 4 bytes to be decoded
			var i = 0; //Position counter
		
			// remove all characters that are not A-Z, a-z, 0-9, +, /, or =
			var base64test = /[^A-Za-z0-9\+\/\=]/g;
		
			if (base64test.exec(inp)) { //Do some error checking
				alert("There were invalid base64 characters in the input text.\n" +
				"Valid base64 characters are A-Z, a-z, 0-9, ?+?, ?/?, and ?=?\n" +
				"Expect errors in decoding.");
			}
			inp = inp.replace(/[^A-Za-z0-9\+\/\=]/g, "");
		
			do { //Here.s the decode loop.
		
				//Grab 4 bytes of encoded content.
				enc1 = keyStr.indexOf(inp.charAt(i++));
				enc2 = keyStr.indexOf(inp.charAt(i++));
				enc3 = keyStr.indexOf(inp.charAt(i++));
				enc4 = keyStr.indexOf(inp.charAt(i++));
		
				//Heres the decode part. There.s really only one way to do it.
				chr1 = (enc1 << 2) | (enc2 >> 4);
				chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
				chr3 = ((enc3 & 3) << 6) | enc4;
		
				//Start to output decoded content
				out = out + String.fromCharCode(chr1);
		
				if (enc3 != 64) {
					out = out + String.fromCharCode(chr2);
				}
				if (enc4 != 64) {
					out = out + String.fromCharCode(chr3);
				}
		
				//now clean out the variables used
				chr1 = chr2 = chr3 = "";
				enc1 = enc2 = enc3 = enc4 = "";
		
			} while (i < inp.length); //finish off the loop
		
			//Now return the decoded values.
			return out;
		}
	}
} else throw new Error("jXCore - PreFetch already loaded!");