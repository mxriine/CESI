<?php
// Démarrez la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once('server.php');

// Initialiser les variables
$error_message = "";

// Vérifier si le formulaire a été soumis
if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    $mail = $_POST['mail'];
    $password = $_POST['mdp'];

    // Protégez votre requête contre les injections SQL en utilisant les déclarations préparées
    $sql = "SELECT *, 
                CASE
                    WHEN Pilo.ID_Pilote IS NOT NULL THEN 'pilote'
                    WHEN Etud.ID_Student IS NOT NULL THEN 'student'
                    ELSE 'inconnu'
                END AS role 
            FROM Users AS User 
            LEFT JOIN Pilote AS Pilo ON User.ID_User = Pilo.ID_User
            LEFT JOIN Student AS Etud ON User.ID_User = Etud.ID_User
            WHERE Email_User = :mail AND Password_User = :password";

    // Préparez la requête SQL pour l'exécution
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row ) {
        // Stocker les informations d'identification et le prénom dans des variables de session
        $_SESSION['id'] = $row['ID_User'];
        $_SESSION['prenom'] = $row['Name_User'];
        $_SESSION['mail'] = $row['Email_User'];
        $_SESSION['mdp'] = $row['Password_User'];
        $_SESSION['role'] = $row['role'];

        // Redirection en fonction du rôle
        switch ($_SESSION['role']) {
            case 'pilote':
                header('Location: /Vues/Search.php');
                exit();
            case 'student':
                header('Location: /Vues/Search.php');
                exit();
            default:
                // Gérer le cas où le rôle est inconnu
                header('Location: /Vues/Connection.php');
                exit();
        }
    } else {
        // Adresse e-mail ou mot de passe incorrect
        $error_message = "Adresse e-mail ou mot de passe incorrect";
        setcookie('error_message', $error_message, time() + 10, "/"); // Cookie valide pendant 10 secondes
    }
}
?>