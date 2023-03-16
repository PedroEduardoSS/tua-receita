<?php
include('../model/protect.php');

$receita_titulo = $ingredientes = $preparo = "";
$receita_tituloErr = $ingredientesErr = $preparoErr = "";
$countErr = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["receita_titulo"])) {
        $receita_tituloErr = "Preencha o título";
        $countErr = 1;
    } else {
        $receita_titulo = test_data($_POST["receita_titulo"]);
    }

    if (empty($_POST["ingredientes"])) {
        $ingredientesErr = "Preencha os ingredientes";
        $countErr = 1;
    } else {
        $ingredientes = test_data($_POST["ingredientes"]);
    }

    if (empty($_POST["preparo"])) {
        $preparoErr = "Preencha o modo de preparo";
        $countErr = 1;
    } else {
        $preparo = test_data($_POST["preparo"]);
    }
}

function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($countErr == 0){
    include('../model/save.php');
}
?>