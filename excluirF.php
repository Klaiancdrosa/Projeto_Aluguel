<?php
include("conexao.php");

$id = $_GET['id'];

$sql1 = "DELETE FROM tbfuncionario WHERE idFuncionario='$id'";
$sql2 = "DELETE FROM tblogin WHERE idLogin='$id'";

$resultado1 = mysqli_query($conn, $sql1);
$resultado2 = mysqli_query($conn, $sql2);

if ($resultado1 && $resultado2) {
    echo "<script> alert('Usuário da tabela Funcionario excluído com sucesso!')</script>";
    echo "<script> location.href='administrador.php?tabela=tabela2' </script>";
} else {
    echo "<script> alert('Ocorreu um erro ao excluir o usuário da tabela!')</script>";
    echo "<script> location.href='administrador.php?tabela=tabela2' </script>";   
}
?>