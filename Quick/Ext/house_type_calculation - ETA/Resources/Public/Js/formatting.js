<!--
// this function formats a number. it converts the number to
// a string an inserts thousand delimiters (1000er trennzeichen).
// the english comma will be replaced by a german comma (3123.4 --> 3.123,4)
function formatGermanNumber(number) {
	var res = "";
        number *= 100; 
	number = Math.round(number);
        number /= 100;		
	if(!isNaN(number) || !isNaN(parseFloat(number))) {
		var str = String(number); // in String umwandeln
		var posComma = 1; // Position des engl. Kommas
		var leftOfComma = 1;
		// suche komma
		for(var i=0; i < str.length; i++) {
			if(str.charAt(i) == '.') leftOfComma=0;
		}
		// beginne rechts, und gehe nach links
		for(var i=str.length-1; i >= 0; i--) {
			var c = str.charAt(i);
			// ersetze englisches Komma durch deutsches
			if(c == '.') {
				c = ',';
				posComma = str.length-i+1;
				leftOfComma=1;
			}
			// berechne Position vom Komma aus
			var tmp = str.length-i-posComma;
			// ist diese Position durch 3 teilbar, Trennpunkt setzen
			if(tmp%3 == 0 && tmp != 0 && leftOfComma==1) {
				res = "." + res;
			}
			res = c + res; // Ziffer kopieren
		}
	}
	return res;
}

// this function parses a string containing a number
// in german style and returns a machine
// number ( 1.234,56 --> 1234.56 )
function parseGermanNumber(number) {
	// number muss ein String sein!
	var str = String(number);
	var res = "";
	var flRes = 0.0;
	if(str) {
		for(var i=0; i < str.length; i++) {
			var c = str.charAt(i);
			// Tausender-Trennzeichen auslassen
			if(c != '.') {
				// ersetze deutsches Komma durch englisches
				if(c == ',') c = '.';
				res += c; // Zeichen kopieren
			}
		}
		flRes = parseFloat(res);
	}
	return flRes;
}

// this function parses a number in euro notation and returns
// the value in german style (EUR 3.223,56 --> 3.223,56)
function parseEuroNumber(number) {
	// number muss ein String sein!
	var str = String(number);
	var res;
	if(str) {
		str = str.replace("EUR", "");
		str = str.replace("&euro;", "");
		res = str;
	}
	return res;
}

// this function adds to a string containing a number
// the prefix "&euro;"
function formatEuroNumber(number) {
	var str = String(number);
	var res;
	if(str) {
		res = "&euro; " + str;
	}
	return res;
}
// -->