
<?php
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $idCliente = $_POST['idCliente'];
    $nomeCliente = $_POST['nomeCliente'];
    $enderecoCliente = $_POST['enderecoCliente'];
    $cidadeCliente = $_POST['cidadeCliente'];
    $bairroCliente = $_POST['bairroCliente'];
    $estadoCliente = $_POST['estadoCliente'];
    $cepCliente = $_POST['cepCliente'];
    $telefoneCliente = $_POST['telefoneCliente'];
    $telefoneCCliente = $_POST['telefoneCCliente'];

    if (empty($nomeCliente) || empty($enderecoCliente) || empty($cidadeCliente) || empty($bairroCliente) || empty($estadoCliente) || empty($telefoneCliente)) {
        echo "<script> alert('Por favor, preencha todos os campos obrigatórios.')</script>";
        echo "<script> location.href='editarC.php?id=$idCliente' </script>";
    } else {
    // SQL de atualização
    $sql = "UPDATE tbcliente SET 
            nomeCliente='$nomeCliente', 
            enderecoCliente='$enderecoCliente', 
            cidadeCliente='$cidadeCliente', 
            bairroCliente='$bairroCliente', 
            estadoCliente='$estadoCliente', 
            cepCliente='$cepCliente', 
            telefoneCliente='$telefoneCliente', 
            telefoneCCliente='$telefoneCCliente' 
            WHERE idCliente='$idCliente'";

    // Executa a consulta de atualização
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Registro Atualizado com Sucesso!')</script>";
        echo "<script> location.href='administrador.php' </script>";
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
    $sql = "SELECT * FROM tbcliente WHERE idCliente='$id'";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se o cliente existe
    if (mysqli_num_rows($resultado) > 0) {
        // Exibe o formulário de edição com os dados preenchidos
        $dados = mysqli_fetch_assoc($resultado);
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="idCliente" value="<?php echo $dados['idCliente']; ?>">
            Nome: <input type="text" name="nomeCliente" value="<?php echo $dados['nomeCliente']; ?>"><br>
            Endereço: <input type="text" name="enderecoCliente" value="<?php echo $dados['enderecoCliente']; ?>"><br>
            Cidade: <input type="text" name="cidadeCliente" value="<?php echo $dados['cidadeCliente']; ?>"><br>
            Bairro: <input type="text" name="bairroCliente" value="<?php echo $dados['bairroCliente']; ?>"><br>
            Estado: <input type="text" name="estadoCliente" value="<?php echo $dados['estadoCliente']; ?>"><br>
            CEP: <input type="number" name="cepCliente" value="<?php echo $dados['cepCliente']; ?>"><br>
            Telefone 1: <input type="number" name="telefoneCliente" value="<?php echo $dados['telefoneCliente']; ?>"><br>
            Telefone 2: <input type="number" name="telefoneCCliente" value="<?php echo $dados['telefoneCCliente']; ?>"><br>
            <!-- Outros campos do formulário -->
            <input type="submit" value="Atualizar">
        </form>
        <?php
    } else {
        echo "Cliente não encontrado.";
    }
} else {
    echo "";
}
?>
