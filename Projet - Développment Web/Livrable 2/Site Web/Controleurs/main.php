<?php

// Inclure le fichier de connexion à la base de données
require_once('/www/Site Web/server.php');

// Requête pour récupérer les détails des offres
$sqlOffre = "SELECT ID_Offre, Titre_Offre, Description, Compétences, Date_Offre FROM Offre";
$stmtOffre = $conn->prepare($sqlOffre);
$stmtOffre->execute();

// Utilisation de rowCount() pour compter le nombre de lignes retournées
$nbroffre = $stmtOffre->rowCount();

if ($nbroffre > 0) {
    echo '<div id="BLOC_OFFRES">';
    echo '<div class="scroll-section">';
    echo '<div class="column-container">';

    while ($rowOffre = $stmtOffre->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="column">';
        echo '<div class="scroll-content">';
        echo '<h1 class="TitreOffreEntreprise">' . htmlspecialchars($rowOffre["Titre_Offre"]) . '</h1>';
        echo '<div class="publier">';
        echo '<p>Publié le ' . htmlspecialchars($rowOffre["Date_Offre"]) . '</p>';
        echo '</div>';
        echo '<div class="description">';
        echo '<h3 for="TitreDescription/Comp">Description</h3>';
        echo '<p>' . htmlspecialchars($rowOffre["Description"]) . '</p>';
        echo '</div>';
        echo '<div class="compDemandes">';
        echo '<h3 for="TitreDescription/Comp">Compétences requises : </h3>';
        echo '<p>' . htmlspecialchars($rowOffre["Compétences"]) . '</p>';
        echo '</div>';
        echo '<div>';
        echo '<form action="/Site Web/Vues/Gérer/Modifier/Modifier_Offre.php" method="post">';
        echo '<input type="hidden" name="id_offre" value="' . $rowOffre["ID_Offre"] . '">';
        echo '<button type="submit" class="boutonModif">Modifier</button>';
        echo '</form>';
        echo '<form action="/Site Web/Vues/Users/Student/Offre/Stage.php" method="post">';
        echo '<input type="hidden" name="id_offre" value="' . $rowOffre["ID_Offre"] . '">';
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

// Requête pour récupérer les détails des entreprises
$sqlEntreprise = "SELECT ID_Ent, Nom_Ent, Nb_Stag_Ent, Secteur_Act_Ent FROM Entreprise";
$stmtEntreprise = $conn->prepare($sqlEntreprise);
$stmtEntreprise->execute();

// Utilisation de rowCount() pour compter le nombre de lignes retournées
$nbEntreprises = $stmtEntreprise->rowCount();

if ($nbEntreprises > 0) {
    echo '<div id="BLOC_ENTREPRISES" style="display: none;">';
    echo '<div class="scroll-section">';

    while ($rowEntreprise = $stmtEntreprise->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="scroll-content">';
        echo '<h1 class="TitreOffreEntreprise">' . htmlspecialchars($rowEntreprise["Nom_Ent"]) . '</h1>';
        echo '<div class="description">';
        echo '<h3 for="TitreDescription/Comp">Secteur d\'activité</h3>';
        echo '<p>' . htmlspecialchars($rowEntreprise["Secteur_Act_Ent"]) . '</p>';
        echo '</div>';
        echo '<div class="compDemandes">';
        echo '<h3 for="TitreDescription/Comp">Nombre de stagiaires ayant postulé à une offre : </h3>';
        echo '<p> →  ' . htmlspecialchars($rowEntreprise["Nb_Stag_Ent"]) . ' personnes </p>';
        echo '</div>';
        echo '<div>';
        echo '<form action="/Site Web/Vues/Gérer/Modifier/Modifier_Entreprise.php" method="post">';
        echo '<input type="hidden" name="id_entreprise" value="' . $rowEntreprise["ID_Ent"] . '">';
        echo '<button type="submit" class="boutonModif">Modifier</button>';
        echo '</form>';
        echo '<form action="#" method="post">';
        echo '<input type="hidden" name="id_entreprise" value="' . $rowEntreprise["ID_Ent"] . '">';
        echo '<button type="submit" class="boutonVision">Visualiser</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>'; // Fin de scroll-section
    echo '</div>'; // Fin de BLOC_ENTREPRISES
} else {
    echo "0 entreprises trouvées";
}

// Requête pour récupérer les détails des pilotes
$sqlpilote = "SELECT personne.ID_Pers, personne.Nom_Pers, personne.Prenom_Pers
                FROM pilote
                JOIN personne ON pilote.ID_Pers = personne.ID_Pers";
$stmtpilote = $conn->prepare($sqlpilote);
$stmtpilote->execute();

// Utilisation de rowCount() pour compter le nombre de lignes retournées
$nbrpilote = $stmtpilote->rowCount();

if ($nbrpilote > 0) {
    echo '<div id="BLOC_PILOTES" style="display: none;">';
    echo '<div class="scroll-sectionPiloteEtudiant">';

    while ($rowPilote = $stmtpilote->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="scroll-contentPiloteEtudiant">';
        echo '<div class="Bloc1">';
        echo '<label class="label1">' . htmlspecialchars($rowPilote["Nom_Pers"]) . ' ' . htmlspecialchars($rowPilote["Prenom_Pers"]) . '</label>';
        echo '<label class="label2">Promotions assignées : 1ère année Informatique</label>';
        echo '</div>';
        echo '<div class="Bloc2">';
        // Formulaire pour soumettre l'ID de la personne à modifier
        echo '<form action="/Site Web/Vues/Gérer/Modifier/Modifier_Pilote.php" method="post">';
        echo '<input type="hidden" name="id_personne" value="' . $rowPilote["ID_Pers"] . '">';
        echo '<button type="submit" class="bouton-modifier">Modifier</button>';
        echo '</form>';
        echo '<a href="/Site Web/Vues/Statistics.php"><button type="button" class="bouton-modifier">Visionner</button></a>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>'; // Fin de scroll-sectionPiloteEtudiant
    echo '</div>'; // Fin de BLOC_PILOTES

} else {
    echo "0 offres trouvées";
}

// Requête pour récupérer les détails des étudiants
$sqletudiant = "SELECT personne.Id_Pers, personne.Nom_Pers, personne.Prenom_Pers, promotion.Nom_Promo, promotion.Specialite_Promo
                FROM etudiant
                JOIN personne ON etudiant.ID_Pers = personne.ID_Pers
                JOIN promotion ON etudiant.ID_Promotion = promotion.ID_Promotion";
$stmtetudiant = $conn->prepare($sqletudiant);
$stmtetudiant->execute();

// Utilisation de rowCount() pour compter le nombre de lignes retournées
$nbretudiant = $stmtetudiant->rowCount();

if ($nbretudiant > 0) {
    echo '<div id="BLOC_ETUDIANTS" style="display: none;">';
    echo '<div class="scroll-sectionPiloteEtudiant">';

    while ($rowetudiant = $stmtetudiant->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="scroll-contentPiloteEtudiant">';
        echo '<div class="Bloc1">';
        echo '<label class="label1">' . htmlspecialchars($rowetudiant["Nom_Pers"]) . ' ' . htmlspecialchars($rowetudiant["Prenom_Pers"]) . '</label>';
        echo '<label class="label2">Promotion : ' . htmlspecialchars($rowetudiant["Nom_Promo"]) . ' ' . htmlspecialchars($rowetudiant["Specialite_Promo"]) . '</label>';
        echo '</div>';
        echo '<div class="Bloc2">';
        // Formulaire pour soumettre l'ID de la personne à modifier
        echo '<form action="/Site Web/Vues/Gérer/Modifier/Modifier_Etudiant.php" method="post">';
        echo '<input type="hidden" name="id_personne" value="' . $rowetudiant["Id_Pers"] . '">';
        echo '<button type="submit" class="bouton-modifier">Modifier</button>';
        echo '</form>';
        echo '<a href="/Site Web/Vues/Statistics.php"><button type="button" class="bouton-modifier">Visionner</button></a>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>'; // Fin de scroll-sectionPiloteEtudiant
    echo '</div>'; // Fin de BLOC_PILOTES

} else {
    echo "0 offres trouvées";
}
