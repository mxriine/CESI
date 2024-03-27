<!-- RECUPERATION DES DONNEES ET DES SESSIONS (EN PHP) -->
<?php
    require_once('../../../Controleurs/dashboard.php');
    require_once('../../../Controleurs/session.php');
?>

<!-- DASHBOARD PILOTE (EN HTML) -->
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
            <img class="logo" src="../../_assets/img/logoWeb.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
        <nav id="nav" class="nav">
            <ul>
                <li><a href="#"><?php echo isset($_SESSION['prenom']) ? $_SESSION['prenom'] : 'Utilisateur '; ?>(PILOTE)</a>
                    <ul class="drop">
                        <li><a href="../../../Main.php">Accueil</a></li>
                        <li><a href="Controleurs/logout.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <section class="statistique">
        <div class="partie-entreprise">
            <p><?php echo $totalEntreprises; ?> entreprises</p>
        </div>
        <div class="partie-offre">
            <p><?php echo $totalOffres; ?> offres</p>
        </div>
        <div class="partie-etudiant">
            <p><?php echo $totalEtudiants; ?> étudiants</p>
        </div>
    </section>

    <section class="affichage-fonctionnalité">

        <div class="fonction-entreprise">
            <p>Entreprise</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Entreprise.html">
                    <button class="creer-entreprise" type="button">Créer une entreprise</button></a>
                <a href="PagesVisionAdmin/page_VisionEntre - VErsionPA.html">
                    <button class="gerer-entreprise" type="button">Gérer une entreprise</button></a>
            </div>
        </div>

        <div class="fonction-offre">
            <p>Offres de stage</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Offre.html">
                    <button class="creer-offre" type="button">Créer une offre</button></a>
                <a href="PagesVisionAdmin/page_VisionOffre - VErsionPA.html">
                    <button class="gerer-offre" type="button">Gérer une offre</button></a>
            </div>
        </div>

        <div class="fonction-etudiant">
            <p>Etudiant</p>
            <div class="button-fonction">
                <a href="../../Gérer/Créer/Creation_Etudiant.html">
                    <button class="creer-etudiant" type="button">Créer un étudiant</button></a>
                <a href="PagesVisionAdmin/page_VisionEtudiant - VErsionPA.html">
                    <button class="gerer-etudiant" type="button">Gérer un étudiant</button></a>
            </div>
        </div>

    </section>

    <footer>
        <div class="footer">
            <a href="#">Confidentialité</a>
            <a href="#">A propos</a>
            <a href="#">F.A.Q</a>
        </div>
    </footer>

</body>

</html>