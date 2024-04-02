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
                    <div>
                        <button id="boutonModif" class="modifier" type="button">Modifier</button>
                        <a href="#"></a>
                    </div>
              </section>';
        }
        break;
    case 'pilote':
        if ($current_page === 'Stage.php') {
            // Affichage de la navigation par défaut pour les administrateurs
            echo '<section>
                    <div>
                        <button id="boutonModif" class="modifier" type="button">Modifier</button>
                        <a href="#"></a>
                    </div>
              </section>';
        }
        break;
    case 'etudiant':
        echo '';
        break;
    default:
        // Redirection vers la page de connexion si le rôle n'est pas défini
        header('Location: ../Vues/connection.php');
        exit(); // Assurez-vous de terminer le script après la redirection
}

