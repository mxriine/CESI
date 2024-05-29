<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Models/Offer.php');

//créer offre
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $data = [
            'name_offer' => $_POST['name_offer'],
            'description_offer' => $_POST['description_offer'],
            'skills_offer' => $_POST['skills_offer'],
            'date_offer' => $_POST['date_offer'],
            'duration_offer' => $_POST['duration_offer'],
            'pay_offer' => $_POST['pay_offer'],
            'place_offer' => $_POST['place_offer'],
            'level_offer' => $_POST['level_offer']
        ];

        // Afficher les données pour débogage
        echo '<pre>';
        print_r($data);
        echo '</pre>';

        try {
            Offer::add($data);
            header('Location: /Vues/Search.php');  // Rediriger vers la page de recherche ou toute autre page
            exit();
        } catch (Exception $e) {
            echo "Erreur lors de la création : " . $e->getMessage();
        }
    } else {
        echo "ID de l'offre non spécifié.";
        exit();
    }
}