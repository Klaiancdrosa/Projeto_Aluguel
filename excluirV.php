<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM tbcarro WHERE idCarro='$id'";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "<script> alert('Carro excluído com sucesso!')</script>";
    echo "<script> location.href='administrador.php?tabela=tabela3' </script>";
} else {
    echo "Ocorreu algum erro ao excluir o Carro da Tabela!";
}
?>