README :

Notre site est une agence de voyage en ligne. Ce site a été créé par Hippolyte Dupont et Adrien Bernard.

Avant de pouvoir utiliser notre site, vous devez exécuter le script .sql qui se trouve dans le répertoire SQL. Cela permettra d'initialiser la base de données.

Pour cela, suivez les étapes suivantes :

    Allez dans le répertoire SQL.
    Lancez la commande suivante : mysql -u 'votreidsql' -p
    Entrez votre mot de passe.
    Tapez la commande : source produits.sql

Ensuite, retournez dans le répertoire contenant index.php et exécutez la commande suivante :
php -S localhost:8000

Ensuite, ouvrez Firefox et accédez à l'adresse : localhost:8080/index.php

Les identifiants administrateurs sont les suivants :

    Login : admin
    Mot de passe : admin
    
   Dans PHP/bddData.php , PHP/login.php , PHP/inscription.php veuillez rentrer vos identifiants mysql dans $user et dans $pass.

Il est possible de créer un compte en cliquant sur le bouton "Inscriptions". Vous pouvez voyager en Europe, en Amérique, en Asie, et dans chaque continent, vous pourrez choisir parmi 5 pays.

Sur la page d'accueil, vous pouvez voir un tableau qui fait défiler des images de destinations touristiques que nous proposons.

Vous pouvez commander des voyages en les ajoutant au panier. Si vous êtes connecté à un compte, vous pouvez ensuite consulter votre panier. Depuis votre panier, vous pouvez supprimer les articles que vous ne souhaitez plus acheter. Lorsque vous ajoutez des destinations au panier, le stock est modifié en conséquence.

Si vous avez des questions ou des demandes, vous pouvez contacter l'administrateur via le formulaire de contact. Seul l'administrateur peut consulter les stocks de chaque voyage.

Créé par Adrien Bernard et Hippolyte Dupont.
