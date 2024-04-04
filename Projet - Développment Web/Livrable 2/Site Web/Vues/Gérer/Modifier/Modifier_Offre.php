<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once '../../../Controleurs/session.php';
require_once '../../../Controleurs/Gérer/Modifier/modifier_offre.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une offre</title>
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
            <h1>MODIFIER UNE OFFRE</h1>
        </div>
        <article class="BlocOffre1">
            <div class="BlocOffre2">
                <label>Titre</label>
                <input class="input1" type="text" name="Titre" value="<?php echo $titre; ?>" placeholder="Stage 1">
            </div>
            <div class="BlocOffre2">
                <label>Description</label>
                <textarea rows=3 placeholder="<?php echo $description; ?>"></textarea>
            </div>
            <div class="BlocOffre2">
                <label>Compétences</label>
                <textarea rows=3 placeholder="<?php echo $competences; ?>"></textarea>
            </div>
            <div class="BlocOffre2">
                <label>Entreprise</label>
                <input class="input1" type="text" name="Entreprise" value="<?php echo $nom_Ent; ?>">
            </div>
            <div class="BlocOffre2">
                <label>Localité</label>
                <select name="Localité">
                    <option name="Pau">Pau</option>
                    <option name="Nantes">Nantes</option>
                </select>
            </div>
        </article>

        <article class="BlocOffre3">
            <div class="BlocOffre4">
                <label>Durée de stage</label>
                <input class="input1" type="datetime" name="DuréeStage" value="<?php echo $duree; ?>">
            </div>
            <div class="BlocOffre4">
                <label>Date début</label>
                <input class="input1" type="date" name="Datedébut" value="<?php echo $date; ?>">
            </div>
            <div class="BlocOffre4">
                <label>Rémunération</label>
                <input class="input1" type="number" name="Rémunération" value="<?php echo $remuneration; ?>">
            </div>
            <div class="BlocOffre4">
                <label>Nombre de place</label>
                <input class="input1" type="number" name="Nombredeplace" value="<?php echo $place; ?>">
            </div>
            <div class="BlocOffre4">
                <label>Niveau requis</label>
                <select class="input1" name="Niveau requis">
                    <option name="Sélectionnez"><?php echo $niveau; ?></option>
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

        <article class="boutons-G">
            <a href="/Gérer/Supprimer/Supprimer_Offre.html"><button type="button" id="but3">Supprimer l'offre</button></a>
        </article>
    </section>

</body>

</html>