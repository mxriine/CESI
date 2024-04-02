<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
require_once ('../../../../Controleurs/session.php');
require_once ('../../../../Controleurs/offre/display.php');
?>

<!-- DASHBOARD ADMIN (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Stage</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../../_assets/_css/offre.css">
    <script src="../../../../_assets/_js/main.js"></script>
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../../../_assets/img/logoWeb.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <section class="container">
        <article>
            <button class="bouton-retour">
                <img class="fleche-retour" src="../../../../_assets/img/flecheRetour.png">
            </button>
            <div class="nom">
                <p>Stage1</p>
            </div>
            <div class="description">
                <h1>Description: </h1>
                <p>BlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlabla</p>
            </div>
            <div class="competences">
                <h1>Compétences requises:</h1>
                <p>Mathématiques, BTP</p>
            </div>
            <div class="localisation">
                <h1>Localité: </h1>
                <p>Paris, 8 Rue des Champs-Elysées</p>
            </div>
            <div class="entreprise">
                <h1>Entreprise: </h1>
                <p>Cesi Industrie</p>
            </div>
            <div class="postulation">
                <h1>Nombre d'élèves ayant postulés: </h1>
                <p>35</p>
            </div>
        </article>

        <article class="date">
            <div class="duree">
                <h1>Durée du stage</h1>
                <p>15 semaines</p>
            </div>
            <div class="debut">
                <h1>Date début</h1>
                <p>15 avril</p>
            </div>
            <div class="niveau">
                <h1>Niveau requis</h1>
                <p>BAC +2</p>
            </div>
            <div class="remuneration">
                <h1>Rémunération</h1>
                <p>Non renseigné</p>
            </div>
            <div class="place">
                <h1>Nombre de places</h1>
                <p>10</p>
            </div>
        </article>

        <div class="favoris">
            <input type="radio" id="favoris" name="favoris" value="favoris">
            <label for="favoris">☆</label>
        </div>
    </section>

</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var favorisLabel = document.querySelector('.favoris label');
        var favorisInput = document.querySelector('.favoris input');

        favorisLabel.addEventListener('click', function (e) {
            if (favorisInput.checked) {
                e.preventDefault(); // Empêcher le comportement par défaut de sélection
                favorisInput.checked = false;
                favorisLabel.style.color = '#000000'; // Couleur initiale
            } else {
                favorisInput.checked = true;
                favorisLabel.style.color = 'orange';
            }
        });
    });
</script>