<?php

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

require_once './db.php';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_errno != 0) {
    echo("Connection failed: " . $conn->connect_errno);
} else {
    $sql = "SELECT * FROM users WHERE username = '$login'";
    if ($result = $conn->query($sql)) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = $login;
            header('Location: ./profile.php');
        } else {
            echo("Invalid login or password");
        }
    } else {
        echo("Error: " . $conn->error);
    }
}

$conn->close();

?>