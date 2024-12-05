<?php
session_start();
include 'db/db_connection.php'; 


function getProductById($productId) {
    global $conn; 

    $stmt = $conn->prepare("SELECT price, image FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    if (!$stmt->execute()) {
        
        return null;
    }
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; 
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $productId = intval($_POST['product_id']); 
        $quantity = intval($_POST['quantity']); 

       
        if ($quantity <= 0) {
            header("Location: index.php?error=La cantidad debe ser mayor que cero");
            exit();
        }

        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $product = getProductById($productId); 
        
        if ($product) { 
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] += $quantity; 
            } else {
                $_SESSION['cart'][$productId] = [
                    'quantity' => $quantity,
                    'price' => $product['price'],
                    'image' => $product['image']
                ];
            }

            header("Location: index.php?message=Producto agregado al carrito");
            exit();
        } else {
            header("Location: index.php?error=Producto no encontrado");
            exit();
        }
    } else {
        header("Location: index.php?error=Datos inválidos");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}


$conn->close();