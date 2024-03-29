<?php
include_once 'conexao.php';

$idFuncionario = $_POST['idFuncionario'];
$nomeFuncionario = $_POST['nomeFuncionario'];
$enderecoFuncionario = $_POST['enderecoFuncionario'];
$cidadeFuncionario = $_POST['cidadeFuncionario'];
$bairroFuncionario = $_POST['bairroFuncionario'];
$estadoFuncionario = $_POST['estadoFuncionario'];
$cepFuncionario = $_POST['cepFuncionario'];
$telefoneFuncionario = $_POST['telefoneFuncionario'];
$telefoneFFuncionario = $_POST['telefoneFFuncionario'];

$query = "INSERT INTO tbfuncionario (idFuncionario, nomeFuncionario, enderecoFuncionario, cidadeFuncionario, bairroFuncionario, estadoFuncionario, cepFuncionario, telefoneFuncionario, telefoneFFuncionario) VALUES ('$idFuncionario', '$nomeFuncionario', '$enderecoFuncionario', '$cidadeFuncionario', '$bairroFuncionario', '$estadoFuncionario', '$cepFuncionario', '$telefoneFuncionario', '$telefoneFFuncionario')";
$resultado = mysqli_query($conn, $query);

if ($resultado) {
    echo "Funcionario cadastrado com sucesso!";
    header("Location: administrador.php?tabela=tabela2");
} else {
    echo "Erro ao cadastrar o Funcionario: " . mysqli_error($conn);
}
?>
