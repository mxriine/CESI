<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
require_once('../../../Controleurs/session.php');
?>

<!-- DASHBOARD ADMIN (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Stage</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/statistics.css">
    <script src="../../../_assets/_js/main.js"></script>
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

    <section class="bloc">
        <article class="partie1">
            <button class="bouton-retour">
                <img class="fleche-retour" src="../../../_assets/img/flecheRetour.png">
            </button>
            <div class="information-etudiant">
                <h1>Etudiant 1</h1>
                <p>Promotion: 1ère année Informatique </br> Centre: Pau</p>
            </div>
            <div>
                <a href="Wishlist.php"><button class="bouton-wishlist" type="button">Consulter la wishlist</button></a>
            </div>
        </article>

        <article class="partie2">
            <div class="information">
                <h1>Nombre d'offres postulé</h1>
                <p>9</p>
                <h1>Nombre d'offres visionné</h1>
                <p>32</p>
                <h1>Nombre d'offres refusé</h1>
                <p>5</p>
                <h1>Nombre de connexion</h1>
                <p>10</p>
            </div>
            <div class="date">
                <h1>Date création de compte</h1>
                <p>19/01/2024</p>
            </div>
        </article>
    </section>

</body>

</html>