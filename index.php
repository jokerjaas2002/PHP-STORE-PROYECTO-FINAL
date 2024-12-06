<?php
session_start(); 
include 'db/db_connection.php'; 

$sql = "SELECT * FROM products"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/all.min.css">
    <title>KakaoTrendy - Tienda en Línea</title>
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
            <li><a href="nosotros.php">Nosotros</a></li>
            <li><a href="cart.php" title="Carrito"><i class="fas fa-shopping-cart" style="color: #f5ebfa;"></i></a></li>
            <li><a href="register.php">Registrarse</a></li>
            <li><a href="login.php">Iniciar Sesión</a></li>
        </ul>
    </nav>
</header>
    <div>
<section>
<div id="welcome">
    <div class="marquee-container">
        <div class="marquee"><span>¡Bienvenidos a nuestro sitio web!</span></div>
    </div>
</div>
</section>
    </div>
    <main>
        <section id="product-list">
            <h2>Productos Destacados</h2>
            <div class="product-container">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($product = $result->fetch_assoc()): ?>
                        <div class="product">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <p>Precio: $<?php echo number_format($product['price'], 2); ?></p>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <form action="add_to_cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="number" name="quantity" value="1" min="1" max="10">
                                <button type="submit">Agregar al Carrito</button>
                            </form>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No hay productos disponibles en este momento.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <section>
    <div class="Politics">

    </div>
</section>


<section>
    <div class="contacto">
        
    <a href="https://www.instagram.com/kakaotrendy?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="social-link">
    <i class="fab fa-instagram fa-3x" style="color: #653d79;"></i>
</a>

         
<a href="https://wa.me/+584128212082" target="_blank" class="social-link">
    <i class="fab fa-whatsapp fa-3x" style="color: #653d79;"></i>
</a>

        
<a href="https://www.facebook.com/share/17hBorV4sZ/?mibextid=LQQJ4d" target="_blank" class="social-link">
    <i class="fab fa-facebook fa-3x" style="color: #653d79;"></i>
</a>

                
<a href="https://www.tiktok.com/@kakaotrendy?_t=8rxzbj6YSox&_r=1" target="_blank" class="social-link">
    <i class="fab fa-tiktok fa-3x" style="color: #653d79;"></i>
</a>
    </div>
</section>


    <footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

