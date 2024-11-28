<?php
// Inclui o arquivo de configuração do banco
include('config.php');

// Verifica se foi recebido um ID via GET
if (!isset($_GET['id'])) {
    header('Location: index.php?msg=' . urlencode('Erro: ID do produto não fornecido.'));
    close_and_exit($db);
}

$id = $_GET['id'];

// Busca os dados do produto
$query = "SELECT * FROM produtos WHERE id = $id";
$resultado = mysqli_query($db, $query);

if (!$resultado || mysqli_num_rows($resultado) == 0) {
    header('Location: index.php?msg=' . urlencode('Erro: Produto não encontrado.'));
    close_and_exit($db);
}

// Obtém os dados do produto
$produto = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crieconta.css">
    <title>Editar Produto</title>
</head>
<body>
    <?php include('formulario.php'); ?>
</body>
</html>

<?php
close_and_exit($db);
?>
