<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

$json_file = 'fichier.json';
$update_stock = json_decode(file_get_contents($json_file), true);

$continent_updated = false;

foreach ($update_stock as $continent => $destinations) {
    foreach ($destinations as $index => $destination) {
        if (isset($data[$destination['pseudo']])) {
            $update_stock[$continent][$index]['stock'] += $data[$destination['pseudo']];
            $continent_updated = true;
        }
    }
}

if ($continent_updated) {
    file_put_contents($json_file, json_encode($restore_stock));
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No matching destination found']);
}
?>
