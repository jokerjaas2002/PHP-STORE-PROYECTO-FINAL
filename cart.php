<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Función para agregar productos al carrito
function addToCart($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Función para eliminar productos del carrito
function removeFromCart($productId) {
    unset($_SESSION['cart'][$productId]);
}

// Manejar el envío del formulario
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

// Mostrar el carrito
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Carrito de Compras</title>
</head>
<body>
    <header>
        <h1>Carrito de Compras</h1>
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