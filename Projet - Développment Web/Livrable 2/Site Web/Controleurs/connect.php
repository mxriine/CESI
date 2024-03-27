<?php
// Démarrez la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once('../server.php');

// Initialiser les variables
$error_message = "";

// Vérifier si le formulaire a été soumis
if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    $mail = $_POST['mail'];
    $password = $_POST['mdp'];

    // Requête pour vérifier les informations d'identification
    $sql = "SELECT * FROM personne WHERE Mail_Pers = '$mail' AND Mdp_Pers = '$password'";
    $result = $conn->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Stocker les informations d'identification dans des variables de session
        $_SESSION['mail'] = $row['Mail_Pers'];
        $_SESSION['mdp'] = $row['Mdp_Pers'];

        // Requête pour obtenir le rôle de l'utilisateur
        $sqlrole = "SELECT 
                        CASE
                            WHEN Admin.ID_Admin IS NOT NULL THEN 'admin'
                            WHEN Pilo.ID_Pilote IS NOT NULL THEN 'pilote'
                            WHEN Etud.ID_Etudiant IS NOT NULL THEN 'etudiant'
                            ELSE 'inconnu'
                        END AS role
                    FROM Personne AS Pers 
                    LEFT JOIN Administrateur AS Admin ON Pers.ID_Pers = Admin.ID_Pers
                    LEFT JOIN Pilote AS Pilo ON Pers.ID_Pers = Pilo.ID_Pers
                    LEFT JOIN Etudiant AS Etud ON Pers.ID_Pers = Etud.ID_Pers
                    WHERE Pers.Mail_Pers = '$mail'";

        $resultrole = $conn->query($sqlrole);
        $rowrole = $resultrole->fetch(PDO::FETCH_ASSOC);

        if ($rowrole) {
            // Récupérer le rôle de l'utilisateur et le stocker dans une variable de session
            $_SESSION['role'] = $rowrole['role'];

            // Redirection en fonction du rôle
            switch ($_SESSION['role']) {
                case 'admin':
                    header('Location: ../Vues/Users/Admin/Dashboard.php');
                    break;
                case 'pilote':
                    header('Location: ../Vues/Users/Pilote/Dashboard.php');
                    break;
                case 'etudiant':
                    header('Location: ../Vues/Users/Student/Entreprise_Show.html');
                    break;
                default:
                    // Gérer le cas où le rôle est inconnu
                    header('Location: ../Vues/connection.php');
                    break;
            }
        }
    } else {
        // Adresse e-mail ou mot de passe incorrect
        $error_message = "Adresse e-mail ou mot de passe incorrect";
        setcookie('error_message', $error_message, time() + 10, "/"); // Cookie valide pendant 10 secondes
    }
}
?>
