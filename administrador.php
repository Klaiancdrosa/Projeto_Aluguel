<?php
session_start();

include("conexao.php");

if (!isset($_SESSION['logged_in'])) {
    header("Location: pInicial.php");
    exit();
}
$token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
$query_tables = "SHOW TABLES";
$resultado = mysqli_query($conn, $query_tables);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/administrador.css">
    <title>Cadastros</title>
</head>

<body>
    <div>
        <div class="container-titulo">
            <h1>Página de Cadastros</h1>
        </div>
        <div class="container-acoes">
            <div class="container-links">
                <a class="link-cadastro" href="CadastroCli.html">Cadastrar Cliente</a>
                <a class="link-cadastro" href="CadastroFun.html">Cadastrar Funcionario</a>
                <a class="link-cadastro" href="CadastroVei.html">Cadastrar Veiculo</a>
                <a class="link-cadastro" href="CadastroAC.html">Cadastrar Contrato de Diária</a>
            </div>
            <div class="container-sair">
            <a class="link-sair" href="logout.php?token=<?php echo $token; ?>">Logout</a>
            </div>
        </div>

<a class="link-tabela ativo" href="?tabela=tabela1">Clientes</a>

<a class="link-tabela" href="?tabela=tabela2">Funcionários</a>

<a class="link-tabela" href="?tabela=tabela3">Carros</a>

<a class="link-tabela" href="?tabela=tabela4">Aluguéis Ativos</a>

<?php
$tabela = isset($_GET['tabela']) ? $_GET['tabela'] : 'tabela1';

    if ($tabela == 'tabela1') {
        $query_data = "SELECT * FROM tbcliente";
    } elseif ($tabela == 'tabela2') {
        $query_data = "SELECT * FROM tbfuncionario";
    } elseif ($tabela == 'tabela3') {
        $query_data = "SELECT * FROM tbcarro";
    } elseif ($tabela == 'tabela4') {
        $query_data = "SELECT * FROM tbaluguelcarro";
    } else {
        echo "Tabela não encontrada.";
        exit;
    }

    $resultado = mysqli_query($conn, $query_data);
    if ($tabela == 'tabela1') {
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table class='tabela'>";
            echo "<tr>";
            echo "<th>CPF</th>";
            echo "<th>Nome</th>";
            echo "<th>Endereço</th>";
            echo "<th>Cidade</th>";
            echo "<th>Bairro</th>";
            echo "<th>Estado</th>";
            echo "<th>CEP</th>";
            echo "<th>Telefone 1</th>";
            echo "<th>Telefone 2</th>";
            echo "<th colspan='3'>Ações</th>";
            echo "</tr>";
            while ($dados = $resultado->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $dados->idCliente . "</td>";
                echo "<td>" . $dados->nomeCliente . "</td>";
                echo "<td>" . $dados->enderecoCliente . "</td>";
                echo "<td>" . $dados->cidadeCliente . "</td>";
                echo "<td>" . $dados->bairroCliente . "</td>";
                echo "<td>" . $dados->estadoCliente . "</td>";
                echo "<td>" . $dados->cepCliente . "</td>";
                echo "<td>" . $dados->telefoneCliente . "</td>";
                echo "<td>" . $dados->telefoneCCliente . "</td>";
                echo '<td> <a href="editarC.php?id=' . $dados->idCliente . '">Editar Cliente</a> </td>';
                echo "<td> <a class='link-excluir' href=excluirC.php?id=" . $dados->idCliente . ">Excluir</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }  else {
            echo "<p class='mensagem-aviso' >Não existem dados para exibir.</p>";
        }
    } if ($tabela == 'tabela2') {
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table class='tabela'>";
            echo "<tr>";
            echo "<th>NºCarteira de Trabalho</th>";
            echo "<th>Nome</th>";
            echo "<th>Endereço</th>";
            echo "<th>Cidade</th>";
            echo "<th>Bairro</th>";
            echo "<th>Estado</th>";
            echo "<th>CEP</th>";
            echo "<th>Telefone 1</th>";
            echo "<th>Telefone 2</th>";
            echo "<th colspan='3'>Ações</th>";
            echo "</tr>";
            while ($dados = $resultado->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $dados->idFuncionario . "</td>";
                echo "<td>" . $dados->nomeFuncionario . "</td>";
                echo "<td>" . $dados->enderecoFuncionario . "</td>";
                echo "<td>" . $dados->cidadeFuncionario . "</td>";
                echo "<td>" . $dados->bairroFuncionario . "</td>";
                echo "<td>" . $dados->estadoFuncionario . "</td>";
                echo "<td>" . $dados->cepFuncionario . "</td>";
                echo "<td>" . $dados->telefoneFuncionario . "</td>";
                echo "<td>" . $dados->telefoneFFuncionario . "</td>";
                echo "<td> <a class='link-editar' href=editarF.php?id=" . $dados->idFuncionario . ">Editar</a></td>";
                echo "<td> <a class='link-excluir' href=excluirF.php?id=" . $dados->idFuncionario . ">Excluir</a></td>";
                echo "<td> <a class='link-criar login' href=criarLogin.php?id=" . $dados->idFuncionario . ">Promover para Utilizador</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='mensagem-aviso' >Não existem dados para exibir.</p>";
        }
    } if ($tabela == 'tabela3') {
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table class='tabela'>";
            echo "<tr>";
            echo "<th>Placa do Carro</th>";
            echo "<th>Marca</th>";
            echo "<th>Modelo</th>";
            echo "<th>Ano</th>";
            echo "<th>Valor da Diária</th>";
            echo "<th colspan='3'>Ações</th>";
            echo "</tr>";
            while ($dados = $resultado->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $dados->idCarro . "</td>";
                echo "<td>" . $dados->marcaCarro . "</td>";
                echo "<td>" . $dados->modeloCarro . "</td>";
                echo "<td>" . $dados->anoCarro . "</td>";
                echo "<td>" . $dados->valorDiariaAluguel . "</td>";
                echo "<td> <a class='link-editar' href=editarV.php?id=" . $dados->idCarro . ">Editar</a></td>";
                echo "<td> <a class='link-excluir' href=excluirV.php?id=" . $dados->idCarro . ">Excluir</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }  else {
            echo "<p class='mensagem-aviso' >Não existem dados para exibir.</p>";
        }
    } if ($tabela == 'tabela4') {
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table class='tabela'>";
            echo "<tr>";
            echo "<th>Código do Carro</th>";
            echo "<th>Data de Saída</th>";
            echo "<th>CPF Cadastrado</th>";
            echo "<th>Funcionario Cadastrado</th>";
            echo "<th>Placa do Carro</th>";
            echo "<th>Modelo do Carro</th>";
            echo "<th>Ano de Fabricação</th>";
            echo "<th>Aluguel da Diária</th>";
            echo "<th>Data de Entrega</th>";
            echo "<th>Valor Total</th>";
            echo "<th colspan='3'>Ações</th>";
            echo "</tr>";
            while ($dados = $resultado->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $dados->idAluguelCarro . "</td>";
                echo "<td>" . $dados->dataSaida . "</td>";
                echo "<td>" . $dados->idCliente . "</td>";
                echo "<td>" . $dados->idFuncionario . "</td>";
                echo "<td>" . $dados->idCarro . "</td>";
                echo "<td>" . $dados->carroModelo . "</td>";
                echo "<td>" . $dados->carroAno . "</td>";
                echo "<td>" . $dados->diariaAluguel . "</td>";
                echo "<td>" . $dados->dataEntrega . "</td>";
                echo "<td>" . $dados->valorTotal . "</td>";
                echo "<td> <a class='link-editar' href=editarAC.php?id=" . $dados->idAluguelCarro . ">Editar</a></td>";
                echo "<td> <a class='link-excluir' href=excluirAC.php?id=" . $dados->idAluguelCarro . ">Excluir</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }  else {
            echo "<p class='mensagem-aviso'>Não existem dados para exibir.</p>";
        }
    }
?>
    </div>
</body>

</html>