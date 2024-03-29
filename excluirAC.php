<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM tbaluguelcarro WHERE idAluguelCarro='$id'";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "<script> alert('Aluguel do sistema, excluído com sucesso!')</script>";
    echo "<script> location.href='administrador.php?tabela=tabela4' </script>";
} else {
    echo "Ocorreu algum erro ao excluir o aluguel do sistema!";
}
?>