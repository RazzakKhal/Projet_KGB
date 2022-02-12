<?php
require_once('Controlleur/AccueilController.php');
require_once('Controlleur/DetailController.php');
require_once('Controlleur/BackController.php');
require_once('Controlleur/ConnexionController.php');
// definition de la const URL qui permet d'accéder à ttes les ressources depuis la racine
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
$AccueilControl = new AccueilController();
$DetailControl = new DetailController();
$BackControl = new BackController();
$ConnexionControl = new ConnexionController();
/*
if (empty($_GET['action'])) {
    $AccueilControl->afficherAccueil();
} else if ($_GET['action'] === 'back') {

    $BackControl->afficherBack();
} else if ($_GET['action'] === 'detail') {

    $DetailControl->afficherDetail();
} else if ($_GET['action'] === 'connexion') {
    $ConnexionControl->afficherConnexion();
} else if ($_GET['action'] === 'accueil') {
    $AccueilControl->afficherAccueil();
} else {
    $AccueilControl->afficherAccueil();
}
*/

// Routeur sous forme de switch

if (empty($_GET['action'])) {
    $AccueilControl->afficherAccueil();
} else {
    $url = explode("/", filter_var($_GET['action'], FILTER_SANITIZE_URL));
    switch ($url[0]) {
        case 'back':
            $BackControl->afficherBack();
            break;

        case 'detail':

            $url = (int)$url[1];
            $AccueilControl->afficherMissionDetail($url);

            break;

        case 'connexion':
            $ConnexionControl->afficherConnexion();
            break;

        default:
            $AccueilControl->afficherAccueil();
    }
}
