 <?php

session_start();
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
require_once 'bddData.php';
// Connexion à la base de données


try {
    $pdo=connectDB();

    $stmt = $pdo->prepare("SELECT id, stock FROM Produits");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $productUpdated = false;

    foreach ($products as $product) {
        if (isset($data[$product['id']])) {
            $newStock = $product['stock'] - $data[$product['id']];
            $stmt = $pdo->prepare("UPDATE Produits SET stock = :stock WHERE id = :pseudo");
            $stmt->bindParam(':stock', $newStock);
            $stmt->bindParam(':pseudo', $product['id']);
            $stmt->execute();
            $productUpdated = true;
        }
    }

    if ($productUpdated) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No matching product found']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>

?>


