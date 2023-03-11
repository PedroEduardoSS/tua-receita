<?php
include_once("../control/signup_controller.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
    $page_title = "Signup";
    include('../include/head.php');
?>

<body>
    <h1>Cadastro</h1>
    <div class="w3-container w3-margin w3-padding-large w3-border">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <input type="hidden" name="action" value="cadastrar">

        <label for="name">Name:</label>
        <input type="name" class="w3-input" id="name" placeholder="Nome" name="nome" require>
        <span class="error"><?php echo $nomeErr;?></span>
        <br>
        <label for="email">Email:</label>
        <input type="email" class="w3-input" id="email" placeholder="email@example.com" name="email" require>
        <span class="error"><?php echo $emailErr;?></span>
        <br>
        <label for="pwd">Senha:</label>
        <input type="password" class="w3-input" id="pwd" placeholder="Senha de 8 caracteres ou mais" name="senha" require>
        <span class="error"><?php echo $senhaErr;?></span>
        
        <input class="w3-check w3-section" type="checkbox" name="remember" required> Eu li e aceito os
        <a href="include/termos.php">termos de uso</a> e <a href="include/politicas.php">políticas de privacidade.</a>
        <br>
        <input type="submit" class="w3-button w3-blue w3-section w3-round-large" name="submit" value="Começar">
        </form>
    </div>
    <?php
        include('../include/footer.php');
    ?>
</body>

</html>