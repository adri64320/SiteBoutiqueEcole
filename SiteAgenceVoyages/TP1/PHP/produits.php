<?php
// Démarre ou reprend une session
session_start();

// Code de la page
?>

<!DOCTYPE html>

<html>

<head>
    <title>Voyages Bernard-Dupont</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <?php require 'header.php'; ?>

    <hr class="hr1">
    <div class="contenu">
        <?php require 'nav.php'; ?>

        <main>

            <?php



            require_once 'bddData.php';
            

            $pdo = connectDB();
            $products = getProductsByCategory($pdo, $_GET['cat']);
            disconnectDB($pdo);
            
            // Afficher les produits
            echo '<table>';
            echo '<thead><tr><th>Ville</th><th>Pays</th><th>Prix</th><th style="display:none;" class="stock">Stock</th><th>Photo</th><th>Panier</th></tr></thead>';
            echo '<tbody>';
            foreach ($products as $product) {
                echo '<tr>';
                echo '<td>' . $product['ville'] . '</td>';
                echo '<td>' . $product['pays'] . '</td>';
                echo '<td>' . $product['prix'] . '</td>';
                echo '<td style="display:none;" class="stock" data-stock="' . $product['id'] . '">' . $product['stock'] . '</td>';
                echo '<td><img class="img_article" src="' . $product['photos'] . '" alt="' . $product['ville'] . '"></td>';
                echo "<td><div class=\"centrer_panier\"><button type='button' class=\"crementer\" onclick=\"decrementer('" . $product['id'] . "')\">-</button><span id='panier_" . $product['id'] . "'>0</span><button type='button' class=\"crementer\" onclick=\"incrementer('" . $product['id'] . "')\">+</button> <button type='button' onclick=\"vider('" . $product['id'] . "')\">Vider</button></div><button type ='button' class=\"validate_button\" onclick=\"validerPanier('" . $product['id'] . "')\">Valider le panier</button></td></tr></tr>";
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            
            
            
            if($_SESSION['id'] == "admin"){
                echo '<button onclick="fonction()" class="montrer">Stock</button>';
            }
            ?>
        </main>
    </div>

    <?php require 'footer.php'; ?>
    
    <?php
    $cat = $_GET['cat'];
    if ($cat == 'amerique')
        echo '<script type="text/javascript" src="/js/stockamerique.js"></script>';
    else if ($cat == 'asie') {
        echo '<script type="text/javascript" src="/js/stockasie.js"></script>';
    } else if ($cat == 'europe') {
        echo '<script type="text/javascript" src="/js/stockeurope.js"></script>';
    }
    
    

    ?>



</html>