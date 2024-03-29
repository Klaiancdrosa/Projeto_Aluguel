<?php
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $idCarro = $_POST['idCarro'];
    $marcaCarro = $_POST['marcaCarro'];
    $modeloCarro = $_POST['modeloCarro'];
    $anoCarro = $_POST['anoCarro'];
    $valorDiariaAluguel = $_POST['valorDiariaAluguel'];

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (empty($marcaCarro) || empty($modeloCarro) || empty($anoCarro) || empty($valorDiariaAluguel)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        echo "<script> location.href='editarV.php?id=$idCarro' </script>";
    } else {
        // SQL de atualização
        $sql = "UPDATE tbcarro SET 
                marcaCarro='$marcaCarro', 
                modeloCarro='$modeloCarro', 
                anoCarro='$anoCarro', 
                valorDiariaAluguel='$valorDiariaAluguel' 
                WHERE idCarro='$idCarro'";

        // Executa a consulta de atualização
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Registro Atualizado com Sucesso!')</script>";
            echo "<script> location.href='administrador.php?tabela=tabela3' </script>";
        } else {
            echo "Erro ao atualizar o registro: " . mysqli_error($conn);
        }
    }
}

// Verifica se o ID do carro está definido na URL
if (isset($_GET['id'])) {
    // Recupera o ID do carro da URL
    $id = $_GET['id'];

    // Consulta para recuperar os dados do carro
    $sql = "SELECT * FROM tbcarro WHERE idCarro='$id'";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se o carro existe
    if (mysqli_num_rows($resultado) > 0) {
        // Exibe o formulário de edição com os dados preenchidos
        $dados = mysqli_fetch_assoc($resultado);
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="idCarro" value="<?php echo $dados['idCarro']; ?>">
            Marca: <input type="text" name="marcaCarro" value="<?php echo $dados['marcaCarro']; ?>"><br>
            Modelo: <input type="text" name="modeloCarro" value="<?php echo $dados['modeloCarro']; ?>"><br>
            Ano: <input type="text" name="anoCarro" value="<?php echo $dados['anoCarro']; ?>"><br>
            Valor da Diária de Aluguel: <input type="text" name="valorDiariaAluguel" value="<?php echo $dados['valorDiariaAluguel']; ?>"><br>
            <!-- Outros campos do formulário -->
            <input type="submit" value="Atualizar">
        </form>
        <?php
    } else {
        echo "Carro não encontrado.";
    }
} else {
    echo "";
}
?>
