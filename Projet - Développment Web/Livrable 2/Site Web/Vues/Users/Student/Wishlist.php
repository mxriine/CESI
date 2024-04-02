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
    <link rel="stylesheet" href="../../../_assets/_css/wishlist.css">
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

        <div class="Bloc1">
            <button class="bouton-retour" onclick="history.back()">
                <img class="fleche-retour" src="../../../_assets/img/flecheRetour.png">
            </button>
            <h1 class="titre-wishlist">Wish-list</h1>
        </div>

        <article class="Bloc3">

            <div class="Bloc2">
                <a href="../PagesVisionSeuleVersionEtudiant/page_OffreSeule.html">
                    <button class="boutonStage" type="button">
                        <img class="imgcoeur" src="../../../_assets/img/coeur.png" alt="Like">Stage 1
                    </button>
                </a>
                <a href="/Student/Stage_Posted.html">
                    <button class="boutonPostuler" type="button">Postuler</button>
                </a>
                <button class="boutoncroix" type="delete">
                    <img class="imgcroix" src="../../../_assets/img/croix.png">
                </button>
            </div>

            <div class="Bloc2">
                <a href="">
                    <button class="boutonStage" type="button">
                        <img class="imgcoeur" src="../../../_assets/img/coeur.png" alt="Like">Stage 2
                    </button>
                </a>
                <a href="">
                    <button class="boutonPostuler" type="button">Postuler</button>
                </a>
                <button class="boutoncroix" type="delete">
                    <img class="imgcroix" src="../../../_assets/img/croix.png">
                </button>

            </div>

            <div class="Bloc2">
                <a href="">
                    <button class="boutonStage" type="button">
                        <img class="imgcoeur" src="../../../_assets/img/coeur.png" alt="Like">Stage 3
                    </button>
                </a>
                <a href="Offre/Stage_Postule.php">
                    <button class="boutonPostuler" type="button">Postuler</button>
                </a>
                <button class="boutoncroix" type="delete">
                    <img class="imgcroix" src="../../../_assets/img/croix.png">
                </button>

            </div>
        </article>
    </section>

</body>

</html>