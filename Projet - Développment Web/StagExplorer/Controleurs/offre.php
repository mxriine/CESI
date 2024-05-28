<?php
// Inclure le fichier de connexion à la base de données
require_once('server.php');
require_once('/www/StagExplorer/Models/Offre.php');

// Vérifier si l'ID de l'offre a été soumis via POST
if(isset($_POST['id_offre'])) {
    // Récupérer l'ID de l'offre depuis les données POST
    $id_offre = $_POST['id_offre'];
    
    // Utiliser l'ID de l'offre pour récupérer ses autres informations depuis la base de données
    // Vous pouvez exécuter une requête SQL pour cela
    
    // Exemple de requête pour récupérer les informations de l'offre
    $sql = "SELECT * FROM offre WHERE ID_Offre = :id_offre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_offre', $id_offre);
    $stmt->execute();
    
    // Vérifier si des données ont été trouvées
    if($stmt->rowCount() > 0) {
        // Récupérer les données de l'offre
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Maintenant vous pouvez utiliser les données récupérées comme vous le souhaitez
        $titre = $row['Name_Offer'];
        $description = $row['Description_Offer'];
        $domaine = $row['Domaine_Offer'];
        $competences = $row['Competences_Offer'];
        $niveau = $row['Niveau_Offer'];
        $duree = $row['Duree_Offer'];
        $remuneration = $row['Remuneration_Offer'];
        $date = $row['Date_Offer'];
        $place = $row['Place_Offer'];

        $id_entreprise = $row['ID_Entreprise'];
        
    }

    // Utiliser l'ID de l'entreprise pour récupérer ses autres informations depuis la base de données
    $sql = "SELECT * FROM entreprise WHERE ID_Entreprise = :id_entreprise";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_entreprise', $id_entreprise);
    $stmt->execute();

    // Vérifier si des données ont été trouvées
    if($stmt->rowCount() > 0) {
        // Récupérer les données de l'entreprise
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Maintenant vous pouvez utiliser les données récupérées comme vous le souhaitez
        $nom_Ent = $row['Nom_Entreprise'];
    }
}

//Delete Offre
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_offre'])) {
        $id_offre = $_POST['id_offre'];
        Offre::delete($id_offre);
        // Redirection après suppression
        header('Location: path/to/confirmation_page.php'); // Remplacez par l'URL de votre page de confirmation ou de liste d'offres
        exit();
    } else {
        echo "ID d'offre non fourni.";
    }
} else {
    echo "Requête non valide.";
}
?>
