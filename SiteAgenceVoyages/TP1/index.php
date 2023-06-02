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
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php require 'header.php'; ?>

    <hr class="hr1">
    <div class="contenu">
        <?php require 'nav.php'; ?>

        <main>
            <h2>Accueil</h2>
            <p style="width: 100%; font-size: 20px">Bienvenue sur Voyages Bernard-Dupont, votre passerelle vers l'aventure et la découverte à travers le monde ! Nous sommes fiers de vous présenter notre nouveau site de voyage, spécialement conçu pour répondre à vos envies de destinations exotiques, de cultures fascinantes et de souvenirs inoubliables.</p>

<p style="width: 100%; font-size: 20px">

Naviguez sur notre site convivial et découvrez nos différentes offres et nos destinations phares.

Alors, prêt à embarquer pour un voyage extraordinaire avec Voyages Bernard-Dupont ? Laissez-nous vous guider vers des horizons lointains, des rencontres uniques et des moments de joie et d'émerveillement. Nous sommes impatients de faire de votre prochain voyage une expérience mémorable et enrichissante. Bon voyage !.</p>
            <div class="slider-container">
                <div class="slider">
                    <img src="img/madrid.jpg" alt="Image 1">
                    <img src="img/paris.jpg" alt="Image 2">
                    <img src="img/Mexico.jpg" alt="Image 3">
                    <img src="img/dublin.jpg" alt="Image 4">
                    <img src="img/bangkok.jpeg" alt="Image 5">
                    <img src="img/NewYork.jpg" alt="Image 6">
                    <img src="img/montreal.jpg" alt="Image 7">
                    <img src="img/pekin.jpeg" alt="Image 8">
                    <img src="img/rome.jpg" alt="Image 9">
                </div>

            </div>



        </main>
    </div>

    <?php require 'footer.php'; ?>
    <script type="text/javascript" src="js/index.js"></script>

</html>