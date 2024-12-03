<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $productId = intval($_POST['product_id']); 
        $quantity = intval($_POST['quantity']); 

        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity; 
        } else {
            $_SESSION['cart'][$productId] = $quantity; 
        }

        
        header("Location: index.php?message=Producto agregado al carrito");
        exit();
    } else {
        
        header("Location: index.php?error=Datos inválidos");
        exit();
    }
} else {
    
    header("Location: index.php");
    exit();
}