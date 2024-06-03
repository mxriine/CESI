<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once('../../Controleurs/session.php');
require_once('../../Controleurs/offer.php');
?>

<!-- APPLY OFFER | Valider au validateur -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Search</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="../../_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../../_assets/_css/styles.css">
    <link rel="stylesheet" href="../../_assets/_css/offre.css">
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

    <section class="info-offre">
        <article>
            <div class="nom">
                <p> <?php echo $Name_Offer; ?> </p>
            </div>
            <div class="description">
                <h1>Description : </h1>
                <p> <?php echo $Description_Offer; ?> </p>
            </div>
            <div class="competences">
                <h1>Compétences requises :</h1>
                <p> <?php echo $Skills_Offer; ?> </p>
            </div>
            <div class="localisation">
                <h1>Localité : </h1>
                <p>Paris, 8 Rue des Champs-Elysées</p>
            </div>
            <div class="entreprise">
                <h1>Entreprise : </h1>
                <p> <?php echo $Name_Company; ?> </p>
            </div>
            <div class="postulation">
                <h1>Nombre d'élèves ayant postulés : </h1>
                <p> x </p>
            </div>
        </article>

        <article>
            <div class="duree">
                <h1>Durée du stage : </h1>
                <p> <?php echo $Duration_Offer; ?> </p>
            </div>
            <div class="debut">
                <h1>Date début : </h1>
                <p> <?php echo $Date_Offer; ?> </p>
            </div>
            <div class="niveau">
                <h1>Niveau requis : </h1>
                <p> <?php echo $Level_Offer; ?> </p>
            </div>
            <div class="remuneration">
                <h1>Rémunération : </h1>
                <p> <?php echo $Pay_Offer; ?> € /mois</p>
            </div>
            <div class="place">
                <h1>Nombre de places : </h1>
                <p> <?php echo $Place_Offer; ?> </p>
            </div>
        </article>

    </section>

    <section class="partie-motivation">
        <article>
            <div class="titre-motivation">
                <h1>Postuler à l'offre</h1>
            </div>
            <form action="/Controleurs/Manage/apply.php" method="post" enctype="multipart/form-data">
                <div class="motivation">
                    <label for="motivation">Votre lettre de motivation :</label>
                    <textarea id="motivation" name="motivation" rows="20" cols="50"></textarea>
                </div>
                <div class="cv">
                    <label for="cv">Votre CV :</label>
                    <input type="file" id="cv" name="cv">
                </div>
                <div class="bouton-postuler">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </article>
    </section>

</body>

</html>