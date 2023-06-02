<?php
session_start();

if (isset($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];
    if (isset($_SESSION['panier'][$pseudo])) {
        unset($_SESSION['panier'][$pseudo]);
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
