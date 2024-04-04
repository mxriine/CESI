<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once '../../../Controleurs/session.php';
require_once '../../../Controleurs/Gérer/Créer/creer_pilote.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un pilote</title>
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/creation.css">
    <script src="../../../_assets/_java/gerer.js"></script>
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

    <div id="BLOC_INSCRIPTION2" class="blocInscr2">
        <div class="TitreInscription">
            <h1>CCREER UN PILOTE</h1>
        </div>
        <form method="POST" id="formulaire2" onsubmit="return validerFormulaire2()">
            <p class="Etape1">Etape 2: Informations personnelles</p>
            <p id="messageErreurNom" class="messageErreurNom"></p>
            <p id="messageErreurPrenom" class="messageErreurPrenom"></p>
            <section class="BlocNomPrenom">
                <div class="Nom">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="MARTIN" required>
                </div>
                <div class="prenom">
                    <label for="Prenom">Prénom</label>
                    <input type="text" id="Prenom" name="prenom" placeholder="Luc" required>
                </div>
            </section>
            <section class="Promo" id="promo">
                <p>Promotions assignées</p>
                <div>
                    <input type="checkbox" id="1A" name="promo" value="A1">
                    <label for="1A">1ère année</label>
                </div>
                <div>
                    <input type="checkbox" id="2A" name="promo" value="A2">
                    <label for="2A">2ème année</label>
                </div>
                <div>
                    <input type="checkbox" id="3A" name="promo" value="A3">
                    <label for="3A">3ème année</label>
                </div>
                <div>
                    <input type="checkbox" id="4A" name="promo" value="A4">
                    <label for="4A">4ème année</label>
                </div>
                <div>
                    <input type="checkbox" id="5A" name="promo" value="A5">
                    <label for="5A">5ème année</label>
                </div>
            </section>
            <section class="centre" id="centre">
                <label for="centres">Centre</label>
                <select name="centre" id="centres" required>
                    <option value="">Sélectionner</option>
                    <option value="CampusA">CampusA</option>
                    <option value="CampusB">CampusB</option>
                    <option value="CampusC">CampusC</option>
                    <option value="CampusD">CampusD</option>
                    <option value="CampusE">CampusE</option>
                    <option value="CampusF">CampusF</option>
                    <option value="CampusG">CampusG</option>
                    <option value="CampusH">CampusH</option>
                    <option value="CampusI">CampusI</option>
                    <option value="CampusJ">CampusJ</option>
                </select>
            </section>

            <button class="boutonValidationInscription2" id="boutonValidationInscriptionPilote2"
                type="submit">VALIDER</button>
            <p class="messageErreurChamps3">Tous les champs ne sont pas correctement remplis !</p>
        </form>
    </div>

</body>

</html>