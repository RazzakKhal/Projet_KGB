<?php
require_once('Controlleur/AccueilController.php');
$AccueilControl = new AccueilController;

if (empty($_GET['action'])) {
    $AccueilControl->afficherAccueil();
} else if ($_GET['action'] === 'back') {

    require('Vue/back.php');
} else if ($_GET['action'] === 'detail') {

    require('Vue/detail.php');
} else if ($_GET['action'] === 'accueil') {
    $AccueilControl->afficherAccueil();
} else {
    $AccueilControl->afficherAccueil();
}
