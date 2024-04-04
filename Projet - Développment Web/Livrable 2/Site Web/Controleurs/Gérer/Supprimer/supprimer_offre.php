<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/Site Web/server.php');

function supprimerOffre($conn, $idOffre)
{
    try {
        // Supprimer l'ID dans la table évaluer
        $stmt = $conn->prepare("DELETE FROM noter WHERE ID_Offre = ?");
        $stmt->bindParam(1, $idOffre);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'offre dans la table noter: " . $e->getMessage();
    }
    try {
        // Supprimer l'ID dans la table évaluer
        $stmt = $conn->prepare("DELETE FROM offre WHERE ID_Offre = ?");
        $stmt->bindParam(1, $idOffre);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'offre dans la table offre: " . $e->getMessage();
    }
}

supprimerOffre($conn, 2);
