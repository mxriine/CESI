<?php
// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté et si son rôle est défini dans la session
if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    // Afficher un texte différent en fonction du rôle de l'utilisateur
    switch ($role) {
        case 'admin':
            echo "Bienvenue administrateur !";
            break;
        case 'pilote':
            echo "Bienvenue pilote !";
            break;
        case 'etudiant':
            echo "Bienvenue étudiant !";
            break;
        default:
            echo "Bienvenue !";
            break;
    }
} else {
    // Rediriger l'utilisateur vers la page de connexion si le rôle n'est pas défini
    header('Location: ../Vues/Connection.php');
    exit(); // Assurez-vous de terminer le script après la redirection
}
?>
s