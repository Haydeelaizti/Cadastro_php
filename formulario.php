<?php
// Verifica se é uma edição (produto fornecido)
$editando = isset($produto);
?>

<div class="container_cadastro">
    <h2><?php echo $editando ? 'Editar' : 'Cadastrar'; ?> Produto</h2>

    <form action="<?php echo $editando ? 'atualizar.php' : 'salvar.php'; ?>" method="POST">
        <?php if($editando): ?>
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <?php endif; ?>

        <div class="cadastro">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required
                value="<?php echo $editando ? $produto['nome'] : ''; ?>">
        </div>

        <div class="cadastro">
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" required
                value="<?php echo $editando ? $produto['codigo'] : ''; ?>">
        </div>

        <div class="cadastro">
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required
                value="<?php echo $editando ? $produto['preco'] : ''; ?>">
        </div>

        <div class="cadastro">
            <label for="estoque">Quantidade em Estoque:</label>
            <input type="number" id="estoque" name="estoque" required
                value="<?php echo $editando ? $produto['estoque'] : ''; ?>">
        </div>

        <button type="submit" class="submit-btn">
            <?php echo $editando ? 'Atualizar' : 'Cadastrar'; ?> Produto
        </button>
    </form>

    <a href="index.php">
        <button type="button" class="submit-btn" style="margin-top: 10px; background-color: #6c757d;">
            Voltar
        </button>
    </a>
</div>
