<?php
// Démarrez la session
session_start();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'inconnu';
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';

// Vérifier la page actuelle
$current_page = basename($_SERVER['PHP_SELF']);

// Afficher un texte différent en fonction du rôle de l'utilisateur
switch ($role) {
    case 'admin':
        // Vérifier si la page actuelle est DashboardA.php pour les administrateurs
        if ($current_page === 'DashboardA.php') {
            // Afficher une navigation spécifique pour le tableau de bord administrateur
            echo '<nav id="nav" class="nav">
            <ul>
                <li><a href="#">' . $prenom . ' (ADMIN)</a>
                    <ul class="drop">
                        <li><a href="/Site Web/Main.php">Accueil</a></li>
                        <li><a href="/Site Web/Controleurs/logout.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
          </nav>';
        } else {
            // Affichage de la navigation par défaut pour les administrateurs
            echo '<nav id="nav" class="nav">
                <ul>
                    <li><a href="#">' . $prenom . ' (ADMIN)</a>
                        <ul class="drop">
                            <li><a href="/Site Web/Vues/Users/Admin/DashboardA.php">Voir le dashboard</a></li>
                            <li><a href="/Site Web/Controleurs/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
              </nav>';
        }
        break;
    case 'pilote':
        // Vérifier si la page actuelle est DashboardP.php pour les pilotes
        if ($current_page === 'DashboardP.php') {
            // Afficher une navigation spécifique pour le tableau de bord administrateur
            echo '<nav id="nav" class="nav">
            <ul>
                <li><a href="#">' . $prenom . ' (PILOTE)</a>
                    <ul class="drop">
                        <li><a href="/Site Web/Main.php">Accueil</a></li>
                        <li><a href="/Site Web/Controleurs/logout.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
          </nav>';
        } else {
            // Affichage de la navigation par défaut pour les pilotes et étudiants
            echo '<nav id="nav" class="nav">
                <ul>
                    <li><a href="#">' . $prenom . ' (PILOTE)</a>
                        <ul class="drop">
                            <li><a href="/Site Web/Vues/Users/Pilote/DashboardP.php">Voir le dashboard</a></li>
                            <li><a href="/Site Web/Controleurs/logout.php">Déconnexion</a></li>
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
                    <li><a href="#">' . $prenom . ' (ETUDIANT)</a>
                        <ul class="drop">
                            <li><a href="#">Ma WishList</a></li>
                            <li><a href="/Site Web/Controleurs/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
              </nav>';
        break;
    default:
        // Redirection vers la page de connexion si le rôle n'est pas défini
        header('Location: /Site Web/Vues/Connection.php');
        exit(); // Assurez-vous de terminer le script après la redirection
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="/Site Web/_assets/_css/styles.css">
</head>

</html>