<?php
require_once('/www/StagExplorer/Models/Postulation.php');


// Récupérer les postulations de l'étudiant
$id_student = $ID_User; // Remplacez 1 par l'ID de l'étudiant dont vous voulez afficher les postulations
$postulations = Postulate::showPostulate($id_student);

// Vérifier s'il y a des postulations
if (count($postulations) > 0) {
    echo '<div class="scroll-section">';

    foreach ($postulations as $postulation) {
        echo '<div class="scroll-content">';
        echo '<div class="Titrestage">';
        echo '<label>' . htmlspecialchars($postulation["Name_Offer"]) . '</label>';
        echo '</div>';
        echo '<div class="place">';

        // Formulaire pour visualiser l'offre
        echo '<form action="/Vues/Offer/Offer.php" method="post">';
        echo '<input type="hidden" name="id_offer" value="' . htmlspecialchars($postulation["ID_Offer"]) . '">';
        echo '<button type="submit" class="btn" id="edit">Voir l\'offre</button>';
        echo '</form>';

        // Formulaire pour supprimer l'offre
        echo '<form action="/Vues/Manage/Postulation/delete_postulation.php" method="post">';
        echo '<input type="hidden" name="id_offer" value="' . htmlspecialchars($postulation["ID_Offer"]) . '">';
        echo '<input type="hidden" name="id_student" value="' . htmlspecialchars($id_student) . '">';
        echo '<button type="submit" class="btn" id="delete">Supprimer</button>';
        echo '</form>';

        echo '</div>';
        echo '</div>'; // Fin de scroll-content
    }

    echo '</div>'; // Fin de scroll-section
} else {
    $error_message = "Aucune postulation trouvée.";
}
