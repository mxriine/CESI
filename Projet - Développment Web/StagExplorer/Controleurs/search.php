<?php

// Inclure le fichier de connexion à la base de données
require_once('server.php');

// Requête pour récupérer les détails des offres
$sqlOffre = "SELECT ID_Offre, Nom_Offre, Description_Offre, Competences_Offre, Date_Offre FROM Offre";
$stmtOffre = $conn->prepare($sqlOffre);
$stmtOffre->execute();

// Utilisation de rowCount() pour compter le nombre de lignes retournées
$nbroffre = $stmtOffre->rowCount();

if ($nbroffre > 0) {
    echo '<div id="BLOC_OFFRES">';
    echo '<div class="scroll-section">';
    echo '<div class="column-container">';

    // Boucle pour afficher les offres
    while ($rowOffre = $stmtOffre->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['id_offre'] = $rowOffre['ID_Offre'];
        echo '<div class="column">';
        echo '<div class="scroll-content">';
        echo '<h1 class="TitreOffreEntreprise">' . htmlspecialchars($rowOffre["Nom_Offre"]) . '</h1>';
        echo '<div class="publier">';
        echo '<p>Publié le ' . htmlspecialchars($rowOffre["Date_Offre"]) . '</p>';
        echo '</div>';
        echo '<div class="description">';
        echo '<h3 for="TitreDescription/Comp">Description</h3>';
        echo '<p>' . htmlspecialchars($rowOffre["Description_Offre"]) . '</p>';
        echo '</div>';
        echo '<div class="compDemandes">';
        echo '<h3 for="TitreDescription/Comp">Compétences requises : </h3>';
        echo '<p>' . htmlspecialchars($rowOffre["Competences_Offre"]) . '</p>';
        echo '</div>';
        echo '<div>';
        echo '<form action="/StagExplorer/Vues/Gérer/Modifier/Modifier_Offre.php" method="post">';
        echo '<input type="hidden" name="id_offre" value="' . $rowOffre['ID_Offre'] . '">';
        echo '<button type="submit" class="boutonModif">Modifier</button>';
        echo '</form>';
        echo '<form action="/StagExplorer/Vues/Offre/One_Offre.php" method="post">';
        echo '<input type="hidden" name="id_offre" value="' . $rowOffre['ID_Offre'] . '">';
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

