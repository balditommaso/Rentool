<?php
    require_once "./util/sessionUtil.php";
    require_once "./util/functionDb.php";

    $email = $_POST['mail'];
    $password = $_POST['password'];
    echo $email;
    if($email != null && $password != null){
        $result = logIn($email, $password);
        $numRow = mysqli_num_rows($result);
        $session = $result->fetch_assoc();
        if($numRow == 1){
            session_start();
            setSession($session['nome'], $session['utenteId']);
            header("location: ./../index.php");
            exit;
        } 
        else {
            header("location: ./login.php?error='Le credenziali di accesso non sono valide.");
            exit;
        }
    } 
    else {
        header("location: ./login.php?error='Deve riempire tutti i campi'");
        exit;
    }
?>