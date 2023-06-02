<?php
session_start();

// Variables de connexion à la base de données
$host = 'localhost'; // adresse du serveur MySQL
$user = 'exemple'; // nom d'utilisateur pour la connexion à la base de données
$pass = 'mdp'; // mot de passe pour la connexion à la base de données
$dbname = 'Produits'; // nom de la base de données

// Fonction pour se connecter à la base de données
function connectDB() {
    global $host, $dbname, $user, $pass;
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die(); // Arrêter l'exécution du script en cas d'échec de la connexion
    }
}


function getMdpBYCategory($pdo, $username) {
    $stmt = $pdo->prepare("SELECT * FROM clients where utilisateur='$username'");
    $stmt->execute([$username]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Fonction pour se déconnecter de la base de données
function disconnectDB($pdo) {
    $pdo = null;
}

// Fonction pour vérifier les informations d'authentification de l'utilisateur
function checkLogin($pdo, $username, $password) {
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE utilisateur = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result && password_verify($password, $result['passwords'])) {
        return $result['id'];
    } else {
        return false;
    }
}

// Connexion à la base de données
$pdo = connectDB();


// Vérification si les champs sont remplis
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Récupération des données POST envoyées par le formulaire de login
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Récupération des données POST envoyées par le formulaire de connexion

    $products = getMdpBYCategory($pdo, $username);

 
    foreach ($products as $product) {
        if ($username == $product['utilisateur'] && $password == $product['passwords'] ) {
            $_SESSION['id'] = $username;
            echo ("success");
            
        }else {
            echo ("error") ;
        }

    }
    disconnectDB($pdo);
// Vérification des informations d'authentification
    
    
}


    // Vérification des informations d'authentification
//     $user_id = checkLogin($pdo, $username, $password);
//     if ($user_id !== false) {
//         // Démarrage de la session
//         session_regenerate_id();
//         $_SESSION['user_id'] = $user_id;
//         echo json_encode("success");
//     } else {
//         echo json_encode("error");
//     }
// } else {
//     echo json_encode("error");
// }

// Fermeture de la connexion à la base de données


?>
