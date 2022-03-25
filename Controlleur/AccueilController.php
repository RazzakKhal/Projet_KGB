<?php

require_once('Modèle/ManageAccueil.php');
require_once('Modèle/ManageBack.php');

class AccueilController
{
    private $MissionManager;


    public function __construct()
    {
        // des que le controlleur accueil est appelé je récupère dans ma BDD les missions gràce à ManageMission
        $this->MissionManager = new ManageAccueil();
        $this->MissionManager->chargementMissionAccueil();
    }

    public function afficherMissionDetail($idmission)
    {
        // chargement de toutes les missions avec leur contact, agents, planque et cible
        $mission = $this->MissionManager->recupMissionid($idmission);

        require_once('Vue/detail.php');
    }

    public function afficherAccueil()
    {
        // je récupère les missions qui seront transmises à ma vue

        $mission = $this->MissionManager->getMission();
        require_once('Vue/accueil.php');
    }
}
