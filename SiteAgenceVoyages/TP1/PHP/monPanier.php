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
            <table class="tableau_panier">
                <tr class="haut_panier">
                    <th>Destination</th>
                    <th>Quantité</th>
                    <th>Supprimer</th>

                </tr>
             <?php
            // Vérifiez si le panier existe dans la session 
            if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
                // Parcourez le panier et affichez les éléments
                
                foreach ($_SESSION['panier'] as $pseudo => $quantite) {
                    echo "<tr class='panier_" . htmlspecialchars($pseudo) . "' style='height: 15vh;min-height: 10px;max-height: 20px;'>";
                   
                    echo "<td>" . htmlspecialchars($pseudo) . "</td>";
                    echo "<td id=\"quantite\">" . htmlspecialchars($quantite) . "</td>";
                    echo "<td><button onclick='supprimerArticle(\"" . htmlspecialchars($pseudo) . "\", " . htmlspecialchars($quantite) . ")'>Supprimer</button></td>";
                    echo "</tr>";
                }
                
            }
             else {
                // Affichez un message si le panier est vide
                echo "<tr><td colspan='2'>Votre panier est vide</td></tr>";
            }
            ?>
            </table>
    </div>
    </main>

    <?php require 'footer.php'; ?>
    
    <script src="/js/panier.js"></script>
    <!-- Inclure le fichier updateStock.js -->


</html>