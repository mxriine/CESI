<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once ('../../../Controleurs/session.php');
require_once ('../../../Controleurs/Manage/delete.php');
?>

<!-- PAGE DELETE OFFRE | Valider au validateur  -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Search</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="../_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../_assets/_css/styles.css">
    <link rel="stylesheet" href="../../../_assets/_css/delete.css">
    <!-- CSS police -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../../_assets/img/logo.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <form action="/Vues/delete_offer.php" method="POST">
        <section class="supprimer">
            <label for="labelSup1">Souhaitez-vous supprimer l'annonce ? </label>
            <p><?php echo $Name_Offer; ?></p>
            <input type="hidden" name="id_offer" value="<?php echo $ID_Offer; ?>">
            <label for="labelSup2">Attention ! Votre annonce sera supprimée définitivement.</label>
            <div class="boutonSuppAnn">
                <button class="boutonSupprimer" type="submit">Supprimer l'annonce</button>
                <button class="boutonAnnuler" type="button" onClick="history.back()">Annuler</button>
            </div>
        </section>
    </form>


</body>

</html>