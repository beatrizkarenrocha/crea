<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pedidos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Pedidos</h1>
    <a href="create.php" class="btn">Novo Pedido</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM pedidos");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['cliente'] ?></td>
            <td><?= $row['produto'] ?></td>
            <td><?= $row['quantidade'] ?></td>
            <td><?= $row['data_pedido'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Editar</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
