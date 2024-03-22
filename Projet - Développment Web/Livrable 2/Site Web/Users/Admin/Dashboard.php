<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
// Inclure le fichier de connexion à la base de données
require_once('../Admin/../../_assets/_php/server.php');

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

<!-- DASHBOARD ADMIN (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Dashboard Admin</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../_assets/_css/dashboard.css">
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../_assets/img/logoWeb.png" alt="Logo StagExplorer">

            <a href="../../Main.html">
                <button class="button-accueil">Accueil</button></a>
        </div>


    </header>

    <div class="titre">
        <h1>StagExplorer</h1>
    </div>

    <section class="statistics">
        <div class="partie-entreprise" href="#">
            <a href="../../Statistics/Statistics_Admin.html"><?php echo $totalEntreprises; ?> entreprises</a>
        </div>
        <div class="partie-offre">
            <a href="../../Statistics/Statistics_Admin.html"><?php echo $totalOffres; ?> offres</a>
        </div>
        <div class="partie-pilote" href="#">
            <a href="../../Statistics/Statistics_Admin.html"><?php echo $totalPilotes; ?> pilotes</a>
        </div>
        <div class="partie-etudiant" href="#">
            <a href="../../Statistics/Statistics_Admin.html"><?php echo $totalEtudiants; ?> étudiants</a>
        </div>
    </section>

    <section class="affichage-fonction">

        <div class="fonction-entreprise">
            <p>Entreprise</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Entreprise.html">
                    <button class="creer-entreprise" type="button">Créer une entreprise</button></a>
                <a href="PagesVisionAdmin/page_VisionEntre - VErsionPA.html">
                    <button class="gerer-entreprise" type="button">Gérer une entreprise</button></a>
            </div>
        </div>

        <div class="fonction-offre">
            <p>Offres de stage</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Offre.html">
                    <button class="creer-offre" type="button">Créer une offre</button></a>
                <a href="PagesVisionAdmin/page_VisionOffre - VErsionPA.html">
                    <button class="gerer-offre" type="button">Gérer une offre</button></a>
            </div>
        </div>

        <div class="fonction-pilote">
            <p>Pilote</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Pilote.html">
                    <button class="creer-pilote" type="button">Créer un pilote</button></a>
                <a href="PagesVisionAdmin/page_VisionPilote - VErsionPA.html">
                    <button class="gerer-pilote" type="button">Gérer un pilote</button></a>
            </div>
        </div>

        <div class="fonction-etudiant">
            <p>Etudiant</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Etudiant.html">
                    <button class="creer-etudiant" type="button">Créer un étudiant</button></a>
                <a href="PagesVisionAdmin/page_VisionEtudiant - VErsionPA.html">
                    <button class="gerer-etudiant" type="button">Gérer un étudiant</button></a>
            </div>
        </div>

    </section>

    <footer>
        <div class="footer">
            <a href="#">Confidentialité</a>
            <a href="#">A propos</a>
            <a href="#">F.A.Q</a>
        </div>
    </footer>

</body>

</html>