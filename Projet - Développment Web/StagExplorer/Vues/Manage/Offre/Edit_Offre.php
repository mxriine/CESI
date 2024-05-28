<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once('../../../Controleurs/session.php');
require_once('../../../Controleurs/offre.php');
?>

<!-- PAGE EDIT OFFRE | Valider au validateur  -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Search</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="../_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../_assets/_css/styles.css">
    <link rel="stylesheet" href="../../../_assets/_css/edit.css">
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
                    <option value="Pau">Pau</option>
                    <option value="Nantes">Nantes</option>
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
                    <option value="Sélectionnez"><?php echo $niveau; ?></option>
                    <option value="Bac">Bac</option>
                    <option value="Bac +1">Bac +1</option>
                    <option value="Bac +2">Bac +2</option>
                    <option value="Bac +3">Bac +3</option>
                    <option value="Bac +4">Bac +4</option>
                    <option value="Bac +5">Bac +5</option>
                </select>
            </div>

        </article>
        <article class="boutons-D">
            <button type="submit" id="but1">Sauvegarder</button>
            <button type="button" id="but2" onclick="history.back()">Retour</button>
        </article>

        <form class="boutons-G" action="/Vues/Manage/Offre/Delete_Offre.php" method="post">
            <input name="id_offre" type="hidden" value="<?php echo $id_offre; ?>">
            <button type="submit" id="but3">Supprimer l'offre</button></a>
        </form>

        </article>
    </section>

</body>

</html>