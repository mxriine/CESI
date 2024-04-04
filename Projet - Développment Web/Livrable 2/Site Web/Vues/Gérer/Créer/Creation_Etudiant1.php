<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once '../../../Controleurs/session.php';
require_once '../../../Controleurs/Gérer/Créer/creer_etudiant.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un étudiant</title>
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/creation.css">
    <script src="../../../_assets/_java/etudiant.js"></script>
    <script src="../../../_assets/_java/pilote.js"></script>
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

    <div id="BLOC_INSCRIPTION1">
        <section class="container">
            <div class="title">
                <h1>CREER UN ETUDIANT</h1>
                <p for="Etape1">Etape 1: Entrez les informations</p>
            </div>
            <form method="POST" id="formulaire1" onsubmit="return validerFormulaire()">
                <div class="BlocInscription">
                    <p class="messageErreurID" id="messageErreurID"></p>
                    <div class="Id">
                        <label for="identifiant">Identifiant</label>
                        <input type="text" id="identifiant" name="identifiant" placeholder="Luc64" required>
                    </div>
                    <p class="messageErreurMDP" id="messageErreurMDP"></p>
                    <div class="mdp">
                        <label for="motdp">Mot de passe</label>
                        <input type="password" id="motdp" name="motdepasse" required>
                    </div>
                    <p class="messageErreurConfirmation" id="messageErreurConfirmation"></p>

                    <div class="confirmdp">
                        <label for="confmdp">Confirmation</label>
                        <input type="password" id="confmdp" name="confmotdp" required>
                    </div>
                    <button class="boutonValidationInscription" id="boutonValidationInscription1" type="submit">VALIDER</button>

                </div>
            </form>
    </div>

</body>

</html>