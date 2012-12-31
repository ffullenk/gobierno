/**************************************************************
   
result.php by Milfson (milf@milfcz.com) 17.04.2004

Milfson added preselect(parameters...) to pre-populate dropdowns with default values.

Thanks for the code! - Brent.
 
***************************************************************/

// constants
var noValue = '-99';
// default values
var IDCate = noValue;
var IDForo = noValue;
//var IDComuna = noValue;
//selects disabled true/false
var boolEnabled = true;

// globals
var curOption = new Array();
var isLoaded = new Array();

function initLists(){
  // initialize lists
  emptyList( 'lstCate' );
  emptyList( 'lstForo');
  //emptyList( 'lstComuna' );
  jsrsExecute( 'select_rs.php', cbFillCate, 'cateList');
}

function preselect(idCate,idForo,selectable){
  boolEnabled = selectable;
  IDCate = idCate;
  IDForo = idForo;
//  IDComuna = idComuna;
  initLists();
}

function lstCate_onChange(){
  var val = this.options[this.selectedIndex].value;
    IDCate = val;
    IDForo = noValue;
    //IDComuna = noValue;
  if(val == noValue){
    selectOption( this.name, curOption[this.name] )
  } else {
    curOption[this.name] = val;
    // init dependent lists
    emptyList( 'lstForo' );
    //emptyList( 'lstComuna');
    window.status = 'Loading Model Selections...';
    jsrsExecute( 'select_rs.php', cbFillForo, 'foroList', val);
  }  
}

/*function lstProvincia_onChange(){

  var val = this.options[this.selectedIndex].value;
  if(val == noValue){
    selectOption( this.name, curOption[this.name] )
  } else {
    curOption[this.name] = val;
    emptyList( 'lstComuna');
    window.status = 'Loading Options Selections...';
    jsrsExecute( 'select_rs.php', cbFillComuna, 'comunaList', val);
  }  
}
*/


function lstForo_onChange(){
  var val = this.options[this.selectedIndex].value;
  IDForo = val;
  if(val == noValue){
    selectOption( this.name, curOption[this.name] )
  }
  /* else {
    var msg = "You have selected: \n\n";
    msg += this.form.lstRegion.options[this.form.lstRegion.selectedIndex].text + "\n";
    msg += this.form.lstProvincia.options[this.form.lstProvincia.selectedIndex].text + "\n";
    msg += this.options[this.selectedIndex].text + "\n";
    //alert (msg);
    
    if(boolEnabled){
    document.getElementById('cmdSubmit').disabled="";
    document.getElementById('show').style.backgroundColor="#FFCC99";
    }
    
  }*/
}

function cbFillCate ( strMakes ){ 
  window.status = '';
  fillList( 'lstCate',  strMakes ); 
  if(IDCate != noValue){
    jsrsExecute( 'select_rs.php', cbFillForo, 'foroList', ''+IDCate+'');
  }
}

/*function cbFillProvincia ( strModels ){ 
  // callback for dependent listbox
  window.status = '';
  fillList( 'lstProvincia',  strModels ); 
  if(IDProvincia != noValue){
    jsrsExecute( 'select_rs.php', cbFillComuna, 'comunaList', ''+IDProvincia+'');
  }
}*/

function cbFillForo( strOptions ){ 
  // callback for dependent listbox
  window.status = '';
  fillList( 'lstForo', strOptions ); 
}

function fillList( listName, strOptions ){
  // fill any list with options
  emptyList( listName );
  
  // always insert selection prompt
  var lst = document.forms['formulario'][listName];
  lst.disabled = true;
  lst.options[0] = new Option('=>  Seleccione  <=', noValue);
  
  // options in form "value~displaytext|value~displaytext|..."
  var aOptionPairs = strOptions.split('|');
  for( var i = 0; i < aOptionPairs.length; i++ ){
    if (aOptionPairs[i].indexOf('~') != -1) {
      var aOptions = aOptionPairs[i].split('~');
      lst.options[i + 1] = new Option(aOptions[1], aOptions[0]);
    }  
  }
  switch(listName){
  	case 'lstCate':
		  ID = IDCate;
		break;
  	case 'lstForo':
		  ID = IDForo;
		break;
/*	case 'lstComuna':
		  ID = IDComuna;
		break;*/
	}
  // init to no value
  selectOption( listName, ID );
  isLoaded[listName] = true;
  lst.disabled = !boolEnabled;
  lst.onchange = eval( listName + "_onChange" );
  // eval( "document.forms['QForm']['" + listName + "'].onchange=" + listName + "_onChange;" );
}

function emptyList( listName ){
  var lst = document.forms['formulario'][listName];
  lst.options.length = 0;
  lst.onchange = null;
  lst.disabled = !boolEnabled;
  isLoaded[listName] = false;
  curOption[listName] = noValue;
}

function selectOption( listName, optionVal ){
  // set list selection to option based on value
  var lst = document.forms['formulario'][listName];
  for( var i = 0; i< lst.options.length; i++ ){
    if( lst.options[i].value == optionVal ){
      lst.selectedIndex = i;
      curOption[listName] = optionVal;
      return;
    }
  }
}