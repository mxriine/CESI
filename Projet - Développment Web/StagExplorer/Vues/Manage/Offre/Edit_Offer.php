<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once ('../../../Controleurs/session.php');
require_once ('../../../Controleurs/offer.php');
?>

<!-- PAGE DELETE OFFRE | Valider au validateur  -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Modifier une offre</title>
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
        <form action="/Controleurs/Manage/edit.php" method="POST">
            <input type="hidden" name="id_offer" value="<?php echo $ID_Offer; ?>">
            <article class="BlocOffre1">
                <div class="BlocOffre2">
                    <label>Titre</label>
                    <input class="input1" type="text" name="name_offer" value="<?php echo $Name_Offer; ?>">
                </div>
                <div class="BlocOffre2">
                    <label>Description</label>
                    <textarea rows="3" name="description_offer"><?php echo $Description_Offer; ?></textarea>
                </div>
                <div class="BlocOffre2">
                    <label>Compétences</label>
                    <textarea rows="3" name="skills_offer"><?php echo $Skills_Offer; ?></textarea>
                </div>
                <div class="BlocOffre2">
                    <label>Entreprise</label>
                    <input class="input1" type="text" name="name_company" value="<?php echo $Name_Company; ?>">
                </div>
                <div class="BlocOffre2">
                    <label>Localité</label>
                    <select name="locality">
                        <option value="Pau">Pau</option>
                        <option value="Nantes">Nantes</option>
                    </select>
                </div>
            </article>

            <article class="BlocOffre3">
                <div class="BlocOffre4">
                    <label>Durée de stage</label>
                    <input class="input1" type="text" name="duration_offer" value="<?php echo $Duration_Offer; ?>">
                </div>
                <div class="BlocOffre4">
                    <label>Date début</label>
                    <input class="input1" type="date" name="date_offer" value="<?php echo $Date_Offer; ?>">
                </div>
                <div class="BlocOffre4">
                    <label>Rémunération</label>
                    <input class="input1" type="number" name="pay_offer" value="<?php echo $Pay_Offer; ?>">
                </div>
                <div class="BlocOffre4">
                    <label>Nombre de place</label>
                    <input class="input1" type="number" name="place_offer" value="<?php echo $Place_Offer; ?>">
                </div>
                <div class="BlocOffre4">
                    <label>Niveau requis</label>
                    <select class="input1" name="level_offer">
                        <option value="Sélectionnez"><?php echo $Level_Offer; ?></option>
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
                <button type="submit" name="submit" id="but1">Sauvegarder</button>
                <button type="button" id="but2" onclick="history.back()">Retour</button>
            </article>
        </form>

        <form class="boutons-G" action="/Vues/Manage/Offre/Delete_Offer.php" method="post">
            <input name="id_offer" type="hidden" value="<?php echo $ID_Offer; ?>">
            <button type="submit" id="but3">Supprimer l'offre</button>
        </form>
    </section>
</body>

</html>