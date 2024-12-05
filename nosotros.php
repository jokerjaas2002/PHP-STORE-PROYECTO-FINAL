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
    <title>Nosotros</title>
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
<div class="presentacion">
    <div>
        <img src="" alt="">
    </div>
    <div>
        <img src="" alt="">
    </div>
</div>
<main>
    <section id="about" class="product-section">
        <h2>Sobre Nosotros</h2>
        <div class="about-container">
            <div class="about-text">
                <p>
                Bienvenidos a Kakao Trendy donde más que moda, te ofrecemos una experiencia de estilo consciente: 
En Kakao Trendy, ofrecemos ropa para mujeres modernas que buscan calidad, elegancia y comodidad. 
Somos Karla Gómez y Joalis Acosta las fundadoras de de Kakao trendy. Creemos en la autenticidad, la inclusión y el poder de expresarte a través de lo que usas.
Nuestras colecciones están cuidadosamente seleccionada para adaptarse a cada ocasión, siempre con diseños que realzan tu confianza y tu belleza respetando los estereotipos. 
Cada prenda refleja nuestro compromiso con materiales de calidad, tendencias actuales y una atención al detalle que marca la diferencia. 
¡Descubre la versión más auténtica de ti con nosotros!” 
<br>
<p>
Cómo nació Kakao trendy 
Kakao Trendy fue pensada y soñada en el 2020 durante una pandemia mundial, donde nació la idea de crear una marca de ropa de dama y el nombre de la misma. 
Nos inspiramos en las mujeres venezolanas y en los detalles de grandes empresas, desde lo más simple hasta lo más sofisticado hasta crear la estructura de la marca. 
</p>
<br>
<p>
Nuestro Enfoque 
    En Kakao nuestro enfoque es conocer y estudiar a diario los gustos de nuestros clientes y ofrecer lo mejor del mercado de la moda. 
    Queremos que cada experiencia de compra sea única e irrepetible. 
    Nos gusta que encuentres en nuestra tienda lo mejor que vaya con tu personalidad y estilo de vida. 
</p>
<br>
<p>
No nos rendimos 
    A pesar de los desafíos económicos y sociales que hemos enfrentado en Venezuela, siempre hemos mantenido una actitud positiva y optimista. 
    En Kakao trendy estamos seguros que la perseverancia, la disciplina y la constancia son la clave para lograr nuestros sueños.
                </p>
                <p>
                    En de KakaoTrendy, nos apasiona ofrecer productos de la más alta calidad a nuestros clientes. 
                    Fundada en [Año de Fundación], nuestra misión es proporcionar una experiencia de compra excepcional, 
                    combinando un servicio al cliente inigualable con una selección de productos cuidadosamente elegidos.
                </p>
                <p>
                    Gracias por elegir a KakaoTrendy. Estamos emocionados de ser parte de su viaje y esperamos 
                    que disfrute de su experiencia de compra con nosotros.
                </p>
            </div>
            <div class="about-image">
                <img src="about-us.jpg" alt="Sobre Nosotros" />
            </div>
        </div>
    </section>

    <div id="product-list">
    </div>
</main>

<footer>
        <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>