<?php
// Inclui arquivo de configuração do banco
include('config.php');

// Verifica se recebeu os dados via POST
if (!isset($_POST['id']) || !isset($_POST['nome']) || !isset($_POST['codigo']) || !isset($_POST['preco']) || !isset($_POST['estoque'])) {
    header('Location: index.php?msg=' . urlencode('Erro: Dados incompletos.'));
    close_and_exit($db);
}

// Obtém os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

// Prepara e executa a query para atualizar o produto
$query = "UPDATE produtos SET
            nome = '$nome',
            codigo = '$codigo',
            preco = $preco,
            estoque = $estoque
          WHERE id = $id";

if (mysqli_query($db, $query)) {
    header('Location: index.php?msg=' . urlencode('Produto atualizado com sucesso!'));
} else {
    header('Location: index.php?msg=' . urlencode('Erro ao atualizar produto: ' . mysqli_error($db)));
}

// Fecha a conexão com o banco
close_and_exit($db);
?>
