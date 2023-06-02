<!DOCTYPE html>

<html>


<head>
    <meta charset="utf-8">
    <title>Header</title>
    <link rel="stylesheet" href="/css/header.css">
</head>


<header>

    <a class="lien_logo" href="../index.php">
        <img class="logo" src="../img/logo.png" alt="Logo de mon entreprise">
    </a>

    <div class="partie1">
        <h1 class="titre1">Voyages Bernard-Dupont</h1>
        <nav class="menu_haut">
            <ul>
                <a href="../index.php">
                    <li class="accueil_menu">Accueil</li>
                </a>
                <a href="produits.php?cat=amerique">
                    <li class="amerique_menu">Amérique</li>
                </a>
                <a href="produits.php?cat=asie">
                    <li class="asie_menu">Asie</li>
                </a>
                <a href="produits.php?cat=europe">
                    <li class="europe_menu">Europe</li>
                </a>
                <a href="contact.php">
                    <li class="contact_menu">Contact</li>
                </a>
            </ul>
        </nav>

    </div>

    <div class="connexion">
        <div  class="MonCompte">

            <ul id="MonCompteMenu" class="MonCompteMenu">

                <?php if (isset($_SESSION['id'])) { ?>

                    <li class="buttonC" class="panier">
                        <a href="monPanier.php">
                            <div id = "nbArticles">
                                <?php 
                                    if (isset($_SESSION['nbArticles'])) {
                                        echo $_SESSION['nbArticles'];
                                    } else {
                                        echo 0;
                                    }
                                ?>
                            </div>
                            <img class="imgConnexion" src="../img/cart.png" alt="Logo d'un panier">

                        </a>
                    </li>
                    <div class="compteConnexion">
                        <li class="buttonC"> 
                            <img class="imgConnexion" src="../img/profile.png" alt="Photo de profil">
                        </li>

                        <li class="buttonC" onclick="deconnexion()">
                            Déconnexion
                        </li>
                    </div>
                <?php } else { ?>

                    <li class="buttonC" class="boutonmodal1" onclick="openLoginModal()">
                        Connexion
                    </li>

                    <li class="buttonC" classe="boutonmodal2" onclick="openLoginModal2()">
                        S'inscrire
                    </li>

                <?php } ?>

            </ul>

        </div>
        <!-- Modal -->

        <div id="loginModal" class="modal" style="display:none;">

            <div class="modal-content">

                <span id="close" onclick="closeLoginModal()">&times;</span>

                <h2>Connexion</h2>

                <form id="loginForm" onsubmit="login(); return false;">

                    <label for="username">Nom d'utilisateur:</label><br>

                    <input type="text" id="username" name="username" required><br>

                    <label for="password">Mot de passe:</label><br>

                    <input type="password" id="password" name="password" required><br>

                    <input type="submit" value="Se connecter" class="buttonC">

                </form>

            </div>

        </div>

        <!-- Modal2 -->

        <div id="loginModal2" class="modal2" style="display:none;">

            <div class="modal-content">

                <span id="close2" onclick="closeLoginModal2()">&times;</span>

                <h2>Incription</h2>

                <form id="loginForm" onsubmit="inscrire(); return false;">

                    <label for="username2">Nom d'utilisateur:</label><br>

                    <input type="text" id="username2" name="username2" required><br>

                    <label for="password2">Mot de passe:</label><br>

                    <input type="password" id="password2" name="password2" required><br>

                    <label for="confirm_password">Confirmer mot de passe:</label><br>

                    <input type="password" id="confirm_password" name="confirm_password" required><br>

                    <input type="submit" value="S'inscrire" class="buttonC" >

                </form>

            </div>

        </div>
    </div>
 
</header>

</html>