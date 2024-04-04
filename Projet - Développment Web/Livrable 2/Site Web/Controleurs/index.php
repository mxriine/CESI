<?php
require_once 'session.php';
require_once '../_assets/libs/Smarty/smarty-4.5.1/libs/Smarty.class.php'; // Assurez-vous que ce chemin est correct

$smarty = new Smarty;

// Ici, vous pouvez attribuer des variables au template si nécessaire
// $smarty->assign('nomDeLaVariable', $valeurDeLaVariable);
$smarty->assign('css', '../_assets/css/_styles.css');

$smarty->display('../Accueil.tpl'); // Assurez-vous que le chemin vers votre fichier .tpl est correct
