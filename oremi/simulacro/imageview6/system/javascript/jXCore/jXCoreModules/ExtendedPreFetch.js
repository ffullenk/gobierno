/***********************************\
| jXCore :: PreFetch			    |
| By Jorge Schrauwen 2006 			|
| -- http://blackdot.be				|
\***********************************/

//inistialize PreFetch
if (jXCore.PreFetch == undefined) {
	jXCore.namespace('PreFetch');
	
	// load libraries	
	jXCore.includeLibrary('json2');	
	
	jXCore.PreFetch = function(){
		this.FileList = new Array();
		this.checksize = false;
		this.active = false;
	}
	jXCore.PreFetch.prototype = {
		add: function(sFile, iSize){
			var oFile = Object();
			oFile.name = sFile;
			oFile.size = (iSize == undefined) ? null : iSize;
			oFile.transfured = false;
			
			this.FileList[this.FileList.length] = oFile;
		},
		
		remove: function(sFile){
			if(this.FileList.length <= 1){
				this.clear();
			}else{
				var oFiles = this.FileList;
				var oSizeInfo = this.SizeList;
				this.clear(); //wipe the file list
				for (i=0; i<oFiles.length; ++i){
					if(oFiles[i] !== sFile)
						this.FileList[this.FileList.length] = oFiles[i];
						this.SizeList[this.SizeList.length] = oSizeInfo[i];
				}
			}
		},
	
		clear: function(){
			this.FileList = new Array();
		},
		
		skip: function(){
			this.active = false;
			this.oncomplete();
		},
		
		sizecheck: function(bEnable){
			this.checksize = bEnable;
			if(!bEnable){
				this.SizeList = new Array();	
			}
		},
	
		oncomplete: function(){},
	
		onsizecheckcomplete: function(){},
	
		onprogress: function(oProgress){},
		
		abort: function(){ this.active = false; },
		
		start: function(){						
			function LoadFiles(oFiles, oProgress, bSizeCheck){		
				if(!oThis.active) return;
				
				//retrieve file info
				if(oProgress.file.transfured < oProgress.file.total) {
					for(var i = 0; i < oFiles.length; i++){
						if(!oFiles[i].transfured){
							//request file and update counter
							var oFetch = new jXCore.XMLHttpRequest();
							oFetch.onreadystatechange = function(){
								if(oFetch.readyState == 4){
									//mark file as transfured
									oFiles[i].transfured = true;
									oProgress.file.transfured++;
									
									//update progress
									if(bSizeCheck){
										//update transfured data count
										oProgress.size.transfured += parseInt(oFiles[i].size);
									}
									
									if(!oThis.active) return;
									oThis.onprogress(oProgress);
									LoadFiles(oFiles, oProgress, bSizeCheck);
								}
							}
							oFetch.open('GET', oFiles[i].name, true);
							oFetch.send(null);
							break;	
						}
					}
				} else {
					oThis.active = false;
					oThis.oncomplete();	
				}
				
			}
			
			//main code
			var oThis = this;
			oThis.active = true;
			if(oThis.FileList.length > 0){
				//progress
				var oProgress = new Object();
				oProgress.file = new Object();
				oProgress.size = new Object();
				oProgress.file.total = oThis.FileList.length;
				oProgress.file.transfured = 0;
				
				//fetch size info
				if(oThis.checksize) {
					// locals
					var iTotal = 0;
					var xhr = new jXCore.XMLHttpRequest();
					
					
					// retrieve size
					xhr.open("POST", jXCore.baseDirectory + "jXCoreModules/ExtendedPreFetch.php", false);
					xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhr.send("base=" + location.pathname + "&files=" + JSON.stringify(oThis.FileList));
				
					// parse result
					var result = eval(xhr.responseText);
					iTotal = result[0];
					oThis.FileList = result[1];
					
					//progress
					oProgress.size.total = iTotal;
					oProgress.size.transfured = 0;
				}
				
				//start fetching files
				if(!oThis.active) return;
				oThis.onsizecheckcomplete();
				LoadFiles(oThis.FileList, oProgress, oThis.checksize);
			}
		}
	}
} else throw new Error("jXCore - PreFetch already loaded!");