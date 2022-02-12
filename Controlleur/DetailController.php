<?php
require_once('Modèle/ManageMission.php');
class DetailController
{

    private $Manage;

    public function __contruct()
    {
        $this->Manage = new ManageMission();
    }

    public function afficherDetail()
    {
        require_once('Vue/detail.php');
        $this->Manage->chargementMissionAccueil();
    }
}
