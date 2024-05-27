<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jacar - Warsztat Mechaniki Pojazdowej</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./style-breakpoints.css">
</head>
<body>
    <main>
        <div class="login-screen-container">
            <div class="login-screen">
            <svg id="login-back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                <div class="login-header">
                    <h2>Logowanie do</h2>
                    <img src="./assets/logo.png" alt="logo" class="logo-login">
                </div>
                <form action="./login.php" method="POST">
                    <input type="text" name="login" id="login" placeholder="Login" required>
                    <input type="password" name="password" id="password" placeholder="Hasło" required>
                    <button type="submit">Zaloguj</button>
                    <?php 
                        if (isset($_SESSION['error'])) {
                            echo('<p class="login-error">' . $_SESSION['error'] . '</p>');
                            unset($_SESSION['error']);
                        }
                    ?>
                    <a href="./register-screen.php">Nie masz konta? Zarejestruj się</a>
                </form>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="./index.js"></script>
</body>
</html>