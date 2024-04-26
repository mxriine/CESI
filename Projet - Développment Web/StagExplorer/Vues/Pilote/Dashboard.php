<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once('../../Controleurs/session.php');
require_once('../../Controleurs/dashboard.php');
?>

<!-- DASHBOARD PILOTE | Valider au validateur  -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Search</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="../../_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../../_assets/_css/styles.css">
    <link rel="stylesheet" href="../../_assets/_css/dashboard.css">
    <!-- CSS police -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../_assets/img/logo.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <section class="statistique">
        <div class="partie-entreprise">
            <p><?php echo $totalEntreprises; ?> entreprises</p>
        </div>
        <div class="partie-offre">
            <p><?php echo $totalOffres; ?> offres</p>
        </div>
        <div class="partie-etudiant">
            <p><?php echo $totalEtudiants; ?> étudiants</p>
        </div>
    </section>

    <section class="affichage-fonctionnalité">

        <div class="fonction-entreprise">
            <p>Entreprise</p>
            <div class="button-fonction">
                <a href="../EnCours.php">
                    <button class="creer-entreprise" type="button">Créer une entreprise</button></a>
                <a href="../EnCours.php">
                    <button class="gerer-entreprise" type="button">Voir les entreprise</button></a>
            </div>
        </div>

        <div class="fonction-offre">
            <p>Offres de stage</p>
            <div class="button-fonction">
                <a href="../Gérer/Offre/Création_Offre.php">
                    <button class="creer-offre" type="button">Créer une offre</button></a>
                <a href="../Offre/Liste_Offre.php">
                    <button class="gerer-offre" type="button">Voir les offre</button></a>
            </div>
        </div>

        <div class="fonction-etudiant">
            <p>Etudiant</p>
            <div class="button-fonction">
                <a href="../EnCours.php">
                    <button class="creer-etudiant" type="button">Créer un étudiant</button></a>
                <a href="../EnCours.php">
                    <button class="gerer-etudiant" type="button">Voir les étudiant</button></a>
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