<?php

session_start();

$full_name = $_POST['name'] . ' ' . $_POST['surname'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

require_once './db.php';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// check if login is alphanumeric
if (!ctype_alnum($login)) {
    $_SESSION['error'] = "Login musi składać się z liter i cyfr";
    header('Location: ./register-screen.php');
    exit();
}

// check if e-mail is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "E-mail jest nieprawidłowy";
    header('Location: ./register-screen.php');
    exit();
}

// check if passwords are the same
if ($password != $password2) {
    $_SESSION['error'] = "Hasła nie są takie same";
    header('Location: ./register-screen.php');
    exit();
}

// check if password is at least 8 characters long
if (strlen($password) < 8) {
    $_SESSION['error'] = "Hasło musi mieć co najmniej 8 znaków";
    header('Location: ./register-screen.php');
    exit();
}

// check if e-mail and login are not already in the database
$sql = "SELECT * FROM users WHERE username = '$login' OR email = '$email'";
if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Użytkownik o podanym loginie lub e-mailu już istnieje";
        header('Location: ./register-screen.php');
        exit();
    }
} else {
    echo("Error: " . $conn->error);
    exit();
}

if ($conn->connect_errno != 0) {
    echo("Connection failed: " . $conn->connect_errno);
} else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password, email, full_name) VALUES ('$login', '$hashedPassword', '$email', '$full_name')";
    if ($result = $conn->query($sql)) {
        session_start();
        $_SESSION['login'] = $login;

        header('Location: ./profile.php');
    } else {
        echo("Error: " . $conn->error);
    }
}

$conn->close();



?>