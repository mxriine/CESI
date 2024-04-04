<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
// Inclure le fichier de connexion à la base de données
require_once('../../../server.php');

// Requête SQL pour compter le nombre d'entreprises
$sqlentreprise = "SELECT COUNT(*) AS totalEntreprises FROM Entreprise";

// Exécution de la requête
$resultentreprise = $conn->prepare($sqlentreprise);
$resultentreprise->execute();

if ($resultentreprise) {
    // Récupération du résultat
    $entreprise = $resultentreprise->fetch(PDO::FETCH_ASSOC);

    // Affichage du total d'entreprises
    if ($entreprise) {
        $totalEntreprises = $entreprise['totalEntreprises'];
    } else {
        $totalEntreprises = 0; // Si aucune entreprise trouvée, afficher 0
    }
}

// Requête SQL pour compter le nombre d'offres
$sqloffre = "SELECT COUNT(*) AS totalOffres FROM Offre";

// Exécution de la requête
$resultoffre = $conn->prepare($sqloffre);
$resultoffre->execute();

if ($resultoffre) {
    // Récupération du résultat
    $offres = $resultoffre->fetch(PDO::FETCH_ASSOC);

    // Affichage du total d'offres
    if ($offres) {
        $totalOffres = $offres['totalOffres'];
    } else {
        $totalOffres = 0; // Si aucune offre trouvée, afficher 0
    }
}

// Requête SQL pour compter le nombre de pilotes
$sqlpilote = "SELECT COUNT(*) AS totalPilotes FROM Pilote";

// Exécution de la requête
$resultpilote = $conn->prepare($sqlpilote);
$resultpilote->execute();

if ($resultpilote) {
    // Récupération du résultat
    $pilotes = $resultpilote->fetch(PDO::FETCH_ASSOC);

    // Affichage du total de pilotes
    if ($pilotes) {
        $totalPilotes = $pilotes['totalPilotes'];
    } else {
        $totalPilotes = 0; // Si aucun pilote trouvé, afficher 0
    }
}

// Requête SQL pour compter le nombre d'étudiants
$sqletudiant = "SELECT COUNT(*) AS totalEtudiants FROM Etudiant";

// Exécution de la requête
$resultetudiant = $conn->prepare($sqletudiant);
$resultetudiant->execute();

if ($resultetudiant) {
    // Récupération du résultat
    $etudiants = $resultetudiant->fetch(PDO::FETCH_ASSOC);

    // Affichage du total d'étudiants
    if ($etudiants) {
        $totalEtudiants = $etudiants['totalEtudiants'];
    } else {
        $totalEtudiants = 0; // Si aucun étudiant trouvé, afficher 0
    }
}

// Fermer la connexion à la base de données
$conn = null;

?>