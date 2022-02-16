<?php

require_once('Modèle/ManageBack.php');

class BackController
{
    private $Manager;

    public function __construct()
    {
        $this->Manager = new ManageBack();
    }

    public function afficherBack()
    {
        require_once('Vue/back.php');
    }

    public function afficherMissions()
    {
        require_once('Vue/missions/mission.php');
    }

    public function afficherAgents()
    {
        // ajouter les specialites 
        require_once('Vue/agents/agent.php');
    }

    public function afficherPlanques()
    {
        require_once('Vue/planques/planque.php');
    }

    public function afficherCibles()
    {
        require_once('Vue/cibles/cible.php');
    }

    public function afficherContacts()
    {
        require_once('Vue/contacts/contact.php');
    }
}
