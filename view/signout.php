<?php
include('../model/protect.php');
include('../model/save.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
$page_title = "Excluir Permanentemente";
include_once('../include/head.php');
?>
</head>

<body>
    <div class="w3-panel w3-yellow w3-topbar w3-bottombar w3-border-amber w3-center">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <input type="hidden" name="action" value="excluir">
            <h1>Encerramento de conta</h1>
            <p>Essa ação irá encerrar sua conta permanentemente.</p>
            <h6>Tem certeza? (volte à pagina anterior se não tiver certeza)</h6>
            <input type="submit" class="w3-button w3-red w3-round-large" value="Excluir Permanentemente">
        </form>
    </div>
</body>

<?php include_once('../include/footer.php');?>

</html>