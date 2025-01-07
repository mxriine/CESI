<?php
// Démarrez la session
session_start();

$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'inconnu';
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';
$ID_User = isset($_SESSION['id']) ? $_SESSION['id'] : '';;

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
                        <li><a href="/Vues/Search.php">Accueil</a></li>
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

            echo '<nav id="nav" class="mininav">
              <ul>
                  <li><a href="#"><i class="fa fa-bars"></i></a>
                      <ul class="minidrop">
                          <li><a href="#">' . $prenom . ' | PILOTE</a>
                          <li><a href="/Vues/Pilote/Dashboard.php">Voir le dashboard</a></li>
                          <li><a href="/Controleurs/logout.php">Déconnexion</a></li>
                      </ul>
                  </li>
              </ul>
            </nav>';
        }
        break;
    case 'student':
        // Affichage de la navigation par défaut pour les pilotes et étudiants
        if ($current_page === 'List_Postulation.php') {
            // Afficher une navigation spécifique pour le tableau de bord administrateur
            echo '<nav id="nav" class="nav">
                <ul>
                    <li><a href="#">' . $prenom . ' | STUDENT</a>
                        <ul class="drop">
                        <li><a href="/Vues/Search.php">Accueil</a></li>
                            <li><a href="/Controleurs/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
              </nav>';
        } else {
            // Affichage de la navigation par défaut pour les pilotes et étudiants
            echo '<nav id="nav" class="nav">
                <ul>
                    <li><a href="#">' . $prenom . ' | STUDENT</a>
                        <ul class="drop">
                            <li><a href="/Vues/Student/List_Postulation.php">Mes voeux</a></li>
                            <li><a href="/Controleurs/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
              </nav>';
        }
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
    <!-- CSS -->
    <link rel="stylesheet" href="_assets/_css/styles.css">
    <!-- CSS icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

</html>