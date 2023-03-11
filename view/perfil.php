<?php
    include('../model/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
    $page_title = "Perfil";
    include('../include/head.php');
?>

<body>
    <?php
        include('../include/navbar.php');
    ?>
    <section class="w3-row w3-border w3-margin">
        <div class="w3-half w3-container">
            <h1>Perfil</h1>
            <figure>
                <?php
                    if (@$_SESSION['foto_perfil'] == "") {
                        echo "<img id='foto_perfil' class='w3-image' src='../static/perfil-padrao.png' alt='foto de perfil'>";
                    } else {
                        echo "<img id='foto_perfil' class='w3-image' src='".$_SESSION['foto_perfil']."' alt='foto de perfil'>";
                    }
                ?>
            </figure>
        </div>

        <div class="w3-half w3-container">
            <br><br>
            <label style="font-size: 35px;">Nome:</label>
            <p style="font-size: 30px;"><?php echo $_SESSION['nome'];?></p>
            
            <label style="font-size: 35px;">Email:</label>
            <p style="font-size: 30px;"><?php echo $_SESSION['email'];?></p>
            <div>
                <button type="button" onclick="location.href='../view/editar_perfil.php'" class="w3-button w3-blue w3-section w3-round-large">Editar</button>
                <button type="button" onclick="location.href='../view/signout.php'" class="w3-button w3-red w3-section w3-round-large">Excluir</button>
            </div>
        </div>
    </section>
    <?php
        include('../include/footer.php');
    ?>
</body>

</html>