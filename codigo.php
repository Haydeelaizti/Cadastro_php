<?php
// Ativa a exibição de erros para facilitar o desenvolvimento
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclui o arquivo de configuração do banco
include('config.php');

// Cria a conexão com o banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $dataNascimento = $_POST['dataNascimento'] ?? '';

    // Valida se os campos estão preenchidos
    if (empty($nome) || empty($email) || empty($senha) || empty($dataNascimento)) {
        die("Erro: Todos os campos são obrigatórios.");
    }

    // Criptografa a senha para armazenamento seguro
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara a consulta SQL para inserir os dados no banco
    $queryInserir = "INSERT INTO usuarios (nome, email, senha, data_nascimento) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($queryInserir);
    $stmt->bind_param("ssss", $nome, $email, $senhaCriptografada, $dataNascimento);

    // Executa a consulta e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao salvar no banco: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

// Fecha a conexão com o banco de dados
$conexao->close();
