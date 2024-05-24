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
                <div class="login-header">
                    <h2>Logowanie do</h2>
                    <img src="./assets/logo.png" alt="logo" class="logo-login">
                </div>
                <form action="./login.php" method="POST">
                    <input type="text" name="login" id="login" placeholder="Login" required>
                    <input type="password" name="password" id="password" placeholder="Hasło" required>
                    <button type="submit">Zaloguj</button>
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