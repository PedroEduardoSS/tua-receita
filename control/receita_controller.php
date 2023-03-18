<?php
#create controller
function create(){
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

    if ($countErr == 0){
        include('../model/save.php');
    }
}

#read controller
function read(){
    include_once("../model/config.php");
    $sql = "SELECT * FROM receitas";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
    if($qtd > 0) {
        for($i = 0; $i <= $qtd; $i++){
            $row = $res->fetch_object();
            print "
            <button onclick=\"document.getElementById('id".$i."').style.display='block'\"
            class='w3-button'>".$row->receita_titulo."</button>

            <div id='id".$i."' class='w3-modal'>
                <div class='w3-modal-content'>
                    <div class='w3-container'>
                    <span onclick=\"document.getElementById('id".$i."').style.display='none'\"
                    class='w3-button w3-display-topright'>&times;</span>
                    <h3>".$row->receita_titulo."</h3>
                    <br>
                    <h4>Ingredientes</h4>
                    <p>".$row->ingredientes."</p>
                    <br>
                    <h4>Modo de preparo</h4>
                    <p>".$row->preparo."</p>
                    </div>
                </div>
            </div>";
            
        }
    }
     
}

function readById($id){
    include_once("../model/config.php");
    $sql = "SELECT * FROM receitas WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $sql_query = $stmt->get_result() or die("Falha SQL:" . $conn->error); 
    $qtd = $sql_query->num_rows;
    if($qtd > 0) {
        while($row = $sql_query->fetch_object()){
            print "
            <button onclick=\"document.getElementById('id01').style.display='block'\"
            class='w3-button'>".$row->receita_titulo."</button>

            <div id='id01' class='w3-modal'>
                <div class='w3-modal-content'>
                    <div class='w3-container'>
                    <span onclick=\"document.getElementById('id01').style.display='none'\"
                    class='w3-button w3-display-topright'>&times;</span>
                    <h3>".$row->receita_titulo."</h3>
                    <br>
                    <h4>Ingredientes</h4>
                    <p>".$row->ingredientes."</p>
                    <br>
                    <h4>Modo de preparo</h4>
                    <p>".$row->preparo."</p>
                    </div>
                </div>
            </div>";
        }
    }
     
}

#util function
function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>