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

    <section class="Bloc">
        <article class="Bloc1">
            <button class="bouton-retour">
                <img class="fleche-retour" src="../../../_assets/img/flecheRetour.png">
            </button>
            <div class="Bloc2">
                <label class="label2">Etudiant 1</label>
                <label>Promotion: 1ère année Informatique </br> Centre: Pau</label>
            </div>
            <div class="Bloc2">
                <a href=""><button class="boutonprofil" type="button">Voir le profil</button></a>
                <a href="/Student/Wishlist.html"><button class="boutonwishlist" type="button">Consulter la
                        wishlist</button></a>
            </div>
        </article>

        <article class="Bloc3">
            <div class="Bloc4">
                <label class="label1">Nombre d'offres postulé</label>
                <label>9</label>
                <label class="label1">Nombre d'offres visionné</label>
                <label>32</label>
                <label class="label1">Nombre d'offres refusé</label>
                <label>5</label>
                <label class="label1">Nombre de connexion</label>
                <label>10</label>
            </div>
            <div class="Bloc5">
                <label class="label1">Date création de compte</label>
                <label>19/01/2024</label>
            </div>
        </article>


    </section>

</body>

</html>