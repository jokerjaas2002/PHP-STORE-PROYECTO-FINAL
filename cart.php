<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


function addToCart($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}


function removeFromCart($productId) {
    unset($_SESSION['cart'][$productId]);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        addToCart($productId, $quantity);
    } elseif (isset($_POST['remove_from_cart'])) {
        $productId = $_POST['product_id'];
        removeFromCart($productId);
    }
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Carrito de Compras - KakaoTrendy</title>
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
        <h2>Productos en el Carrito</h2>
        <ul>
            <?php if (empty($_SESSION['cart'])): ?>
                <li>No hay productos en el carrito.</li>
            <?php else: ?>
                <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
                    <li>
                        Producto ID: <?php echo htmlspecialchars($productId); ?> - Cantidad: <?php echo htmlspecialchars($quantity); ?>
                        <form action="cart.php" method="POST" style="display:inline;">
                            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                            <button type="submit" name="remove_from_cart">Eliminar</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <a href="checkout.php">Proceder al Checkout</a>
    </main>
    <footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>