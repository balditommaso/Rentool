// messaggi di errore
var MESSAGE = [
	"Dovresti riempire questo campo",
	"I caratteri inseriti non sono validi",
	"Il formato dellla e-mail non valido",
	"Ci dispiace, ma devi essere maggiorenne per creare un account",
	"Codice fiscale non valido",
	"Numero di telefono non valido",
	"Password non valida. Dovrebbe essere almeno di 8 caratteri ed essere composta da: lettere maiuscole, minuscole, numeri e caratteri speciali.",
	"I due campi dovrebbero corrispondere"
];

// Regular expression (da controllare)
var onlyLetter = /[^0-9\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]+/;
var checkMail = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
var checkTel = /^((00|\+)39[\. ]??)??3\d{2}[\. ]??\d{6,7}$/;
var checkPwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
var checkCF = /^[A-Za-z]{6}[0-9]{2}[A-Za-z]{1}[0-9]{2}[A-Za-z]{1}[0-9]{3}[A-Za-z]{1}$/;
/*-------------------------------------------FUNZIONI UTILI-------------------------------------------*/

var currentTab = 0;
showTab(currentTab);

function showTab(step) {
	var tables = document.mioForm.getElementsByClassName("tab");
	tables[step].style.display = "block";
	if (step == 0)
		document.getElementById("indietro").style.visibility = "hidden";
	else
		document.getElementById("indietro").style.visibility = "visible";
	if (step == (tables.length - 1)) {
		document.getElementById("avanti").innerText = "Conferma";
		document.getElementsByClassName("conferma").className += "-ready";
		document.getElementById("avanti").className = "end";
	}
	else {
		document.getElementById("avanti").innerText = "Avanti";
		document.getElementsByClassName("conferma").className = "conferma";
		document.getElementById("avanti").className = "";
	}
}


function goNext(step) {
	var tables = document.getElementsByClassName("tab");
	resetErrorMessage();
	if (step == 1 && !validateForm())
		return false;
	tables[currentTab].style.display = "none";
	currentTab += step;
	if (currentTab >= tables.length) {
		document.mioForm.submit();
		return false;
	}
	showTab(currentTab);
}

function validateForm() {
	var cont = 0;		//soluzione provvisoria
	var tables = document.getElementsByClassName("tab");
	var checks = tables[currentTab].getElementsByTagName("input");
	var i; //cursore
	var valid = true;
	resetErrorMessage();
	if (currentTab == 3)										//non controllo l'ultimo campo
		return valid;
	for (i = 0; i < checks.length; i++) {
		if (checks[i].type != "file")
			checks[i].value = checks[i].value.trim();
		if (checks[i].type != "radio" && checks[i].value == "") {						//controllo contenuto non vuoto
			checks[i].className = "notReady";
			setErrorMessage(MESSAGE[0]);
			valid = false;
		}
		else if (checks[i].type == "radio") {
			cont++;
			var scelta = document.mioForm.genere.value;
			if (scelta == "" && cont == 3) {
				setErrorMessage(MESSAGE[0]);
				valid = false;
			}
		}
		else {
			switch (checks[i].type) {
				case ("text"):
					if (checks[i].name == "codFiscale") {
						if (!checkCF.test(checks[i].value)) {
							checks[i].className = "notReady";
							setErrorMessage(MESSAGE[4]);
							valid = false;
						}
					}
					else {
						if (!onlyLetter.test(checks[i].value)) {
							checks[i].className = "notReady";
							setErrorMessage(MESSAGE[1]);
							valid = false;
						}
					}
					break;
				case ("date"):
					var birth = new Date(checks[i].value);
					var today = new Date();
					if ((today.getFullYear() - birth.getFullYear()) > 18)
						break;
					else if ((today.getFullYear() - birth.getFullYear()) == 18 && (today.getMonth() - birth.getMonth()) > 0)
						break;
					else if ((today.getFullYear() - birth.getFullYear()) == 18 && (today.getMonth() - birth.getMonth()) == 0 && (today.getDay() - birth.getDay()) > 0)
						break;
					else {
						valid = false;
						checks[i].className = "notReady";
						setErrorMessage(MESSAGE[3]);
					}
					break;
				case ("tel"):
					if (!checkTel.test(checks[i].value)) {
						checks[i].className = "notReady";
						setErrorMessage(MESSAGE[5]);
						valid = false;
						console.log(!checkTel.test(checks[i].value));
					}
					break;
				case ("email"):
					if (!checkMail.test(checks[i].value)) {
						checks[i].className = "notReady";
						setErrorMessage(MESSAGE[2]);
						valid = false;
					}
					break;
				case ("password"):
					if (checks[i].name == "newPassword") {
						if (!checkPwd.test(checks[i].value)) {
							checks[i].className = "notReady";
							setErrorMessage(MESSAGE[6]);
							valid = false;
						}
						break;
					}
					else {
						var control1 = document.mioForm.newPassword;
						var control2 = document.mioForm.ripPassword;
						if (control1.value != control2.value) {
							control2.className = "notReady";
							setErrorMessage(MESSAGE[7]);
							valid = false;
						}
						break;
					}
				default:
					break;
			}
		}
	}
	return valid;
}




function setErrorMessage(message) {
	document.getElementById("mes").className = "error";
	document.getElementsByTagName("small")[0].innerText += "\n -" + message;
}

function resetErrorMessage() {
	document.getElementById("mes").className = "hyde";
	document.getElementsByTagName("small")[0].innerText = "ERRORE:";
	var table = document.getElementsByClassName("tab")[currentTab];
	var reset = table.getElementsByClassName("notReady");
	for (var i = 0; i < reset.length; i++)
		reset[i].className = "";
}