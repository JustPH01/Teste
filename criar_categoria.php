<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Criar Categoria</title></head>
<body>
    <h2>Criar Categoria</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome da categoria" required>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $conn->query("INSERT INTO categorias (nome) VALUES ('$nome')");
    echo "Categoria criada com sucesso!";
}
?>