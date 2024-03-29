
<?php
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $idAluguelCarro = $_POST['idAluguelCarro'];
    $dataSaida = $_POST['dataSaida'];
    $idCliente = $_POST['idCliente'];
    $idFuncionario = $_POST['idFuncionario'];
    $idCarro = $_POST['idCarro'];
    $carroModelo = $_POST['carroModelo'];
    $carroAno = $_POST['carroAno'];
    $diariaAluguel = $_POST['diariaAluguel'];
    $dataEntrega = $_POST['dataEntrega'];
    $valorTotal = $_POST['valorTotal'];

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (empty($dataSaida) || empty($idCliente) || empty($idFuncionario) || empty($idCarro) || empty($carroModelo)
     || empty($carroAno) || empty($diariaAluguel) || empty($dataEntrega) || empty($valorTotal)) {
        echo "<script> alert('Por favor, preencha todos os campos obrigatórios.')</script>";
        echo "<script> location.href='editarAC.php?id=$idAluguelCarro' </script>";
    } else {
    // SQL de atualização
    $sql = "UPDATE tbaluguelcarro SET 
            dataSaida='$dataSaida', 
            idCliente='$idCliente', 
            idFuncionario='$idFuncionario', 
            idCarro='$idCarro', 
            carroModelo='$carroModelo', 
            carroAno='$carroAno', 
            diariaAluguel='$diariaAluguel', 
            dataEntrega='$dataEntrega', 
            valorTotal='$valorTotal'
            WHERE idAluguelCarro='$idAluguelCarro'";

    // Executa a consulta de atualização
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Registro Atualizado com Sucesso!')</script>";
        echo "<script> location.href='administrador.php?tabela=tabela4' </script>";
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
    $sql = "SELECT * FROM tbaluguelcarro WHERE idAluguelCarro='$id'";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se o cliente existe
    if (mysqli_num_rows($resultado) > 0) {
        // Exibe o formulário de edição com os dados preenchidos
        $dados = mysqli_fetch_assoc($resultado);
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="idAluguelCarro" value="<?php echo $dados['idAluguelCarro']; ?>">
            Data de Saída: <input type="number" name="dataSaida" value="<?php echo $dados['dataSaida']; ?>"><br>
            CPF do Cliente: <input type="number" name="idCliente" value="<?php echo $dados['idCliente']; ?>"><br>
            NºFuncionario: <input type="number" name="idFuncionario" value="<?php echo $dados['idFuncionario']; ?>"><br>
            Placa do Carro: <input type="number" name="idCarro" value="<?php echo $dados['idCarro']; ?>"><br>
            Modelo do Carro: <input type="text" name="carroModelo" value="<?php echo $dados['carroModelo']; ?>"><br>
            Ano do Carro: <input type="number" name="carroAno" value="<?php echo $dados['carroAno']; ?>"><br>
            Aluguel da Diária:<input type="number" name="diariaAluguel" value="<?php echo $dados['diariaAluguel']; ?>"><br>
            Data de Entrega: <input type="number" name="dataEntrega" value="<?php echo $dados['dataEntrega']; ?>"><br>
            Valor Total: <input type="number" name="valorTotal" value="<?php echo $dados['valorTotal']; ?>"><br>
            <!-- Outros campos do formulário -->
            <input type="submit" value="Atualizar">
        </form>
        <?php
    } else {
        echo "Aluguel não encontrado.";
    }
} else {
    echo "";
}
?>
