<?php
// Inclure le fichier de connexion à la base de données
require_once ('/www/Site Web/server.php');

try {
    // Vérification de l'existence des données POST
    if (isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {


        $id = $_POST['identifiant'];
        $mdp = $_POST['motdepasse'];

        session_start(); //doit être appelé avant toute sortie
        $_SESSION['identifiant'] = $id;

        function createPilote($dbh, $mail, $mdp)
        {
            try {
                $stmt = $dbh->prepare("INSERT INTO personne (Mail_Pers, Mdp_Pers) VALUES (?, ?)");
                $stmt->bindParam(1, $mail);
                $stmt->bindParam(2, $mdp);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Erreur lors de la création du pilote : " . $e->getMessage();
            }
        }

        function ajouterPilote($dbh, $id, $admin)
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
                    $stmt = $dbh->prepare("INSERT INTO pilote (ID_Pers, ID_Admin) VALUES (?, $admin)");
                    $stmt->bindParam(1, $resultat);
                    $stmt->execute();
                } else {
                    echo "L'ID de la personne n'a pas pu être trouvé.";
                }
            } catch (PDOException $e) {
                echo "Erreur lors de l'ajout du pilote : " . $e->getMessage();
            }
        }


        $req_str = "SELECT *  FROM personne WHERE Mail_Pers=:id";
        $stmt = $dbh->prepare($req_str);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->fetch()) {
            ?>
            <p id="message_erreur1" class="error1">
                Attention ! L'identifiant entré existe déjà dans la base de données !
            </p>
            <?php
        } else {
            createPilote($dbh, $id, $mdp);

            try {
                ajouterPilote($dbh, $id, 1);
            } catch (PDOException $e) {
                echo "Erreur lors de l'ajout du pilote : " . $e->getMessage();
            }

            header('Location: Inscription2Pilote.php');
        }

        $stmt->closeCursor();
        $dbh = null;
    }
} catch (PDOException $e) {
    echo "Erreur d'ajout du pilote : " . $e->getMessage();
}

$id = @$_SESSION['identifiant'];




//Récupération de l'ID du pilote à partir de la session pour l'ajouter dans la table promotion

function createPilotePart2($dbh, $nom, $prenom, $id)
{
    try {
        $stmt = $dbh->prepare("UPDATE personne SET Nom_Pers=?, Prenom_Pers=? WHERE Mail_Pers=?");
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la création du pilote : " . $e->getMessage();
    }
}

function getCampusID($dbh, $campus)
{
    try {
        $stmt = $dbh->prepare("SELECT ID_Campus FROM campus WHERE Nom_Campus = ?");
        $stmt->bindParam(1, $campus);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération de l'ID du campus: " . $e->getMessage();
    }
}

//Recuperer l'ID Pilote à partir de son adresse mail
function getPiloteID($dbh, $id)
{
    try {
        $stmt = $dbh->prepare("SELECT pi.ID_Pilote
                               FROM pilote pi
                               JOIN personne per ON pi.ID_Pers = per.ID_Pers
                               WHERE per.Mail_Pers = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération de l'ID du pilote: " . $e->getMessage();
    }
}

//fonction qui regarde si un pilote est déjà assigné à une promo
function PilotePromotions($dbh, $campus, $promos)
{
    try {
        $stmt = $dbh->prepare("SELECT COUNT(*) 
                               FROM promotion 
                               WHERE ID_Campus = ? AND Nom_Promo = ? AND ID_Pilote IS NULL");
        $stmt->bindParam(1, $campus);
        $stmt->bindParam(2, $promos);
        $stmt->execute();

        // Récupérer le nombre de lignes où ID_Pilote est NULL
        $count = $stmt->fetchColumn();

        // Si le nombre de lignes est supérieur à 0, cela signifie qu'il y a des lignes où ID_Pilote est NULL
        // Donc, nous retournons true
        return $count > 0;
    } catch (PDOException $e) {
        echo "Erreur lors de la vérification de l'affectation du pilote à la promotion: " . $e->getMessage();
    }
}

try {
    // Connexion à la base de données
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur connexion: " . $e->getMessage();
}

try {
    if (isset($_POST['nom']) && isset($_POST['prenom'])) {


        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $centre = $_POST['centre'];
        $promo = $_POST['promo'];
        $id = @$_SESSION['identifiant'];


        createPilotePart2($dbh, $nom, $prenom, $id);


        $idPilote = getPiloteID($dbh, $id);


        $idCampus = getCampusID($dbh, $centre);
        $tableauPromo = explode(',', $promo);

        // Vérification de l'assignation du pilote à chaque promotion
        $success = true;
        foreach ($tableauPromo as $promotion) {
            if (!PilotePromotions($dbh, $idCampus, $promotion)) {
                $success = false;
                break;

            }

            // Si toutes les promotions sont disponibles, attribuer le pilote
            if ($success) {
                foreach ($tableauPromo as $promotion) {
                    $stmt = $dbh->prepare("UPDATE promotion SET ID_Pilote = ? WHERE ID_Campus = ? AND Nom_Promo = ?");
                    $stmt->bindParam(1, $idPilote);
                    $stmt->bindParam(2, $idCampus);
                    $stmt->bindParam(3, $promotion);
                    $stmt->execute();
                }
                echo "La promotion a été ajoutée avec succès !";
            } else {
                echo "Vous ne pouvez pas attribuer ce pilote à cette promotion de ce campus car elle est déjà attribuée à un pilote ! Le pilote est ajouté mais n'est pas relié à une promotion !";
            }

        }
    }
    // Fermeture de la connexion à la base de données
    $dbh = null;
} catch (Exception $e) {
    echo "Erreur avec l'ajout du pilote: " . $e->getMessage();
}

?>