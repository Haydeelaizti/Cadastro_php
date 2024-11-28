<?php
// Inclui o arquivo de configuração do banco
include('config.php');

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $estoque = $_POST['estoque'] ?? '';

    // Valida se os campos estão preenchidos
    if (empty($nome) || empty($codigo) || empty($preco) || empty($estoque)) {
        header('Location: index.php?msg=' . urlencode('Erro: Todos os campos são obrigatórios.'));
        close_and_exit($db);
    }

    // Prepara a consulta SQL para inserir os dados do produto no banco
    $queryInserir = "INSERT INTO produtos (nome, codigo, preco, estoque) VALUES ('$nome', '$codigo', '$preco', '$estoque')";
    if(mysqli_query($db, $queryInserir)) {
        header('Location: index.php?msg=' . urlencode('Produto cadastrado com sucesso!'));
    } else {
        header('Location: cadastrar.php?msg=' . urlencode('Erro ao cadastrar produto: ' . mysqli_error($db)));
    }
    close_and_exit($db);
}
