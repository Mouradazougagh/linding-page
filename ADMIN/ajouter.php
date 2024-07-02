<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style2.css">
    <title>Mourad store</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="..//images/logo.jpg" alt="logo">
            <span id="s1">Mourad Store</span>
        </div>
        
        <nav>
            <ul>
                <li><a href="..//html/file.html">Home</a></li>
                <li><a href="..//html/about.html">About</a></li>
                <li><a href="..//html/catalog.html">catalogue</a></li>
                <li><a href="..//html/contact.html">Contact</a></li>
                <li><a href="..//PHP/inscription.php">S'inscrire</a></li>
            </ul>
        </nav>
    </header>

    
    <main id="main1">


    <div class="contact-container">
    <h1>Informations sur le produit : </h1>
           
            <form class="contact-form" action="ajouter.php" method="post">
            <label for="nom_produit">Nom de produit:</label>
                <input class="i1" type="text" id="nompr" name="nom_produit" required><br>
                <label for="Description">Description :</label>
                <textarea class="t1"  id="Description" name="Description" required></textarea><br>
                <label for="prix">prix:  (DH)</label>
                <input class="i1" type="text" id="prix" name="prix" required><br>
                <button id="btn1" type="submit">Envoyer</button>
            </form>
        </div>

       

       
    </main>


    <footer>
        <div class="contact">
            <h2>Contactez-nous</h2>
            <div class="contact-info">
                <img src="..//images/logo.jpg" alt="logo" class="footer-logo">
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
        <p>&copy; 2024 t-shirt By Mourad Store</p>
    </footer>

    <?php
require 'conx.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form inputs
    $nom_produit = !empty($_POST['nom_produit']) ? $_POST['nom_produit'] : null;
    $Description = !empty($_POST['Description']) ? $_POST['Description'] : null;
    $prix = !empty($_POST['prix']) ? $_POST['prix'] : null;

    if ($nom_produit && $Description && $prix) {
        try {
            $stmt = $conn->prepare("INSERT INTO produits (nom_produit, Description, prix) VALUES (?,?,?)");
            $stmt->bindParam(1, $nom_produit);
            $stmt->bindParam(2, $Description);
            $stmt->bindParam(3, $prix);

            if ($stmt->execute()) {
                echo "Inscription terminée!";
                header("Location: read.php");
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