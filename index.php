<?php
// Inclui arquivo de configuração do banco
include('config.php');

// Consulta SQL para buscar todos os produtos
$query = "SELECT * FROM produtos";
$resultado = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crieconta.css">
    <title>Lista de Produtos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .container_lista {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .mensagem {
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #e8f5e9;
            border-radius: 4px;
        }
        .btn-cadastrar {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 4px;
            font-weight: bold;
        }
        .sem-produtos {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container_lista">
        <?php
        if(isset($_GET['msg'])) {
            echo '<div class="mensagem">' . htmlspecialchars($_GET['msg']) . '</div>';
        }
        ?>
        <h2>Lista de Produtos</h2>
        <a href="cadastrar.php" class="btn-cadastrar">Cadastrar Novo Produto</a>
        <?php
        if(mysqli_num_rows($resultado) == 0) {
            echo '<div class="sem-produtos">Não há produtos cadastrados no momento. Clique no botão acima para cadastrar um novo produto.</div>';
        } else {
        ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($produto = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $produto['nome'] . "</td>";
                    echo "<td>" . $produto['codigo'] . "</td>";
                    echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
                    echo "<td>" . $produto['estoque'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
        }
        ?>
    </div>
</body>
</html>

<?php
// Fecha a conexão com o banco
$db->close();
?>
