
<?php
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $idFuncionario = $_POST['idFuncionario'];
    $nomeFuncionario = $_POST['nomeFuncionario'];
    $enderecoFuncionario = $_POST['enderecoFuncionario'];
    $cidadeFuncionario = $_POST['cidadeFuncionario'];
    $bairroFuncionario = $_POST['bairroFuncionario'];
    $estadoFuncionario = $_POST['estadoFuncionario'];
    $cepFuncionario = $_POST['cepFuncionario'];
    $telefoneFuncionario = $_POST['telefoneFuncionario'];
    $telefoneFFuncionario = $_POST['telefoneFFuncionario'];

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (empty($nomeFuncionario) || empty($enderecoFuncionario) || empty($cidadeFuncionario) || empty($bairroFuncionario) || empty($estadoFuncionario) || empty($telefoneFuncionario)) {
        echo "<script> alert('Por favor, preencha todos os campos obrigatórios.')</script>";
        echo "<script> location.href='editarF.php?id=$idFuncionario' </script>";
    } else {
    // SQL de atualização
    $sql = "UPDATE tbfuncionario SET 
            nomeFuncionario='$nomeFuncionario', 
            enderecoFuncionario='$enderecoFuncionario', 
            cidadeFuncionario='$cidadeFuncionario', 
            bairroFuncionario='$bairroFuncionario', 
            estadoFuncionario='$estadoFuncionario', 
            cepFuncionario='$cepFuncionario', 
            telefoneFuncionario='$telefoneFuncionario', 
            telefoneFFuncionario='$telefoneFFuncionario' 
            WHERE idFuncionario='$idFuncionario'";

    // Executa a consulta de atualização
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Registro Atualizado com Sucesso!')</script>";
        echo "<script> location.href='administrador.php?tabela=tabela2' </script>";
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conn);
        }
    }
}

// Verifica se o ID do cliente está definido na URL
if (isset($_GET['id'])) {
    // Recupera o ID do cliente da URL
    $id = $_GET['id'];

    // Consulta para recuperar os dados do cliente
    $sql = "SELECT * FROM tbfuncionario WHERE idFuncionario='$id'";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se o cliente existe
    if (mysqli_num_rows($resultado) > 0) {
        // Exibe o formulário de edição com os dados preenchidos
        $dados = mysqli_fetch_assoc($resultado);
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="idFuncionario" value="<?php echo $dados['idFuncionario']; ?>">
            Nome: <input type="text" name="nomeFuncionario" value="<?php echo $dados['nomeFuncionario']; ?>"><br>
            Endereço: <input type="text" name="enderecoFuncionario" value="<?php echo $dados['enderecoFuncionario']; ?>"><br>
            Cidade: <input type="text" name="cidadeFuncionario" value="<?php echo $dados['cidadeFuncionario']; ?>"><br>
            Bairro: <input type="text" name="bairroFuncionario" value="<?php echo $dados['bairroFuncionario']; ?>"><br>
            Estado: <input type="text" name="estadoFuncionario" value="<?php echo $dados['estadoFuncionario']; ?>"><br>
            CEP: <input type="number" name="cepFuncionario" value="<?php echo $dados['cepFuncionario']; ?>"><br>
            Telefone 1: <input type="number" name="telefoneFuncionario" value="<?php echo $dados['telefoneFuncionario']; ?>"><br>
            Telefone 2: <input type="number" name="telefoneFFuncionario" value="<?php echo $dados['telefoneFFuncionario']; ?>"><br>
            <!-- Outros campos do formulário -->
            <input type="submit" value="Atualizar">
        </form>
        <?php
    } else {
        echo "Funcionario não encontrado.";
    }
} else {
    echo "";
}
?>
