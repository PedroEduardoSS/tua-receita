<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id'])){
        die("Você não está logado!<p><a href='../view/login.php'>Entrar</a></p><p><a href='../view/signup.php'>Inscreva-se</a></p>");
    }
?>