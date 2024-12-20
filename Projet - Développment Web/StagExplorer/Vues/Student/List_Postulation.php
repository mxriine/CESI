<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once('../../Controleurs/session.php');
require_once('../../Controleurs/offer.php');
require_once('../../Controleurs/List/postulation.php');
?>

<!-- LIST POSTULATION | Valider au validateur -->
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

    <aside>
        <img class="imgfiltrer" src="../../_assets/img/filtrer.png" alt="Logo filtrer">
        <label id="filtres">Filtrer</label>
        <section class="recherche">
            <div>
                <input type="radio" name="recherche" value="recherche">
                <label>De A à Z</label>
            </div>
            <div>
                <input type="radio" name="recherche" value="recherche">
                <label class="label1">De Z à A</label>
            </div>
        </section>
        <div class="Barre-recherche">
            <label>Rechercher</label>
            <form action="/search" method="GET">
                <input type="text" name="query" placeholder="Recherche...">
                <button type="submit">Rechercher</button>
            </form>
        </div>
    </aside>

 <!--<p class="error"> <?php echo $error_message ?> </p>-->

</body>

</html>