<?php
include("../model/protect.php");

$foto_perfil = $nome = $email = $senha = $fotoErr = $nomeErr = $emailErr = $senhaErr = "";
$countErr = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_FILES)){
        $foto_perfil = $_SESSION["foto_perfil"];
    } else {
        $file = $_FILES["foto_perfil"];
        $fileName = $_FILES["foto_perfil"]["name"];
        $fileTmpName = $_FILES["foto_perfil"]["tmp_name"];
        $fileSize = $_FILES["foto_perfil"]["size"];
        $fileError = $_FILES["foto_perfil"]["error"];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $arqsAceitos = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $arqsAceitos)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../uploads/'.$fileNameNew;

                    $foto_perfil = $fileDestination;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    $fotoErr = "Arquivo muito grande!";
                }
            } else {
                $fotoErr = "ocorreu um erro!";
            }
        } else {
            $fotoErr = "Somente os tipos válidos!";
        }
    }


    if (empty($_POST["nome"])) {
        $nome = $_SESSION["nome"];
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
        $email = $_SESSION["email"];
    } else {
        $email = test_data($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email inválido";
            $countErr = 1;
        }
    }

    if (empty($_POST["senha"])) {
        $senha = "";
    } else {
        $senha = test_pwd($_POST["senha"]);
        if (strlen($_POST["senha"]) < 8) {
            $senhaErr = "Senha deve ser no mínimo 8 caracteres!";
            $countErr = 1;
        } elseif (strlen($_POST["senha"]) > 12) {
            $senhaErr = "Senha deve ser no máximo 12 caracteres!";
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