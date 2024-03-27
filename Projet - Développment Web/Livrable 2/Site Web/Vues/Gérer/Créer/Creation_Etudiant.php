<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un étudiant</title>
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/creation.css">
    <script src="../../../_assets/_java/student.js"></script>
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../../_assets/img/logoWeb.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
        <nav id="nav" class="nav">
            <ul>
                <li><a href="">ADMINISTRATEUR</a>
                    <ul class="drop">
                        <li><a href="../../../Users/Admin/Dashboard.php">Voir le dashboard</a></li>
                        <li><a href="">Déconnnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <div id="BLOC_INSCRIPTION1">
        <section class="container">
            <div class="title">
                <h1>CREER UN ETUDIANT</h1>
                <p for="Etape1">Etape 1: Entrez les informations</p>
            </div>

            <p id="messageErreurId" class="messageErreurId"></p>
            <div class="id">
                <label for="labelEtape1">Identifiant</label>
                <input type="text" id="identifiant" name="identifiant" placeholder="Luc64" required>
            </div>

            <p id="messageErreurMDP" class="messageErreurMDP"></p>
            <div class="mdp">
                <label for="labelEtape1">Mot de passe</label>
                <input type="password" id="motdp" name="motdepasse" required>
            </div>

            <p id="messageErreurConfirmation" class="messageErreurConfirmation"></p>
            <div class="confirmdp">
                <label for="labelEtape1">Confirmation</label>
                <input type="password" id="confmdp" name="confmotdp" required>
            </div>

            <p id="messageErreurMail" class="messageErreurMail"></p>
            <button class="boutonValidationInscription" id="boutonValidationInscription1" type="submit">VALIDER</button>
        </section>
    </div>

    <div id="BLOC_INSCRIPTION2" style="display: none;">
        <label for="Etape1">Etape 2: Informations personnelles</label>
        <p id="messageErreurNom" class="messageErreurNom"></p>
        <p id="messageErreurPrenom" class="messageErreurPrenom"></p>
        <section class="BlocNomPrenom">

            <div class="Nom">
                <label for="labelEtape1">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="MARTIN">
            </div>
            <div class="prenom">
                <label for="labelEtape1">Prenom</label>
                <input type="text" id="Prenom" name="prenom" placeholder="Luc">
            </div>
        </section>
        <section class="Promo" id="promo">
            <label>Promotion assignée</label>
            <div>
                <input type="radio" id="1A" name="promo" value="1A">
                <label for="1An">1ère année</label>
            </div>
            <div>
                <input type="radio" id="2A" name="promo" value="2A">
                <label for="2An">2ème année</label>
            </div>
            <div>
                <input type="radio" id="3A" name="promo" value="3A">
                <label for="3An">3ème année</label>
            </div>
            <div>
                <input type="radio" id="4A" name="promo" value="4A">
                <label for="4An">4ème année</label>
            </div>
            <div>
                <input type="radio" id="5A" name="promo" value="5A">
                <label for="5An">5ème année</label>
            </div>
        </section>
        <section class="centre" id="centre">
            <label for="labelEtape1">Centre</label>
            <select name="centre" id="centres">
                <option value=''>Sélectionner</option>
                <option value="Pau">Pau</option>
                <option value="Tarbes">Tarbes</option>
                <option value="Toulouse">Toulouse</option>
                <option value="Paris">Paris</option>
                <option value="Lyon">Lyon</option>
            </select>

        </section>
        <button class="boutonValidationInscription2" id="boutonValidationInscription2" type="submit">VALIDER</button>
        <p id="messageErreurChamps2"></p>
    </div>

</body>

</html>