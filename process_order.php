<?php
session_start();
include 'db/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['name'];
    $customer_phone = $_POST['phone'];
    $customer_address = $_POST['address'];

    if (empty($_SESSION['cart'])) {
        header('Location: cart.php');
        exit;
    }

    $total_amount = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_amount += $item['price'] * $item['quantity'];
    }

    $sql = "INSERT INTO orders (customer_name, customer_phone, customer_address, total_amount) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssd", $customer_name, $customer_phone, $customer_address, $total_amount);
    
    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;

        foreach ($_SESSION['cart'] as $productId => $item) {
            $sql_item = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
            $stmt_item = $conn->prepare($sql_item);
            $stmt_item->bind_param("iiid", $order_id, $productId, $item['quantity'], $item['price']);
            $stmt_item->execute();
            $stmt_item->close();
        }

        unset($_SESSION['cart']);
        header("Location: order_confirmation.php?order_id=" . $order_id);
        exit;
    } else {
        echo "Error al procesar el pedido: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>