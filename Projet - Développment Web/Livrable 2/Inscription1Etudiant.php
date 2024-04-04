<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="icon" type="image/png" href="../Images/logoWeb.png">
    <link rel="stylesheet" href="../CSS/styles.css">
    <script async src="../JS/piloteInscr.js"></script>

</head>

<body>
    <header>
        <div class="alignement">
            <img class="imgprinc" src="../Images/logoWeb.png" alt="Logo StagExplorer">
        </div>

    </header>
    <?php

    $dsn = 'mysql:dbname=bdd_projet;host=127.0.0.1';
    $user = 'nom_utilisateur';
    $password = '';


    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }

    try {
        // Vérification de l'existence des données POST
        if (isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {


            $id = $_POST['identifiant'];
            $mdp = $_POST['motdepasse'];

            session_start(); //doit être appelé avant toute sortie
            $_SESSION['identifiant'] = $id;

            function createEtudiant($dbh, $mail, $mdp)
            {
                try {
                    $stmt = $dbh->prepare("INSERT INTO personne (Mail_Pers, Mdp_Pers) VALUES (?, ?)");
                    $stmt->bindParam(1, $mail);
                    $stmt->bindParam(2, $mdp);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo "Erreur lors de la création de l'étudiant : " . $e->getMessage();
                }
            }

            function ajouterEtudiant($dbh, $id, $admin)
            {
                try {
                    // Récupération de l'ID de la personne à partir de l'email
                    $stmt = $dbh->prepare("SELECT ID_Pers FROM personne WHERE Mail_Pers = ?");
                    $stmt->bindParam(1, $id);
                    $stmt->execute();
                    $resultat = $stmt->fetchColumn();
                    echo $resultat;
                    // Si on trouve l'ID de la personne, on insère le pilote
                    if ($resultat) {
                        $stmt = $dbh->prepare("INSERT INTO etudiant (ID_Pers, ID_Admin) VALUES (?, ?)");
                        $stmt->bindParam(1, $resultat);
                        $stmt->bindParam(2, $admin);
                        $stmt->execute();
                    } else {
                        echo "L'ID de la personne n'a pas pu être trouvé.";
                    }
                } catch (PDOException $e) {
                    echo "Erreur lors de l'ajout de l'étudiant : " . $e->getMessage();
                }
            }


            $req_str = "SELECT *  FROM personne WHERE Mail_Pers=:id";
            $stmt = $dbh->prepare($req_str);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($stmt->fetch()) {
                echo "<p style='color: red; position:absolute; top: 85%; left:30%;'>Attention ! L'identifiant entré existe déjà dans la base de données !</p>";
            } else {
                createEtudiant($dbh, $id, $mdp);

                try {
                    ajouterEtudiant($dbh, $id, 1);
                } catch (PDOException $e) {
                    echo "Erreur lors de l'ajout de l'étudiant : " . $e->getMessage();
                }

                header('Location: Inscription2Etudiant.php');
            }

            $stmt->closeCursor();
            $dbh = null;
        }
    } catch (PDOException $e) {
        echo "Erreur avec l'ajout de l'étudiant : " . $e->getMessage();
    }
    ?>
    <div class="TitreInscription">
        <h1>Création compte Etudiant</h1>
    </div>
    <div>
        <p class="Etape1">Etape 1: Entrez les informations</p>
        <form method="POST" id="formulaire1" onsubmit="return validerFormulaire()">
            <div class="BlocInscription">
                <p class="messageErreurID" id="messageErreurID"></p>
                <div class="Id">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" id="identifiant" name="identifiant" placeholder="Luc64" required>
                </div>
                <p class="messageErreurMDP" id="messageErreurMDP"></p>
                <div class="mdp">
                    <label for="motdp">Mot de passe</label>
                    <input type="password" id="motdp" name="motdepasse" required>
                </div>
                <p class="messageErreurConfirmation" id="messageErreurConfirmation"></p>

                <div class="confirmdp">
                    <label for="confmdp">Confirmation</label>
                    <input type="password" id="confmdp" name="confmotdp" required>
                </div>
                <button class="boutonValidationInscription" id="boutonValidationInscription1" type="submit">VALIDER</button>

            </div>
        </form>
    </div>


</body>

</html>