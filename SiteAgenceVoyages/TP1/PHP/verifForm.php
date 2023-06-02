<?php
// Démarre ou reprend une session
session_start();

// Vérifie les données du formulaire du fichier contact.php


// Définition des variables
$dateContact = $_POST['dateContact'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$genre = $_POST['qcm'];
$dateNaissance = $_POST['dateNaissance'];
$fonction = $_POST['fonction'];
$sujet = $_POST['sujet'];
$message = $_POST['message'];


$dateAjd = new DateTime();
$dateAjdTimestamp = $dateAjd->format('U');


//Vérification des données entrées dans le formulaire

// Vérifie que la date du contact est valide et que la date du contact n'est pas dans le futur
if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $dateContact)) {
    $_SESSION['dateContactErr'] = "La date du contact est invalide";
} else if (strtotime($dateContact) > $dateAjdTimestamp) {
    $_SESSION['dateContactErr'] = "La date du contact ne peut pas être dans le futur";
}

// Vérifie que le nom ne contient que des lettres et des espaces
if (!preg_match("/^[a-zA-ZàâäéèêëîïôöùûüçÀÂÄÉÈÊËÎÏÔÖÙÛÜÇ \-]*$/", $nom)) {
    $_SESSION['nomErr'] = "Seules les lettres et les espaces sont autorisés";
}

// Vérifie que le prénom ne contient que des lettres et des espaces
if (!preg_match("/^[a-zA-ZàâäéèêëîïôöùûüçÀÂÄÉÈÊËÎÏÔÖÙÛÜÇ \-]*$/", $prenom)) {
    $_SESSION['prenomErr'] = "Seules les lettres et les espaces sont autorisés";
}

// Vérifie que le mail est valide
if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['mailErr'] = "Format de mail invalide";
}

// Vérifie que la date de naissance est valide et que la date de naissance n'est pas dans le futur
if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $dateNaissance)) {
    $_SESSION['dateNaissanceErr'] = "La date de naissance est invalide";
} else if (strtotime($dateNaissance) > $dateAjdTimestamp) {
    $_SESSION['dateNaissanceErr'] = "La date de naissance ne peut pas être dans le futur";
}



//Si il y a une erreur, on affiche le formulaire avec les erreurs
if (isset($_SESSION['dateContactErr']) || isset($_SESSION['nomErr']) || isset($_SESSION['prenomErr']) || isset($_SESSION['mailErr']) || isset($_SESSION['dateNaissanceErr'])) {
    $_SESSION['dateContactForm'] = $dateContact;
    $_SESSION['nomForm'] = $nom;
    $_SESSION['prenomForm'] = $prenom;
    $_SESSION['mailForm'] = $mail;
    $_SESSION['genreForm'] = $genre;
    $_SESSION['dateNaissanceForm'] = $dateNaissance;
    $_SESSION['fonctionForm'] = $fonction;
    $_SESSION['sujetForm'] = $sujet;
    $_SESSION['messageForm'] = $message;


    header('Location: PHP/contact.php');
    exit;
}
else {
    $donnees = fopen ('donnees.txt', 'a');
    fwrite($donnees, '"' . $dateContact . '";"'  . $nom . '";"'  . $prenom . '";"'  . $mail . '"'  . ';' . $genre . '";"'  . $dateNaissance . '";"'  . $fonction  . '";"' . $sujet . '";"'  . $message . '"'  . '\n' );
    fclose($donnees);

    echo "<script>alert('Votre message a bien été envoyé !'); window.location.href = '../index.php';</script>";
    exit;
}


?>