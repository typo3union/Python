<!--

// temp var for bubble sort
var aVal,aGif,bVal,bGif; 


// bubble sort; toSort[0..n]: kosten; gifA[0..n] appending text; both arrays are sorted in the same order, triggered by costs
function c_arraysort(toSort,gifA){
   var sortiert = false;  //Überprüfung, ob sortiert
   while (!sortiert){
      sortiert = true;
      for (var i=0; i<toSort.length-1; i++)
         if (toSort[i]>toSort[i+1]){
            sortiert = false;
            aVal = toSort[i];
	    aGif = gifA[i];
            toSort[i]=toSort[i+1];
	    gifA[i] = gifA[i+1];
            toSort[i+1] = aVal;
	    gifA[i+1] = aGif;
         }
   }
}  
   

function drawFuelTypeDiagram() {
    var yArray = getFuelTypeCosts();      

	var b = [
		"KOSTEN HEUTE",  
		"Hackgut", 
		"Heizöl Brennwert",
		"Scheitholz",   
		"Wäermepumpenstrom",  
		"Pellets",
		"Koks Brach III",   
		"Erdgas Brennwert",		
		"Erdges", 		
	    "Heizöl",
	    "Braunkohle (Bricketts)",
	    "Nah-/Fernwärme",
		"Flüssiggas",
		"Nachtstorm"
		];


    var i;
	var dict = [];
	for (i = 0; i < yArray.length; i++) {
		
		if(!yArray[i] || yArray[i] == null) {
			yArray[i] = 0.0;
		}
		dict.push({
		    category:   b[i],
		    value:  yArray[i]
		});
	}

	dict.sort(function(a, b) { return a.value - b.value; });
	drawStacked(dict,'Heizkosten pro kWh',' Cent/kWh');	
}

 function drawStacked(dict,titleDataY,titleDataX) {

 	var str = JSON.stringify(dict);	
     var chart = AmCharts.makeChart("chart_div", {
		"type": "serial",
	     "theme": "none",
	     "addClassNames" : "true",
		"categoryField": "category",
		"columnWidth": 0.75,
		"rotate": true,
		"startDuration": 0.25,
		"startEffect": "easeOutSine",		
		"fontSize": 15,
		"graphs": [
			{
				"balloonText": "[[value]] "+titleDataX,
				"fillAlphas": 0.8,
				"id": "Graph",
				"showBalloon": false,
				"lineAlpha": 0.2,
				"title": "titleDataX",
				"type": "column",
				"valueField": "value",
				"lineColor": "#95a7b1",
				"labelText": "[[value]]",
			}
			
		],
		"guides": [],
		"valueAxes": [
			{
				"id": "ValueAxis-1",
				"position": "bottom",
				"axisAlpha": 0,
				"fontSize": 15,	
				"title": titleDataX	,
				"titleFontSize": 0,
				"labelRotation": 90,
				"labelFunction":formatValue,
				"axisColor": "#000",
			}
		],
		"categoryAxis": {
			"gridPosition": "start",
			"position": "left",			
			"fontSize": 15,	
			"axisColor": "#000",
			"gridColor" : "transperent",
		},
		"allLabels": [],
		"balloon": {},
		"titles": [
			{
				"id": "Title1",
				"size": 15,
				"text": titleDataY 
			}
		],
		"dataProvider":dict,
	});

		



   }

   function formatValue(value, valueString,axis ){
	  return valueString + ' ' +axis.title;
	};

// displays the diagram "15 Jahre" in a new window
function draw15yearsDiagram() {
	// calculate values for 1 year and multiply with 15
	var yArray = get1YearValues();

	for(var i=0; i < yArray.length; i++) {
		yArray[i] *= 15;
		yArray[i] = Math.round(yArray[i]/100)*100;
	}
	
	var b = [
		"Kosten Heute",  
		"Hackgut", 
		"Heizöl Brennwert",
		"Scheitholz",   
		"Wäermepumpenstrom", 	    
	    "Pellets",  
	    "Koks Brach III",
	    "Erdgas Brennwert", 
		"Erdges",  
		"Heizöl",
		"Braunkohle (Bricketts)",
		"Nah-/Fernwärme",
		"Flüssiggas",
		"Nachtstorm"
	];

    var i;
	var dict = [];
	for (i = 0; i < yArray.length; i++) {
		
		if(!yArray[i] || yArray[i] == null) {
			yArray[i] = 0.0;
		}
		dict.push({
		    category:   b[i],
		    value:  yArray[i]
		});		
	}

	 dict.sort(function(a, b) { return a.value - b.value; });
	 drawStacked(dict,'Brennstoffkosten in 15 Jahren',' €');

	}

// displays the diagram "1 Jahr" in a new window
function draw1yearDiagram() {
	// calulate values for 1 year
	var yArray = get1YearValues();
	
	var b = [
		"Kosten Heute",  
		"Hackgut", 
		"Heizöl Brennwert",
		"Scheitholz",   
		"Wäermepumpenstrom", 	    
	    "Pellets",  
	    "Koks Brach III",
	    "Erdgas Brennwert", 
		"Erdges",  
		"Heizöl",
		"Braunkohle (Bricketts)",
		"Nah-/Fernwärme",
		"Flüssiggas",
		"Nachtstorm"
	];

    var i;
	var dict = [];
	for (i = 0; i < yArray.length; i++) {
		
		if(!yArray[i] || yArray[i] == null) {
			yArray[i] = 0.0;
		}
		dict.push({
		    category:   b[i],
		    value:  yArray[i]
		});
	}

	dict.sort(function(a, b) { return a.value - b.value; });
	drawStacked(dict,'Brennstoffkosten pro Jahr',' €');

}

// displays the diagram "Menge Jahr" in a new window
function drawAmountYearDiagram() {
	// calulate y-values
	var yArray = getAmountYearValues();
	
	var b = [
		"Hackgut",
		"Heizöl Brennwert",
		"Scheitholz",   
		"Wäermepumpenstrom", 
		"Pellets",
		"Koks Brach III",
		"Erdgas Brennwert",
		"Erdges",
		"Heizöl",
		"Braunkohle (Bricketts)",
		"Nah-/Fernwärme",
		"Flüssiggas",		
		"Nachtstorm"
	];

    var i;
	var dict = [];
	for (i = 0; i < yArray.length; i++) {
		
		if(!yArray[i] || yArray[i] == null) {
			yArray[i] = 0.0;
		}
		dict.push({
		    category:   b[i],
		    value:  yArray[i]
		});
	}

    dict.sort(function(a, b) { return a.value - b.value; });
	drawStacked(dict,'Netto - Platzbedarf pro Jahr',' m3');
	
}

// displays the diagram "Menge Jahr" in a new window
function drawCO2YearDiagram() {

	// calulate values for 1 year
	var yArray = getCO2Values();
	
	var b = [
		"Hackgut",
		"Scheitholz",   
		"Wäermepumpenstrom", 
		"Pellets",
		"Koks Brach III",
		"Erdgas Brennwert",
		"Erdges",
		"Heizöl",
		"Braunkohle (Bricketts)",
		"Nah-/Fernwärme",
		"Flüssiggas",		
		"Nachtstorm",
		"Heizöl Brennwert",
	];


    var i;
	var dict = [];
	for (i = 0; i < yArray.length; i++) {
		
		if(!yArray[i] || yArray[i] == null) {
			yArray[i] = 0.0;
		}
		dict.push({
		    category:   b[i],
		    value:  yArray[i]
		});
	}
	dict.sort(function(a, b) { return a.value - b.value; });
	//drawStacked(dict,'Gesamt CO2 Emissionen in 15 Jahren (inkl. Transport etc.)','kg');
	//drawStacked(dict,'Gesamt CO<sub>2</sub> Emissionen in 15 Jahren <font size=1>(inkl. Transport etc.)</font>','kg');
	drawStacked(dict,'','kg');
	
	
}

// returns the costs per year of the fuel types from "kosten heute" to
// "nachtstrom"
function getFuelTypeCosts() {
	var yArray = new Array();
	var str = "";
	
	// calculate current costs per year (berechne Jahreskosten)
	var rows = getById("con1").rows;


	var sum1 = 0; // Kosten pro Jahr (gesamt)
	for(var i=1; i < rows.length; i++) {
		var x = getPricePerkWh(i)*getHeatingAmount(i); 
		if(!isNaN(x)) sum1 += x;
	}
	var sum2 = getConsumptionPerYear(); // Jahresenergieverbrauch (gesamt)
	yArray[0] = sum1/sum2; // Kosten heute
	
	// calculate wood chip costs (Hackgutkosten)
	sum1 = 0; // Hackgutkosten
	for(var i=9; i <= 16; i++) {
		var x = getPricePerkWh(i);
		if(!isNaN(x)) sum1 += x;
	}
	yArray[1] = sum1/8; // Hackgut
	yArray[2] = getPricePerkWh(2); // Heizwert Heizöl Brennwert

	yArray[3] = (getPricePerkWh(6) + getPricePerkWh(7))/2; // Scheitholz
	yArray[4] =  getPricePerkWh(21); // Wärmepumpe
	yArray[5] = getPricePerkWh(8); // Pellets
	yArray[6] = getPricePerkWh(17); // Koks
	yArray[7] = getPricePerkWh(4); // Erdgas Brennwert
	yArray[8] = getPricePerkWh(3); // Erdgas
	yArray[9] = getPricePerkWh(1); // Heizöl
	yArray[10] = getPricePerkWh(19); // Briketts
	yArray[11] = getPricePerkWh(20); // Nah-/Fernwärme
	yArray[12] = getPricePerkWh(5); // Flüssiggas
	yArray[13] = getPricePerkWh(22); // Nachtstrom
	
	// multiply all values by 100 because Price/kWh is in Euro 
	// and it should be displayed as Cents/kWh
	for(var i=0; i < yArray.length; i++) {
		yArray[i] *= 100; // because of %
		yArray[i] = Math.round(yArray[i]*10)/10; // round
	}
	
	return yArray;
}

// returns the amount of the fuel types from "Hackgut" to
// "Nachtstrom"
function getFuelTypeAmount() {
	var yArray = new Array();
	
	// calculate wood chip costs (Mittelwert Heizwert Hackgut)
	var sum1 = 0; // Hackgutkosten
	var count = 0; // Anzahl Heizwerte
	for(var i=9; i <= 16; i++) { // from row 9 to (incl.) 16
		var x = getHeatingValue(i);
		if(!isNaN(x)) { // if it is a valid number
			sum1 += x;
			count++;
		}
	}
	yArray[0] = sum1/count; // Mittelwert Heizwert Hackgut
	yArray[1] = getHeatingValue(2); // Heizwert Heizöl Brennwert

	yArray[2] = (getHeatingValue(6) + getHeatingValue(7))/2; // Mittelwert Heizwert Scheitholz
	yArray[3] =  getHeatingValue(21); // Heizwert Wärmepumpe
	yArray[4] = getHeatingValue(8); // Heizwert Pellets
	yArray[5] = getHeatingValue(17); // Heizwert Koks
	yArray[6] = getHeatingValue(4); // Heizwert Erdgas Brennwert
	yArray[7] = getHeatingValue(3); // Heizwert Erdgas
	yArray[8] = getHeatingValue(1); // Heizwert Heizöl
	yArray[9] = getHeatingValue(19); // Heizwert Briketts
	yArray[10] = getHeatingValue(20); // Heizwert Nah-/Fernwärme
	yArray[11] = getHeatingValue(5); // Heizwert Flüssiggas
	yArray[12] = getHeatingValue(22); // Heizwert Nachtstrom
	
	return yArray;
}

// this function returns the (y-)values of the diagram "1 Jahr"
function get1YearValues() {
	var usagePerYear = getConsumptionPerYear(); // Jahresverbrauch
	var effCoeff = getEffUse(); // Wirkungsgradverb.-NEUER Kessel
	var temp = usagePerYear/(effCoeff/100+1); // Jahresenergieverbrauch/(Wirkungsgradverbrauch/100 + 1)
	var costs = getFuelTypeCosts();
	var yArray = new Array();
	
	// calculation
	yArray[0] = Math.round(usagePerYear*costs[0]/100);
	for(var i=1; i < costs.length; i++) {
		yArray[i] = temp*costs[i]/100;
		yArray[i] = Math.round(yArray[i]);
	}
	return yArray;
}

// this function returns the (y-)values of the diagram "Menge Jahr"
function getAmountYearValues() {
	var usagePerYear = getConsumptionPerYear(); // Jahresverbrauch
	var effCoeff = getEffUse(); // Wirkungsgradverb.-NEUER Kessel
	var temp = usagePerYear/(effCoeff/100+1); // Jahresenergieverbrauch/(Wirkungsgradverbrauch/100 + 1)
	var amount = getFuelTypeAmount(); // Mittelwerte Heizwert eines Produkts
	var yArray = new Array(); // will contain the y-values
	
	// calculation
	for(var i=0; i < amount.length; i++) {
		if(heatingValueAmount[i] == 0) { // lookup for "heatingValueAmount" in properties.js
			yArray[i] = 0;
		}
		else {
			yArray[i] = Math.round((temp/amount[i])/heatingValueAmount[i]*10)/10;
		}
	}
	return yArray;
}

function getCO2Values() {
	var yArray = new Array(); // will contain the y-values
	var usagePerYear = getConsumptionPerYear(); // Jahresverbrauch
	var effCoeff = getEffUse(); // contains a textfield; Wirkungsgradverbesserung-NEUER Kessel
	var temp = usagePerYear/(effCoeff/100+1); // Jahresenergieverbrauch/(Wirkungsgradverbesserung/100 + 1)
	//var costs = get1YearValues(); // costs of a fuel type per year
	
	co2perkWh[2] = 0.71/getHeatingValue(21); // 0.71 / Wärmepumpenstrom Heizwert
	co2perkWh[5] = 0.22*getHeatingValue(3)/getHeatingValue(4); // 0.22 * Heizwert Erdgas Brennwert / Erdgas
	
	for(var i=0; i < co2perkWh.length; i++) {
		yArray[i] = Math.round(15 * temp * co2perkWh[i]/100)*100;
	}
	
	return yArray;
}


// this function filters the text, which will be written into the diagram bars.
// the text can be manipulated for better displaying.
function filterValue(val) {
    var newVal = "";
    
    if(!isNaN(val) && val != 0) {
	newVal = "<span style='font-size:9px'>" + val + "</span>";
    }
    else {
	newVal="";
    }
    return newVal;
}


// this function provides browser independency
function getById(id) {
    var el; // the wanted element
    if(document.all) {
        // Code for Internet Explorer 5.5 and higher
        el = eval("document.all." + id);
    }
    else if(document.getElementById) {
        // Code for Netscape compatible Browsers (e.g. Mozilla)
        el = document.getElementById(id);
    }
    return el;
}

// -->

