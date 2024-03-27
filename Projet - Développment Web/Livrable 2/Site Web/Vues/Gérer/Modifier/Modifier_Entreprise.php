<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
    require_once '../../../Controleurs/session.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une entreprise</title>
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/modifier.css">
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
    
    <section class="bloc">
        <div class="titre1">
            <h1>MODIFIER UNE ENTREPRISE</h1>
        </div>
        <article class="contenu">
            <div class="nomEntreprise">
                <label>Nom</label>
                <input type="text" id="nom" name="Nom" value="Entreprise 1">
            </div>
            <div class="descriptionEntreprise">
                <label>Description</label>
                <textarea id="DescriptionEntreprise" name="Description" rows="2" cols="30"
                    value="Description"></textarea>
            </div>
            <div class="activite">
                <label>Secteur d'activité</label>
                <select id="secteur_act" name="secteur_act">
                    <option value="rien" name="rien">Sélectionnnez</option>
                    <option value="BTP" name="BTP">BTP</option>
                    <option value="Informatique" name="Informatique">Informatique</option>
                    <option value="Generaliste" name="Generaliste">Généraliste</option>
                    <option value="Sante" name="Sante">Santé</option>
                </select>
            </div>
            <div class="localite">
                <label>Localité</label>
                <select id="localite" name="localite">
                    <option value="rien" name="rien">Sélectionnnez</option>
                    <option value="Pau" name="Pau">Pau</option>
                    <option value="Tarbes" name="Tarbes">Tarbes</option>
                    <option value="Lourdes" name="Lourdes">Lourdes</option>
                    <option value="Paris" name="Paris">Paris</option>
                </select>
            </div>
            <div class="rating">
                <label>Evaluation</label>
                <div class="eval">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">☆</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">☆</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">☆</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">☆</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1">☆</label>
                </div>
            </div>
        </article>
        <article class="boutons-D">
            <button type="submit" id="but1">Sauvegarder</button>
            <button type="button" id="but2" onclick="history.back()">Retour</button>
        </article>
        <article class="boutons-G">
            <a href="/Gérer/Supprimer/Supprimer_Entreprise.html"><button type="button" id="but3">Supprimer</button></a>
            <button type="submit" id="but4">Archiver</button>
        </article>
    </section>
</body>

</html>