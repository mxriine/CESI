<?php

class Postulate {
    public static function add($data)
    {
        try {
            require_once ('/www/StagExplorer/Controleurs/server.php');
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
}