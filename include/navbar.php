<nav class="w3-bar w3-black">
    <a class="w3-bar-item w3-hover-grey w3-button" href="../view/home.php">Tua Receita</a>
    <a class="w3-bar-item w3-hover-grey w3-button" href="../view/receitas.php">RECEITAS</a>
    <div class="w3-dropdown-hover w3-right w3-hide-small">
        <button class="w3-button"><?php echo "<img id='foto_perfil' class='w3-image w3-round-xxlarge' src='".$_SESSION['foto_perfil']."' alt='foto de perfil' style='width:50px; height:50px'>"; ?></button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
            <a href="../view/perfil.php" class="w3-bar-item w3-button">Perfil</a>
            <a href="../view/logout.php" class="w3-bar-item w3-button">Sair</a>
        </div>
    </div>
    <a href="javascript:void(0);" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="responseNav()">
        &#9776;
    </a>
</nav>

<nav id="smallMenu" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium">
    <a class="w3-bar-item w3-hover-grey w3-button" href="perfil.php">Perfil</a>
    <a class="w3-bar-item w3-hover-red w3-button" href="logout.php">Sair</a>
</nav>

<script>
    function responseNav() {
        var x = document.getElementById("smallMenu");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>