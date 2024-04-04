<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/Site Web/server.php');

function getIDPers($conn, $idEtudiant)
{

    $stmt = $conn->prepare("SELECT p.ID_Pers
                           FROM personne p
                           JOIN etudiant et ON et.ID_Pers = p.ID_Pers
                           WHERE et.ID_Etudiant = ?");
    $stmt->bindParam(1, $idEtudiant);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function supprimer($conn, $idEtudiant, $idPers)
{
    try {
        // Supprimer l'ID dans la table évaluer
        $stmt = $conn->prepare("DELETE FROM evaluer WHERE ID_Pers = ?");
        $stmt->bindParam(1, $idPers);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression des évaluations : " . $e->getMessage();
    }
    try {
        // Supprimer l'ID dans la table noter
        $stmt = $conn->prepare("DELETE FROM noter WHERE Id_Etudiant = ? ");
        $stmt->bindParam(1, $idEtudiant);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'étudiant dans la table noter " . $e->getMessage();
    }
    try {
        // Supprimer l'ID dans la table etudiant
        $stmt = $conn->prepare("DELETE FROM etudiant WHERE Id_Etudiant = ? ");
        $stmt->bindParam(1, $idEtudiant);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'étudiant dans la fonction: " . $e->getMessage();
    }
    try {
        // Supprimer l'ID dans la table personne
        $stmt = $conn->prepare("DELETE FROM personne WHERE ID_Pers = ? ");
        $stmt->bindParam(1, $idPers);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'étudiant dans la table personne: " . $e->getMessage();
    }
}

try {
    $ID = getIDPers($conn, 1);

    supprimer($conn, 1, $ID);
} catch (PDOException $e) {
    echo "Erreur d'ajout du pilote : " . $e->getMessage();
}
