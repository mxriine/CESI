<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
    require_once('../../../Controleurs/dashboard.php');
    require_once('../../../Controleurs/session.php');
?>

<!-- DASHBOARD ADMIN (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Dashboard Admin</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/dashboard.css">
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../../_assets/img/logoWeb.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <section class="statistics">
        <div class="partie-entreprise" href="#">
            <a href="../../Statistics/Statistics_Entreprise.php">
                <?php echo $totalEntreprises; ?> entreprises
            </a>
        </div>
        <div class="partie-offre">
            <a href="../../../Statistics/Statistics_Offre.php">
                <?php echo $totalOffres; ?> offres
            </a>
        </div>
        <div class="partie-pilote" href="#">
            <a href="../../../Statistics/Statistics_Pilote.php">
                <?php echo $totalPilotes; ?> pilotes
            </a>
        </div>
        <div class="partie-etudiant" href="#">
            <a href="../../../Statistics/Statistics_Etudiant.php">
                <?php echo $totalEtudiants; ?> étudiants
            </a>
        </div>
    </section>

    <section class="affichage-fonction">

        <div class="fonction-entreprise">
            <p>Entreprise</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Entreprise.php">
                    <button class="creer-entreprise" type="button">Créer une entreprise</button></a>
                <a href="../Liste/Vision_Entreprise.php">
                    <button class="gerer-entreprise" type="button">Gérer une entreprise</button></a>
            </div>
        </div>

        <div class="fonction-offre">
            <p>Offres de stage</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Offre.php">
                    <button class="creer-offre" type="button">Créer une offre</button></a>
                <a href="../Liste/Vision_Offre.php">
                    <button class="gerer-offre" type="button">Gérer une offre</button></a>
            </div>
        </div>

        <div class="fonction-pilote">
            <p>Pilote</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Pilote.php">
                    <button class="creer-pilote" type="button">Créer un pilote</button></a>
                <a href="../Liste/Vision_Pilote.php">
                    <button class="gerer-pilote" type="button">Gérer un pilote</button></a>
            </div>
        </div>

        <div class="fonction-etudiant">
            <p>Etudiant</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Etudiant.php">
                    <button class="creer-etudiant" type="button">Créer un étudiant</button></a>
                <a href="../Liste/Vision_Etudiant.php">
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