<?php
    include('../control/receita_controller.php');
    create();
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
        <br>

        <label>Ingredientes</label>
        <textarea class="w3-input" type="text" rows="20" name="ingredientes" required>
        Ex: * 4 maçãs;
            * açúcar;
        </textarea>
        <br>

        <label>Modo de preparo</label>
        <textarea class="w3-input" type="text" rows="30" name="preparo" required>
        Ex: Corte as maçãs...
        </textarea>
        <br>

        <input type="submit" class="w3-button w3-green w3-round-large" value="Criar Receita">
        <br>
    </form>
    <?php
        include('../include/footer.php');
    ?>
</body>

</html>