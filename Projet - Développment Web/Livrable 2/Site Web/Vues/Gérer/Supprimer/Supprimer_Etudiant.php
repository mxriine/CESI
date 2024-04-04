<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once '../../../Controleurs/session.php';
require_once '../../../Controleurs/Gérer/Supprimer/supprimer_etudiant.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un Etudiant</title>
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
            <label for="labelSup1">Souhaitez-vous supprimer l'étudiant ?</label>
            <label for="labelSup2">Attention ! Cet étudiant sera supprimé définitivement.</label>
            <div class="boutonSuppAnn">
                <button class="boutonSupprimer" type="submit">Supprimer l'étudiant</button>
                <button class="boutonAnnuler" onClick="history.back()" type="button">Annuler</button>
            </div>
        </section>
    </form>

</body>

</html>