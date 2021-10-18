<?php
	require_once "./util/utilityDb.php";
	// funzionalita' database

	//controlla la mail lato server
	function checkData($email, $codFiscale){
		global $rentoolDB;
		$email = $rentoolDB->sqlInjectionFilter($email);
		$codFiscale = $rentoolDB->sqlInjectionFilter($codFiscale);
		$sql = "select email  from utente where email = '$email'";
		$sql1 = "select codfiscale from utente where codfiscale = '$codFiscale'";
		$result = $rentoolDB->performQuery($sql);
		$result1 = $rentoolDB->performQuery($sql1);
		$numRow = mysqli_num_rows($result);
		$numRow1 = mysqli_num_rows($result1);
		$rentoolDB->closeConnection();
		if($numRow > 0)
			return "La mail inserita e' gia' stata utilizzata";
		else if ($numRow1)
			return "Il codice fiscale inserito e' gia' utilizzato";
		else
			return null;
	}
	function newUtente($nome, $cognome, $nascita, $sesso, $codFiscale, $tel, $email, $password, $foto, $descrizione) {
		global $rentoolDB;
		$nome = $rentoolDB->sqlInjectionFilter($nome);
		$cognome = $rentoolDB->sqlInjectionFilter($cognome);
		$nascita = $rentoolDB->sqlInjectionFilter($nascita);
		$sesso = $rentoolDB->sqlInjectionFilter($sesso);
		$codFiscale = $rentoolDB->sqlInjectionFilter($codFiscale);
		$tel = $rentoolDB->sqlInjectionFilter($tel);
		$email = $rentoolDB->sqlInjectionFilter($email);
		$password = $rentoolDB->sqlInjectionFilter($password);
		$foto = $rentoolDB->sqlInjectionFilter($foto);
		$descrizione = $rentoolDB->sqlInjectionFilter($descrizione);

		$errorMessage = checkData($email);
		if($errorMessage != null)
			return $errorMessage;

		$sql = "insert into utente values (NULL, '$nome', '$cognome', '$password', '$codFiscale', '$tel', '$email', '$nascita', '$sesso', '$foto', '$descrizione')";
		$rentoolDB->performQuery($sql);
		$rentoolDB->closeConnection();
		return null;
	}

	function getUtenteId($email){
		global $rentoolDB;
		$email = $rentoolDB->sqlInjectionFilter($email);

		$sql = "select utenteId from utente where email = '$email'";
		$result = $rentoolDB->performQuery($sql);
		$rentoolDB->closeConnection();
		return $result;
	}

	function logIn($email, $password){
		global $rentoolDB;
		$email = $rentoolDB->sqlInjectionFilter($email);
		$password = $rentoolDB->sqlInjectionFilter($password);

		$sql = "select utenteId, nome  from utente where email = '$email' and password = '$password'";
		$result = $rentoolDB->performQuery($sql);
		$rentoolDB->closeConnection();
		return $result;
	}
?>