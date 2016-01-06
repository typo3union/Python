<!--
var ratio = new Array();
var type = new Array();
var fuelValue = new Array();
var units = new Array();
var price = new Array();
var germanPrice = new Array();
var fuelType = new Array();
var heatingValueAmount = new Array();
var co2perkWh = new Array();
var buildings = new Array();
var divisorBHL = 1650; // divisor building heat load (Divisor Geb�udeheizlast)


buildings = [
"Passivhaus",
"Neubau gut isoliert",
"Neubau Standard",
"Bau in den 90ern",
"gut ged�mmtes altes Haus mit Vollw�rmeschutz",
"schlecht ged�mmtes Haus 60er bis 80er Jahre",
"sehr altes Haus mit dicken Mauern"
];

// Konstanten zur Berechnung der Brennstoffkosten pro Jahr
// in der Tabelle: einfache Berechnung nach Wohnfl�che
ratio = [
15/0.85, 
45/0.85, 
75/0.8, 
105/0.8, 
105/0.7, 
165/0.7, 
165/0.65
];

// f�nfte Spalte der Tabelle: Genaue Berechnung nach
// letztj�hrigem Verbrauch; Heizwert in kWh/Einheit

//siehe dazu dispDiagram::drawAmountYearDiagram
//
heatingValueAmount = [
1,
1000,
1,
0,
650,
1700,
0,
0,
1000,
760,
0,
1000,
0
];

// Konstanten zur Berechnung der CO2 Emissionen.
// gibt an, wieviel CO2 ein Brennstoff pro kWh erzeugt
co2perkWh = [
0.008,  // Hackgut
0.002,  // Scheitholz
0.71,   // W�rmepumpenstrom
0.014,  // Pellets
0.43,   // Koks Brech III
0.2,    // Erdgas Brennwert
0.22,   // Erdgas
0.29,   // Heiz�l
0.38,   // Braunkohle
0,      // Nah-/Fernw�rme
0.29,   // Fl�ssiggas
0.71,    // Nachtstrom
0.29   // Heiz�l Brennwert
];

// -->

 
/*
fuelValue = [
10,
10.5,
9.52,
10.47,
6.78,
1800,
1250,
4.9,
850,
780,
1220,
1110,
710,
650,
1010,
930,
8.06,
8.50,
5.34,
1,
3.5,
1,
1
];
*/

// vierte Spalte der Tabelle: Genaue Berechnung nach
// letztj�hrigem Verbrauch; Kesselart
/*
type = [
"Heiz�l EL",
"Heiz�l Brennwert",
"Erdgas",
"Erdgas Brennwert",
"Fl�ssigas (1Liter =0,53kg)",
"Scheitholz Rotbuche/Eiche 15%",
"Scheitholz Fichte 15%",
"Pellets",
"Hackgut Fichte w=15%",
"Hackgut Fichte w=30%",
"Hackgut Rotbuche/Eiche w=15%",
"Hackgut Rotbuche/Eiche w=30%",
"Hackgut Fichte w=15%",
"Hackgut Fichte w=30%",
"Hackgut Rotbuche/Eiche w=15%",
"Hackgut Rotbuche/Eiche w=30%",
"Koks Brech III",
"Anthrazit Eierbrik",
"Braunkohle (Briketts)",
"Nah-/Fernw�rme",
"W�rmepumpenstrom",
"Nachtstrom",
"Tagstrom"
];

// dritte Spalte der Tabelle: Genaue Berechnung nach
// letztj�hrigem Verbrauch; Einheit
units = [
"Liter",
"m�",
"m�",
"m�",
"Liter",
"rm",
"rm",
"kg",
"Srm",
"Srm",
"Srm",
"Srm",
"Srm",
"Srm",
"Srm",
"Srm",
"kg",
"kg",
"kg",
"kWh",
"kWh",
"kWh",
"kWh"
];
*/
// Preise f�r �sterreich (in EURO!)
// ACHTUNG: keine Trennzeichen; Komma muss als Punkt geschrieben werden (z.B. 1234.56)
/*price = [
0.92, // Heiz�l
0.92, // Heiz�l Brennwert
0.75, // Erdgas
0.75, // Erdgas Brennwert
0.71, // Fl�ssiggas 
58, // Scheitholz Rotbuche/Eiche 15%
37, // Scheitholz Fichte 15%
0.22, // Pellets
25, //Hackgut Fichte w=15%
20, //Hackgut Fichte w=30%
29.50, //Hackgut Rotbuche/Eiche w=15%
25.30, //Hackgut Rotbuche/Eiche w=30%
20, //Hackgut Fichte w=15%
16.70, //Hackgut Fichte w=30%
24.75, //Hackgut Rotbuche/Eiche w=15%
21, //Hackgut Rotbuche/Eiche w=30%
0.64, //Koks Brech III
0.68, //Anthrazit Eierbrik
0.48, //Braunkohle (Briketts)
0.08, //Nah-/Fernw�rme
0.14, //W�rmepumpenstrom
0.14, //Nachtstrom
0.19 //Tagstrom
];*/

// Preise f�r Deutschland (in EURO!)
// ACHTUNG: keine Trennzeichen; Komma muss als Punkt geschrieben werden (z.B. 1234.56)
/*germanPrice = [
0.86, // Heiz�l
0.86, // Heiz�l Brennwert
0.65, // Erdgas
0.65, // Erdgas Brennwert
0.52, // Fl�ssiggas 
58, // Scheitholz Rotbuche/Eiche 15%
37, // Scheitholz Fichte 15%
0.23, // Pellets
25, //Hackgut Fichte w=15%
20, //Hackgut Fichte w=30%
29.50, //Hackgut Rotbuche/Eiche w=15%
29.30, //Hackgut Rotbuche/Eiche w=30%
20, //Hackgut Fichte w=15%
16.70, //Hackgut Fichte w=30%
24.75, //Hackgut Rotbuche/Eiche w=15%
21, //Hackgut Rotbuche/Eiche w=30%
0.64, //Koks Brech III
0.68, //Anthrazit Eierbrik
0.48, //Braunkohle (Briketts)
0.08, //Nah-/Fernw�rme
0.15, //W�rmepumpenstrom
0.15, //Nachtstrom
0.19 //Tagstrom
];*/

// erste Spalte der Tabelle: Genaue Berechnung nach
// letztj�hrigem Verbrauch; Brennstoffart
/*fuelType = [
"�l",
"&nbsp;",
"Gas",
"&nbsp;",
"&nbsp;",
"Scheitholz",
"&nbsp;",
"Pellets",
"Hackschnitzel  G30",
"&nbsp;",
"&nbsp;",
"&nbsp;",
"G50",
"&nbsp;",
"&nbsp;",
"&nbsp;",
"Koks/Kohle",
"&nbsp;",
"&nbsp;",
"Fernw&auml;rme",
"Strom/WP",
"&nbsp;",
"&nbsp;"
];
*/


