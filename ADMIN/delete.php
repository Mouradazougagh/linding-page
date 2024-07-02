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

    

    <?php
require 'conx.php';

$id = $_GET['id'];
$sql = $conn->prepare('DELETE FROM produits WHERE id = :id');
if ($sql->execute([':id' => $id])) {
    echo "Le produit est supprimé !";
    header('Location: read.php');
    exit();
} else {
    echo "Erreur lors de la suppression du produit.";
}
?>




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

    </body>
    </html>