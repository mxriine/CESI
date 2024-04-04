<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php

$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'inconnu';
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';

// Vérifier la page actuelle
$current_page = basename($_SERVER['PHP_SELF']);

// Afficher un bouton différent en fonction du rôle de l'utilisateur
switch ($role) {
    case 'admin':
        if ($current_page === 'Stage.php') {
            // Affichage de la navigation par défaut pour les administrateurs
            echo '<section>
                    <form action="/Site Web/Vues/Gérer/Modifier/Modifier_Offre.php" method="GET">
                        <button id="boutonModif" class="modifier" type="submit">Modifier</button>
                    </form>
                </section>';
        }
        break;
    case 'pilote':
        if ($current_page === 'Stage.php') {
            // Affichage de la navigation par défaut pour les administrateurs
            echo '<section>
                    <form action="/Site Web/Vues/Gérer/Modifier/Modifier_Offre.php" method="GET">
                        <button id="boutonModif" class="modifier" type="submit">Modifier</button>
                    </form>
                </section>';
        }
        break;
    case 'etudiant':
        if ($current_page === 'Stage.php') {
            // Affichage de la navigation par défaut pour les administrateurs
            echo '<section>
                    <form action="/Site Web/Vues/Users/Student/Offre/Stage_Candidature.php" method="GET">
                        <button id="boutonModif" class="modifier" type="submit">Postuler</button>
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

