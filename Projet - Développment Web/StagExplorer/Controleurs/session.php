<?php
// Démarrez la session
session_start();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'inconnu';
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';

// Vérifier la page actuelle
$current_page = basename($_SERVER['PHP_SELF']);

// Afficher un texte différent en fonction du rôle de l'utilisateur
switch ($role) {
    case 'pilote':
        // Vérifier si la page actuelle est DashboardP.php pour les pilotes
        if ($current_page === 'Dashboard.php') {
            // Afficher une navigation spécifique pour le tableau de bord administrateur
            echo '<nav id="nav" class="nav">
            <ul>
                <li><a href="#">' . $prenom . ' | PILOTE</a>
                    <ul class="drop">
                        <li><a href="/Home.php">Accueil</a></li>
                        <li><a href="/Controleurs/logout.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
          </nav>';
        } else {
            // Affichage de la navigation par défaut pour les pilotes et étudiants
            echo '<nav id="nav" class="nav">
                <ul>
                    <li><a href="#">' . $prenom . ' | PILOTE</a>
                        <ul class="drop">
                            <li><a href="/Vues/Pilote/Dashboard.php">Voir le dashboard</a></li>
                            <li><a href="/Controleurs/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
              </nav>';
        }
        break;
    case 'etudiant':
        // Affichage de la navigation par défaut pour les pilotes et étudiants
        echo '<nav id="nav" class="nav">
                <ul>
                    <li><a href="#">' . $prenom . ' | ETUDIANT</a>
                        <ul class="drop">
                            <li><a href="#">Ma WishList</a></li>
                            <li><a href="../Controleurs/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
              </nav>';
        break;
    default:
        // Redirection vers la page de connexion si le rôle n'est pas défini
        header('Location: /Vues/Connection.php');
        exit(); // Assurez-vous de terminer le script après la redirection
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="_assets/_css/styles.css">
</head>

</html>