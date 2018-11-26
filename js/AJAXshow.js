function showfile() {
	var erabiltzailea = document.getElementById('eposta').innerHTML;
	var xmlhttp = new XMLHttpRequest();
	console.log(erabiltzailea);

	xmlhttp.onreadystatechange = function() {
		
		if (this.readyState == 4 && this.status == 200) {
			
			document.getElementById('xmltaula').innerHTML = this.responseText;

		}

	};

	xmlhttp.open('GET', '../php/AJAXshow.php?erabiltzailea=' + erabiltzailea, true);
	xmlhttp.send();

}

function chargeXML(xml) {
	
	var docXML = xml.responseXML;
	var taula = "<tr><th>Email</th><th>Question</th><th>Correct answer</th></tr>";
	var questions = docXML.getElementsByTagName('assessmentItem');

	var email; var gald; var erantz;

	for (var i = 0; i < questions.length; i++) {
		
		email = questions[i].getAttribute('author').textContent;
		gald = questions[i].getElementsByTagName('p')[0].textContent;
		erantz = questions[i].getElementsByTagName('value')[0].textContent;

		
			
			taula += "<tr><td>" + author + "</td><td>" + gald + "</td><td>" + erantz + "</td></tr>";

		

	}

	document.getElementById('xmltaula').innerHTML = taula;

}