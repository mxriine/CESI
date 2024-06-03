<?php
require_once('/www/StagExplorer/Controleurs/server.php');
require_once('/www/StagExplorer/Models/Wishlist.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ID_Offer']) && isset($_POST['ID_User'])) {
        $data = [
            'id_offer' => $_POST['ID_Offer'],
            'id_user' => $_POST['ID_User']
        ];

        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'add':
                    Wishlist::add($data);
                    echo "Offre ajoutée à la liste de souhaits";
                    break;
                case 'delete':
                    Wishlist::delete($data);
                    echo "Offre retirée de la liste de souhaits";
                    break;
                case 'check':
                    if (Wishlist::check($data)) {
                        echo "true";
                    } else {
                        echo "false";
                    }
                    break;
                default:
                    http_response_code(400);
                    echo "Action non reconnue";
                    break;
            }
        } else {
            http_response_code(400);
            echo "Paramètre action manquant";
        }
    } else {
        http_response_code(400);
        echo "Les paramètres ID_Offer et ID_User sont requis.";
    }
}
?>
