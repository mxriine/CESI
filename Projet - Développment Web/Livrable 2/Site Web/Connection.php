<!-- VERIFICATION DES ENTREES (EN PHP) -->
<?php
// Inclure le fichier de connexion à la base de données
require_once('_assets/_php/server.php');

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
        // Stocker les informations d'identification dans des cookies
        setcookie('mail', $row['Mail_Pers'], time() + (86400 * 30), "/"); // Cookie valide pendant 30 jours
        setcookie('mdp', $row['Mdp_Pers'], time() + (86400 * 30), "/");

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
            // Récupérer le rôle de l'utilisateur
            $role = $rowrole['role'];

            // Redirection en fonction du rôle
            switch ($role) {
                case 'admin':
                    header('Location: Users/Admin/Dashboard.html');
                    break;
                case 'pilote':
                    header('Location: Users/Pilote/Dashboard.html');
                    break;
                case 'etudiant':
                    header('Location: Users/Student/Entreprise_Show.html');
                    break;
                default:
                    // Gérer le cas où le rôle est inconnu
                    header('Location: connection.php');
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

<!-- FORMULAIRE DE CONNEXION (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="icon" type="image/png" href="_assets/img/logoWeb.png">
    <link rel="stylesheet" href="_assets/_css/styles.css">
    <script src="_assets/_js/connection.js"></script>
</head>

<body>
    <h1 id="identifier">S'identifier</h1>
    <img src="_assets/img/imgco.png" id="imgcon" alt="imgDebut">

    <form method="POST">
        <div class="container">

            <div class="parent">
                <label for="mail">EMAIL</label>
                <input type="email" id="mail" name="mail" placeholder="jean.bertrand@gmail.com">
                <p id="messageErreurMail" class="error"><?php echo $error_message; ?></p>
            </div>

            <div class="parent">
                <label for="mdp">MOT DE PASSE</label>
                <input type="mdp" id="mdp" name="mdp">
                <p id="messageErreurMdp" class="error"><?php echo $error_message; ?></p>
            </div>

            <button type="submit" id="valider_co">VALIDER</button>
        </div>
    </form>
</body>

</html>