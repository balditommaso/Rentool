<?php
	session_start();
	include "./php/util/sessionUtil.php";
?>

<header>
	<div class="head">
		<img src="./img/icon.png" alt="logo" height="50" width="50">
		<div class="search-cont">
			<form action="#">
				<input type="text" placeholder="Cerca...">
				<button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
		<div class="link">
			<a href="#">Articoli</a>
			<?php
				if (isLogged()){ 
					$nome = $_SESSION['nome'];
					echo '<a href="#">Preferiti</a>';
					echo '<a href="./private.php">Area Privata</a>';
					echo '</div>';
					echo '<div class="log">';
					echo '<span>Benvenuto ' . $nome . '</span>';
					echo '<a href="./php/logout.php">Esci</a>';
				} else {
					echo '<a href="./php/login.php">Preferiti</a>';
					echo '<a href="./php/login.php">Area Privata</a>';
					echo '</div>';
					echo '<div class="log">';
					echo '<a href="./php/login.php">Accedi</a>';
					echo '<a href="./php/register.php">Registrati</a>';
				}	
			?>
			</div>
	</div>
</header>