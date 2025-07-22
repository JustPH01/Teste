<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Gerenciar Planos</title></head>
<body>
    <h2>Planos</h2>

    <form method="GET">
        <label>Filtrar por status:</label>
        <select name="filtro">
            <option value="">Todos</option>
            <option value="ativo">Ativo</option>
            <option value="cancelado">Cancelado</option>
            <option value="em_progresso">Em Progresso</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <ul>
    <?php
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';
    $sql = "SELECT planos.*, categorias.nome AS categoria FROM planos 
            LEFT JOIN categorias ON planos.categoria_id = categorias.id";

    if ($filtro) {
        $sql .= " WHERE planos.status = '$filtro'";
    }

    $res = $conn->query($sql);
    while ($plano = $res->fetch_assoc()) {
        echo "<li><strong>{$plano['nome']}</strong> ({$plano['categoria']}) - Status: {$plano['status']}</li>";
    }
    ?>
    </ul>
    <a href="index.php">Voltar</a>
</body>
</html>