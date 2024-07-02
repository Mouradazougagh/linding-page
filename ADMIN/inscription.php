<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//styles.css">
    <title>Mourad Store</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../images/logo.jpg" alt="logo">
            <span id="s1">Mourad Store</span>
        </div>
        
        <nav>
            <ul>
                <li><a href="../html/file.html">Home</a></li>
                <li><a href="../html/about.html">About</a></li>
                <li><a href="../html/catalog.html">Catalogue</a></li>
                <li><a href="../html/contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main class="main3" id="main4">
        <div class="contact-container">
            <h1>Inscription :</h1>
            <form class="contact-form" action="inscription.php" method="post">
                <fieldset class="fieldset">
                    <legend>Formulaire d'inscription :</legend>
                    <label for="name">Nom:</label><br>
                    <input type="text" id="name" name="name" required><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                    <label for="password">Mot de passe:</label><br>
                    <input type="password" id="password" name="password" required><br>
                    <button id="btn2" type="submit">Envoyer</button>
                </fieldset>
            </form>
        </div>
    </main>
    <footer>
        <div class="contact">
            <h2>Contactez-nous</h2>
            <div class="contact-info">
                <img src="../images/logo.jpg" alt="logo" class="footer-logo">
                <p>Email : <a href="mailto:mouradazougagh61@gmail.com">mouradazougagh61@gmail.com</a></p>
                <p>Téléphone : <a href="tel:+212705220576">+212 705220576</a></p>
                <p>Adresse : RES TAFOUKT FADISSA AGADIR MAROC</p>
            </div>
            <div class="social-media">
                <a href="https://wa.me/212705220576" target="_blank">WhatsApp</a>
                <a href="https://web.facebook.com/morad.azougargh/" target="_blank">Facebook</a>
                <a href="https://www.instagram.com/mrd_a_z" target="_blank">Instagram</a>
            </div>
            <div class="additional-info">
                <h3>Autres Informations</h3>
                <p><strong>Problèmes :</strong> Si vous rencontrez des problèmes avec votre commande, veuillez nous contacter immédiatement.</p>
                <p><strong>Méthodes de paiement :</strong> Paiement à la livraison.</p>
            </div>
        </div>
        <p>&copy; 2024 T-shirt By Mourad Store</p>
    </footer>
    <script src="../page.js"></script>
    
    

    <?php
require 'conx.php';

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
                echo "Inscription terminée!";
                header("Location: ../html/success.html");
                exit();
            }
            
            echo "Erreur lors de l'inscription.";
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

</body>
</html>


