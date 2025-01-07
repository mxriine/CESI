<?php
require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Models/Offer.php');

$offres = Offer::getAll();

if (count($offres) > 0) {
    echo '<div class="scroll-section">';

    foreach ($offres as $rowOffre) {
        echo '<div class="scroll-content">';
        echo '<div class="Titrestage">';
        echo '<label>' . htmlspecialchars($rowOffre["Name_Offer"]) . '</label>';
        echo '</div>';
        echo '<div class=place">';
        
        // Formulaire pour visualiser l'offre
        echo '<form action="/Vues/Manage/Offre/Edit_Offer.php" method="post">';
        echo '<input type="hidden" name="id_offer">';
        echo '<button type="submit" class="btn" id="edit">Modifier</button>';
        echo '</form>';

        // Formulaire pour supprimer l'offre
        echo '<form action="/Vues/Manage/Offre/Delete_Offer.php" method="post">';
        echo '<input type="hidden" name="id_offer">';
        echo '<button type="submit" class="btn" id="delete">Supprimer</button>';
        echo '</form>';

        echo '</div>';
        echo '</div>'; // Fin de scroll-content
    }
    echo '</div>'; // Fin de scroll-section
} else {
    echo "0 offres trouvées";
}
