<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Controleurs/offer.php');
require_once('/www/StagExplorer/Models/Offer.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $data = [
            'id_offer' => $_POST['id_offer'],
            'name_offer' => $_POST['name_offer'],
            'description_offer' => $_POST['description_offer'],
            'skills_offer' => $_POST['skills_offer'],
            'date_offer' => $_POST['date_offer'],
            'duration_offer' => $_POST['duration_offer'],
            'pay_offer' => $_POST['pay_offer'],
            'place_offer' => $_POST['place_offer'],
            'level_offer' => $_POST['level_offer']
        ];

        try {
            Offer::update($data);
            header('Location: /Vues/Search.php');  // Rediriger vers la page de recherche ou toute autre page
            exit();
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    } else {
        echo "ID de l'offre non spécifié.";
        exit();
    }
}