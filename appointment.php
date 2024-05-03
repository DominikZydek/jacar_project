<?php

$costs = array(
    "Wymiana akumulatora" => 200,
    "Klocki hamulcowe" => 150,
    "Wymiana oleju" => 100,
    "Naprawa klimatyzacji" => 300,
    "Wymiana opon" => 50,
    "Geometria kół" => 80,
    "Badanie diagnostyczne" => 100,
    "Przegląd techniczny" => 150
);

$date = $_POST['date']; 
$service = $_POST['service'];
$cost = $costs[$service];
$message = $_POST['message'];

echo "Twoja prośba została wysłana!<br><br>";
echo "Data: $date<br>";
echo "Usługa: $service<br>";
echo "Koszt: $cost zł<br>";
echo "Wiadomość: $message<br>";

?>