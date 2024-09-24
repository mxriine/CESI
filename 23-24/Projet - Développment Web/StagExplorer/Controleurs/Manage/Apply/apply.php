<?php
// Controleurs/Manage/apply.php

require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Controleurs/offer.php');
require_once('/www/StagExplorer/Models/Postulation.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous que toutes les données nécessaires sont présentes
    if (isset($_POST['motivation']) && isset($_FILES['cv']) && isset($_POST['id_user']) && isset($_POST['id_offer'])) {
        // Récupérer les données du formulaire
        $motivation = $_POST['motivation'];
        $cv = $_FILES['cv'];

        // Récupérer les IDs de l'étudiant et de l'offre
        $id_student = $_POST['id_user'];
        $id_offer = $_POST['id_offer'];

        // Chemin absolu vers le répertoire de téléchargement
        $upload_dir = '/www/StagExplorer/_assets/upload/';

        // Assurez-vous que le répertoire de téléchargement existe, sinon créez-le
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Traiter le fichier CV et le sauvegarder
        $cv_path = $upload_dir . basename($cv['name']);
        if (move_uploaded_file($cv['tmp_name'], $cv_path)) {
            // Préparer les données pour l'insertion
            $data = [
                'id_offer' => $id_offer,
                'id_student' => $id_student,
                'lettermotivation' => $motivation,
                'cv' => $cv_path
            ];

            // Appeler la méthode add pour insérer les données
            Postulate::add($data);

            // Afficher une notification à l'utilisateur avec un gestionnaire d'événements pour annuler la redirection
            echo '<script>
            var confirmation = confirm("La postulation a bien été enregistrer. Cliquez sur OK pour être redirigé vers la page de recherche.");
            if (confirmation) {
                window.location.href = "/Vues/Search.php";
            }
          </script>';

            // Terminer le script
            exit();
        } else {
            echo "Erreur lors du téléchargement de votre CV.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
