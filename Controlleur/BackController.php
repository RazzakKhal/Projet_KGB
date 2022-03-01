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
        $this->Manager->Affichemesmissions();
        $mesmissions = $this->Manager->getMissions();

        require_once('Vue/missions/mission.php');
    }

    public function afficherAgents()
    {
        $this->Manager->Affichemesagents();
        $mesagents = $this->Manager->getAgents();
        require_once('Vue/agents/agent.php');
    }

    public function afficherPlanques()
    {
        $this->Manager->Affichemesplanques();
        $mesplanques = $this->Manager->getPlanques();
        require_once('Vue/planques/planque.php');
    }

    public function afficherCibles()
    {
        $this->Manager->Affichemescibles();
        $mescibles = $this->Manager->getCibles();
        require_once('Vue/cibles/cible.php');
    }

    public function afficherContacts()
    {
        $this->Manager->Affichemescontacts();
        $mescontacts = $this->Manager->getContacts();
        require_once('Vue/contacts/contact.php');
    }
}
