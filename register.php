<?php

$full_name = $_POST['name'] . ' ' . $_POST['surname'];
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

require_once './db.php';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// check if e-mail and login are not already in the database
$sql = "SELECT * FROM users WHERE login = '$login' OR email = '$email'";
if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
        echo("User with this login or e-mail already exists");
        exit();
    }
} else {
    echo("Error: " . $conn->error);
    exit();
}

// check if login is alphanumeric
if (!ctype_alnum($login)) {
    echo("Login must be alphanumeric");
    exit();
}

// check if e-mail is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Invalid e-mail address");
    exit();
}

// check if passwords are the same
if ($password != $password2) {
    echo("Passwords are not the same");
    exit();
}

// check if password is at least 8 characters long
if (strlen($password) < 8) {
    echo("Password must be at least 8 characters long");
    exit();
}

if ($conn->connect_errno != 0) {
    echo("Connection failed: " . $conn->connect_errno);
} else {
    $sql = "INSERT INTO users (login, password, email, full_name) VALUES ('$login', '$hashedPassword', '$email', '$full_name')";
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