<?php
    include('../model/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
    $page_title = "Tuas Receitas";
    include('../include/head.php');
?>

<body>
    <?php
        include('../include/navbar.php');
    ?>
    <h1>Tuas Receitas</h1>
    <?php
        include('../control/receita_controller.php');
        readById($_SESSION["id"]);
    ?>
    <?php
        include('../include/footer.php');
    ?>
</body>

</html>