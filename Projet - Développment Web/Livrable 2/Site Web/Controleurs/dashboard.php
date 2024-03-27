<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
// Inclure le fichier de connexion à la base de données
require_once('../../../server.php');

// Requête SQL pour compter le nombre d'entreprises
$sqlentreprise = "SELECT COUNT(*) AS totalEntreprises FROM Entreprise";

// Exécution de la requête
$resultentreprise = $conn->query($sqlentreprise);

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
$sqloffres = "SELECT COUNT(*) AS totalOffres FROM Offre";

// Exécution de la requête
$resultoffres = $conn->query($sqloffres);

if ($resultoffres) {
    // Récupération du résultat
    $offres = $resultoffres->fetch(PDO::FETCH_ASSOC);

    // Affichage du total d'offres
    if ($offres) {
        $totalOffres = $offres['totalOffres'];
    } else {
        $totalOffres = 0; // Si aucune offre trouvée, afficher 0
    }
}

// Requête SQL pour compter le nombre de pilotes
$sqlpilotes = "SELECT COUNT(*) AS totalPilotes FROM Pilote";

// Exécution de la requête
$resultpilotes = $conn->query($sqlpilotes);

if ($resultpilotes) {
    // Récupération du résultat
    $pilotes = $resultpilotes->fetch(PDO::FETCH_ASSOC);

    // Affichage du total de pilotes
    if ($pilotes) {
        $totalPilotes = $pilotes['totalPilotes'];
    } else {
        $totalPilotes = 0; // Si aucun pilote trouvé, afficher 0
    }
}

// Requête SQL pour compter le nombre d'étudiants
$sqletudiants = "SELECT COUNT(*) AS totalEtudiants FROM Etudiant";

// Exécution de la requête
$resultetudiants = $conn->query($sqletudiants);

if ($resultetudiants) {
    // Récupération du résultat
    $etudiants = $resultetudiants->fetch(PDO::FETCH_ASSOC);

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