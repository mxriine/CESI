<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Pilote</title>
    <link rel="icon" type="image/png" href="../Images/logoWeb.png">
    <link rel="stylesheet" href="../CSS/styles.css">
    <script src="../JS/piloteInscr2.js"></script>

</head>

<body>
    <header>
        <div class="alignement">
            <img class = "imgprinc"src="../Images/logoWeb.png" alt="Logo StagExplorer">
        </div>
    </header>

    <?php
$dsn = 'mysql:dbname=bdd_projet;host=127.0.0.1';
$user = 'nom_utilisateur';
$password = '';
$message_erreur1 = "";
session_start();
$id=@$_SESSION['identifiant'];




//Récupération de l'ID du pilote à partir de la session pour l'ajouter dans la table promotion

function createPilotePart2($dbh, $nom, $prenom, $id) {
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

function getCampusID($dbh, $campus) {
    try {
        $stmt = $dbh->prepare("SELECT ID_Campus FROM campus WHERE Nom_Campus = ?");
        $stmt->bindParam(1, $campus);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération de l'ID du campus: " . $e->getMessage();
    }
}

//Recuperer l'ID Pilote à partir de son adresse mail
function getPiloteID($dbh, $id) {
    try {
        $stmt = $dbh->prepare("SELECT pi.ID_Pilote
                               FROM pilote pi
                               JOIN personne per ON pi.ID_Pers = per.ID_Pers
                               WHERE per.Mail_Pers = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchColumn(); 
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération de l'ID du pilote: " . $e->getMessage();
    }
}

//fonction qui regarde si un pilote est déjà assigné à une promo
function PilotePromotions ($dbh, $campus, $promos) {
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
    } catch(PDOException $e) {
        echo "Erreur lors de la vérification de l'affectation du pilote à la promotion: " . $e->getMessage();
    }
}

try{
        // Connexion à la base de données
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e) {
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
    }catch (Exception $e) {
    echo "Erreur avec l'ajout du pilote: " . $e->getMessage();
}

?>


<div id="BLOC_INSCRIPTION2" class="blocInscr2">    
<div class="TitreInscription">
        <h1>Création compte Pilote</h1>
    </div>
    <form method="POST" id="formulaire2"  onsubmit="return validerFormulaire2()">
    <p class="Etape1">Etape 2: Informations personnelles</p>
    <p id="messageErreurNom" class="messageErreurNom"></p>
        <p id="messageErreurPrenom" class="messageErreurPrenom"></p>
    <section class="BlocNomPrenom">
        <div class="Nom">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="MARTIN" required>
        </div>
        <div class="prenom">
            <label for="Prenom">Prénom</label>
            <input type="text" id="Prenom" name="prenom" placeholder="Luc" required>
        </div>
    </section>
    <section class="Promo" id="promo">
            <p>Promotions assignées</p>
            <div>
                <input type="checkbox" id="1A" name="promo" value="A1">
                <label for="1A">1ère année</label>
            </div>
            <div>
                <input type="checkbox" id="2A" name="promo" value="A2">
                <label for="2A">2ème année</label>
            </div>
            <div>
                <input type="checkbox" id="3A" name="promo" value="A3">
                <label for="3A">3ème année</label>
            </div>
            <div>
                <input type="checkbox" id="4A" name="promo" value="A4">
                <label for="4A">4ème année</label>
            </div>
            <div>
                <input type="checkbox" id="5A" name="promo" value="A5">
                <label for="5A">5ème année</label>
            </div>
    </section>
    <section class="centre" id="centre" >
            <label for="centres">Centre</label>
            <select name="centre" id="centres" required>
                <option value="">Sélectionner</option>
                <option value="CampusA">CampusA</option>
                <option value="CampusB">CampusB</option>
                <option value="CampusC">CampusC</option>
                <option value="CampusD">CampusD</option>
                <option value="CampusE">CampusE</option>
                <option value="CampusF">CampusF</option>
                <option value="CampusG">CampusG</option>
                <option value="CampusH">CampusH</option>
                <option value="CampusI">CampusI</option>
                <option value="CampusJ">CampusJ</option>
            </select>
    </section>
    
    <button class="boutonValidationInscription2" id="boutonValidationInscriptionPilote2" type="submit">VALIDER</button>
    <p class="messageErreurChamps3">Tous les champs ne sont pas correctement remplis !</p>
</form>
</div>

</body>

</html>