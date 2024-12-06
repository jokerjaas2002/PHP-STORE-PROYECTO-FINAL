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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/all.min.css">
    <title>Carrito de Compras - KakaoTrendy</title>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="logo.jpeg" alt="logo">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="products.php">Productos</a></li>
            <li><a href="cart.php" title="Carrito"><i class="fas fa-shopping-cart" style="color: #f5ebfa;"></i></a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
            
        </ul>
    </nav>
</header>
    <main>
    <h2>Productos en el Carrito</h2>
    <ul class="cart-items">
        <?php if (empty($_SESSION['cart'])): ?>
            <li>No hay productos en el carrito.</li>
        <?php else: ?>
            <?php $totalPrice = 0; ?>
            <?php foreach ($_SESSION['cart'] as $productId => $item): ?>
                <li class="cart-item">
                    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Imagen del producto" style="width: 50px; height: 50px;">
                    <span>Producto ID: <?php echo htmlspecialchars($productId); ?></span>
                    <span>- Cantidad: <?php echo htmlspecialchars($item['quantity']); ?></span>
                    <span>- Precio: <?php echo htmlspecialchars($item['price']); ?>$</span>
                    <span>- Subtotal: <?php echo htmlspecialchars($item['price'] * $item['quantity']); ?>$</span>
                    <?php $totalPrice += $item['price'] * $item['quantity']; ?>
                    <form action="cart.php" method="POST" class="remove-form" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                        <button type="submit" name="remove_from_cart" class="remove-button">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <?php if (!empty($_SESSION['cart'])): ?>
        <div class="total-price">
            <strong>Total a Pagar: <?php echo htmlspecialchars($totalPrice); ?>$</strong>
        </div>
    <?php endif; ?>
    <div class="checkout">
        <a href="checkout.php" class="checkout-button">Proceder al Checkout</a>
    </div>
</main>
    <footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>