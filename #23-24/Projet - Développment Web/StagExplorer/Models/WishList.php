<?php

class Wishlist {
    public static function add($data)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            $sql = "INSERT INTO wishlist (ID_Offer, ID_User) VALUES (:id_offer, :id_user)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_offer', $data['id_offer']);
            $stmt->bindParam(':id_user', $data['id_user']);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données ... " . $e->getMessage();
            die();
        }
    }

    public static function delete($data)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            $sql = "DELETE FROM wishlist WHERE ID_Offer = :id_offer AND ID_User = :id_user";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_offer', $data['id_offer']);
            $stmt->bindParam(':id_user', $data['id_user']);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données ... " . $e->getMessage();
            die();
        }
    }

    public static function check($data)
    {
        try {
            require_once('/www/StagExplorer/Controleurs/server.php');
            global $conn;

            $sql = "SELECT COUNT(*) FROM wishlist WHERE ID_Offer = :id_offer AND ID_User = :id_user";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_offer', $data['id_offer']);
            $stmt->bindParam(':id_user', $data['id_user']);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données ... " . $e->getMessage();
            die();
        }
    }
}
