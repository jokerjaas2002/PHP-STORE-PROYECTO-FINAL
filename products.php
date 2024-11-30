<?php
session_start(); 
include 'db/db_connection.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Productos</title>
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
        <section id="products">
            <h2>Productos Disponibles</h2>
            <div class="product-list">
                <?php
                $sql = "SELECT * FROM products"; 
                $result = $conn->query($sql);
                $products = [];
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $products[] = $row;
                    }
                }
                
                $totalProducts = count($products);
                $productsPerSection = ceil($totalProducts / 10);
                
                for ($i = 0; $i < 10; $i++) {
                    echo "<div class='product-section'>";
                    echo "<h3>Sección " . ($i + 1) . "</h3>";
                    echo "<div class='product-container'>"; // Contenedor para los productos
                    for ($j = 0; $j < $productsPerSection; $j++) {
                        $index = $i * $productsPerSection + $j;
                        if ($index < $totalProducts) {
                            $product = $products[$index];
                            echo "<div class='product'>";
                            echo "<img src='images/" . htmlspecialchars($product["image"]) . "' alt='" . htmlspecialchars($product["name"]) . "'>";
                            echo "<h4>" . htmlspecialchars($product["name"]) . "</h4>";
                            echo "<p>Precio: $" . htmlspecialchars($product["price"]) . "</p>";
                            echo "<a href='product.php?id=" . htmlspecialchars($product["id"]) . "'>Ver Detalles</a>";
                            echo "<a href='cart.php?id=" . htmlspecialchars($product["id"]) . "'>Agregar al Carrito</a>";
                            echo "</div>";
                        }
                    }
                    echo "</div>"; // Cierre del contenedor de productos
                    echo "</div>"; // Cierre de la sección
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>