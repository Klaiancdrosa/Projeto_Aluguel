<?php
include_once 'conexao.php';

$idCliente = $_POST['idCliente'];
$nomeCliente = $_POST['nomeCliente'];
$enderecoCliente = $_POST['enderecoCliente'];
$cidadeCliente = $_POST['cidadeCliente'];
$bairroCliente = $_POST['bairroCliente'];
$estadoCliente = $_POST['estadoCliente'];
$cepCliente = $_POST['cepCliente'];
$telefoneCliente = $_POST['telefoneCliente'];
$telefoneCCliente = $_POST['telefoneCCliente'];

$query = "INSERT INTO tbcliente (idCliente, nomeCliente, enderecoCliente, cidadeCliente, bairroCliente, estadoCliente, cepCliente, telefoneCliente, telefoneCCliente) VALUES ('$idCliente', '$nomeCliente', '$enderecoCliente', '$cidadeCliente', '$bairroCliente', '$estadoCliente', '$cepCliente', '$telefoneCliente', '$telefoneCCliente')";
$resultado = mysqli_query($conn, $query);

if ($resultado) {
    echo '<script>alert("Cliente Cadastrado com Sucesso!")</script>';
    header("Location: administrador.php");
} else {
    echo "Erro ao cadastrar o Cliente: " . mysqli_error($conn);
}
?>
