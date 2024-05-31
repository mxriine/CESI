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
    <link rel="stylesheet" href="../../../_assets/_css/manage/edit.css">
    <!-- CSS police -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!-- JS -->
    <script src="../../../_assets/_js/script.js" defer></script>
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

    <section class="container">
        <div class="label">
            <h1>MODIFIER UNE OFFRE</h1>
        </div>
        <form action="/Controleurs/Manage/edit.php" method="POST">
            <input type="hidden" name="id_offer" value="<?php echo htmlspecialchars($ID_Offer); ?>">
            <article class="form">
                <div class="info">
                    <label>Titre</label>
                    <input type="text" name="name_offer" value="<?php echo htmlspecialchars($Name_Offer); ?>">
                </div>
                <div class="info">
                    <label>Description</label>
                    <textarea rows="3" name="description_offer"><?php echo htmlspecialchars($Description_Offer); ?></textarea>
                </div>
                <div class="info">
                    <label>Compétences</label>
                    <textarea rows="3" name="skills_offer"><?php echo htmlspecialchars($Skills_Offer); ?></textarea>
                </div>
                <div class="info">
                    <label>Entreprise</label>
                    <input type="text" name="name_company" value="<?php echo htmlspecialchars($Name_Company); ?>">
                </div>
                <div class="info">
                    <label>Localité</label>
                    <select name="locality">
                        <option value="Pau">Pau</option>
                        <option value="Nantes">Nantes</option>
                    </select>
                </div>
            </article>

            <article class="form_">
                <div class="infosup">
                    <label>Durée de stage</label>
                    <input type="text" name="duration_offer" value="<?php echo htmlspecialchars($Duration_Offer); ?>">
                </div>
                <div class="infosup">
                    <label>Date début</label>
                    <input type="date" name="date_offer" value="<?php echo htmlspecialchars($Date_Offer); ?>">
                </div>
                <div class="infosup">
                    <label>Rémunération</label>
                    <input type="number" name="pay_offer" value="<?php echo htmlspecialchars($Pay_Offer); ?>">
                </div>
                <div class="infosup">
                    <label>Nombre de places</label>
                    <input type="number" name="place_offer" value="<?php echo htmlspecialchars($Place_Offer); ?>">
                </div>
                <div class="infosup">
                    <label>Niveau requis</label>
                    <select name="level_offer">
                        <option value="Sélectionnez"><?php echo htmlspecialchars($Level_Offer); ?></option>
                        <option value="Bac" <?php if ($Level_Offer == 'Bac') echo 'selected'; ?>>Bac</option>
                        <option value="Bac +1" <?php if ($Level_Offer == 'Bac +1') echo 'selected'; ?>>Bac +1</option>
                        <option value="Bac +2" <?php if ($Level_Offer == 'Bac +2') echo 'selected'; ?>>Bac +2</option>
                        <option value="Bac +3" <?php if ($Level_Offer == 'Bac +3') echo 'selected'; ?>>Bac +3</option>
                        <option value="Bac +4" <?php if ($Level_Offer == 'Bac +4') echo 'selected'; ?>>Bac +4</option>
                        <option value="Bac +5" <?php if ($Level_Offer == 'Bac +5') echo 'selected'; ?>>Bac +5</option>
                    </select>
                </div>
            </article>
            <article class="bouton-left">
                <button type="submit" name="submit" id="save">Sauvegarder</button>
                <button type="button" id="cancel" onclick="history.back()">Retour</button>
            </article>
        </form>

        <form class="bouton-right" action="/Vues/Manage/Offre/Delete_Offer.php" method="post">
            <input name="id_offer" type="hidden" value="<?php echo htmlspecialchars($ID_Offer); ?>">
            <button type="submit" id="delete">Supprimer l'offre</button>
        </form>
    </section>
    <footer>
        <div class="footer" style="padding:24px 48p">
            <p>© 2024 StagExplorer - Tous droits réservés</p>
        </div>
    </footer>
</body>

</html>
