<?php
$nome = $email = $senha = $nomeErr = $emailErr = $senhaErr = "";
$countErr = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nome"])) {
        $nomeErr = "Preencha o nome";
        $countErr = 1;
    } else {
        $nome = test_data($_POST["nome"]);
        if (strlen($_POST["senha"]) > 20) {
            $nomeErr = "No máximo 20 caracteres";
            $countErr = 1;
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
                $nomeErr = "Apenas letras e espaços brancos!";
                $countErr = 1;
            }
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Preencha o Email";
        $countErr = 1;
    } else {
        $email = test_data($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email inválido";
            $countErr = 1;
        }
    }

    if (empty($_POST["senha"])) {
        $senhaErr = "Digite sua senha";
        $countErr = 1;
    } else {
        $senha = test_pwd($_POST["senha"]);
        if (strlen($_POST["senha"]) < 8) {
            $senhaErr = "Senha deve ser no mínimo 8 caracteres!";
            $countErr = 1;
        }
    }
}

function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function test_pwd($pwd) {
    $pwd = trim($pwd);
    $pwd = stripslashes($pwd);
    $pwd = htmlspecialchars($pwd);
    return password_hash($pwd, PASSWORD_DEFAULT);
}

if ($countErr == 0){
    include('../model/save.php');
}
?>