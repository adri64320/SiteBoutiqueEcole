<?php
require_once 'varSession.inc.php';

// Vérifier si la requête est une requête AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

    // Vérifier que la commande est envoyée
    if(isset($_POST['commande'])) {

        // Récupérer la commande
        $commande = $_POST['commande'];

        // Ouvrir le fichier de commandes en écriture
        $file = fopen("commandes.txt", "a");

        // Parcourir les éléments de la commande
        foreach($commande as $pseudo => $quantite) {
            // Vérifier que le produit existe et que le stock est suffisant
            if(array_key_exists($pseudo, $data) && $data[$pseudo]['stock'] >= $quantite) {
                // Mettre à jour le stock
                $data[$pseudo]['stock'] -= $quantite;

                // Écrire la commande dans le fichier
                $ligne_commande = $pseudo . "|" . $quantite . "|" . $data[$pseudo]['prix'] . "\n";
                fwrite($file, $ligne_commande);
            }
        }

        // Fermer le fichier
        fclose($file);

        // Mettre à jour la variable de session avec les nouveaux stocks
        $_SESSION['data'] = $data;

        // Envoyer une réponse JSON indiquant que la commande a été traitée avec succès
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
    } else {
        // Envoyer une réponse JSON indiquant que la commande est vide
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Commande vide']);
    }
} else {
    // Rediriger vers la page d'accueil si la requête n'est pas une requête AJAX
    header('Location: index.php');
    exit();
}
