<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/Site Web/server.php');

// Vérifier si l'ID de la personne a été soumis via POST
if(isset($_POST['id_personne'])) {
    // Récupérer l'ID de la personne depuis les données POST
    $id_personne = $_POST['id_personne'];
    
    // Utiliser l'ID de la personne pour récupérer ses autres informations depuis la base de données
    // Vous pouvez exécuter une requête SQL pour cela
    
    // Exemple de requête pour récupérer les informations de la personne
    $sql = "SELECT * FROM personne WHERE Id_Pers = :id_personne";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_personne', $id_personne);
    $stmt->execute();
    
    // Vérifier si des données ont été trouvées
    if($stmt->rowCount() > 0) {
        // Récupérer les données de la personne
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Maintenant vous pouvez utiliser les données récupérées comme vous le souhaitez
        $nom = $row['Nom_Pers'];
        $prenom = $row['Prenom_Pers'];
        
    }
}
?>
