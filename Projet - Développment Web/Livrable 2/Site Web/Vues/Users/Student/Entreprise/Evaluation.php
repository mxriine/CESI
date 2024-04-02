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

    <section class="container">
        <div class="entete">
            <button class="bouton-retour">
                <img class="fleche-retour" src="../../../../_assets/img/flecheRetour.png">
            </button>
            <h1 class="name">Evaluation de l'entreprise</h1>
        </div>

        <div class="stage">
            <h1>Stage 1</h1>
            <p>Localité: Paris, 8 Rue des Champs-Elysées</p>
            <p>Entreprise: CESI Industrie</p>
            <p class="entreprise">Qu'avez-vous pensé de l'entreprise</p>

            <div class="evaluation">
                <div class="notation">
                    <input type="radio" id="star5" name="notation" value="5">
                    <label for="star5">☆</label>
                    <input type="radio" id="star4" name="notation" value="4">
                    <label for="star4">☆</label>
                    <input type="radio" id="star3" name="notation" value="3">
                    <label for="star3">☆</label>
                    <input type="radio" id="star2" name="notation" value="2">
                    <label for="star2">☆</label>
                    <input type="radio" id="star1" name="notation" value="1">
                    <label for="star1">☆</label>
                </div>
            </div>
        </div>

        <div class="date">
            <h1>Durée du stage</h1>
            <p>15 semaines</p>
            <h1>Date début</h1>
            <p>15 Avril</p>
            <button class="confirmer" type="button" onclick="history.back()">Confirmer</button>
        </div>
    </section>

</body>

</html>