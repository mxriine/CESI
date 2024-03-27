<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="icon" type="image/png" href="_assets/img/logoWeb.png">
    <link rel="stylesheet" href="_assets/_css/styles.css">
</head>

<body>
    <header>
        <div class="alignement">
            <img class="imgprinc" src="_assets/img/logoWeb.png" alt="Logo StagExplorer">
            <nav id="nav" class="nav">
                <ul>
                    <?php
                    // Démarrez la session
                    session_start();

                    // Vérifiez si l'utilisateur est connecté et si son rôle est défini dans la session
                    if (isset($_SESSION['role'])) {
                        $role = $_SESSION['role'];

                        // Afficher le texte différent en fonction du rôle de l'utilisateur
                        switch ($role) {
                            case 'admin':
                                echo '<li><a href="">ADMINISTRATEUR</a>
                            <ul class="drop">
                                <li><a href="../../Users/Admin/Dashboard.php">Voir le dashboard</a></li>
                                <li><a href="/logout.php">Déconnexion</a></li>
                            </ul>
                        </li>';
                                break;
                            case 'pilote':
                                echo '<li><a href="">PILOTE</a>
                            <ul class="drop">
                                <li><a href="../../Users/Pilote/Dashboard.php">Voir le dashboard</a></li>
                                <li><a href="/logout.php">Déconnexion</a></li>
                            </ul>
                        </li>';
                                break;
                            case 'etudiant':
                                echo '<li><a href="">ETUDIANT</a>
                            <ul class="drop">
                                <li><a href="../../Users/Student/Entreprise_Show.html">Voir le dashboard</a></li>
                                <li><a href="/logout.php">Déconnexion</a></li>
                            </ul>
                        </li>';
                                break;
                            default:
                                echo '<li><a href="/Vues/Connection.php">CONNEXION</a></li>';
                                break;
                        }
                    } else {
                        echo '<li><a href="/Vues/Connection.php">CONNEXION</a></li>';
                    }
                    ?>
                </ul>
            </nav>

        </div>

    </header>
    <div class="Titre">
        <h1>StagExplorer</h1>
    </div>
    <footer>
        <div class="Apropos">
            <a href="#">Confidentialité</a>
            <a href="#">A propos</a>
            <a href="#">F.A.Q</a>
        </div>
    </footer>

</body>

</html>