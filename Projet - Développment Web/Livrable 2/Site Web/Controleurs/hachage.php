<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/Site Web/server.php');

// Fonction pour hacher le mot de passe
$mdp = "mdp1";
function hacher($mdp)
{
    // Utilisez l'algorithme de hachage bcrypt
    $hash = password_hash($mdp, PASSWORD_DEFAULT);

    echo $hash;
}

function verifier($mdp, $hash)
{
    // Vérifiez si le mot de passe correspond au hachage
    if (password_verify($mdp, $hash)) {
        return true;
    } else {
        return false;
    }
}

?>