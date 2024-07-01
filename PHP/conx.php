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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form inputs
    $name = !empty($_POST['name']) ? $_POST['name'] : null;
    $email = !empty($_POST['email']) ? $_POST['email'] : null;
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    if ($name && $email && $password) {
        try {
            $stmt = $conn->prepare("INSERT INTO ins (nom, email, password) VALUES (?,?,?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $password);

            if ($stmt->execute()) {
                header("Location: index.php");
                exit();
            }
            
            echo "Inscription terminée!";
        } catch (PDOException $e) {
            echo "Erreur lors de l'inscription: " . $e->getMessage();
        }
    } else {
        echo "Tous les champs sont requis.";
    }
} else {
    echo "Veuillez soumettre le formulaire.";
}
?>


