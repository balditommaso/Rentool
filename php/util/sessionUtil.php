<?php
    function setSession($nome, $id){
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
    }

    //controllo se sono loggato
    function isLogged(){
        if(isset($_SESSION['nome']))
            return $_SESSION['nome'];
        else    
            return false;
    }
?>