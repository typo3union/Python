var consPerYear = 0; 
var start = 1;

window.onload = function() { 
 initialize();
};

function initialize() {
	totalprice();
 	totalFuelVal();	
	calculate();	
	germanprice();
	showCountryPrices();
	display("page1");		
}

function totalFuelVal(){

	 var rowCount = getById('con1').rows.length;
    // germanPrice = [];
    for (var i = 0; i < [rowCount - 1]; i++) {
        var v = getById('fuelValue' + i).innerHTML;           
        fuelValue.push(parseGermanNumber(v));
    }
}
function totalprice() {
    var e = document.getElementById("country");
    if (e.options[e.selectedIndex].value == '1') {    	 
        gprice();
    } else {        
        germanprice();
    }
}

function gprice() {
    var rowCount = getById('con1').rows.length;
    // germanPrice = [];
    for (var i = 0; i < [rowCount - 1]; i++) {
        var v = getById('price' + i).value;         
        price.push(parseGermanNumber(v));
    }
}

function germanprice() {
    var rowCount1 = getById('con1').rows.length;
    // price = [];
    for (var i = 0; i < [rowCount1 - 1]; i++) {
        var v1 = getById('gprice' + i).value;
       
        germanPrice.push(parseGermanNumber(v1));
    }

}

// this function calculates the values of the table "Einfache Berechnung nach Wohnfläche".
// it will be called, if the value of the area ("beheizte Wohnfläche") changes
function calculate() {
	var table = getById("table1"); // get table
	var f = getById("area"); // textfield ("beheizte Wohnfläche")
	var consum = getById("consumption"); // drop-down menu (Auswahlliste, "gewählter Jahresverbrauch")
	var oilPrice = getPrice(1); // oil is in row 1
	var pelletPrice = getPrice(8); // pellets are in row 8
    
	if(!isNaN(f.value)) {
		for(var i=start; i < 8; i++) { // skips empty and header rows
			var val = Math.round(f.value*ratio[i-start]/100)*100; // lookup for "ratio" in properties.js!
			table.rows[i].cells[1].innerHTML=formatGermanNumber(val); // geschätzter/errechneter Jahresverbrauch
			table.rows[i].cells[2].innerHTML=formatGermanNumber(Math.round(val/10));
			table.rows[i].cells[3].innerHTML=formatGermanNumber(Math.round(val/4.9));
			table.rows[i].cells[4].innerHTML=formatEuroNumber(formatGermanNumber(Math.round(((val/10)*oilPrice-(val/4.9)*pelletPrice)*15)));
		}
		updateUsage();
	}
}


// this function recalculates the values of the first conversion table (con1)
function calculateConversion() {
	var con1 = getById("con1");
	consPerYear = 0; // consumption per year (Jahresverbrauch); global var!
	// start at 1, because at 0 is the table header!!
	for(var i=1; i < con1.rows.length; i++) {
		var amount = 0;
		var price = 0;
		var heatingValue = getHeatingValue(i); // Heizwert
		
		amount = getNeededFuelAmount(i); // "eingegebener letztjähriger Verbrauch"
		if(isNaN(amount)) {
			amount = 0;
		}
		
		price = getPrice(i); // price per unit (Preis pro Einheit)
                
		if(isNaN(price)) {
			price = 0;
		}
		setPricePerkWh(i, (price/heatingValue)); // cent per kWh
		var heatingAmount = amount * heatingValue;
		setHeatingAmount(i, heatingAmount); // heating amount; "Wärmemenge"
		consPerYear += amount * heatingValue;
	}
	if(consPerYear==0) {
		var temp = getById("consumption").value;
		if(!isNaN(temp)) {
			consPerYear=temp;
		}
	}
	
	// if con1 changes, con2 changes too and must be recalculated
	calculateConversion2();
}

// this function recalculates the values of the second conversion table (con2)
function calculateConversion2() {
	var boilerEfficiency = getBoilerEfficiency(); // Kesselwirkungsgrad
	var usedPower = 0; // genutzte Heizkraft (kWh werden genutzt)
	var bHeatLoad = 0; // Gebäude Heizlast
	var boilerSize = 0; // Kesselgröße
	var effUse = getEffUse(); // Wirkungsgradverbesserung NEUER Kessel
	var heatingLoadPerM2 = 0; // Heizlast pro Quadratmeter
	var area = 0; // beheizte Fläche
	var energyDemand = 0; // Energiebedarf
	
	// check user input
	area = getById("area2").value;
	if(isNaN(area)) {
		area = 1;
	}
	//if (!area) {
	//   alert("Es fehlt die Angabe der Wohnfläche.");
        //}
        //alert ("area: " + area);	
	// calculate values
	usedPower = consPerYear*boilerEfficiency;
	bHeatLoad = usedPower/divisorBHL;
	boilerSize = (bHeatLoad/boilerEfficiency)/(1+effUse/100);
	heatingLoadPerM2 = bHeatLoad/area*1000;
	energyDemand = boilerSize*divisorBHL/area;
	//alert("heating= " + bHeatLoad + "area: " + area);
	
	// display values
	setConsumptionPerYear(consPerYear);
	setUsedPower(usedPower);
	setBuildingHeatLoad(bHeatLoad);
	setBoilerSize(boilerSize);
	setHeatingLoadPerM2(heatingLoadPerM2);
	setEnergyDemand(energyDemand);
}

// this method ensures that the two area text fields (2x"beheizte Wohnfläche") 
// are synchron. the first textfield overrides the second one
function updateHeatingArea() {
	var value = getById("area").value;
	if(!isNaN(value)) {
		var area2 = getById("area2");
		area2.value = value;
	}
	
	calculateConversion2();
}

// 
function updateUsage() {
    clearCon1(); // first clear table con1 and recalculate
    var value = parseInt(getById("consumption").value); // get value of drop-down menu
    var table1rows = getById("table1").rows; // get table
	if(!isNaN(value)) {
		consPerYear = parseGermanNumber(parseEuroNumber(table1rows[value+start-1].cells[2].innerHTML)); // global var
		setConsumptionPerYear(value);
	}
    else {
		consPerYear = 0; // global var
		setConsumptionPerYear(0);
    }
	
	calculateConversion2(); // recalculate table con2
}

// this function clears the table con1 and recalculates it
function clearCon1() {
	var rows = getById("con1").rows;
	getById("area2").value = "";
    for(var i=1; i < rows.length; i++) {
        setNeededFuelAmount(i, "");
    }
    calculateConversion();
}

// this function is called, if a tab is clicked on. the function displays
// the clicked form or diagram
function display(tab) {
	var index = parseInt(tab.charAt(4)) - 1;
	var page1 = getById("page1");
	var page2 = getById("page2");
	
	// show div or diagram
	switch(index) {
	case 0: 
		// display first form
		setInActive(page2);
		setInActive(page3);
		setInActive(page4);
		setInActive(page5);
		setInActive(page6);
		setInActive(page7);
		setActive(page1);
		getById("conversion").style.display = "none";
		getById("estimation").style.display = "block";
		getById("chart_div").style.display = "none";
		document.getElementById("chart_div").innerHTML = "";   
		
		break;
	case 1:
		// display second form
		
		setInActive(page1);
		setInActive(page3);
		setInActive(page4);
		setInActive(page5);
		setInActive(page6);
		setInActive(page7);
		setActive(page2);
		getById("estimation").style.display = "none";
		getById("conversion").style.display = "block";
		getById("chart_div").style.display = "none";
		document.getElementById("chart_div").innerHTML = "";   

		getById("area").value="";
		getById("consumption").value=0;
		break;

	case 2:
	 	//var dArray = drawFuelTypeDiagram();
	 	setInActive(page1);
		setInActive(page2);
		setInActive(page4);
		setInActive(page5);
		setInActive(page6);
		setInActive(page7);
		setActive(page3);
	 	document.getElementById("chart_div").innerHTML = "";   
        drawFuelTypeDiagram();
        getById("estimation").style.display = "none";
		getById("conversion").style.display = "none";
		getById("chart_div").style.display = "block";     

		break;
	case 3:
		// display "15 Jahre" diagram
		setInActive(page1);
		setInActive(page2);
		setInActive(page3);
		setInActive(page5);
		setInActive(page6);
		setInActive(page7);
		setActive(page4);
		document.getElementById("chart_div").innerHTML = "";   
		draw15yearsDiagram();
		getById("estimation").style.display = "none";
		getById("conversion").style.display = "none";
		getById("chart_div").style.display = "block";

		break;
	case 4:
		// display "1 Jahr" diagram
		setInActive(page1);
		setInActive(page2);
		setInActive(page3);
		setInActive(page4);
		setInActive(page6);
		setInActive(page7);
		setActive(page5);
		document.getElementById("chart_div").innerHTML = "";   
		draw1yearDiagram();
		getById("estimation").style.display = "none";
		getById("conversion").style.display = "none";
		getById("chart_div").style.display = "block";
		break;
	case 5:
		setInActive(page1);
		setInActive(page2);
		setInActive(page3);
		setInActive(page4);
		setInActive(page5);
		setInActive(page7);
		setActive(page6);
		// display "Menge Jahr" diagram
		document.getElementById("chart_div").innerHTML = "";   
		drawAmountYearDiagram();
		getById("estimation").style.display = "none";
		getById("conversion").style.display = "none";
		getById("chart_div").style.display = "block";
		break;
	case 6:	

		setInActive(page1);
		setInActive(page2);
		setInActive(page3);
		setInActive(page4);
		setInActive(page5);
		setInActive(page6);
		setActive(page7);
		// display "CO2 Jahr" diagram
		document.getElementById("chart_div").innerHTML = "";   
		drawCO2YearDiagram();
		getById("estimation").style.display = "none";
		getById("conversion").style.display = "none";
		getById("chart_div").style.display = "block";		
		
		setTimeout(function(){
		  $(".amcharts-title tspan").remove();
		  $(".amcharts-title").html('<tspan>Gesamt CO</tspan><tspan dy="8">2</tspan> <tspan dy="-7">Emissionen in 15 Jahren (inkl. Transport etc.) </tspan>');
		}, 500);


		break;
	}
}

// this function changes the style of a tab (sets to inactive)
function setInActive(node) {
	node.firstChild.removeAttribute("class");
}

// this function changes the style of a tab (sets to active)
function setActive(node) {
	node.firstChild.setAttribute("class", "activeTab");
}

// this function displays the fuel prices per unit of the selected country.
// 1=Österreich, 2=Deutschland
function showCountryPrices() {
    var p;
    var sel = getById("country"); // get drop-down menu
    
    switch(parseInt(sel.value)) {
    case 1: // Austria; Österreich
        p = price;
        break;
    case 2: // Germany; Deutschland
        p = germanPrice;
        break;
    }
   
    var rows = getById("con1").rows;
    for(var i=1; i<rows.length; i++) {
        setPrice(i, p[i-1]);
    }

    calculateConversion(); // recalculate table
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




