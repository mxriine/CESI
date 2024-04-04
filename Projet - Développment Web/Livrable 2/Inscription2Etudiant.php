<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Etudiant</title>
    <link rel="icon" type="image/png" href="../Images/logoWeb.png">
    <link rel="stylesheet" href="../CSS/styles.css">
    <script type="text/javascript" src="../JS/EtudiantInscr2.js"></script>

</head>

<body>
    <header>
        <div class="alignement">
            <img class = "imgprinc" src="../Images/logoWeb.png" alt="Logo StagExplorer">
        </div>
    </header>

    <?php
$dsn = 'mysql:dbname=bdd_projet;host=127.0.0.1';
$user = 'nom_utilisateur';
$password = '';

session_start();
$id=@$_SESSION['identifiant'];


try{
 // Connexion à la base de données
 $dbh = new PDO($dsn, $user, $password);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (Exception $e) {
    echo "Erreur connexion: " . $e->getMessage();
}

//Récupération de l'ID du pilote à partir de la session pour l'ajouter dans la table promotion

function createEtudiantPart2($dbh, $nom, $prenom, $id) {
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
function getEtudiantID($dbh, $id) {
    try {
        $stmt = $dbh->prepare("SELECT et.ID_Etudiant
                               FROM etudiant et
                               JOIN personne per ON et.ID_Pers = per.ID_Pers
                               WHERE per.Mail_Pers = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchColumn(); 
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération de l'ID de l'étudiant: " . $e->getMessage();
    }
}

//fonction qui récupere l'ID de la promotion correspondatn au campus entré et à la promotion rentré.
function getEtudiantPromo ($dbh, $campus, $promos) {
    try {
        $stmt = $dbh->prepare("SELECT ID_Promotion 
                               FROM promotion 
                               WHERE ID_Campus = ? AND Nom_Promo = ?");
        $stmt->bindParam(1, $campus);
        $stmt->bindParam(2, $promos);
        $stmt->execute();

        return $stmt->fetchColumn();
    } catch(PDOException $e) {
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

    // Fermeture de la connexion à la base de données
    $dbh = null;}
 catch (Exception $e) {
    echo "Erreur avec l'ajout de l'étudiant: " . $e->getMessage();
}

?>



<div class="TitreInscription">
    <h1>Création compte Etudiant</h1>
</div>

<div>
    <form method="POST" id="formulaire2"  onsubmit="return validerFormulaire2()">
    <p class="Etape1">Etape 2: Informations personnelles</p>

    <div class="BlocNomPrenom">
        <div class="Nom">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="MARTIN" required>
        </div>
        <div class="prenom">
            <label for="Prenom">Prenom</label>
            <input type="text" id="Prenom" name="prenom" placeholder="Luc" required>
        </div>
    </div>
    <section class="Promo" id="promo">
        <label>Promotion assignée</label>
        <div>
            <input type="radio" id="A1" name="promo" value="A1">
            <label for="A1">1ère année</label>
        </div>
        <div>
            <input type="radio" id="A2" name="promo" value="A2">
            <label for="A2">2ème année</label>
        </div>
        <div>
            <input type="radio" id="A3" name="promo" value="A3">
            <label for="A3">3ème année</label>
        </div>
        <div>
            <input type="radio" id="A4" name="promo" value="A4">
            <label for="A4">4ème année</label>
        </div>
        <div>
            <input type="radio" id="A5" name="promo" value="A5">
            <label for="A5">5ème année</label>
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

</form>
</div>

</body>

</html>