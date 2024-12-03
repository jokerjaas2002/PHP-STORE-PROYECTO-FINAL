<?php
session_start(); 
include 'db/db_connection.php'; 


if (!isset($_GET['order_id'])) {
    header('Location: index.php'); 
    exit;
}

$order_id = intval($_GET['order_id']);


$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

if (!$order) {
    echo "No se encontró la orden.";
    exit;
}


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
    <link rel="stylesheet" href="styles.css">
    <title>Confirmación de Pedido</title>
</head>
<body>
    <header>
        <h1>KakaoTrendy</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="products.php">Productos</a></li>
                <li><a href="cart.php">Carrito</a></li>
                <li><a href="checkout.php">Checkout</a></li>
                <li><a href="#about">Sobre Nosotros</a></li>
                <li><a href="#contact">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="order-confirmation">
            <h2>Confirmación de Pedido</h2>
            <p>Gracias por tu compra, <?php echo htmlspecialchars($order['customer_name']); ?>!</p>
            <p>Tu pedido ha sido procesado con éxito. Aquí están los detalles de tu pedido:</p>
            <p><strong>ID de Pedido:</strong> <?php echo $order_id; ?></p>
            <p><strong>Total:</strong> $<?php echo number_format($order['total_amount'], 2); ?></p>
            <h3>Productos en tu pedido:</h3>
            <ul>
                <?php while ($item = $result_items->fetch_assoc()): ?>
                    <li>
                        Producto ID: <?php echo $item['product_id']; ?> - 
                        Cantidad: <?php echo $item['quantity']; ?> - 
                        Precio: $<?php echo number_format($item['price'], 2); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <p><a href="index.php">Volver a la tienda</a></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

<?php
$stmt_items->close();
$stmt->close();
$conn->close();
?>