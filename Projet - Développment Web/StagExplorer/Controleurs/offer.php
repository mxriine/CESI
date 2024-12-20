<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Models/Offer.php');

// Vérifier si l'ID de l'offre a été soumis via POST
if(isset($_POST['id_offer'])) {
    // Récupérer l'ID de l'offre depuis les données POST
    $ID_Offer = $_POST['id_offer'];
    
    // Utiliser l'ID de l'offre pour récupérer ses autres informations depuis la base de données
    // Vous pouvez exécuter une requête SQL pour cela
    
    // Exemple de requête pour récupérer les informations de l'offre
    $sql = "SELECT * FROM offer WHERE ID_Offer = :id_offer";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_offer', $ID_Offer);
    $stmt->execute();
    
    // Vérifier si des données ont été trouvées
    if($stmt->rowCount() > 0) {
        // Récupérer les données de l'offre
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Maintenant vous pouvez utiliser les données récupérées comme vous le souhaitez
        $ID_Offer = $row['ID_Offer'];
        $Name_Offer = $row['Name_Offer'];
        $Description_Offer = $row['Description_Offer'];
        $Domain_Offer = $row['Domain_Offer'];
        $Skills_Offer = $row['Skills_Offer'];
        $Level_Offer = $row['Level_Offer'];
        $Duration_Offer = $row['Duration_Offer'];
        $Pay_Offer = $row['Pay_Offer'];
        $Date_Offer = $row['Date_Offer'];
        $Place_Offer = $row['Place_Offer'];

        $id_company = $row['ID_Company'];
        
    }

    // Utiliser l'ID de l'entreprise pour récupérer ses autres informations depuis la base de données
    $sql = "SELECT * FROM company WHERE ID_Company = :id_company";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_company', $id_company);
    $stmt->execute();

    // Vérifier si des données ont été trouvées
    if($stmt->rowCount() > 0) {
        // Récupérer les données de l'entreprise
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Maintenant vous pouvez utiliser les données récupérées comme vous le souhaitez
        $Name_Company = $row['Name_Company'];
    }
}


