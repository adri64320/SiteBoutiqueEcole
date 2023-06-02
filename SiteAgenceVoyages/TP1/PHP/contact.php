<?php
// Démarre ou reprend une session
session_start();

// Code de la page
?>

<html>

<head>
    <title>Voyages Bernard-Dupont</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/contact.css">
</head>

<body>
    <?php require 'header.php'; ?>

    <hr class="hr1">
    <div class="contenu">
        <?php require 'nav.php'; ?>

        <main>


            <h1>Formulaire de contact</h1>

            <form action="verifForm.php" method="POST" id="form">


                <div class="dateContact">
                    <label for="dateContact">Date du contact :</label>
                    <div class="dateContactEtErr">
                        <input type="date" id="dateContact" name="dateContact" <?php
                        if (isset($_SESSION['dateContactForm']) && $_SESSION['dateContactErr'] != "") {
                            echo 'value = "' . $_SESSION['dateContactForm'] . '"' . 'style = "color : red;"';
                        } else if (isset($_SESSION['dateContactForm'])) {
                            echo 'value = "' . $_SESSION['dateContactForm'] . '"';
                        }
                        unset($_SESSION['dateContactForm'])
                            ?> required>
                        <span class="input-indicator"><hr></span>
                        <div id="erreurDateContact" class="erreur" style="color : red">
                            <?php
                            if (isset($_SESSION['dateContactErr'])) {
                                echo $_SESSION['dateContactErr'];
                            }
                            unset($_SESSION['dateContactErr'])
                                ?>
                        </div>
                    </div>
                </div>

                <div class="nom_div">
                    <label for="nom">Nom :</label>
                    <div class="nomEtErr">
                        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" <?php
                        if (isset($_SESSION['nomForm']) && $_SESSION['nomErr'] != "") {
                            echo 'value = "' . $_SESSION['nomForm'] . '"' . 'style = "color : red;"';
                        } else if (isset($_SESSION['nomForm'])) {
                            echo 'value = "' . $_SESSION['nomForm'] . '"';
                        }
                        unset($_SESSION['nomForm'])
                            ?> required>
                        <span class="input-indicator"><hr></span>
                        <div id="erreurNom" class="erreur" style="color : red">
                            <?php
                            if (isset($_SESSION['nomErr'])) {
                                echo $_SESSION['nomErr'];
                            }
                            unset($_SESSION['nomErr'])
                                ?>
                        </div>
                    </div>
                </div>


                <div class="prenom">
                    <label for="prenom">Prénom :</label>
                    <div class="prenomEtErr">
                        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" <?php
                        if (isset($_SESSION['prenomForm']) && $_SESSION['prenomErr'] != "") {
                            echo 'value = "' . $_SESSION['prenomForm'] . '"' . 'style = "color : red;"';
                        } else if (isset($_SESSION['prenomForm'])) {
                            echo 'value = "' . $_SESSION['prenomForm'] . '"';
                        }
                        unset($_SESSION['prenomForm'])
                            ?> required>
                        <span class="input-indicator"><hr></span>
                        <div id="erreurPrenom" class="erreur" style="color : red">
                            <?php
                            if (isset($_SESSION['prenomErr'])) {
                                echo $_SESSION['prenomErr'];
                            }
                            unset($_SESSION['prenomErr'])
                                ?>
                        </div>
                    </div>
                </div>


                <div class="mail">
                    <label for="mail">Mail :</label>
                    <div class="mailEtErr">
                        <input type="mail" id="mail" name="mail" placeholder="Entrez votre mail" <?php
                        if (isset($_SESSION['mailForm']) && $_SESSION['mailErr'] != "") {
                            echo 'value = "' . $_SESSION['mailForm'] . '"' . 'style = "color : red;"';
                        } else if (isset($_SESSION['mailForm'])) {
                            echo 'value = "' . $_SESSION['mailForm'] . '"';
                        }
                        unset($_SESSION['mailForm'])
                            ?> required>
                        <span class="input-indicator"><hr></span>
                        <div id="erreurMail" class="erreur" style="color : red">
                            <?php
                            if (isset($_SESSION['mailErr'])) {
                                echo $_SESSION['mailErr'];
                            }
                            unset($_SESSION['mailErr'])
                                ?>
                        </div>
                    </div>
                </div>

                <div class="genre_div">
                    <label class="genre_titre">Genre</label>
                    <label for="qcm1"><input type="radio" id="qcm1" name="qcm" value="1" <?php
                    if (isset($_SESSION['genreForm']) && $_SESSION['genreForm'] == 1) {
                        echo 'checked';
                    }
                    ?> required>
                        Homme </label>
                    <label for="qcm2"><input type="radio" id="qcm2" name="qcm" value="2" <?php
                    if (isset($_SESSION['genreForm']) && $_SESSION['genreForm'] == 2) {
                        echo 'checked';
                    }
                    ?>> Femme
                    </label>
                    <label for="qcm3"><input type="radio" id="qcm3" name="qcm" value="3" <?php
                    if (isset($_SESSION['genreForm']) && $_SESSION['genreForm'] == 3) {
                        echo 'checked';
                    }
                    ?>> Autre
                    </label>
                    <span class="separator"><hr></span>
                    <?php
                    unset($_SESSION['genreForm']);
                    ?>
                </div>


                <div class="dateNaissance">
                    <label for="dateNaissance">Date de naissance</label>
                    <div class="dateNaissanceEtErr">
                        <input type="date" id="dateNaissance" name="dateNaissance" <?php
                        if (isset($_SESSION['dateNaissanceForm']) && $_SESSION['dateNaissanceErr'] != "") {
                            echo 'value = "' . $_SESSION['dateNaissanceForm'] . '"' . 'style = "color : red;"';
                        } else if (isset($_SESSION['dateNaissanceForm'])) {
                            echo 'value = "' . $_SESSION['dateNaissanceForm'] . '"';
                        }
                        unset($_SESSION['dateNaissanceForm'])
                            ?> required>
                        <span class="input-indicator"><hr></span>
                        <div id="erreurDateNaissance" class="erreur" style="color : red">
                            <?php
                            if (isset($_SESSION['dateNaissanceErr'])) {
                                echo $_SESSION['dateNaissanceErr'];
                            }
                            unset($_SESSION['dateNaissanceErr'])
                                ?>
                        </div>
                    </div>
                </div>

                <div class="fonction_div">
                    <label for="fontion" class="fonction_titre"> Fonction :</label>
                    <select id="fonction" name="fonction">
                        <option value="etudiant" <?php
                        if (isset($_SESSION['fonctionForm']) && $_SESSION['fonctionForm'] == 'etudiant') {
                            echo 'selected';
                        }
                        ?>>Etudiant</option>
                        <option value="voyageurs" <?php
                        if (isset($_SESSION['fonctionForm']) && $_SESSION['fonctionForm'] == 'voyageurs') {
                            echo 'selected';
                        }
                        ?>>Voyageurs</option>
                        <option value="recrutement" <?php
                        if (isset($_SESSION['fonctionForm']) && $_SESSION['fonctionForm'] == 'recrutement') {
                            echo 'selected';
                        }
                        ?>>Recrutement</option>
                    </select>
                    <span class="separator"><hr></span>
                    <?php
                    unset($_SESSION['fonctionForm'])
                        ?>

                </div>

                <div class="sujet_div">
                    <label for="sujet">Sujet :</label>
                    <input type="text" id="sujet" name="sujet" placeholder="Quel est le sujet de votre demande ?" <?php
                    if (isset($_SESSION['sujetForm'])) {
                        echo 'value = "' . $_SESSION['sujetForm'] . '"';
                    }
                    unset($_SESSION['sujetForm'])
                        ?> required>
                    <span class="input-indicator"><hr></span>
                </div>

                <div class="message_div">
                    <label for="Message">Message</label>
                    <textarea id="message" name="message" placeholder="Entrez votre message" rows="5" cols="60"
                        required><?php
                        if (isset($_SESSION['messageForm'])) {
                            echo $_SESSION['messageForm'];
                        }
                        unset($_SESSION['messageForm'])
                            ?></textarea>
                    <span class="input-indicator"><hr></span>
                </div>

                <button type="submit">
                    <span class="button_text">Envoyer</span>
                </button>
            </form>
        </main>
    </div>

    <?php require 'footer.php'; ?>

    <script type="text/javascript" src="/js/form.js"></script>

</html>