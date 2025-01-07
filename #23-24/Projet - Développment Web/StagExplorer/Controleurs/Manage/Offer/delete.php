<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Controleurs/offer.php');
require_once('/www/StagExplorer/Models/Offer.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_offer'])) {
        $id_offer = $_POST['id_offer'];
        Offer::delete($id_offer);
        header('Location: /Vues/Search.php');  // Redirect to the search page or any other page
        exit();
    } else {
        echo "ID de l'offre non spécifié.";
        exit();
    }
}
