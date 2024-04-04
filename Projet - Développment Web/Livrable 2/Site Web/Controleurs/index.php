<?php
require_once 'session.php';
require_once '../_assets/libs/Smarty/smarty-4.5.1/libs/Smarty.class.php';

$smarty = new Smarty;

// Assignation des variables au template
$smarty->assign('logo', '/Site Web/_assets/img/logoWeb.png');
$smarty->assign('css', '/Site Web/_assets/_css/styles.css');
$smarty->assign('main', '/Site Web/Vues/Users/MainSearch.php');

// Affichage du template
$smarty->display('../Accueil.tpl'); // Assurez-vous que le chemin vers votre fichier .tpl est correct
?>
