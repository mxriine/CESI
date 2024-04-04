<?php
// Inclure le fichier de connexion à la base de données
require_once ('/www/Site Web/server.php');

$error_message = "";
$success_message = "";

echo "Test";


if (isset($_POST['form_submitted'])) {
    $entreprise = $_POST['Entreprise'] ?? '';
    $titreOffre = $_POST['Titre'] ?? '';
    $dureeStage = $_POST['DuréeStage'] ?? '';
    $dateDebut = $_POST['Datedébut'] ?? '';
    $remuneration = $_POST['Rémunération'] ?? '';
    $nombreDePlace = $_POST['Nombredeplace'] ?? '';
    $niveauRequis = $_POST['Niveaurequis'];
    $description = $_POST['Description'] ?? '';
    $compétences = $_POST['Compétences'] ?? '';
    $domaine = $_POST['Domaine'];


    $query = $conn->prepare("SELECT ID_Ent FROM entreprise WHERE Nom_Ent = ?");
    $query->execute([$entreprise]);
    $resultat = $query->fetch();

    if ($resultat) {
        $entrepriseID = $resultat['ID_Ent'];
    }
    $ins = $conn->prepare("INSERT INTO offre (Titre_Offre, Description, Compétences, Niveau, Duree_Stage, Date_Offre, Remuneration, NB_Places, ID_Ent, Date_publication, Domaine_Offre) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(),?)");

    try {
        $ins->execute([$titreOffre, $description, $compétences, $niveauRequis, $dureeStage, $dateDebut, $remuneration, $nombreDePlace, $entrepriseID, $domaine]);
        $success_message = "L'offre a été ajoutée avec succès.";

    } catch (PDOException $e) {
        die("Erreur lors de l'insertion de l'offre : " . $e->getMessage());
    }
}

$entreprisesVillesQuery = $conn->query("
    SELECT e.Nom_Ent, v.Nom_Ville 
    FROM entreprise e
    LEFT JOIN site s ON e.ID_Ent = s.ID_Ent
    LEFT JOIN ville v ON s.ID_Site = v.ID_Site
");
$entreprisesVilles = $entreprisesVillesQuery->fetchAll(PDO::FETCH_ASSOC);

// Préparation des données pour l'utilisation dans le script JavaScript
$jsEntreprisesVilles = json_encode($entreprisesVilles);
echo "<script>var entreprisesVilles = $jsEntreprisesVilles;</script>";

?>