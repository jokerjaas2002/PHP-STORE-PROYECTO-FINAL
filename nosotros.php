<?php
session_start(); 
include 'db/db_connection.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kakao Trendy - Moda consciente y elegante para mujeres modernas.">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/all.min.css">
    <title>Nosotros - Kakao Trendy</title>
    <style>
        body {
            background-color: #f5ebfa;
        }
        header {
            background-color: #653d79;
        }
        footer {
            background-color: #653d79;
        }
        .about-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .social-links a {
            color: #653d79;
        }
        .social-links a:hover {
            color: #f5ebfa;
        }
    </style>
</head>
<body>
    <header class="text-white text-center py-3">
        <div class="container">
            <img src="logo.jpeg" alt="Logo de Kakao Trendy" class="img-fluid mb-3">
            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="products.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="cart.php" title="Carrito"><i class="fas fa-shopping-cart"></i></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="nosotros.php">Nosotros</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main class="container my-5"> 
        <div class="text-center mb-4">
            <a href="https://maps.app.goo.gl/mZt6KqYZrKpghMyKA">
                <img src="ubicacion.png" alt="Ubicación de Kakao Trendy" class="img-fluid">
            </a>
        </div>
        
        <section id="about" class="about-section">
            <h2 class="text-center mb-4">Sobre Nosotros</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text">
                        <p>
                            Bienvenidos a Kakao Trendy, donde más que moda, te ofrecemos una experiencia de estilo consciente. 
                            Ofrecemos ropa para mujeres modernas que buscan calidad, elegancia y comodidad. 
                            Somos Karla Gómez y Joalis Acosta, las fundadoras de Kakao Trendy. Creemos en la autenticidad, la inclusión y el poder de expresarte a través de lo que usas.
                        </p>
                        <p>
                            Nuestras colecciones están cuidadosamente seleccionadas para adaptarse a cada ocasión, siempre con diseños que realzan tu confianza y tu belleza. 
                            Cada prenda refleja nuestro compromiso con materiales de calidad, tendencias actuales y una atención al detalle que marca la diferencia. 
                            ¡Descubre la versión más auténtica de ti con nosotros!
                        </p>
                        <p>
                            Kakao Trendy fue pensada y soñada en el 2020 durante una pandemia mundial, donde nació la idea de crear una marca de ropa de dama. 
                            Nos inspiramos en las mujeres venezolanas y en los detalles de grandes empresas, desde lo más simple hasta lo más sofisticado.
                        </p>
                        <p>
                            En Kakao Trendy, estamos comprometidos con la sostenibilidad y la moda ética. Creemos que cada prenda que eliges debe contar una historia y tener un impacto positivo en el mundo. 
                            Te invitamos a unirte a nuestra comunidad y a ser parte de este viaje hacia un futuro más consciente y estilizado.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="local.jpeg" alt="Sobre Nosotros" class="img-fluid rounded">
                </div>
            </div>
        </section>

        <section class="social-media text-center my-5">
            <h3>Conéctate con Nosotros</h3>
            <div class="social-links">
                <a href="https://www.instagram.com/kakaotrendy" target="_blank" class="mx-2">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a href="https://wa.me/+584128212082" target="_blank" class="mx-2">
                    <i class="fab fa-whatsapp fa-2x"></i>
                </a>
                <a href="https://www.facebook.com/share/17hBorV4sZ/?mibextid=LQQJ4d" target="_blank" class="mx-2">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="https://www.tiktok.com/@kakaotrendy" target="_blank" class="mx-2">
                    <i class="fab fa-tiktok fa-2x"></i>
                </a>
            </div>
        </section>
    </main>

    <footer class="text-white text-center py-3">
        <p>&copy; 2024 Kakao Trendy. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>