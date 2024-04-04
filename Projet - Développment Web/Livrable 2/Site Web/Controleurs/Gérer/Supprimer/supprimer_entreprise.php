<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/Site Web/server.php');

function supprimerEntreprise($conn, $idEnt)
{
    try {
        // Supprimer l'ID dans la table évaluer
        $stmt = $conn->prepare("DELETE FROM evaluer WHERE ID_Ent = ?");
        $stmt->bindParam(1, $idEnt);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'entreprise dans la table evaluer: " . $e->getMessage();
    }
    try {
        // Supprimer l'ID dans la table évaluer
        $stmt = $conn->prepare("DELETE FROM entreprise WHERE ID_Ent = ?");
        $stmt->bindParam(1, $idEnt);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'entreprise dans la table entreprise: " . $e->getMessage();
    }
}

supprimerEntreprise($conn, 2);
