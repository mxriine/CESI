<?php
// Vérifiez que la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez les données JSON envoyées par JavaScript
    $data = file_get_contents('php://input');
    file_put_contents('debug.log', "Contenu brut des données reçues : " . $data . "\n", FILE_APPEND);

    $data = json_decode($data, true);

    // Journal de débogage pour vérifier les données reçues
    file_put_contents('debug.log', "Données décodées : " . print_r($data, true) . "\n", FILE_APPEND);

    // Vérifiez que les données ne sont pas nulles et contiennent les clés attendues
    if ($data && isset($data['ID_Offer']) && isset($data['ID_User'])) {
        // Chemin du fichier JSON
        $file = 'wishlist.json';

        // Lire le contenu existant du fichier JSON ou initialiser un array vide
        if (file_exists($file)) {
            $json_data = file_get_contents($file);
            $json_arr = json_decode($json_data, true);
        } else {
            $json_arr = [];
        }

        // Ajouter les nouvelles données à l'array JSON
        $json_arr[] = $data;

        // Encodez l'array en JSON et enregistrez-le dans le fichier
        if (file_put_contents($file, json_encode($json_arr, JSON_PRETTY_PRINT))) {
            echo json_encode(['success' => true, 'message' => 'Données enregistrées avec succès']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'enregistrement des données']);
        }
    } else {
        // Données invalides, journal de débogage
        file_put_contents('debug.log', "Données invalides : " . print_r($data, true) . "\n", FILE_APPEND);
        echo json_encode(['success' => false, 'message' => 'Données invalides']);
    }
} else {
    // Requête invalide, journal de débogage
    file_put_contents('debug.log', "Requête invalide\n", FILE_APPEND);
    echo json_encode(['success' => false, 'message' => 'Requête invalide']);
}
