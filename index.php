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
            <li><a href="cart.php">Carrito</a></li>
            
            <li><a href="nosotros.php">Nosotros</a></li>
            
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
        <!-- Icono de Instagram -->
        <a href="https://www.instagram.com/kakaotrendy?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="social-link">
    <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#653d79">
        <path d="M12 0C5.373 0 0 5.373 0 12c0 5.247 3.292 9.688 7.688 11.388.563.103.75-.244.75-.544 0-.267-.01-1.158-.015-2.1-3.138.682-3.8-1.513-3.8-1.513-.513-1.303-1.25-1.648-1.25-1.648-1.025-.7.078-.686.078-.686 1.134.08 1.73 1.165 1.73 1.165 1.007 1.724 2.637 1.225 3.284.936.1-.73.394-1.225.718-1.505-2.5-.284-5.125-1.25-5.125-5.558 0-1.227.438-2.236 1.158-3.02-.116-.284-.5-1.43.109-2.975 0 0 .948-.303 3.1 1.15A10.83 10.83 0 0112 4.8c.95 0 1.9.127 2.8.375 2.15-1.453 3.1-1.15 3.1-1.15.609 1.545.225 2.691.109 2.975.72.784 1.158 1.793 1.158 3.02 0 4.313-2.63 5.27-5.13 5.558.4.344.75 1.025.75 2.063 0 1.487-.015 2.688-.015 3.055 0 .303.187.653.759.544C20.708 21.688 24 17.247 24 12c0-6.627-5.373-12-12-12z"/>
    </svg>
</a>

         <!-- Icono de WhatsApp -->
         <a href="https://wa.me/tu_numero" target="_blank" class="social-link">
            <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#653d79">
                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.21.75 4.25 2 5.88L0 24l6.12-2c1.63 1.25 3.68 2 5.88 2 6.627 0 12-5.373 12-12S18.627 0 12 0zm6.5 17.5l-1.5 1.5c-.25.25-.5.25-.75 0l-1.5-1.5c-.25-.25-.25-.5 0-.75l1.5-1.5c.25-.25.5-.25.75 0l1.5 1.5c.25.25.25.5 0 .75zm-3-3l-1.5 1.5c-.25.25-.5.25-.75 0l-1.5-1.5c-.25-.25-.25-.5 0-.75l1.5-1.5c.25-.25.5-.25.75 0l1.5 1.5c.25.25.25.5 0 .75zm-3-3l-1.5 1.5c-.25.25-.5.25-.75 0l-1.5-1.5c-.25-.25-.25-.5 0-.75l1.5-1.5c.25-.25.5-.25.75 0l1.5 1.5c.25.25.25.5 0 .75z"/>
            </svg>
        </a>

        <!-- Icono de Facebook -->
        <a href="https://www.facebook.com/tu_usuario" target="_blank" class="social-link">
            <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#653d79">
                <path d="M22.675 0h-21.35C.6 0 0 .6 0 1.325v21.35C0 23.4.6 24 1.325 24h21.35C23.4 24 24 23.4 24 22.675V1.325C24 .6 23.4 0 22.675 0zm-3.15 12.5h-3.15v9h-4.5v-9h-2.25v-3.75h2.25V7.5c0-2.25 1.35-3.75 3.45-3.75 1 0 2.1.15 2.1.15v2.25h-1.2c-1.2 0-1.5.75-1.5 1.5v1.5h3.15l-.45 3.75z"/>
            </svg>
        </a>

                <!-- Icono de TikTok -->
                <a href="https://www.tiktok.com/@tu_usuario" target="_blank" class="social-link">
            <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#653d79">
                <path d="M12 0c-6.627 0-12 5.373-12 12 0 6.627 5.373 12 12 12 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12zm3 17.5c-1.5 0-2.5-.5-3.5-1.5-.5-.5-.5-1.5-.5-2.5v-5h-2v5c0 1.5.5 2.5 1.5 3.5 1 1 2.5 1 3.5 1 1.5 0 2.5-.5 3.5-1.5.5-.5.5-1.5.5-2.5v-5h-2v5c0 1.5-.5 2.5-1.5 3.5-.5.5-1.5.5-2.5.5z"/>
            </svg>
        </a>
    </div>
</section>


    <footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

