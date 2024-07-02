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
$sql = $conn->prepare('SELECT * FROM produits WHERE id = :id');
$sql->execute([':id' => $id]);
$insc = $sql->fetch(PDO::FETCH_OBJ);

if (isset($_POST['nom_produit']) && isset($_POST['Description']) && isset($_POST['prix'])) {
    $nom_produit = $_POST['nom_produit'];
    $Description = $_POST['Description'];
    $prix = $_POST['prix'];
    $updateSql = $conn->prepare('UPDATE produits SET nom_produit=:nom_produit, Description=:Description, prix=:prix WHERE id=:id');
    if ($updateSql->execute([':id' => $id, ':nom_produit' => $nom_produit, ':Description' => $Description, ':prix' => $prix])) {
        header("location: read.php");
        exit; 
    } else {
        
        $errorInfo = $updateSql->errorInfo();
        echo "Error: " . $errorInfo[2];
    }
}
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Mise à jour d'un produit</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label>Nom produit : </label>
                    <input value="<?= $insc->nom_produit ?>" type="text" name="nom_produit">
                </div>
                <div class="form-group">
                    <label>Description :</label>
                    <textarea  type="text" name="Description"><?= $insc->Description ?></textarea>
                </div>
                <div class="form-group">
                    <label>prix : </label>
                    <input value="<?= $insc->prix ?>"  type="text" name="prix">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Mise à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>













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







    <style>
        .container {
    width: 50%;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Card styles */
.card {
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-header {
    margin-bottom: 20px;
}

.card-header h2 {
    margin: 0;
}

/* Form styles */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input[type="text"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-group textarea {
    height: 100px;
}

.form-group button {
    padding: 10px 15px;
    background-color: #17a2b8;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-group button:hover {
    background-color: #138496;
}
    </style>



    </body>
    </html>



