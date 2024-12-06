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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/all.min.css">
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
            <li><a href="cart.php" title="Carrito"><i class="fas fa-shopping-cart" style="color: #f5ebfa;"></i></a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
        </ul>
    </nav>
</header>

    <div class="container">
        <aside class="sidebar">
            <h3>Categorías</h3>
            <ul>
                <li><a href="#Vestidos">Vestidos</a></li>
                <li><a href="#Pantalones y Jeans">Pantalones y Jeans</a></li>
                <li><a href="#Bragas">Bragas</a></li>
                <li><a href="#Trajes de Baños">Trajes de Baños</a></li>
                <li><a href="#Chaquetas y Suéteres">Chaquetas y Suéteres</a></li>
                <li><a href="#Shorts y Faldas">Shorts y Faldas</a></li>
                <li><a href="#Blusas y Tops">Blusas y Tops</a></li>
                <li><a href="#Accesorios">Accesorios</a></li>
                <li><a href="#Pijamas y Lencería">Pijamas y Lencería</a></li>
                <li><a href="#Ropa Deportiva">Ropa Deportiva</a></li>
            </ul>
        </aside>
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
                
                $sections = [
                    "Vestidos" => [],
                    "Pantalones y Jeans" => [],
                    "Bragas" => [],
                    "Trajes de Baños" => [],
                    "Chaquetas y Suéteres" => [],
                    "Shorts y Faldas" => [],
                    "Blusas y Tops" => [],
                    "Accesorios" => [],
                    "Pijamas y Lencería" => [],
                    "Ropa Deportiva" => []
                ];
                
                foreach ($products as $product) {
                    switch ($product['category_id']) {
                        case 1:
                            $sections["Vestidos"][] = $product;
                            break;
                        case 2:
                            $sections["Pantalones y Jeans"][] = $product;
                            break;
                        case 3:
                            $sections["Bragas"][] = $product;
                            break;
                        case 4:
                            $sections["Trajes de Baños"][] = $product;
                            break;
                        case 5:
                            $sections["Chaquetas y Suéteres"][] = $product;
                            break;
                        case 6:
                            $sections["Shorts y Faldas"][] = $product;
                            break;
                        case 7:
                            $sections["Blusas y Tops"][] = $product;
                            break;
                        case 8:
                            $sections["Accesorios"][] = $product;
                            break;
                        case 9:
                            $sections["Pijamas y Lencería"][] = $product;
                            break;
                        case 10:
                            $sections["Ropa Deportiva"][] = $product;
                            break;
                    }
                }
                
                foreach ($sections as $sectionName => $sectionProducts) {
                    if (!empty($sectionProducts)) {
                        echo "<div class='product-section' id='" . htmlspecialchars($sectionName) . "'>";
                        echo "<h3>" . htmlspecialchars($sectionName) . "</h3>";
                        echo "<div class='product-container'>";
                        foreach ($sectionProducts as $product) {
                            echo "<div class='product'>";
                            echo "<img src='" . htmlspecialchars($product["image"]) . "' alt='" . htmlspecialchars($product["name"]) . "'>";
                            echo "<h4>" . htmlspecialchars($product["name"]) . "</h4>";
                            echo "<p>Precio: $" . htmlspecialchars($product["price"]) . "</p>";
                            echo "<form action='add_to_cart.php' method='POST'>";
                            echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($product["id"]) . "'>";
                            echo "<input type='number' name='quantity' value='1' min='1' max='10'>";
                            echo "<button type='submit'>Agregar al Carrito</button>";
                            echo "</form>";
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </section>
    </div>
</main>
    <footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>

</body>
</html>