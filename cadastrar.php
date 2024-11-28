<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="crieconta.css" />
    <title>Cadastro de Produtos</title>
  </head>

  <body>
    <form method="POST" action="inserir.php" class="container_cadastro">
      <h2>Cadastro de Produtos</h2>

      <div class="form-group">
        <label for="nome" class="cadastro">Nome do Produto: </label>
        <br />
        <input type="text" id="nome" name="nome" required />
      </div>

      <div class="form-group">
        <label for="codigo" class="cadastro">Código do Produto: </label>
        <br />
        <input type="text" id="codigo" name="codigo" required />
      </div>

      <div class="form-group">
        <label for="preco" class="cadastro">Preço: </label>
        <br />
        <input type="number" id="preco" name="preco" step="0.01" min="0" required />
      </div>

      <div class="form-group">
        <label for="estoque" class="cadastro">Quantidade em Estoque: </label>
        <br />
        <input type="number" id="estoque" name="estoque" min="0" required />
      </div>

      <button type="submit" class="submit-btn">Cadastrar</button>
    </form>
  </body>
</html>
