<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once '../../../Controleurs/session.php';
require_once '../../../Controleurs/Gérer/Supprimer/supprimer_pilote.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un pilote</title>
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/supprimer.css">
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

    <form method="POST">
        <section class="supprimer">
            <label for="labelSup1">Souhaitez-vous supprimer le pilote ?</label>
            <label for="labelSup2">Attention ! Ce pilote sera supprimé définitivement.</label>
            <div class="boutonSuppAnn">
                <button class="boutonSupprimer" type="submit">Supprimer le pilote</button>
                <button class="boutonAnnuler" type="button" onClick="history.back()">Annuler</button>
            </div>
        </section>
    </form>

</body>

</html>