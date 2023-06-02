<?php
session_start();
// Variables de connexion à la base de données
$host = 'localhost'; // adresse du serveur MySQL
$user = 'exemple'; // nom d'utilisateur pour la connexion à la base de données
$pass = 'mdp'; // mot de passe pour la connexion à la base de données
$dbname = 'Produits'; // nom de la base de données
function connectDB() {
    global $host, $dbname,$user, $pass ;
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

// Fonction pour se déconnecter de la base de données
function disconnectDB($pdo) {
    $pdo = null;
}

// Fonction pour récupérer toutes les catégories de la base de données
function getCategories($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM Produits");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Fonction pour récupérer tous les produits d'une catégorie donnée
function getProductsByCategory($pdo, $category) {
    $stmt = $pdo->prepare("SELECT * FROM Produits WHERE continent = '$category'");
    $stmt->execute([$category]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}



// Exemple d'utilisation
$pdo = connectDB();
$categories = getCategories($pdo);
foreach ($categories as $category) {
    $products = getProductsByCategory($pdo, $category['continent']);
    // Faire quelque chose avec les produits
}
disconnectDB($pdo);

function addUser($pdo, $username, $password) {
    try {
      $stmt = $pdo->prepare("INSERT INTO clients (utilisateur, password) VALUES (?, ?)");
      $stmt->execute([$username, $password]);
      return true;
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
}
?>
