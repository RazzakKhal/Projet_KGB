<?php
require_once('Controlleur/Controlleurs.php');

if ($_GET['action'] == 'accueil') {
    AccueilControlleur();
} else if ($_GET['action'] == 'back') {

    BackControlleur();
} else if ($_GET['action'] == 'detail') {
    DetailControlleur();
} else {
    AccueilControlleur();
}
