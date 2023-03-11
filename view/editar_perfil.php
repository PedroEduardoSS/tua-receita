<?php
    include('../control/editar_perfil_controller.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
    $page_title = "Editar Perfil";
    include('../include/head.php');
?>

<body>
    <?php
        include('../include/navbar.php');
    ?>
    
    <div class="w3-container w3-margin w3-padding-large w3-border">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="action" value="editar">
            <h2>Edição de Perfil</h2>
            
            <label for="foto_perfil">Foto de Perfil:</label>
            <input type="file" class="w3-input" id="foto_perfil" name="foto_perfil">
            <span class="error"><?php echo $fotoErr;?></span><br>
                
            <label for="name">Name:</label>
            <input type="name" class="w3-input" id="name" placeholder="Nome" name="nome">
            <span class="error"><?php echo $nomeErr;?></span><br>
                
            <label for="email">Email:</label>
            <input type="email" class="w3-input" id="email" placeholder="Email" name="email">
            <span class="error"><?php echo $emailErr;?></span><br>
                
            <label for="pwd">Password:</label>
            <input type="password" class="w3-input" id="pwd" placeholder="Senha" name="senha">
            <span class="error"><?php echo $senhaErr;?></span><br>
            
            <input type="submit" class="w3-button w3-green w3-section w3-round-large" name="submit" value="Salvar">
        </form>
    </div>

    <?php
        include('../include/footer.php');
    ?>
</body>

</html>