<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $data_pedido = $_POST['data_pedido'];

    $stmt = $conn->prepare("UPDATE pedidos SET cliente=?, produto=?, quantidade=?, data_pedido=? WHERE id=?");
    $stmt->bind_param("ssisi", $cliente, $produto, $quantidade, $data_pedido, $id);
    $stmt->execute();

    header("Location: index.php");
}

$result = $conn->query("SELECT * FROM pedidos WHERE id = $id");
$pedido = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Pedido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Pedido</h1>
    <form method="POST">
        <label>Cliente:</label><input type="text" name="cliente" value="<?= $pedido['cliente'] ?>" required><br>
        <label>Produto:</label><input type="text" name="produto" value="<?= $pedido['produto'] ?>" required><br>
        <label>Quantidade:</label><input type="number" name="quantidade" value="<?= $pedido['quantidade'] ?>" required><br>
        <label>Data:</label><input type="date" name="data_pedido" value="<?= $pedido['data_pedido'] ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
