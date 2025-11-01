<?php
session_start();
 require $_SERVER['DOCUMENT_ROOT'] . '/student002/shop/backend/config/db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = ($_POST['email']);
    $password = $_POST['password'];

    // Preparar consulta
    $query = $conn->prepare("SELECT customer_id, name, password FROM `002customers` WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $user = $query->get_result()->fetch_assoc();

    // Validar usuario y contraseña
    if ($user) {
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_id'] = $user['customer_id'];
        header("Location: /student002/shop/backend/index.php");
        exit;

    }
    $error = "Correo o contraseña incorrectos";
    
}
?>
