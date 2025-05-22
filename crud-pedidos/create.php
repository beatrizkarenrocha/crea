<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $data_pedido = $_POST['data_pedido'];

    $stmt = $conn->prepare("INSERT INTO pedidos (cliente, produto, quantidade, data_pedido) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $cliente, $produto, $quantidade, $data_pedido);
    $stmt->execute();

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Novo Pedido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Novo Pedido</h1>
    <form method="POST">
        <label>Cliente:</label><input type="text" name="cliente" required><br>
        <label>Produto:</label><input type="text" name="produto" required><br>
        <label>Quantidade:</label><input type="number" name="quantidade" required><br>
        <label>Data do Pedido:</label><input type="date" name="data_pedido" required><br>
        <input type="submit" value="Salvar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
