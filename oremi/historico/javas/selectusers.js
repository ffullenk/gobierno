var xmlHttp

function showUser(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="getusers.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}


function showUserMod(str,evento)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="modusers.php"
url=url+"?q="+str
url=url+"&e="+evento 
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}



function showLocalidades(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="getlocalidades.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateLocChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function showLocalidadesMod(str,evento)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="modlocalidades.php"
url=url+"?q="+str
url=url+"&e="+evento
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateLocChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}


function selDeSel(){

var checkboxes = document.evento.chbx;

for(i = 0; i < checkboxes.length; i++){
checkboxes[i].checked = checkboxes[i].checked == true ? false : true;
}
}

function checkAll(field, value) {
   for (var i=0;i<document.forms[0].elements[field].length;i++) {
      if(value == 1) {
               document.forms[0].elements[field][i].checked = true
      } else {
               document.forms[0].elements[field][i].checked = false
      }
   }
} 






function stateLocChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtLoc").innerHTML=xmlHttp.responseText 
 } 
}

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}