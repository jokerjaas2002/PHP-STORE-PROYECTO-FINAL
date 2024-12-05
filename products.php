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
    <div class="logo-container">
        <img src="logo.jpeg" alt="logo">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="products.php">Productos</a></li>
            <li><a href="cart.php">Carrito</a></li>
            
            <li><a href="nosotros.php">Nosotros</a></li>
            
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
                    while ($row = $result->fetch_assoc()) {
                        $products[] = $row;
                    }
                }
                
                $totalProducts = count($products);
                $productsPerSection = ceil($totalProducts / 10);
                
                
                $sectionNames = [
                    "Vestidos",
                    "Pantalones y Jeans",
                    "Bragas",
                    "Trajes de Baños",
                    "Chaquetas y Suéteres",
                    "Shorts y Faldas",
                    "Blusas y Tops",
                    "Accesorios",
                    "Pijamas y Lencería",
                    "Ropa Deportiva"
                ];
                
                for ($i = 0; $i < 10; $i++) {
                    echo "<div class='product-section'>";
                    
                    echo "<h3>" . $sectionNames[$i] . "</h3>";
                    echo "<div class='product-container'>";
                    for ($j = 0; $j < $productsPerSection; $j++) {
                        $index = $i * $productsPerSection + $j;
                        if ($index < $totalProducts) {
                            $product = $products[$index];
                            echo "<div class='product'>";
                            echo "<img src='" . htmlspecialchars($product["image"]) . "' alt='" . htmlspecialchars($product["name"]) . "'>";
                            echo "<h4>" . htmlspecialchars($product["name"]) . "</h4>";
                            echo "<p>Precio: $" . htmlspecialchars($product["price"]) . "</p>";
                            echo "<form action='add_to_cart.php' method='POST'>";
                            echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($product["id"]) . "'>";
                            echo "<input type='number' name='quantity' value='1' min='1' max='10'>";
                            echo "<button type='submit'>Agregar al Carrito</button>";
                            echo "</form>";
                            echo "<a href='product.php?id=" . htmlspecialchars($product["id"]) . "'>Ver Detalles</a>";
                            echo "</div>";
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                }
                
                echo "<div class='pagination'>";
                for ($i = 1; $i <= 10; $i++) {
                    echo "<a href='?page=$i'>" . $i . "</a> ";
                }
                echo "</div>";
                ?>
            </div>
        </section>
        <footer>
            <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
        </footer>
    </main>
</body>
</html>