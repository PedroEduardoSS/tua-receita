<?php
include_once("config.php");

switch (@$_REQUEST["action"]) {
    case 'cadastrar':
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $sql_query = $stmt->get_result() or die("Falha SQL:" . $conn->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            print "<script>alert('Email já cadastrado!');</script>";
        } else {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $nome, $email, $senha);
            $res = $stmt->execute();

            if($res==true){
                header("Location: login.php");
            } else {
                print "<script>alert('Falha em cadastrar!');</script>";
            }
        }
        break;
    
    case 'logar':
        if (isset($_POST['email']) || isset($_POST['senha'])) {
            
            $email = $conn->real_escape_string($_POST['email']);
            $senha = $conn->real_escape_string($_POST['senha']);

            $sql = "SELECT * FROM usuarios WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $sql_query = $stmt->get_result() or die("Falha SQL:" . $conn->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();
                if (password_verify($senha, $usuario['senha'])) {
                    if (!isset($SESSION)){
                        session_start();
                    }
        
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['foto_perfil'] = $usuario['foto_perfil'];
                    
                    header("Location: home.php");
        
                } else {
                    echo "<div class='w3-panel w3-red'>
                    <h3>Falha!</h3> <p>Senha incorreta.</p>
                    </div>";
                }
            } else {
                echo "<div class='w3-panel w3-red'>
                <h3>Falha!</h3> <p>Email não encontrado.</p>
                </div>";
            }
        }    
        
        break;

    case 'editar':
        $res = "";
        if (!empty($foto_perfil)) {
            $sql = "UPDATE usuarios SET foto_perfil = ? WHERE id = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $foto_perfil, $_SESSION["id"]);
            $res = $stmt->execute();

            $_SESSION['foto_perfil'] = $foto_perfil;
        }

        if (!empty($nome)) {
            $sql = "UPDATE usuarios SET nome = ? WHERE id=?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $nome, $_SESSION["id"]);
            $res = $stmt->execute();
        }

        if (!empty($email)) {
            $sql = "SELECT * FROM usuarios WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $sql_query = $stmt->get_result() or die("Falha SQL:" . $conn->error);

            $quantidade = $sql_query->num_rows;

            if ($quantidade == 1) {
                print "<script>alert('Email já cadastrado!');</script>";
            } else {
                $sql = "UPDATE usuarios SET email = ? WHERE id=?";
    
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('si', $email, $_SESSION["id"]);
                $res = $stmt->execute();
            }
        }

        if (!empty($senha)) {
            $sql = "UPDATE usuarios SET senha = ? WHERE id=?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $senha, $_SESSION["id"]);
            $res = $stmt->execute();
        }

        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;

        if($res==true){
            header('Location: perfil.php?atualizado');
        } else {
            print "<script>alert('Falha em editar!');</script>";
        }
        
        break;

    case 'excluir':
        $sql = "DELETE FROM usuarios WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_SESSION["id"]);
        $res = $stmt->execute();

        if($res==true){
            header("Location: index.php");
        } else {
            print "<script>alert('Falha em cadastrar!');</script>";
        }
        break;

    case 'recuperar_senha':
        $email = $conn->real_escape_string($_POST['email']);

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $sql_query = $stmt->get_result() or die("Falha SQL:" . $conn->error);

        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1){
            include('generate_pwd.php');
            $senha = gerar_senha(8, true, true, true, false);
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET senha = ? WHERE email = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $senha_hash, $email);
            $res = $stmt->execute();

            if ($res==true) {
                $msg = "Sua nova senha provisória:/n" . $senha . "/nAo entrar, altera a senha.";
                $msg = wordwrap($msg,70);
                mail($email,"Nova senha", $msg);
            }

            echo "<div class='w3-panel w3-pale-blue w3-border'>
            <h3>Atenção!</h3> <p>Verifique seu email.</p>
            </div> ";
        } else {
            echo "<div class='w3-panel w3-red'>
            <h3>Falha!</h3> <p>Esse email não está cadastrado.</p>
            </div>";
        }
        break;
    
    default:
        # code...
        break;
}
?>