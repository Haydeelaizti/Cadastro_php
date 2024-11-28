<?php
// Inclui o arquivo de configuração do banco
include('config.php');

// Verifica se foi recebido um ID via GET
if (!isset($_GET['id'])) {
    header('Location: index.php?msg=' . urlencode('Erro: ID do produto não fornecido.'));
    close_and_exit($db);
}

$id = $_GET['id'];

// Prepara e executa a query para deletar o produto
$queryDeletar = "DELETE FROM produtos WHERE id = $id";

if (mysqli_query($db, $queryDeletar)) {
    header('Location: index.php?msg=' . urlencode('Produto excluído com sucesso!'));
} else {
    header('Location: index.php?msg=' . urlencode('Erro ao excluir produto: ' . mysqli_error($db)));
}

close_and_exit($db);
?>
