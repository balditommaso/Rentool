<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="unipi" content="PWEB" />
	<meta name="service" content="possibility to rent work tools of various types">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="./img/icon.png">
	<link rel="stylesheet" href="./css/general.css" type="text/css" media="screen">
	<link rel="stylesheet" href="./css/home.css" type="text/css" media="screen">
	<script src="./js/homeEffect.js"></script>
	<title>Rentool Official</title>
</head>

<body>
	<div id="layout">
		<?php
		require "./php/layout/header.php";
		?>


		<section class="colFull" id="welcome">
			<h1>Benvenuto su Rentool</h1>
			<h3>Esplora le nostre categorie</h3>
		</section>


		<nav>
			<div id="blue" class="cont">
				<img src="./img/plumb.jpg" alt="idraulica" class="image">
				<div class="mid">
					<div id="one" class="text">Idraulica</div>
				</div>
			</div>
			<div id="green" class="cont">
				<img src="./img/garden.jpg" alt="giardinaggio" class="image">
				<div class="mid">
					<div id="two" class="text">Giardinaggio</div>
				</div>
			</div>
			<div id="red" class="cont">
				<img src="./img/drill.jpg" alt="meccanica" class="image">
				<div class="mid">
					<div id="three" class="text">Meccanica</div>
				</div>
			</div>
			<div id="yellow" class="cont">
				<img src="./img/eletric.jpg" alt="elettronica" class="image">
				<div class="mid">
					<div id="four" class="text">Elettronica</div>
				</div>
			</div>
		</nav>




		<article>
			<div class="info">
				<img class="info" src="./img/statistics.png" alt="grafic">
				<div>
					<p class="text">
						gestisci l'andamento dei tuoi attrezzi, senza
					</p>
				</div>
			</div>
			<div  class="info">
				<img src="./img/calender.png" alt="date">
				<div>
					<p class="text">
						Keep the organizetion of your tool
					</p>
				</div>
			</div>
			<div class="info">
				<img src="./img/defense.png" alt="scudo">
				<div>
					<p class="text">
						Protect your tool with our service
					</p>
				</div>
			</div>
			<div class="info">
				<img src="./img/handshake.png" alt="stretta">
				<div>
					<p class="text">
						Fai i migliori affari per te
					</p>
				</div>
			</div>
		</article>


		<?php
		include "./php/layout/footer.php";
		?>
	</div>
</body>

</html>