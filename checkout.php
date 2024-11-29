<?php
session_start();
include 'db/db_connection.php';


if (empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    
    $_SESSION['cart'] = [];
    header("Location: order_confirmation.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Checkout</h1>
    <form method="POST" action="">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label for="address">Dirección:</label>
        <input type="text" id="address" name="address" required>

        <label for="payment">Método de Pago:</label>
        <select id="payment" name="payment" required>
            <option value="credit_card">Tarjeta de Crédito</option>
            <option value="paypal">PayPal</option>
        </select>

        <h3>Total: $<?php echo number_format($total, 2); ?></h3> 

        <button type="submit">Realizar Pedido</button>
    </form>
    <a href="cart.php">Volver al Carrito</a>
</body>
</html>