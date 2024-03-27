<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
    require_once '../../../Controleurs/session.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une offre</title>
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/creation.css">
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
        <div class="title">
            <h1>CREER UNE OFFRE</h1>
        </div>
        <article class="partie1">
            <div class="entree">
                <label>Titre</label>
                <input class="input1" type="text" id="TitreCO" value="Titre" placeholder="Entrez un titre">
            </div>
            <div class="entree">
                <label>Description</label>
                <textarea id="DescriptionCO" rows=3 placeholder="Décrivez votre annonce"></textarea>
            </div>
            <div class="entree">
                <label>Compétences</label>
                <textarea id="CompétencesCO" rows=3 placeholder="Entrez les compétences requises"></textarea>
            </div>
            <div class="entree">
                <label>Entreprise</label>
                <input class="input1" type="text" id="EntrepriseCO" value="Entreprise" placeholder="Entrez le nom d'une entreprise">
            </div>
            <div class="entree">
                <label>Localité</label>
                <select name="Localité">
                    <option name="Sélectionnez">Sélectionnez</option>
                    <option name="Pau">Pau</option>
                    <option name="Nantes">Nantes</option>
                </select>
            </div>
        </article>

        <article class="partie2">
            <div class="entree2">
                <label>Durée de stage</label>
                <input class="input1" type="datetime" name="DuréeStage" value="DuréeStage">
            </div>
            <div class="entree2">
                <label>Date début</label>
                <input class="input1" type="date" name="Datedébut" value="Datedébut">
            </div>
            <div class="entree2">
                <label>Rémunération</label>
                <input class="input1" type="number" name="Rémunération" value="Remuneration">
            </div>
            <div class="entree2">
                <label>Nombre de place</label>
                <input class="input1" type="number" name="Nombredeplace" vaue="Nombredeplace">
            </div>
            <div class="entree2">
                <label>Niveau requis</label>
                <select class="input1" name="Niveau requis">
                    <option name="Sélectionnez">Sélectionnez</option>
                    <option name="Bac">Bac</option>
                    <option name="Bac +1">Bac +1</option>
                    <option name="Bac +2">Bac +2</option>
                    <option name="Bac +3">Bac +3</option>
                    <option name="Bac +4">Bac +4</option>
                    <option name="Bac +5">Bac +5</option>
                </select>
            </div>

        </article>
        <article class="boutons-D">
            <button type="submit" id="but1">Sauvegarder</button>
            <button type="button" id="but2" onclick="history.back()">Retour</button>
        </article>

    </section>

</body>

</html>