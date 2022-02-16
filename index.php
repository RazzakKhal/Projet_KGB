<?php

// definition de la const URL qui permet d'accéder à ttes les ressources depuis la racine
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once('Controlleur/AccueilController.php');
require_once('Controlleur/BackController.php');
require_once('Controlleur/ConnexionController.php');
$AccueilControl = new AccueilController();
$BackControl = new BackController();
$ConnexionControl = new ConnexionController();


// Routeur sous forme de switch

if (empty($_GET['action'])) {
    $AccueilControl->afficherAccueil();
} else {
    $url = explode("/", filter_var($_GET['action'], FILTER_SANITIZE_URL));
    // si mon premier mot dans mon url est back, detail, connexion ou autre
    switch ($url[0]) {
        case 'back':
            if (empty($url[1])) {
                $BackControl->afficherBack();
            } else if ($url[1] === "missions") {
                $BackControl->afficherMissions();
            } else if ($url[1] === "contacts") {
                $BackControl->afficherContacts();
            } else if ($url[1] === "agents") {
                $BackControl->afficherAgents();
            } else if ($url[1] === "cibles") {
                $BackControl->afficherCibles();
            } else if ($url[1] === "planques") {
                $BackControl->afficherPlanques();
            } else {
                throw new Exception("la page n'existe pas");
            }
            break;

        case 'detail':

            $url = (int)$url[1]; // fonction ci dessous fonctionne uniquement avec un int donc je converti 
            //car correspond à un id de mission
            $AccueilControl->afficherMissionDetail($url);
            break;

        case 'connexion':
            $ConnexionControl->afficherConnexion();
            break;

        default:
            $AccueilControl->afficherAccueil();
    }
}
