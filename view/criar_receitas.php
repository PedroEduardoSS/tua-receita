<?php
    include('../control/receita_controller.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
    $page_title = "Criar Receita";
    include('../include/head.php');
?>

<body>
    <?php
        include('../include/navbar.php');
    ?>
    <h1>Criar Receitas</h1>
    <form class="w3-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <input type="hidden" name="action" value="criar_receita">    
        
        <label>Titulo</label>
        <input class="w3-input" type="text" name="receita_titulo" placeholder="Ex: Torta de maçã" required>
        <span class="error"><?php echo $receita_tituloErr;?></span>
        <br>

        <label>Ingredientes</label>
        <input class="w3-input" type="text" name="ingredientes" placeholder="Ex: * 4 maçãs;">
        <span class="error"><?php echo $ingredientesErr;?></span>
        <br>

        <label>Modo de preparo</label>
        <input class="w3-input" type="text" name="preparo" placeholder="Ex: Corte as maçãs...">
        <span class="error"><?php echo $preparoErr;?></span>
        <br>

        <input type="submit" class="w3-button w3-green w3-round-large" value="Criar Receita">
    </form>
    <?php
        include('../include/footer.php');
    ?>
</body>

</html>