<?php
include_once("../control/login_controller.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
    $page_title = "Login";
    include('../include/head.php');
?>

<body>
    <h1>Entrar</h1>
    <div class="w3-container w3-margin w3-padding-large w3-border">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <input type="hidden" name="action" value="logar">
            
            <label for="email">Email:</label>
            <input type="email" class="w3-input" id="email" placeholder="Email" name="email">
            <span class="error"><?php echo $emailErr;?></span>
            <br>
            <label for="pwd">Senha:</label>
            <input type="password" class="w3-input" id="pwd" placeholder="Senha" name="senha">
            <span class="error"><?php echo $senhaErr;?></span>
            <input type="submit" class="w3-button w3-green w3-section w3-round-large" value="Entrar">
        </form>
        <a href="esqueci_senha.php">Esqueci a senha</a>
    </div>
    <?php
        include('../include/footer.php');
    ?>
</body>

</html>