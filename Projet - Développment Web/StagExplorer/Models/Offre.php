<?php

class Offre
{
    public static function getAll()
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');

            global $conn;
            // Requête pour récupérer les détails des offres
            $sqlOffre = "SELECT ID_Offer, Name_Offer, Description_Offer, Competences_Offer, Date_Offer FROM Offer";
            $stmtOffre = $conn->prepare($sqlOffre);
            $stmtOffre->execute();

            // Retourner les résultats sous forme de tableau associatif
            return $stmtOffre->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Problème de connexion à la base de donnée ...";
            die();
        }
    }

    public static function getOne($id_offre)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            // Requête pour récupérer les détails d'une offre spécifique
            $sqlOffre = "SELECT ID_Offre, Nom_Offre, Description_Offre, Competences_Offre, Date_Offre FROM Offre WHERE ID_Offre = :id_offre";
            $stmtOffre = $conn->prepare($sqlOffre);
            $stmtOffre->bindParam(':id_offre', $id_offre);
            $stmtOffre->execute();
        } catch (Exception $e) {
            echo "Problème de connexion à la base de donnée ...";
            die();
        }
    }

    public static function add($data)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            // Requête pour ajouter une nouvelle offre
            $sqlOffre = "INSERT INTO Offre (Nom_Offre, Description_Offre, Competences_Offre, Date_Offre) VALUES (:nom_offre, :description_offre, :competences_offre, :date_offre)";
            $stmtOffre = $conn->prepare($sqlOffre);
            $stmtOffre->bindParam(':nom_offre', $data['nom_offre']);
            $stmtOffre->bindParam(':description_offre', $data['description_offre']);
            $stmtOffre->bindParam(':competences_offre', $data['competences_offre']);
            $stmtOffre->bindParam(':date_offre', $data['date_offre']);
            $stmtOffre->execute();
        } catch (Exception $e) {
            echo "Problème de connexion à la base de donnée ...";
            die();
        }
    }

    public static function update($data)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            // Requête pour mettre à jour une offre existante
            $sqlOffre = "UPDATE Offre SET Nom_Offre = :nom_offre, Description_Offre = :description_offre, Competences_Offre = :competences_offre, Date_Offre = :date_offre WHERE ID_Offre = :id_offre";
            $stmtOffre = $conn->prepare($sqlOffre);
            $stmtOffre->bindParam(':nom_offre', $data['nom_offre']);
            $stmtOffre->bindParam(':description_offre', $data['description_offre']);
            $stmtOffre->bindParam(':competences_offre', $data['competences_offre']);
            $stmtOffre->bindParam(':date_offre', $data['date_offre']);
            $stmtOffre->bindParam(':id_offre', $data['id_offre']);
            $stmtOffre->execute();
        } catch (Exception $e) {
            echo "Problème de connexion à la base de donnée ...";
            die();
        }
    }

    public static function delete($id_offre) {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            // Commencer une transaction
            $conn->beginTransaction();

            // Requête pour supprimer les enregistrements associés dans la table Pilote
            $sqlPilote = "DELETE FROM Pilote WHERE ID_Offre = :id_offre";
            $stmtPilote = $conn->prepare($sqlPilote);
            $stmtPilote->bindParam(':id_offre', $id_offre);
            $stmtPilote->execute();

            // Requête pour supprimer l'offre
            $sqlOffre = "DELETE FROM Offre WHERE ID_Offre = :id_offre";
            $stmtOffre = $conn->prepare($sqlOffre);
            $stmtOffre->bindParam(':id_offre', $id_offre);
            $stmtOffre->execute();

            // Valider la transaction
            $conn->commit();

        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            $conn->rollBack();
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }
}
