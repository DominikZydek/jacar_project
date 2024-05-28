<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header('Location: ./login-screen.php');
        exit();
    }

    require_once './db.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_errno != 0) {
        echo("Connection failed: " . $conn->connect_errno);
    } else {
        $login = $_SESSION['login'];
        $sql = "SELECT * FROM appointments WHERE user_id = (SELECT user_id FROM users WHERE username = '$login')";

        if ($result = $conn->query($sql)) {
            $appointments = [];
            while ($row = $result->fetch_assoc()) {
                $appointment = [];
                $appointment['date'] = $row['date'];
                $appointment['service_id'] = $row['service_id'];
                $appointment['message'] = $row['message'];

                $service_id = $row['service_id'];
                $sql = "SELECT * FROM services WHERE service_id = $service_id";
                if ($result2 = $conn->query($sql)) {
                    $service = $result2->fetch_assoc();
                    $appointment['service_name'] = $service['name'];
                    $appointment['service_cost'] = $service['cost'];
                } else {
                    echo("Error: " . $conn->error);
                }

                $appointments[] = $appointment;
            }
        } else {
            echo("Error: " . $conn->error);
        }
    }
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
    <header>
        <nav>
            <img src="./assets/logo.png" alt="logo" class="logo-header">
            <ul class="menu">
                <li><a href="./index.php">Strona główna</a></li>
                <li><a href="./meet-us.php">Poznaj ekipę</a></li>
                <li><a href="./services.php">Usługi</a></li>
                <li><a href="./make-an-appointment.php"><b>Umów się</b></a></li>
              </ul>
              <div class="menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
              </div>
              <ul class="menu-dropdown">
                <li><a href="./index.php">Strona główna</a></li>
                <li><a href="./meet-us.php">Poznaj ekipę</a></li>
                <li><a href="./services.php">Usługi</a></li>
                <li><a href="./make-an-appointment.php"><b>Umów się</b></a></li>
              </ul>
        </nav>
    </header>
    <main>
        <div class="appointment-confirmation">
            <?php

            if (count($appointments) > 0) {
                echo("<h2>Twoje umówione wizyty</h2>");
                echo("<table>");
                echo("<tr>");
                echo("<th>Data</th>");
                echo("<th>Usługa</th>");
                echo("<th>Koszt</th>");
                echo("<th>Wiadomość</th>");
                echo("</tr>");
                foreach ($appointments as $appointment) {
                    echo("<tr>");
                    echo("<td>" . $appointment['date'] . "</td>");
                    echo("<td>" . $appointment['service_name'] . "</td>");
                    echo("<td>" . $appointment['service_cost'] . " zł</td>");
                    echo("<td>" . $appointment['message'] . "</td>");
                    echo("</tr>");
                }
                echo("</table>");
            } else {
                echo("<h2>Brak umówionych wizyt</h2>");
            }

            ?>
            <a href="./profile.php" class="button">Powrót</a>
        </div>
    </main>
    <footer>
        <div class="logo-section">
            <img src="./assets/logo.png" alt="logo" class="logo-footer">
            <h4>Copyright &copy; 2024</h4>
            <a href="#">Polityka prywatności</a><br>
            <a href="#">Informacje oplikach cookies</a>
        </div>
        <div class="contact-us">
            <div>
                <h3>Skontaktuj się z nami!</h3>
                <p>
                    Placeholder sp. z o. o.<br>
                    Jan Kowalski<br>
                    ul. Przykładowa 11,<br>
                    12-345 Przykładowe Miasto<br>
                    <br>
                    NIP: 123-122-12<br>
                    REGON: 123-123-123
                </p>
            </div>
            <div>
                <div class="phone-number-with-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    <p>123-456-897</p>
                </div>
                <br>
                <div class="e-mail-with-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    <p>example@example.com</p>
                </div>
            </div>
        </div>
        <div class="opening-hours">
            <h3>Godziny otwarcia</h3>
            <table>
                <tr>
                    <td>Pn - Pt</td>
                    <td>9 - 18</td>
                </tr>
                <tr>
                    <td>Sobota</td>
                    <td>10 - 17</td>
                </tr>
                <tr>
                    <td>Niedziela</td>
                    <td>Nieczynne</td>
                </tr>
            </table>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="./index.js"></script>
</body>
</html>