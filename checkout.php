<?php
session_start(); 
include 'db/db_connection.php'; 


if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit;
}


$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Checkout</title>
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
        <section id="checkout">
            <h2>Checkout</h2>
            <form action="process_order.php" method="post">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="address">Dirección:</label>
                <input type="text" id="address" name="address"><br><br>
                <input type="submit" value="Realizar Pedido">
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>