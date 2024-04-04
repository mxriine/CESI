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

    <div class="TitreInscription">
    <h1>Création compte Etudiant</h1>
</div>

<div>
    <form method="POST" id="formulaire2"  onsubmit="return validerFormulaire2()">
    <p class="Etape1">Etape 2: Informations personnelles</p>

    <div class="BlocNomPrenom">
        <div class="Nom">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="MARTIN" required>
        </div>
        <div class="prenom">
            <label for="Prenom">Prenom</label>
            <input type="text" id="Prenom" name="prenom" placeholder="Luc" required>
        </div>
    </div>
    <section class="Promo" id="promo">
        <label>Promotion assignée</label>
        <div>
            <input type="radio" id="A1" name="promo" value="A1">
            <label for="A1">1ère année</label>
        </div>
        <div>
            <input type="radio" id="A2" name="promo" value="A2">
            <label for="A2">2ème année</label>
        </div>
        <div>
            <input type="radio" id="A3" name="promo" value="A3">
            <label for="A3">3ème année</label>
        </div>
        <div>
            <input type="radio" id="A4" name="promo" value="A4">
            <label for="A4">4ème année</label>
        </div>
        <div>
            <input type="radio" id="A5" name="promo" value="A5">
            <label for="A5">5ème année</label>
        </div>
    </section>
    <section class="centre" id="centre" >
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
    
    <button class="boutonValidationInscription2" id="boutonValidationInscriptionPilote2" type="submit">VALIDER</button>

</form>
</div>

</body>

</html>