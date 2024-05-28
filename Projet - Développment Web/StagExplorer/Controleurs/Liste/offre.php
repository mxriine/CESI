<?php
require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Models/Offre.php');

$offres = Offre::getAll();

// Utilisation de rowCount() pour compter le nombre de lignes retournées
$nbroffre = $stmtOffre->rowCount();

if ($nbroffre > 0) {

    echo '<div class="scroll-section">';

    while ($rowOffre = $stmtOffre->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="scroll-content">';
        echo '<div class="Titrestage">';
        echo '<label>' . htmlspecialchars($rowOffre["Nom_Offre"]) . '</label>';
        echo '</div>';
        echo '<div class=place">';
        echo '<a href="/Vue/Manage/Offre/Edit_Offre.php"><button class="bouton-droite2" type="button">Modifier</button></a>';
        echo '<a href="../../Manage/Offre/Delete_Offre.php"><button class="bouton-droite2" type="reset">Supprimer</button></a>';
        echo '</div>';
        echo '</div>'; // Fin de scroll-content
    }
    echo '</div>'; // Fin de scroll-section
} else {
    echo "0 offres trouvées";
}
