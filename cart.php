<?php
session_start();
include 'db/db_connection.php';


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!in_array($id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $id;
    }
}


$cartProducts = [];
$total = 0; 
if (!empty($_SESSION['cart'])) {
    $placeholders = implode(',', array_fill(0, count($_SESSION['cart']), '?'));
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($_SESSION['cart']);
    $cartProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    foreach ($cartProducts as $product) {
        $total += $product['price'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Carrito de Compras</h1>
    <div class="cart-list">
        <?php if (empty($cartProducts)): ?>
            <p>Tu carrito está vacío.</p>
        <?php else: ?>
            <?php foreach ($cartProducts as $product): ?>
                <div class="cart-item">
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <p>Precio: $<?php echo htmlspecialchars($product['price']); ?></p>
                </div>
            <?php endforeach; ?>
            <h3>Total: $<?php echo number_format($total, 2); ?></h3> 
        <?php endif; ?>
    </div>
    <a href="index.php">Volver a la Tienda</a>
    <a href="checkout.php">Proceder al Pago</a>
</body>
</html>