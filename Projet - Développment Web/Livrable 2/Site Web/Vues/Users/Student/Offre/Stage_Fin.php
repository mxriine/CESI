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

    <div class="partie">
        <button class="bouton-retour2">
            <img class="fleche-retour" src="../../../../_assets/img/flecheRetour.png">
        </button>
    </div>
    
    <h1 class="stage">Mes stages</h1>

    <section class="scroll-section">
        <article class="scroll-content">
            <h1>Stage 1</h1>
            <p>STAGE TERMINE !</p>

            <a href="../Entreprise/Evaluation.php" class="bouton-evaluer" type="button">Evaluer</button>
        </article>
        <article class="scroll-content-vide">

        </article>
        <article class="scroll-content-vide">

        </article>
    </section>

</body>

</html>