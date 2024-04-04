<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
    require_once '../../../Controleurs/session.php';
    require_once '../../../Controleurs/Gérer/modifier_etudiant.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant</title>
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
            <h1>MODIFIER UN ETUDIANT</h1>
        </div>
        <article class="contenu">
            <div class="entree">
                <label>Nom</label>
                <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>">
            </div>
            <div class="entree">
                <label>Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>">
            </div>
            
            <div class="centres">
            <label>Centre</label>
            <select id="centre" name="centre">
                <option name = "Sélectionnez">Sélectionnez</option>
                <option value="Pau" name="centre">Pau</option>
                <option value="Toulouse" name="centre">Toulouse</option>
                <option value="Tarbes" name="centre">Tarbes</option>
                <option value="Paris" name="centre">Paris</option>
                <option value="Lyon" name="centre">Lyon</option>
            </select>
            </div>
            <div class="promo">
                <label>Promotions</label>
                <select id="promos" name="promo">
                    <option name = "Sélectionnez">Sélectionnez</option>
                    <option value="1A" name="promo">1A</option>
                    <option value="2A" name="promo">2A</option>
                    <option value="3A" name="promo">3A</option>
                    <option value="4A" name="promo">4A</option>
                    <option value="5A" name="promo">5A</option>
                </select>
            </div>
        </article>
        <article class="boutons-D">
            <button type="submit" id="but1">Sauvegarder</button>
            <button type="button" id="but2" onclick="history.back()">Retour</button>
        </article>
        <article class="boutons-G">
            <a href="../Supprimer/Supprimer_Etudiant.php"><button type="button" id="but3">Supprimer l'étudiant</button></a>
        </article>
   </section>
    

</body>

</html>