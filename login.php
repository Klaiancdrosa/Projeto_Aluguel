
<?php
include_once 'conexao.php';
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION['logged_in'])) {
    header("Location: administrador.php");
    exit();
}

// Verifica se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeLogin = $_POST['nomeLogin'];
    $senhaLogin = $_POST['senhaLogin'];

    // Consulta o banco de dados para verificar as credenciais
    $sql = "SELECT * FROM tblogin WHERE nomeLogin = '$nomeLogin' AND senhaLogin = '$senhaLogin'";
    $resultado = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        $dados = $resultado->fetch_object();
        // Define as variáveis de sessão
        $_SESSION["logged_in"] = true;
        $_SESSION["idLogin"] = $dados->idLogin;
        $_SESSION["nomeLogin"] = $dados->nomeLogin;
        $_SESSION["senhaLogin"] = $dados->senhaLogin;
        $_SESSION["nivelLogin"] = $dados->nivelLogin;
        // Redireciona para a página do administrador
        header("Location: administrador.php");
        exit();
    } else {
        // Credenciais inválidas, exibe uma mensagem de erro
        echo "<script> alert('Login Inválido!')</script>";
        header("Location: pInicial.php");
    }
}
?>
