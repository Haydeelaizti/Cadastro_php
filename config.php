<?php
// Ativa a exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dados_doceria';
$port = 3306;

// Cria a conexão com o banco de dados
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $port);

// Verifica a conexão
if ($db->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

function close_and_exit($db) {
  $db->close();
  exit;
}

?>
