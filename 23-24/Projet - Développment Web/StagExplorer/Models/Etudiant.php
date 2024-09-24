<?php
// Inclure le fichier de connexion à la base de données
require_once ('/www/Site Web/server.php');

try {
    // Vérification de l'existence des données POST
    if (isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {


        $id = $_POST['identifiant'];
        $mdp = $_POST['motdepasse'];

        $_SESSION['identifiant'] = $id;

        function createEtudiant($conn, $mail, $mdp)
        {
            try {
                $stmt = $conn->prepare("INSERT INTO personne (Mail_Pers, Mdp_Pers) VALUES (?, ?)");
                $stmt->bindParam(1, $mail);
                $stmt->bindParam(2, $mdp);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Erreur lors de la création de l'étudiant : " . $e->getMessage();
            }
        }

        function ajouterEtudiant($conn, $id, $admin)
        {
            try {
                // Récupération de l'ID de la personne à partir de l'email
                $stmt = $conn->prepare("SELECT ID_Pers FROM personne WHERE Mail_Pers = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $resultat = $stmt->fetchColumn();
                echo $resultat;
                // Si on trouve l'ID de la personne, on insère le pilote
                if ($resultat) {
                    $stmt = $conn->prepare("INSERT INTO etudiant (ID_Pers, ID_Admin) VALUES (?, ?)");
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
        $stmt = $conn->prepare($req_str);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->fetch()) {
            echo "<p style='color: red; position:absolute; top: 85%; left:30%;'>Attention ! L'identifiant entré existe déjà dans la base de données !</p>";
        } else {
            createEtudiant($conn, $id, $mdp);

            try {
                ajouterEtudiant($conn, $id, 1);
            } catch (PDOException $e) {
                echo "Erreur lors de l'ajout de l'étudiant : " . $e->getMessage();
            }

            header('Location: /Site Web/Vues/Gérer/Créer/Creation_Etudiant2.php');
        }

        $stmt->closeCursor();
        $conn = null;
    }
} catch (PDOException $e) {
    echo "Erreur avec l'ajout de l'étudiant : " . $e->getMessage();
}

//Récupération de l'ID du pilote à partir de la session pour l'ajouter dans la table promotion

function createEtudiantPart2($dbh, $nom, $prenom, $id)
{
    try {
        $stmt = $dbh->prepare("UPDATE personne SET Nom_Pers=?, Prenom_Pers=? WHERE Mail_Pers=?");
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la création de l'étudiant : " . $e->getMessage();
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
function getEtudiantID($dbh, $id)
{
    try {
        $stmt = $dbh->prepare("SELECT et.ID_Etudiant
                               FROM etudiant et
                               JOIN personne per ON et.ID_Pers = per.ID_Pers
                               WHERE per.Mail_Pers = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération de l'ID de l'étudiant: " . $e->getMessage();
    }
}

//fonction qui récupere l'ID de la promotion correspondatn au campus entré et à la promotion rentré.
function getEtudiantPromo($dbh, $campus, $promos)
{
    try {
        $stmt = $dbh->prepare("SELECT ID_Promotion 
                               FROM promotion 
                               WHERE ID_Campus = ? AND Nom_Promo = ?");
        $stmt->bindParam(1, $campus);
        $stmt->bindParam(2, $promos);
        $stmt->execute();

        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "Erreur lors de la liaison entre le campus et la promo" . $e->getMessage();
    }
}

try {
    if (isset($_POST['nom']) && isset($_POST['prenom'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $centre = $_POST['centre'];
        $promo = $_POST['promo'];
        $id = @$_SESSION['identifiant'];


        createEtudiantPart2($dbh, $nom, $prenom, $id);


        $idEtudiant = getEtudiantID($dbh, $id);
        echo $idEtudiant;
        $idCampus = getCampusID($dbh, $centre);
        echo $idCampus;
        $idPromo = getEtudiantPromo($dbh, $idCampus, $promo);
        echo $idPromo;



        $stmt = $dbh->prepare("UPDATE etudiant SET ID_Promotion = ? WHERE ID_Etudiant = ?");
        $stmt->bindParam(1, $idPromo);
        $stmt->bindParam(2, $idEtudiant);

        $stmt->execute();
    }

} catch (Exception $e) {
    echo "Erreur avec l'ajout de l'étudiant: " . $e->getMessage();
}
