
function egiaztatu() {
	
	
	var email = $("#eposta").val();
	var quest = $("#galdera").val();
	var corans = $("#ezuz").val();
	var wro1 = $("#eok1").val();
	var wro2 = $("#eok2").val();
	var wro3 = $("#eok3").val();
	var diff = $("#zail option:selected").val();
	var theme = $("#gaia").val();
	var wrong = 1;

	

	if (corans == "") {
		document.getElementById('ezuz').style.boxShadow =  "0 0 5px 1px red";
		wrong = 0;
	}  else {
		document.getElementById('ezuz').style.boxShadow =  "0 0 5px 1px green";
	}

	if (wro1 == "") {
		document.getElementById('eok1').style.boxShadow =  "0 0 5px 1px red";
		wrong = 0;
	}  else {
		document.getElementById('eok1').style.boxShadow =  "0 0 5px 1px green";
	}

	if (wro2 == "") {
		document.getElementById('eok2').style.boxShadow =  "0 0 5px 1px red";
		wrong = 0;
	}  else {
		document.getElementById('eok2').style.boxShadow =  "0 0 5px 1px green";
	}

	if (wro3 == "") {
		document.getElementById('eok3').style.boxShadow =  "0 0 5px 1px red";
		wrong = 0;
	}  else {
		document.getElementById('eok3').style.boxShadow =  "0 0 5px 1px green";
	}

	if (theme == "") {
		document.getElementById('gaia').style.boxShadow =  "0 0 5px 1px red";
		wrong = 0;
	}  else {
		document.getElementById('gaia').style.boxShadow =  "0 0 5px 1px green";
	}

	var posta = email.split("@");
	if (posta[1] == "ikasle.ehu.eus") { 
		var erab = posta[0];
		var luz = erab.length;
		var iz = erab.slice(0, luz-3);
		var num = erab.slice(luz-3, luz);
		if (luz > 8 && parseInt(num)) {
			document.getElementById('eposta').style.boxShadow =  "0 0 5px 1px green";
		} else {
			document.getElementById('eposta').style.boxShadow =  "0 0 5px 1px red";
			wrong = 0;
		}
	} else {
		document.getElementById('eposta').style.boxShadow =  "0 0 5px 1px red";
		wrong = 0;
	}

	if (quest.length >= 10) {
		document.getElementById('galdera').style.boxShadow =  "0 0 5px 1px green";
	} else {
		document.getElementById('galdera').style.boxShadow =  "0 0 5px 1px red";
		wrong = 0;
	}

	if (wrong == 1) {
		return true;
	} else {
		alert("Sarreraren bat gaizki dago!");
		return false;
	}

}
