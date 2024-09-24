<?php

class Postulate
{
    public static function add($data)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            $sqlPostulate = "INSERT INTO Apply (ID_Offer, ID_Student, LetterMotivation, CV) VALUES (:id_offer, :id_student, :lettermotivation, :cv)";
            $stmtPostulate = $conn->prepare($sqlPostulate);
            $stmtPostulate->bindParam(':id_offer', $data['id_offer']);
            $stmtPostulate->bindParam(':id_student', $data['id_student']);
            $stmtPostulate->bindParam(':lettermotivation', $data['lettermotivation']);
            $stmtPostulate->bindParam(':cv', $data['cv']);
            $stmtPostulate->execute();
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données ... " . $e->getMessage();
            die();
        }
    }

    public static function delete($id_offer, $id_student)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            // Supprimer la postulation
            $sqlDelete = "DELETE FROM Apply WHERE ID_Offer = :id_offer AND ID_Student = :id_student";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bindParam(':id_offer', $id_offer);
            $stmtDelete->bindParam(':id_student', $id_student);
            $stmtDelete->execute();

            // Indiquez que la suppression s'est déroulée avec succès
            return true;
        } catch (Exception $e) {
            // Gérer les exceptions
            echo "Problème de connexion à la base de données ... " . $e->getMessage();
            die();
        }
    }

    //afficher les postulations selon l'étudiant
    public static function showPostulate($id_student)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            // Requête SQL pour récupérer les postulations de l'étudiant avec les informations de l'offre associée
            $sqlPostulate = "SELECT Apply.*, Offer.ID_Offer, Offer.Name_Offer, Offer.Description_Offer, Offer.Skills_Offer, Offer.Pay_Offer, Offer.Place_Offer
                         FROM Apply
                         INNER JOIN Offer ON Apply.ID_Offer = Offer.ID_Offer
                         WHERE Apply.ID_Student = :id_student";

            $stmtPostulate = $conn->prepare($sqlPostulate);
            $stmtPostulate->bindParam(':id_student', $id_student);
            $stmtPostulate->execute();
            $postulate = $stmtPostulate->fetchAll();
            return $postulate;
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données ... " . $e->getMessage();
            die();
        }
    }

    //afficher les postulations selon l'offre
    public static function showPostulateOffer($id_offer)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            $sqlPostulate = "SELECT * FROM Apply WHERE ID_Offer = :id_offer";
            $stmtPostulate = $conn->prepare($sqlPostulate);
            $stmtPostulate->bindParam(':id_offer', $id_offer);
            $stmtPostulate->execute();
            $postulate = $stmtPostulate->fetchAll();
            return $postulate;
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données ... " . $e->getMessage();
            die();
        }
    }
}
