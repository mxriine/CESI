<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php

require_once('../../Controleurs/search.php');

$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'inconnu';
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';

// Vérifier la page actuelle
$current_page = basename($_SERVER['PHP_SELF']);

// Afficher un bouton différent en fonction du rôle de l'utilisateur
switch ($role) {
    case 'pilote':
        if ($current_page === 'One_Offre.php') {
            // Affichage de la navigation par défaut pour les administrateurs
            echo '<section>
                    <form action="/StagExplorer/Vues/Gérer/Modifier/Modifier_Offre.php" method="GET">
                        <button id="boutonModif" class="modifier" type="submit">Modifier</button>
                    </form>
                </section>';
        }
        break;
    case 'student':
        if ($current_page === 'One_Offre.php') {
            // Affichage de la navigation par défaut pour les administrateurs
            echo '<section>
                    <form action="/StagExplorer/Vues/Offre/Postuler_Offre.php" method="GET">
                        <button id="boutonModif" class="modifier" type="submit" value="' . $_SESSION['id_offre'] . '">Postuler</button>
                    </form>
                </section>';
        }
        echo '';
        break;
    default:
        // Redirection vers la page de connexion si le rôle n'est pas défini
        header('Location: ../Vues/connection.php');
        exit(); // Assurez-vous de terminer le script après la redirection
}

