<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
require_once('../../../Controleurs/session.php');
?>

<!-- DASHBOARD ADMIN (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Main</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/entreprise.css">
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

    <section class="container">
        <div class="entete">
            <button class="bouton-retour">
                <img class="fleche-retour" src="../../../_assets/img/flecheRetour.png">
            </button>
            <h1 class="name">Evaluation de l'entreprise</h1>
        </div>

        <div class="Bloc2Eval">
            <label class="label-StageEval">Stage 1</label>
            <label class="label-localitéEval">Localité: Paris, 8 Rue des Champs-Elysées</label>
            <label class="label-localitéEval">Entreprise: CESI Industrie</label>
            <label class="label-entrepriseEval">Qu'avez-vous pensé de l'entreprise</label>

            <div class="ratingEval">
                <div class="evalEval">
                    <input type="radio" id="star5" name="ratingEval" value="5">
                    <label for="star5">☆</label>
                    <input type="radio" id="star4" name="ratingEval" value="4">
                    <label for="star4">☆</label>
                    <input type="radio" id="star3" name="ratingEval" value="3">
                    <label for="star3">☆</label>
                    <input type="radio" id="star2" name="ratingEval" value="2">
                    <label for="star2">☆</label>
                    <input type="radio" id="star1" name="ratingEval" value="1">
                    <label for="star1">☆</label>
                </div>
            </div>
        </div>
        <div class="Bloc4Eval">
            <label class="gras">Durée du stage</label>
            <label>15 semaines</label>
            <label class="gras">Date début</label>
            <label>15 Avril</label>
            <button class="bouton-confirmerEval" type="button" onclick="history.back()">Confirmer</button>
        </div>
    </section>


</body>

</html>