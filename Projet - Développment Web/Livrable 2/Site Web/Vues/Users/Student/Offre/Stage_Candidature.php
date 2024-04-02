<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
require_once ('../../../../Controleurs/session.php');
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

    <textarea class="SaisieLettreM" rows="32" cols="80"
        placeholder="Saisissez votre lettre de motivation - 1000 mots maximum" maxlength="1000"></textarea>

    <section class="BlocPostulationOffre">
        <article>
            <div class="TitreStage">
                <p class="TStage">Stage 1</p>
            </div>
            <div class="DescriptionStage">
                <p for="titre">Description: </p>
                <p>BlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlabla</p>
            </div>
            <div class="CompRequises">
                <p for="titre">Compétences requises:</p>
                <p>Mathématiques, BTP</p>
            </div>
            <div class="Localisation">
                <p for="titre">Localité: </p>
                <p>Paris, 8 Rue des Champs-Elysées</p>
            </div>
            <div class="EntrepriseStage">
                <p for="titre">Entreprise: </p>
                <p>Cesi Industrie</p>
            </div>
            <div class="NbPostulation">
                <p for="titre">Nombre d'élèves ayant postulés: </p>
                <p>35</p>
            </div>
        </article>

        <article>
            <div class="TempsStage">
                <p for="TitreBlocD">Durée du stage</p>
                <p>15 semaines</p>
            </div>
            <div class="DateDebut">
                <p for="TitreBlocD">Date début</p>
                <p>15 avril</p>
            </div>
            <div class="NiveauRequis">
                <p for="TitreBlocD">Niveau requis</p>
                <p>BAC +2</p>
            </div>
            <div class="Remuneration">
                <p for="TitreBlocD">Rémunération</p>
                <p>Non renseigné</p>
            </div>
            <div class="NBPlace">
                <p for="TitreBlocD">Nombre de places</p>
                <p>10</p>
            </div>
        </article>

    </section>

    <section class="importCV">
        <input type="file" id="ImportCV" name="CV" accept=".pdf" />
    </section>
    
    <button class="Postuler" type="submit">POSTULER</button>


</body>

</html>