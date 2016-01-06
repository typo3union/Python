var first = 2;
var val = new Array();

function calculateHouse(){
	var avgPriceOil = document.getElementById('avgPriceOil').innerHTML;
	var avgPricePellets = document.getElementById('avgPricePellets').innerHTML;

	var table = getByIdVal("house_cal"); 
	var oilNeeded = document.getElementById('oilNeeded').value; 
	
	if(!isNaN(oilNeeded)) {
		for(var i=first; i < 8; i++) { // skips empty and header rows
			val[0] = parseGermanNumber(oilNeeded)*parseGermanNumber(avgPriceOil)/100*10/0.8;
			val[1] = parseGermanNumber(oilNeeded)*parseGermanNumber(avgPricePellets)/100*10;
			val[2] = val[0]-val[1]/0.9;
			val[3] = val[2]*7;
			val[4] = val[2]*10; 
			val[5] = val[2]*15;
			table.rows[i].cells[1].innerHTML=formatGermanNumber(Math.round(val[i-first]));						
		}
	}
	return false;	
}

function getByIdVal(id) {
    var el; 
    if(document.all) {
        el = eval("document.all." + id);
    }
    else if(document.getElementById) {
        el = document.getElementById(id);
    }
    return el;
}

