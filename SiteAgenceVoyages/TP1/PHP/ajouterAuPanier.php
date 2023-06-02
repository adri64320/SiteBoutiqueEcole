<?php
session_start();

// Vérifiez si le panier existe déjà dans la session, sinon créez-en un nouveau
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Récupérez les données JSON envoyées par la fonction validerPanier
$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON, true);

// Parcourez les données reçues et mettez à jour le panier dans la session
foreach ($data as $pseudo => $quantite) {
    if (array_key_exists($pseudo, $_SESSION['panier'])) {
        $_SESSION['panier'][$pseudo] += $quantite;
    } else {
        $_SESSION['panier'][$pseudo] = $quantite;
    }
}

// Répondez avec un message de succès
echo json_encode(["message" => "Panier mis à jour avec succès"]);
?>
