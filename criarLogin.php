<?php
session_start();
include("conexao.php");

        if (isset($_GET['id'])) {
            $idLogin = $_GET['id'];
        
            $query = "SELECT * FROM tbfuncionario WHERE idFuncionario = '$idLogin'";
            $resultado_verificar = mysqli_query($conn, $query);

            if (mysqli_num_rows($resultado_verificar) > 0) {
                // Mostrar formulário para o funcionário criar seu nome de login e senha de login
                echo "<h2>Criar Login</h2>";
                echo "<form action='tbLogin.php' method='post'>";
                echo "<input type='hidden' name='idLogin' value='$idLogin'>";
                echo "Nome do Login: <input type='text' name='nomeLogin'><br><br>";
                echo "Senha do Login: <input type='password' name='senhaLogin'><br><br>"; // Alterado para password
                echo "<input type='submit' value='Criar Login'>";
                echo "</form>";
            } else {
                echo "ID de usuário não encontrado no banco de dados";
            }
        } else {
            echo "ID de login não especificado";
        }

?>
