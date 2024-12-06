<?php
session_start(); 
include 'db/db_connection.php'; 

if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit;
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: #f5ebfa;
        }
        header {
            background-color: #653d79;
            color: white;
        }
        footer {
            background-color: #653d79;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        #checkout {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>Checkout</title>
</head>
<body>
<header class="py-3">
    <div class="container">
        <div class="logo-container">
            <img src="logo.jpeg" alt="logo" class="img-fluid logo">
        </div>
        <nav>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="cart.php">Carrito</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<style>
    .logo {
        max-width: 150px; 
        height: auto; 
    }
</style>
<main class="container my-5">
    <section id="checkout" class="p-4">
        <h2 class="text-center">Checkout</h2>
        <form action="process_order.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Número de Teléfono:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Realizar Pedido</button>
        </form>
    </section>
</main>
<footer>
    <p>&copy; 2024 KakaoTrendy. Todos los derechos reservados.</p>
</footer>

<script>
function validateForm() {
    return true; 
}
</script>
</body>
</html>