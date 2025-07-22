<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Criar Plano</title></head>
<body>
    <h2>Criar Plano</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do plano" required>
        <select name="categoria_id" required>
            <option value="">Escolha uma categoria</option>
            <?php
            $res = $conn->query("SELECT * FROM categorias");
            while($cat = $res->fetch_assoc()) {
                echo "<option value='{$cat['id']}'>{$cat['nome']}</option>";
            }
            ?>
        </select>
        <select name="status">
            <option value="em_progresso">Em Progresso</option>
            <option value="ativo">Ativo</option>
            <option value="cancelado">Cancelado</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoria_id = $_POST['categoria_id'];
    $status = $_POST['status'];
    $conn->query("INSERT INTO planos (nome, categoria_id, status) VALUES ('$nome', $categoria_id, '$status')");
    echo "Plano criado com sucesso!";
}
?>