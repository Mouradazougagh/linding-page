<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "linding-page";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";
    echo "<br><br>";
} catch (PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
    exit(); // Stop further execution if the connection fails
}

?>


