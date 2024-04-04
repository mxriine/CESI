<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
require_once ('../../../../Controleurs/session.php');
?>

<!-- DASHBOARD ADMIN (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Evalutation Entreprise</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../../_assets/_css/entreprise.css">
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
    
    <section class="Bloc">
        <article class="BlocG">
            <div class="TitreStage">
                <label class="TStage">Entreprise 1</label>
            </div>
            <div class="DescriptionStage">
                <label for="TitreBlocG">Description: </label>
                <label>BlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlablaBlabla</label>
            </div>
            <div class="SectAct">
                <label for="TitreBlocG">Secteur d'activité:</label>
                <label for="LabelG">BTP</label>
            </div>
            <div class="Localisation">
                <label for="TitreBlocG">Localité: </label>
                <label for="LabelG">Paris, 8 Rue des Champs-Elysées</label>
            </div>
            <div class="StagiairePostulation">
                <label for="TitreBlocG">Nombre de stagiaires ayant postulés à une offre de cette entreprise: </label>
                <label for="LabelG">65</label>
            </div>
            <div class="NbPostulation">
                <label for="TitreBlocG">Moyenne des évaluations :</label>
                <label>☆☆☆☆</label>
            </div>
        </article>
        <button class="boutonVoirOffreEntre" type="submit">Voir les offres de cette entreprise</button>
    </section>

</body>

</html>