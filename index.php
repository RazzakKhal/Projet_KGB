<?php
require_once('Controlleur/Controlleurs.php');

if ($_GET['action'] == 'accueil') {
    AcceuilControlleur();
} else if ($_GET['action'] == 'back') {

    BackControlleur();
} else if ($_GET['action'] == 'detail') {
    DetailControlleur();
} else if ($_GET['action'] == 'mission') {
    MissionControlleur();
} else {
    AcceuilControlleur();
}
