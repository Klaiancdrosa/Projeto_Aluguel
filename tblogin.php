<?php
include_once 'conexao.php';

$idLogin = $_POST['idLogin'];
$nomeLogin = $_POST['nomeLogin'];
$senhaLogin = $_POST['senhaLogin'];


$query = "INSERT INTO tblogin (idLogin, nomeLogin, senhaLogin) VALUES ('$idLogin', '$nomeLogin', '$senhaLogin')";
$resultado = mysqli_query($conn, $query);

if ($resultado) {
    echo "Login criado com sucesso!";
    header("Location: administrador.php?tabela=tabela2");
} else {
    echo "<script> alert('Registro Atualizado com Sucesso!')</script>". mysqli_error($conn);
    echo "<script> location.href='criarLogin.php' </script>";
}
?>