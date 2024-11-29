<?php
session_start();
include 'db/db_connection.php';


$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="path/to/your/logo.png" alt="Logo de la Tienda" />
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="cart.php">Carrito</a></li>
                <li><a href="checkout.php">Checkout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Bienvenido a Nuestra Tienda</h1>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <img src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" />
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <p>Precio: $<?php echo htmlspecialchars($product['price']); ?></p>
                    <a href="cart.php?id=<?php echo $product['id']; ?>">Agregar al Carrito</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Tu Tienda. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
