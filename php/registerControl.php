<?php
	require_once "./util/sessionUtil.php";
	require_once "./util/functionDb.php";
    
    $metodo = $_SERVER['REQUEST_METHOD'];

	if($metodo== 'POST'){
        $errorMessage = newUtente($_POST['nome'], $_POST['cognome'], $_POST['data'], $_POST['genere'], $_POST['codFiscale'], $_POST['telefono'], $_POST['email'], $_POST['newPassword'], $_POST['foto'], $_POST['descrizione']);
		if($errorMessage == null){
			$result = getUtenteId($_POST['email']);
			$id = $result->fetch_assoc();
			session_start();
			setSession($_POST['nome'], $id);
			header('location: ./../index.php');
            exit;			
        }
        else{
            header("location: ./register.php?error=". $errorMessage);
            exit;
		}
	}
?>