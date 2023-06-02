

<!DOCTYPE html>

<html>

<head>
    <title>Voyages Bernard-Dupont</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <header>
        <img class="logo" src="img/logo.png" alt="Logo de mon entreprise">
  
        <div class="partie1">
            <h1 class="titre1">Voyages Bernard-Dupont</h1>
            <nav class="menu_haut">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="amerique.php">Amérique</a></li>
					<li><a href="asie.php">Asie</a></li>
            		<li><a href="europe.php">Europe</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="login">
            <p>Mon compte</p>
        </div>
    </header>

    <hr class="hr1">
    <div class="contenu">
        <nav class="menu">
            <ul>
                <a href="index.php"><li>Accueil</li></a>
                <a href="amerique.php"><li>Amérique</li></a>
				<a href="asie.php"><li>Asie</li></a>
            	<a href="europe.php"><li>Europe</li></a>
				<a href="contact.php"><li>Contact</li></a>
            </ul>
        </nav>
    
    <main>
    <?php
// Démarrer la session
session_start();

// Inclure le fichier contenant les variables de session
require_once 'varSession.inc.php';

// Récupérer le tableau des produits
$products = $_SESSION['amérique']['amérique'];

// Afficher le tableau des produits dans une table HTML
echo '<table>';
echo '<thead><tr><th>Ville</th><th>Pays</th><th>Prix</th><th>Stock</th><th>Photo</th><th>Panier</th></tr></thead>';
echo '<tbody>';
foreach ($products as $product) {
    echo '<tr>';
    echo '<td>' . $product['ville'] . '</td>';
    echo '<td>' . $product['Pays'] . '</td>';
    echo '<td>' . $product['Prix'] . '</td>';
    echo '<td data-stock="' . $product['pseudo'] . '">' . $product['stock'] . '</td>';
    echo '<td><img src="' . $product['photo'] . '" alt="' . $product['ville'] . '"></td>';
    echo "<td><button type='button' onclick=\"decrementer('".$product['pseudo'] ."')\">-</button><span id='panier_". $product['pseudo'] ."'>0</span><button type='button' onclick=\"incrementer('". $product['pseudo'] ."')\">+</button> <button type='button' onclick=\"vider('".$product['pseudo'] ."')\">Vider</button><button type ='button'>Valider le panier</button></td></tr></tr>";
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>


        <button onclick="fonction()" class="montrer">Stock</button>
    </main>
    </div>
    <footer>
        <p>© 2023 Voyages Bernard-Dupont</p>
    </footer>
    <script type="text/javascript" src="js/stockamerique.js"></script> 
</html>
          
    
    