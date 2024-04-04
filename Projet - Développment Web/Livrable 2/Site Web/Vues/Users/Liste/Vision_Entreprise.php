<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
require_once('../../../Controleurs/session.php');
?>

<!-- DASHBOARD ADMIN (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Dashboard Admin</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../../_assets/_css/dashboard.css">
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
    <div class="scroll-section">
        <div class="scroll-content">
            <label>Entreprise 1</label>
            <div class="scroll-contentBouton">
                <a href=""><button class="bouton-droite2" type="button">Consulter les statistiques</button></a>
                <a href="../Modification/modifier_Entre.html"><button class="bouton-droite1"type="button">Modifier</button></a>
                <a href="../Supprimer/supprimer_Entreprise.html"><button class="bouton-droite1" type="button">Supprimer</button></a>
            </div>
        </div>
    
        <div class="scroll-content">
            <label>Entreprise 2</label>
            <div class="scroll-contentBouton">
            <a href=""><button class="bouton-droite2" type="button">Consulter les statistiques</button></a>
            <a href="../Modification/modifier_Entre.html"><button class="bouton-droite1"type="button">Modifier</button></a>
            <a href="../Supprimer/supprimer_Entreprise.html"><button class="bouton-droite1" type="reset">Supprimer</button></a>
        </div>
        </div>
        <div class="scroll-content">
            <label>Entreprise 3</label>
            <div class="scroll-contentBouton">
            <a href=""><button class="bouton-droite2" type="button">Consulter les statistiques</button></a>
            <a href="../Modification/modifier_Entre.html"><button class="bouton-droite1"type="button">Modifier</button></a>
            <a href="../Supprimer/supprimer_Entreprise.html"><button class="bouton-droite1" type="reset">Supprimer</button></a>
        </div>
        </div>
        <div class="scroll-content">
            <label>Entreprise 4</label>
            <div class="scroll-contentBouton">
            <a href=""><button class="bouton-droite2" type="button">Consulter les statistiques</button></a>
            <a href="../Modification/modifier_Entre.html"><button class="bouton-droite1"type="button">Modifier</button></a>
            <a href="../Supprimer/supprimer_Entreprise.html"><button class="bouton-droite1" type="reset">Supprimer</button></a>
        </div>
        </div>
        <div class="scroll-content">
            <label>Entreprise 5</label>
            <div class="scroll-contentBouton">
            <a href=""><button class="bouton-droite2" type="button">Consulter les statistiques</button></a>
            <a href="../Modification/modifier_Entre.html"><button class="bouton-droite1"type="button">Modifier</button></a>
            <a href="../Supprimer/supprimer_Entreprise.html"><button class="bouton-droite1" type="reset">Supprimer</button></a>
        </div>
        </div>
        <div class="scroll-content">
            <label>Entreprise 6</label>
            <div class="scroll-contentBouton">
            <a href=""><button class="bouton-droite2" type="button">Consulter les statistiques</button></a>
            <a href="../Modification/modifier_Entre.html"><button class="bouton-droite1"type="button">Modifier</button></a>
            <a href="../Supprimer/supprimer_Entreprise.html"><button class="bouton-droite1" type="reset">Supprimer</button></a>
        </div>
        </div>
        <div class="scroll-content">
            <label>Entreprise 7</label>
            <div class="scroll-contentBouton">
            <a href=""><button class="bouton-droite2" type="button">Consulter les statistiques</button></a>
            <a href="../Modification/modifier_Entre.html"><button class="bouton-droite1"type="button">Modifier</button></a>
            <a href="../Supprimer/supprimer_Entreprise.html"><button class="bouton-droite1" type="reset">Supprimer</button></a>
        </div>
        </div>
    </div>
    <aside>
        <img class = "imgfiltrer" src="../Images/filtrer.jpg" alt="Logo filtrer">
        <label for="filtres">Filtrer</label>
        <section class="recherche">
            <div>
            <input type="radio" name="recherche" value="recherche">
            <label>De A à Z</label>
        </div>
        <div >
            <input type="radio" name="recherche" value="recherche">
            <label class="label1">De Z à A</label>
        </div>
        </section>
        <div class="Barre-recherche">
            <label>Rechercher</label>
            <form action="/search" method="GET">
                <input type="text" name="query" placeholder="Recherche...">
                <button type="submit">Rechercher</button>
            </form>
        </div>
    </aside>

</body>
</html>

</body>