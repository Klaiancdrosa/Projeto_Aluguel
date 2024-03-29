<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM tbcliente WHERE idCliente='$id'";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "<script> alert('Usuário da tabela Cliente excluído com sucesso!')</script>";
    echo "<script> location.href='administrador.php' </script>";
} else {
    echo "Ocorreu algum erro ao excluir o usuário da tabela Cliente!";
}
?>