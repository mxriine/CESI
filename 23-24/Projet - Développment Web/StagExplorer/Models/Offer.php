<?php

class Offer
{
    public static function getAll()
    {
        try {
            require_once ('/www/StagExplorer/Controleurs/server.php');

            global $conn;
            // Requête pour récupérer les détails des offres
            $sqlOffre = "SELECT ID_Offer, Name_Offer, Description_Offer, Skills_Offer, Date_Offer FROM Offer";
            $stmtOffre = $conn->prepare($sqlOffre);
            $stmtOffre->execute();

            // Retourner les résultats sous forme de tableau associatif
            return $stmtOffre->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Problème de connexion à la base de donnée ...";
            die();
        }
    }

    public static function getOne($id_offer)
    {
        try {
            require_once ('/www/StagExplorer/Controleurs/server.php');
            global $conn;
    
            // Requête pour récupérer les détails d'une offre spécifique
            $sqlOffre = "SELECT * FROM Offer WHERE ID_Offer = :id_offer";
            $stmtOffre = $conn->prepare($sqlOffre);
            $stmtOffre->bindParam(':id_offer', $id_offer);
            $stmtOffre->execute();
    
            // Récupérer les données de l'offre
            $offerData = $stmtOffre->fetch(PDO::FETCH_ASSOC);
            
            return $offerData; // Retourner les données de l'offre
    
        } catch (Exception $e) {
            echo "Problème de connexion à la base de donnée ...";
            die();
        }
    }

    public static function add($data)
    {}

    public static function update($data)
    {
        try {
            require_once ('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            $sqlOffer = "UPDATE Offer SET 
                Name_Offer = :name_offer, 
                Description_Offer = :description_offer, 
                Skills_Offer = :skills_offer, 
                Date_Offer = :date_offer,
                Duration_Offer = :duration_offer,
                Pay_Offer = :pay_offer,
                Place_Offer = :place_offer,
                Level_Offer = :level_offer
                WHERE ID_Offer = :id_offer";

            $stmtOffer = $conn->prepare($sqlOffer);
            $stmtOffer->bindParam(':name_offer', $data['name_offer']);
            $stmtOffer->bindParam(':description_offer', $data['description_offer']);
            $stmtOffer->bindParam(':skills_offer', $data['skills_offer']);
            $stmtOffer->bindParam(':date_offer', $data['date_offer']);
            $stmtOffer->bindParam(':duration_offer', $data['duration_offer']);
            $stmtOffer->bindParam(':pay_offer', $data['pay_offer']);
            $stmtOffer->bindParam(':place_offer', $data['place_offer']);
            $stmtOffer->bindParam(':level_offer', $data['level_offer']);
            $stmtOffer->bindParam(':id_offer', $data['id_offer']);
            $stmtOffer->execute();
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données ... " . $e->getMessage();
            die();
        }
    }

    public static function delete($id_offer)
    {
        try {
            require_once ('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            // Commencer une transaction
            $conn->beginTransaction();

            // Requête pour supprimer l'Offer
            $sqlOffre = "DELETE FROM Offer WHERE ID_Offer = :id_offer";
            $stmtOffre = $conn->prepare($sqlOffre);
            $stmtOffre->bindParam(':id_offer', $id_offer);
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
