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

$sql = $conn->prepare("SELECT * FROM `produits`");
$sql->execute();
$produits = $sql->fetchAll(PDO::FETCH_OBJ);
?>



<table border="1">
<tr>
    <th><b>ID :</b></th>
    <th><b>Nom :</b></th>
    <th><b>Email :</b></th>
    <th><b>Password :</b></th>
</tr>

<?php foreach($produits as $produit): ?>
<tr>
    <td><?= $produit->id ?></td>
    <td><?= $produit->nom_produit ?></td>
    <td><?= $produit->Description  ?></td>
    <td><?= $produit->prix ?> DH</td>
    <td>  
        <button><a href="edit.php?id=<?= $produit->id ?>">Edit</a></button>
        <button><a onclick="return confirm('vous voulez suprimer la person de id =<?= $produit->id ?>')" href="delete.php?id=<?= $produit->id ?>">Supprimer </a></button>
      

    </td>
</tr>
<?php endforeach; ?>
</table>


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