<!--
// this function returns the entered value (of the user).
// (liefert eingegebenen Wert des letztjährigen Verbrauchs aus der gegebenen Zeile)
function getNeededFuelAmount(i) {
	var pos = 1; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	var ret;
	if(i > 0 && i < con1rows.length) { // i must be valid
		ret = parseGermanNumber(con1rows[i].cells[pos].firstChild.value); // parse german style number (e.g. 3.123,45)
	}
	return ret;
}

// this function sets the consumption value (of the user).
// (setzt den Wert des letztjährigen Verbrauchs in der gegebenen Zeile)
function setNeededFuelAmount(i, value) {
	var pos = 1; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	if(i > 0 && i < con1rows.length) { // i must be valid
		con1rows[i].cells[pos].firstChild.value = formatGermanNumber(value); // format to german number (1234.5 --> 1.234,5)
	}
}

// this function returns the heating value of the given row i.
// (liefert Heizwert aus der gegebenen Zeile)
function getHeatingValue(i) {
	var pos = 4; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	var ret;
	if(i >= 0 && i < con1rows.length) { // i must be valid
		ret = parseGermanNumber(con1rows[i].cells[pos].innerHTML); // parse german style number (e.g. 3.123,45 --> 3123.45)
	}
	return ret;
}

// this function returns the price per unit of the given row i.
// (liefert Preis/Einheit (in Euro) aus der gegebenen Zeile)
function getPrice(i) {
	var pos = 5; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	var ret;
	if(i > 0 && i < con1rows.length) { // i must be valid
		ret = parseGermanNumber(getById("price" + String(i-1)).value); // parse german style number (e.g. 3.123,45 --> 3123.45)
	}
	return ret;
}

// this function sets the price per unit of the given row i.
// (setzt Preis/Einheit (in Euro) in der gegebenen Zeile)
function setPrice(i, value) {
	var pos = 5; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	var ret;

	if(i >= 0 && i < con1rows.length) { // i must be valid
        var pCell = getById("price" + String(i-1))
        if(!isNaN(value))
		    pCell.value = formatGermanNumber(value); // parse german style number (e.g. 3.123,45 --> 3123.45)
        else 
            pCell.value = "";
	}
	return ret;
}

// this function returns the price per kWh of the given row i.
// (liefert Preis pro kWh (in Euro) aus der gegebenen Zeile)
function getPricePerkWh(i) {
	var pos = 6; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	var ret;
	if(i >= 0 && i < con1rows.length) { // i must be valid
		ret = parseGermanNumber(con1rows[i].cells[pos].innerHTML)/100; // parse german style number (e.g. 3.123,45 --> 3123.45)
	}
	return ret;
}

// this function sets the price per kWh of the given row i.
// (setzt den Preis pro kWh (gegeben in Euro) aus der gegebenen Zeile)
function setPricePerkWh(i, value) {
	var pos = 6; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	if(i >= 0 && i < con1rows.length && !isNaN(value)) { // i must be valid
		var tmp = value*10;
		var tmp1 = tmp*10;
		con1rows[i].cells[pos].innerHTML = formatGermanNumber(Math.round(tmp1*10)/10); // parse german style number (1234.5 --> 1.234,5)
	}
}

// this function returns the heating amount of the given row i.
// (liefert die Wärmemenge in kWh in der gegebenen Zeile)
function getHeatingAmount(i) {
	var pos = 7; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	var ret;
	if(i >= 0 && i < con1rows.length) { // i must be valid
		ret = parseGermanNumber(con1rows[i].cells[pos].innerHTML); // parse german style number (e.g. 3.123,45 --> 3123.45)
	}
	return ret;
}

// this function sets the heating amount of the given row i.
// (setzt die Wärmemenge in kWh in der gegebenen Zeile)
function setHeatingAmount(i, value) {
	var pos = 7; // position of the column in the table con1 (counting starts at 0)
	var con1rows = getById("con1").rows;
	if(i >= 0 && i < con1rows.length && !isNaN(value)) { // i must be valid
		con1rows[i].cells[pos].innerHTML = formatGermanNumber(value); // format to german number (1234.5 --> 1.234,5)
	}
}

// returns the energy consumption per year
// (liefert den Jahresenergieverbrauch)
function getConsumptionPerYear() {
	var con2 = getCon2();
	return parseGermanNumber(con2.rows[0].cells[0].innerHTML);
}

// sets the energy consumption per year
// (setzt den Jahresenergieverbrauch)
function setConsumptionPerYear(value) {
	var con2 = getCon2();
	con2.rows[0].cells[0].innerHTML = formatGermanNumber(value);
}

// returns the used power
// (liefert den Wert der genutzten Energie)
function getUsedPower() {
	var con2 = getCon2();
	return parseGermanNumber(con2.rows[2].cells[0].innerHTML);
}

// sets the used power
// (setzt den Wert der genutzten Energie)
function setUsedPower(value) {
	var con2 = getCon2();
	con2.rows[2].cells[0].innerHTML = formatGermanNumber(value);
}

// returns the building heat load
// (liefert die Gebäudeheizlast)
function getBuildingHeatLoad() {
	var con2 = getCon2();
	return parseGermanNumber(con2.rows[5].cells[0].innerHTML);
}

// sets the building heat load
// (setzt die Gebäudeheizlast)
function setBuildingHeatLoad(value) {
	var con2 = getCon2();
	con2.rows[5].cells[0].innerHTML = formatGermanNumber(Math.round(value));
}

// returns the needed boiler size
// (liefert die erforderliche Kesselgröße)
function getBoilerSize() {
	var con2 = getCon2();
	return parseGermanNumber(con2.rows[6].cells[0].innerHTML);
}

// sets the needed boiler size
// (setzt die erforderliche Kesselgröße)
function setBoilerSize(value) {
	var con2 = getCon2();
	con2.rows[6].cells[0].innerHTML = formatGermanNumber(Math.round(value));
}

// returns the heating load per m2
// (liefert die Heizlast pro Quadratmeter)
function getHeatingLoadPerM2() {
	var con2 = getCon2();
	return parseGermanNumber(con2.rows[9].cells[0].innerHTML);
}

// sets the heating load per m2
// (setzt die Heizlast pro Quadratmeter)
function setHeatingLoadPerM2(value) {
	var con2 = getCon2();
	if(isFinite(value)) {
		con2.rows[9].cells[0].innerHTML = formatGermanNumber(Math.round(value));
	}
	else {
		con2.rows[9].cells[0].innerHTML = "";
	}
}

// returns the energy demand
// (liefert den Energiebedarf)
function getEnergyDemand() {
	var con2 = getCon2();
	return parseGermanNumber(con2.rows[10].cells[0].innerHTML);
}

// sets the energy demand
// (setzt den Energiebedarf)
function setEnergyDemand(value) {
	var con2 = getCon2();
	if(isFinite(value)) {
		con2.rows[10].cells[0].innerHTML = formatGermanNumber(Math.round(value));
	}
	else {
		con2.rows[10].cells[0].innerHTML = "";
	}
}

// returns the boiler efficiency
// (liefert den Kesselwirkungsgrad
function getBoilerEfficiency() {
	var boilerEfficiency = getById("efficiency").value/100; // divide by 100 because of %
	return boilerEfficiency;
}

// returns the coefficient improvement of a new boiler
// (liefert die Wirkungsgradverbesserung-NEUER Kessel)
function getEffUse() {
	var effUse = parseGermanNumber(getById("effUse").value);
	if(isNaN(effUse)) {
		effUse = 0;
	}
	return effUse;
}

function getCon2() {
	return getById("con2");
}
// -->
