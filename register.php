<?php
session_start();
include 'db/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_user = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $check_user->bind_param("ss", $username, $email);
    $check_user->execute();
    $result = $check_user->get_result();

    if ($result->num_rows > 0) {
        echo "El nombre de usuario o el correo electrónico ya están en uso.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            
            header("Location: index.php");
            exit(); 
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    $check_user->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5ebfa;
        }
        h1, h2 {
            color: #653d79;
        }
        .table {
            background-color: #fff;
        }
        .table th {
            background-color: #653d79;
            color: #fff;
        }
        .btn-primary {
            background-color: #653d79;
            border-color: #653d79;
        }
        .btn-primary:hover {
            background-color: #5a2e6b;
            border-color: #5a2e6b;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <h1 class="text-center">Registro de Usuario</h1>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</body>
</html>