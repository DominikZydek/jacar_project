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
        <div class="register-screen-container">
            <div class="register-screen">
            <div class="register-header">
                <h2>Rejestracja do</h2>
                <img src="./assets/logo.png" alt="logo" class="logo-login">
            </div>
                <form action="./register.php" method="POST">
                    <input type="text" name="name" id="name" placeholder="Imię" required>
                    <input type="text" name="surname" id="surname" placeholder="Nazwisko" required>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <input type="text" name="login" id="login" placeholder="Login" required>
                    <input type="password" name="password" id="password" placeholder="Hasło" required>
                    <input type="password" name="password2" id="password2" placeholder="Powtórz hasło" required>
                    <button type="submit">Zarejestruj</button>
                    <a href="./login-screen.php">Masz już konto? Zaloguj się</a>
                </form>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="./index.js"></script>
</body>
</html>