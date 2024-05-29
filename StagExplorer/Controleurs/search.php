<?php

// Inclure le fichier de connexion à la base de données
require_once('server.php');
require_once('/www/StagExplorer/Models/Offer.php');

// Requête pour récupérer les détails des offres
$offres = Offer::getAll();

if (count($offres) > 0) {
    echo '<div id="BLOC_OFFRES">';
    echo '<div class="scroll-section">';
    echo '<div class="column-container">';

    // Boucle pour afficher les offres
    foreach ($offres as $rowOffre) {
        $_SESSION['id_offre'] = $rowOffre['ID_Offer'];
        echo '<div class="column">';
        echo '<div class="scroll-content">';
        echo '<h1 class="TitreOffreEntreprise">' . htmlspecialchars($rowOffre["Name_Offer"]) . '</h1>';
        echo '<div class="publier">';
        echo '<p>Publié le ' . htmlspecialchars($rowOffre["Date_Offer"]) . '</p>';
        echo '</div>';
        echo '<div class="description">';
        echo '<h3 for="TitreDescription/Comp">Description</h3>';
        echo '<p>' . htmlspecialchars($rowOffre["Description_Offer"]) . '</p>';
        echo '</div>';
        echo '<div class="compDemandes">';
        echo '<h3 for="TitreDescription/Comp">Compétences requises : </h3>';
        echo '<p>' . htmlspecialchars($rowOffre["Skills_Offer"]) . '</p>';
        echo '</div>';
        echo '<div>';
        echo '<form action="/Vues/Manage/Offre/Edit_Offer.php" method="post">';
        echo '<input type="hidden" name="id_offer" value="' . $rowOffre['ID_Offer'] . '">';
        echo '<button type="submit" class="boutonModif">Modifier</button>';
        echo '</form>';
        echo '<form action="Vues/Offre/One_Offer.php" method="post">';
        echo '<input type="hidden" name="id_offer" value="' . $rowOffre['ID_Offer'] . '">';
        echo '<button type="submit" class="boutonVision">Visualiser</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>'; // Fin de column-container
    echo '</div>'; // Fin de scroll-section
    echo '</div>'; // Fin de BLOC_OFFRES
} else {
    echo "0 offres trouvées";
}

