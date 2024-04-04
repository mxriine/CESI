<?php
// Inclure le fichier de connexion à la base de données
require_once('/www/Site Web/server.php');

//fonction qui récupère l'id pers de la table personne avec l'id du pilote
function getIDPers($conn, $idPilote)
{

    $stmt = $conn->prepare("SELECT p.ID_Pers
                               FROM personne p
                               JOIN pilote pi ON pi.ID_Pers = p.ID_Pers
                               WHERE pi.ID_Pilote = ?");
    $stmt->bindParam(1, $idPilote);
    $stmt->execute();
    return $stmt->fetchColumn();
}


//fonction qui permet de récuperer les lignes dans différentes tables où l'id pilote est celui voulu
function RecupPilotes($conn, $table, $idPilote)
{
    $stmt = $conn->prepare("SELECT ID_Pilote FROM $table WHERE ID_Pilote = ?");
    $stmt->bindParam(1, $idPilote);
    $stmt->execute();

    $resultats = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $resultats[] = $row['ID_Pilote'];
    }

    return $resultats;
}

function UpdatePilotes($conn, $id, $table)
{
    $stmt = $conn->prepare("UPDATE $table SET ID_Pilote = NULL WHERE ID_Pilote = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();

    $nombre_lignes_affectees = $stmt->rowCount();

    return $nombre_lignes_affectees;
}


function supprimer($conn, $idPilote, $idPers)
{

    try {
        // Supprimer l'ID dans la table etudiant
        $stmt = $conn->prepare("DELETE FROM pilote WHERE ID_Pilote = ? ");
        $stmt->bindParam(1, $idPilote);
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

    try {
        // Supprimer l'ID dans la table personne
        $stmt = $conn->prepare("DELETE FROM evaluer WHERE ID_Pers = ? ");
        $stmt->bindParam(1, $idPers);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'étudiant dans la table evaluer: " . $e->getMessage();
    }
}

$ID = getIDPers($conn, 1);
supprimer($conn, 1, $ID);

$pilotesPromo = RecupPilotes($conn, 'promotion', 1);
$pilotesOffre = RecupPilotes($conn, 'offre', 1);
$pilotesEtudiant = RecupPilotes($conn, 'etudiant', 1);
$pilotesEntre = RecupPilotes($conn, 'entreprise', 1);


foreach ($pilotesEntre as $pilote) {
    $ancienID = $pilote;
    $nombre_lignes_affectees = UpdatePilotes($conn, $ancienID, 'entreprise');
}

foreach ($pilotesPromo as $pilote) {
    $ancienID = $pilote;
    $nombre_lignes_affectees = UpdatePilotes($conn, $ancienID, 'promotion');
}

foreach ($pilotesOffre as $pilote) {
    $ancienID = $pilote;
    $nombre_lignes_affectees = UpdatePilotes($conn, $ancienID, 'offre');
}

foreach ($pilotesEtudiant as $pilote) {
    $ancienID = $pilote;
    $nombre_lignes_affectees = UpdatePilotes($conn, $ancienID, 'etudiant');
}
