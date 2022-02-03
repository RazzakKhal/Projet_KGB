<?php

require_once('Modèle/ManageMission.php');

class AccueilController
{
    private $MissionManager;

    public function __construct()
    {
        // des que le controlleur accueil est appelé je récupère dans ma BDD les missions gràce à ManageMission
        $this->MissionManager = new ManageMission();
        $this->MissionManager->chargementMissionAccueil();
    }

    public function afficherAccueil()
    {
        // je récupère les missions qui seront transmises à ma vue
        $mission = $this->MissionManager->getMission();
        require_once('Vue/accueil.php');
    }
}
