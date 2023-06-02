<?php

session_start();

// Connexion à la base de données
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
$pdo = connectDB();

// Récupération des données POST envoyées par le formulaire
$username = $_POST['username2'];
$password = $_POST['password2'];
$confirm_password = $_POST['confirm_password'];
function addUser($pdo, $username, $password) {
    try {
      $stmt = $pdo->prepare("INSERT INTO clients (utilisateur, passwords) VALUES (?, ?)");
      $stmt->execute([$username, $password]);
      return true;
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
}
// Vérification si les champs sont remplis
if (empty($username) || empty($password) || empty($confirm_password)) {
    $error = "Tous les champs sont obligatoires.";
} else if ($password !== $confirm_password) {
    $error = "Les deux mots de passe ne correspondent pas.";
} else {
    // Vérification si l'utilisateur n'existe pas déjà dans la base de données
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE utilisateur = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo "utilise";
        exit;
    } else {
        // Insertion des informations de l'utilisateur dans la base de données
        addUser($pdo, $username, $password);
        echo "success";
        exit;
    }
}

// Fermeture de la connexion à la base de données
$pdo = null;

?>
