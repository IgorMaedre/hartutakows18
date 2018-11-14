$(document).ready(function(){
$("#formularioa").submit(function(){
	var eposta = $("#eposta").val().trim(eposta);				
	var galdera = $("#galdera").val().trim(galdera).replace(/\s+/g, " ");
	var erantzunZuzena = $("#erantzunZuzena").val();				
	var erantzunOkerra1 = $("#erantzunOkerra1").val();
	var erantzunOkerra2 = $("#erantzunOkerra2").val();				
	var erantzunOkerra3 = $("#erantzunOkerra3").val();
	var zailtasuna = $("#zailtasuna").val();				
	var arloa = $("#arloa").val();
	var irudia = $("#fitxategia").val();
	
	var erroreak = "";
	if(eposta == "") erroreak += "(*) Egilearen eposta zehaztu gabe dago\n";
	else {
		var epostaExp = new RegExp("^[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus$");
		if(!epostaExp.test(eposta)) erroreak += "(*) Eposta okerra\n";
	}
	
	if(galdera == "") erroreak += "(*) Galderaren testua zehaztu gabe dago\n";
	else if(galdera.length < 10) erroreak += "(*) Galderaren testua motzegia da, 10 ko luzera ez du gainditzen\n";
	if(erantzunZuzena == "") erroreak += "(*) Erantzun zuzena zehaztu gabe dago\n";
	if(erantzunOkerra1 == "") erroreak += "(*) Erantzun okerra1 zehaztu gabe dago\n";
	if(erantzunOkerra2 == "") erroreak += "(*) Erantzun okerra2 zehaztu gabe dago\n";
	if(erantzunOkerra3 == "") erroreak += "(*) Erantzun okerra3 zehaztu gabe dago\n";
	if(arloa == "") erroreak += "(*) Gai-arloa zehaztu gabe dago\n";
	
	if(irudia != "" && irudia.match(".jpg") == null && irudia.match(".jpeg") == null && irudia.match(".png") == null &&
	irudia != "" && irudia.match(".JPG") == null && irudia.match(".JPEG") == null && irudia.match(".PNG") == null)
		erroreak += '(hautazkoa) Irudiaren formatua okerra, irudiak ".jpg", ".jpeg", ".png", ".JPG", ".JPEG" edo ".PNG" luzapena eduki behar du\n';
	
	if(erroreak != "") {
		alert(erroreak);
		return false;
	}
	else return true;
});
});