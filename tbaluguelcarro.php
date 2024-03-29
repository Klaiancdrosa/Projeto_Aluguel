<?php
include_once 'conexao.php';

$dataSaida = $_POST['dataSaida'];
$idCliente = $_POST['idCliente'];
$idFuncionario = $_POST['idFuncionario'];
$idCarro = $_POST['idCarro'];
$carroModelo = $_POST['carroModelo'];
$carroAno = $_POST['carroAno'];
$diariaAluguel = $_POST['diariaAluguel'];
$dataEntrega = $_POST['dataEntrega'];
$valorTotal = $_POST['valorTotal'];

$query = "INSERT INTO tbaluguelcarro (dataSaida, idCliente, idFuncionario, idCarro, carroModelo, carroAno,
 diariaAluguel, dataEntrega, valorTotal) VALUES ('$dataSaida', '$idCliente', '$idFuncionario',
  '$idCarro', '$carroModelo', '$carroAno', '$diariaAluguel', '$dataEntrega', '$valorTotal')";
$resultado = mysqli_query($conn, $query);

if ($resultado) {
    echo "Aluguel cadastrado com sucesso no sistema!";
    header("Location: administrador.php?tabela=tabela4");
} else {
    echo "Erro ao cadastrar o Aluguel: " . mysqli_error($conn);
}
?>