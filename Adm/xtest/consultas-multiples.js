function Repeat(sValue, iLenght) {
	var sText='';   			
	for(i=1;i<=iLenght;i++) {
		sText=sText+sValue;
	}   			   
	return sText;
}

function LPad(sValue, sChar, iLenght) {
	sValue=String(sValue);
	sValue=Repeat(sChar, iLenght-sValue.length)+sValue;
	return sValue;   			   			   			
}

function genopt(i, f, p) {
	for(c=i;c<=f;c++) {
		document.writeln('<option value="'+LPad(c, '0', 2)+'"');
		if (c==p) document.writeln(" selected");
		document.writeln('>'+LPad(c, '0', 2)+'</option>');
	}
}

function mapcal() {
	var a1='<area shape="rect" coords="';
	var a2='" href="javascript:selday(';
    document.write(a1+'1,2,13,18" href="javascript:selmes(-1)">');
    document.write(a1+'81,2,94,18" href="javascript:selmes(1)">');
    document.write(a1+'81,30,92,40'+a2+'7)">');
    document.write(a1+'29,41,40,51'+a2+'10)">');
    document.write(a1+'42,74,53,84'+a2+'32)">');
    document.write(a1+'55,41,66,51'+a2+'12)">');
    document.write(a1+'16,74,27,84'+a2+'30)">');
    document.write(a1+'42,30,53,40'+a2+'4)">');
    document.write(a1+'16,63,27,73'+a2+'23)">');
    document.write(a1+'68,63,79,73'+a2+'27)">');
    document.write(a1+'29,52,40,62'+a2+'17)">');
    document.write(a1+'16,85,27,95'+a2+'37)">');
    document.write(a1+'42,41,53,51'+a2+'11)">');
    document.write(a1+'3,41,14,51'+a2+'8)">');
    document.write(a1+'55,63,66,73'+a2+'26)">');
    document.write(a1+'42,52,53,62'+a2+'18)">');
    document.write(a1+'16,41,27,51'+a2+'9)">');
    document.write(a1+'29,85,40,95'+a2+'38)">');
    document.write(a1+'29,30,40,40'+a2+'3)">');
    document.write(a1+'3,85,14,95'+a2+'36)">');
    document.write(a1+'42,63,53,73'+a2+'25)">');
    document.write(a1+'81,41,92,51'+a2+'14)">');
    document.write(a1+'29,63,40,73'+a2+'24)">');
    document.write(a1+'3,52,14,62'+a2+'15)">');
    document.write(a1+'68,30,79,40'+a2+'6)">');
    document.write(a1+'3,30,14,40'+a2+'1)">');
    document.write(a1+'3,63,14,73'+a2+'22)">');
    document.write(a1+'55,52,66,62'+a2+'19)">');
    document.write(a1+'81,52,92,62'+a2+'21)">');
    document.write(a1+'55,74,66,84'+a2+'33)">');
    document.write(a1+'29,74,40,84'+a2+'31)">');
    document.write(a1+'81,63,92,73'+a2+'28)">');
    document.write(a1+'81,74,92,84'+a2+'35)">');
    document.write(a1+'16,52,27,62'+a2+'16)">');
    document.write(a1+'68,52,79,62'+a2+'20)">');
    document.write(a1+'3,74,14,84'+a2+'29)">');
    document.write(a1+'16,30,27,40'+a2+'2)">');
    document.write(a1+'68,41,79,51'+a2+'13)">');
    document.write(a1+'55,30,66,40'+a2+'5)">');
    document.write(a1+'68,74,79,84'+a2+'34)">');
}
