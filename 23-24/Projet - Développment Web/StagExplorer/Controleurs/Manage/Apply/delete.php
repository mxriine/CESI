<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Controleurs/offer.php');
require_once('/www/StagExplorer/Models/Postulation.php');

// Vérifier si les clés id_offer et id_student existent dans la requête POST
if (isset($_POST['id_offer']) && isset($_POST['id_student'])) {
    // Récupérer les identifiants de l'offre et de l'étudiant depuis la requête POST
    $id_offer = $_POST['id_offer'];
    $id_student = $_POST['id_student'];

    // Appeler la méthode de suppression de la postulation
    Postulate::delete($id_offer, $id_student);

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
    // Si les clés id_offer et id_student ne sont pas définies dans la requête POST
    echo "ID de l'offre ou de l'étudiant non spécifié.";
    exit();
}
