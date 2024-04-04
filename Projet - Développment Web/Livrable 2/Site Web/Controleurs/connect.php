<?php
// Démarrez la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once ('../server.php');
require_once ('hachage.php');

// Initialiser les variables
$error_message = "";

// Vérifier si le formulaire a été soumis
if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    $mail = $_POST['mail'];
    $password = $_POST['mdp'];

    // Protégez votre requête contre les injections SQL en utilisant les déclarations préparées
    $sql = "SELECT *, 
                CASE
                    WHEN Admin.ID_Admin IS NOT NULL THEN 'admin'
                    WHEN Pilo.ID_Pilote IS NOT NULL THEN 'pilote'
                    WHEN Etud.ID_Etudiant IS NOT NULL THEN 'etudiant'
                    ELSE 'inconnu'
                END AS role 
            FROM personne AS Pers 
            LEFT JOIN Administrateur AS Admin ON Pers.ID_Pers = Admin.ID_Pers
            LEFT JOIN Pilote AS Pilo ON Pers.ID_Pers = Pilo.ID_Pers
            LEFT JOIN Etudiant AS Etud ON Pers.ID_Pers = Etud.ID_Pers
            WHERE Mail_Pers = :mail AND Mdp_Pers = :password";

    // Préparez la requête SQL pour l'exécution
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row ) {
        // Stocker les informations d'identification et le prénom dans des variables de session
        $_SESSION['id'] = $row['ID_Pers'];
        $_SESSION['mail'] = $row['Mail_Pers'];
        $_SESSION['mdp'] = $row['Mdp_Pers'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['prenom'] = $row['Prenom_Pers']; // Supposons que la colonne pour le prénom est `Prenom_Pers`

        // Redirection en fonction du rôle
        switch ($_SESSION['role']) {
            case 'admin':
                header('Location: ../Vues/Users/Admin/DashboardA.php');
                exit();
            case 'pilote':
                header('Location: ../Vues/Users/Pilote/DashboardP.php');
                exit();
            case 'etudiant':
                header('Location: ../Vues/Users/MainSearch.php');
                exit();
            default:
                // Gérer le cas où le rôle est inconnu
                header('Location: ../Vues/connection.php');
                exit();
        }
    } else {
        // Adresse e-mail ou mot de passe incorrect
        $error_message = "Adresse e-mail ou mot de passe incorrect";
        setcookie('error_message', $error_message, time() + 10, "/"); // Cookie valide pendant 10 secondes
    }
}
?>