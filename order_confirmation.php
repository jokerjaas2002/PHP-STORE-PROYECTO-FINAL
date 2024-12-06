<?php
session_start();
include 'db/db_connection.php';

if (!isset($_GET['order_id'])) {
    header('Location: index.php'); 
    exit;
}

$order_id = $_GET['order_id'];

$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Pedido no encontrado.";
    exit;
}

$order = $result->fetch_assoc();

$sql_items = "SELECT * FROM order_items WHERE order_id = ?";
$stmt_items = $conn->prepare($sql_items);
$stmt_items->bind_param("i", $order_id);
$stmt_items->execute();
$result_items = $stmt_items->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pedido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5ebfa;
        }
        h1, h2 {
            color: #653d79;
        }
        .table {
            background-color: #fff;
        }
        .table th {
            background-color: #653d79;
            color: #fff;
        }
        .btn-primary {
            background-color: #653d79;
            border-color: #653d79;
        }
        .btn-primary:hover {
            background-color: #5a2e6b;
            border-color: #5a2e6b;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gracias por tu compra!</h1>
        <h2 class="text-center">ID de Pedido: <?php echo $order['id']; ?></h2>
        <p><strong>Nombre del Cliente:</strong> <?php echo htmlspecialchars($order['customer_name']); ?></p>
        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($order['customer_phone']); ?></p>
        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($order['customer_address']); ?></p>
        <p><strong>Total:</strong> $<?php echo number_format($order['total_amount'], 2); ?></p>

        <h3>Detalles de los Artículos:</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $result_items->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['product_id']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>$<?php echo number_format($item['price'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Volver a la tienda</a>
        </div>
    </div>

    <?php
    $stmt_items->close();
    $stmt->close();
    $conn->close();
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>