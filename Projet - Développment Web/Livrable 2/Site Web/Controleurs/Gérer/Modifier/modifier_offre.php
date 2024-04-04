<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/Site Web/server.php');

// Vérifier si l'ID de l'offre a été soumis via POST
if(isset($_POST['id_offre'])) {
    // Récupérer l'ID de l'offre depuis les données POST
    $id_offre = $_POST['id_offre'];
    
    // Utiliser l'ID de l'offre pour récupérer ses autres informations depuis la base de données
    // Vous pouvez exécuter une requête SQL pour cela
    
    // Exemple de requête pour récupérer les informations de l'offre
    $sql = "SELECT * FROM offre WHERE Id_Offre = :id_offre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_offre', $id_offre);
    $stmt->execute();
    
    // Vérifier si des données ont été trouvées
    if($stmt->rowCount() > 0) {
        // Récupérer les données de l'offre
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Maintenant vous pouvez utiliser les données récupérées comme vous le souhaitez
        $titre = $row['Titre_Offre'];
        $description = $row['Description'];
        $competences = $row['Compétences'];
        $date = $row['Date_Offre'];
        $remuneration = $row['Remuneration'];
        $duree = $row['Duree_Stage'];
        $place = $row['NB_Places'];
        $niveau = $row['Niveau'];

        $id_entreprise = $row['ID_Ent'];
        
    }

    // Utiliser l'ID de l'entreprise pour récupérer ses autres informations depuis la base de données
    $sql = "SELECT * FROM entreprise WHERE Id_Ent = :id_entreprise";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_entreprise', $id_entreprise);
    $stmt->execute();

    // Vérifier si des données ont été trouvées
    if($stmt->rowCount() > 0) {
        // Récupérer les données de l'entreprise
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Maintenant vous pouvez utiliser les données récupérées comme vous le souhaitez
        $nom_Ent = $row['Nom_Ent'];
    }
}
?>
