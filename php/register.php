<?php
	require_once "./util/sessionUtil.php";
	require_once "./util/functionDb.php";
?>

<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="unipi" content="PWEB">
	<meta name="service" content="possibility to rent work tools of various types">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="./img/icon.png">
	<link rel="stylesheet" href="./../css/general.css" type="text/css" media="screen">
	<link rel="stylesheet" href="./../css/log.css" type="text/css" media="screen">
	<script src="./../js/homeEffect.js"></script>
	<title>Register - Rentool Official</title>
</head>

<body>
	<div id="contenitore">
		<header id="welcome">
			<h2>Registrati</h2>
			<p>Sei gi&agrave; registrato? Allore esegui il <a href="login.php">Log In</a>.</p>
		</header>
		<form name="mioForm" action="./registerControl.php" method="POST">
			<div class="tab">
				<legend><b>Step 1</b></legend><br>
				<label><b>Nome:</b>
					<input type="text" placeholder="Mario" name="nome" required>
				</label>
				<label><b>Cognome:</b>
					<input type="text" placeholder="Rossi" name="cognome" required>
				</label>
				<label><b>Data di nascita:</b>
					<input type="date" name="data" required>
				</label>
				
			</div>
			<div class="tab">
				<legend><b>Step 2</b></legend>
				<label><b>Codice fiscale:</b>
					<input type="text" placeholder="ABCDEF12G35H678I" name="codFiscale" required>
				</label>
				<label><b>Numero cellulare:</b>
					<input type="tel" placeholder="001122334455" name="telefono" required>
				</label>
				<div id="sesso">
					<b>Sesso:</b>
					<input id="M" type="radio" name="genere" value="maschio" required="true">
					<label for="M">Maschio</label>
					<input id="F" type="radio" name="genere" value="femmina">
					<label for="F">Femmina</label>
					<input id="A" type="radio" name="genere" value="altro">
					<label for="A">Altro</label>
				</div>
			</div>
			<div class="tab">
				<legend><b>Step 3</b></legend>
				<label><b>E-mail:</b>
					<input type="email" placeholder="esempio@email.com" name="email" required>
				</label>
				<label><b>Password:</b>
					<input type="password" name="newPassword" required>
				</label>
				<label><b>Ripeti password:</b>
					<input type="password" name="ripPassword" required>
				</label>
			</div>
			<div class="tab">
				<legend><b>Step 4</b></legend>
				<label for="foto"><b>Foto profilo:</b>
					<input name="foto" type="file" id="foto">
				</label>
				<label><b>Descriviti:</b>
					<textarea name="descrizione" rows="10" placeholder="Potresti parlare delle tue passioni."></textarea>
				</label>
				<cite>*questi campi non sono obbligatori</cite>
			</div>
			<hr class="smallSplit">
			<div id="mes" class="hyde">
				<small>Errore:</small>
			</div>
			<div class="mov">
				<button id="indietro" type="button" onclick="goNext(-1)">Indietro</i></button>
				<button id="avanti" type="button" onclick="goNext(1)">Avanti</i></button>
			</div>
			<div class="conferma">
				<p class="colFull">Creando l'account lei accetta i <a href="#">Termini della privacy</a>.</p>
			</div>
		</form>
		<?php
			if(isset($_GET['error'])){
				echo '<div class="server">';
				echo '<span>'. $_GET['error'] . '</span>';
				echo '</div>';
			}
		?>
	</div>
	<script src="./../js/loginControl.js"></script>
</body>
</html>