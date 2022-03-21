<?php

require_once('Modèle/ManageBack.php');


class BackController
{
    private $Manager;


    public function __construct()
    {
        $this->Manager = new ManageBack();
    }
    /////////////////////////////////////////////////////////////////////////////////
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
    //////////////////////////////////////////////////////////////////////////////////////   
    public function ajouterMissions()
    {


        require_once('Vue/missions/ajoutmission.php');
    }

    public function ajouterAgents()
    {

        require_once('Vue/agents/ajoutagent.php');
    }

    public function ajouterPlanques()
    {

        require_once('Vue/planques/ajoutplanque.php');
    }

    public function ajouterCibles()
    {

        require_once('Vue/cibles/ajoutcible.php');
    }

    public function ajouterContacts()
    {

        require_once('Vue/contacts/ajoutcontact.php');
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    public function ajouterMissionsbdd()
    {
        $this->Manager->Ajoutmissionbdd($_POST['titre'], $_POST['description'], $_POST['nomcode'], $_POST['pays'], $_POST['type'], $_POST['statut'], $_POST['datedebut'], $_POST['datefin'], $_POST['specialite']);
        header('Location: ' . URL . 'back/missions');
    }

    public function ajouterAgentsbdd()
    {

        $this->Manager->Ajoutagentbdd($_POST['code'], $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['nationalite'], $_POST['mission'], $_POST['specialite']);
        header('Location: ' . URL . 'back/agents');
    }

    public function ajouterPlanquesbdd()
    {

        $this->Manager->Ajoutplanquebdd($_POST['adresse'], $_POST['pays'], $_POST['type'], $_POST['mission']);
        header('Location: ' . URL . 'back/planques');
    }

    public function ajouterCiblesbdd()
    {

        $this->Manager->Ajoutciblebdd($_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['nomcode'], $_POST['nationalite'], $_POST['mission']);
        header('Location: ' . URL . 'back/cibles');
    }

    public function ajouterContactsbdd()
    {

        $this->Manager->Ajoutcontactbdd($_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['nomcode'], $_POST['nationalite'], $_POST['mission']);
        header('Location: ' . URL . 'back/contacts');
    }
    ///////////////////////////////////////////////////////////////////////////////////////////

    public function suppressionMissionbdd($id)
    {

        $this->Manager->Supprimermamission($id);
        header('Location: ' . URL . 'back/missions');
    }

    public function suppressionContactbdd($id)
    {
        $this->Manager->Supprimermoncontact($id);
        header('Location: ' . URL . 'back/contacts');
    }

    public function suppressionPlanquebdd($id)
    {
        $this->Manager->Supprimermaplanque($id);
        header('Location: ' . URL . 'back/planques');
    }

    public function suppressionCiblebdd($id)
    {
        $this->Manager->SupprimermaCible($id);
        header('Location: ' . URL . 'back/cibles');
    }

    public function suppressionAgentbdd($id)
    {
        $this->Manager->Supprimermonagent($id);
        header('Location: ' . URL . 'back/agents');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////

    public function modificationAgent($id)
    {
        $agent = $this->Manager->recupAgentid($id);
        require_once('Vue/agents/modifagent.php');
    }

    public function modificationMission($id)
    {
        $mission = $this->Manager->recupMissionid($id);
        require_once('Vue/missions/modifmission.php');
    }

    public function modificationContact($id)
    {
        $contact = $this->Manager->recupContactid($id);
        require_once('Vue/contacts/modifcontact.php');
    }

    public function modificationCible($id)
    {
        $cible = $this->Manager->recupCibleid($id);
        require_once('Vue/cibles/modifcible.php');
    }

    public function modificationPlanque($id)
    {
        $planque = $this->Manager->recupPlanqueid($id);
        require_once('Vue/planques/modifplanque.php');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////

    public function modificationAgentv($id)
    {

        $this->Manager->Modifagentbdd($id, $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['nationalite'], $_POST['mission'], $_POST['specialite']);
    }

    public function modificationMissionv($id)
    {
        $this->Manager->Modifmissionbdd($id, $_POST['titre'], $_POST['description'], $_POST['nomcode'], $_POST['pays'], $_POST['type'], $_POST['statut'], $_POST['datedebut'], $_POST['datefin'], $_POST['specialite']);
        header('Location: ' . URL . 'back/missions');
    }

    public function modificationContactv($id)
    {
        $this->Manager->Modifcontactbdd($id, $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['nomcode'], $_POST['nationalite'], $_POST['mission']);
        header('Location: ' . URL . 'back/contacts');
    }

    public function modificationCiblev($id)
    {
        $this->Manager->Modifciblebdd($id, $_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['nomcode'], $_POST['nationalite'], $_POST['mission']);
        header('Location: ' . URL . 'back/cibles');
    }

    public function modificationPlanquev($id)
    {
        $this->Manager->Modifplanquebdd($id, $_POST['adresse'], $_POST['pays'], $_POST['type'], $_POST['mission']);
        header('Location: ' . URL . 'back/planques');
    }
}
