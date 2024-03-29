<?php
include_once 'conexao.php';

$idCarro = $_POST['idCarro'];
$marcaCarro = $_POST['marcaCarro'];
$modeloCarro = $_POST['modeloCarro'];
$anoCarro = $_POST['anoCarro'];
$valorDiariaAluguel = $_POST['valorDiariaAluguel'];


$query = "INSERT INTO tbcarro (idCarro, marcaCarro, modeloCarro, anoCarro, valorDiariaAluguel) VALUES ('$idCarro', '$marcaCarro', '$modeloCarro', $anoCarro, $valorDiariaAluguel)";
$resultado = mysqli_query($conn, $query);

if ($resultado) {
    echo "Veículo cadastrado com sucesso!";
    header("Location: administrador.php");
} else {
    echo "Erro ao cadastrar Veículo: " . mysqli_error($conn);
}
?>
