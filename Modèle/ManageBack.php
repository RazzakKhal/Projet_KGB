<?php
require_once('AccesBdd.php');
require_once('Admin.php');
require_once('ManageMission.php');
require_once('Agent.php');
require_once('Cible.php');
require_once('Contact.php');
require_once('Planque.php');
require_once('Mission.php');


class ManageBack extends AccesBdd
{
    private $missions;
    private $contacts;
    private $cibles;
    private $agents;
    private $planques;

    public function getMissions()
    {
        return $this->missions;
    }

    public function setMissions($missions)
    {
        $this->missions[] = $missions;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function setContacts($contacts)
    {
        $this->contacts[] = $contacts;
    }


    public function getCibles()
    {
        return $this->cibles;
    }

    public function setCibles($cibles)
    {
        $this->cibles[] = $cibles;
    }
    public function getAgents()
    {
        return $this->agents;
    }

    public function setAgents($agents)
    {
        $this->agents[] = $agents;
    }

    public function getPlanques()
    {
        return $this->planques;
    }

    public function setPlanques($planques)
    {
        $this->planques[] = $planques;
    }


    public function Affichemesmissions()
    {
        // récuperer les missions de la bdd

        $pdo = $this->getBdd();
        $req = $pdo->prepare('SELECT id, titre_m, description_m, nomcode_m, pays_m, type_m, statut_m, datedebut_m, datefin_m, specialite_m FROM Mission');
        $req->execute();
        $mesmissions = $req->fetchAll(PDO::FETCH_ASSOC);


        // pour chaque mission creer une instance mission et attribuer les valeurs
        foreach ($mesmissions as $missions) {

            $m =  new Mission($missions['id'], $missions['titre_m'], $missions['description_m'], $missions['nomcode_m'], $missions['pays_m'], $missions['type_m'], $missions['statut_m'], $missions['specialite_m'], $missions['datedebut_m'], $missions['datefin_m']);
            $this->setMissions($m);
        }
    }

    public function Affichemescontacts()
    {
        // récupérer les contacts de la bdd

        $pdo = $this->getBdd();
        $req3 = $pdo->prepare('SELECT id, nom, prenom, date_contact, nomcode_contact, nationalite, mission_contact FROM Contact');
        $req3->execute();
        $mescontacts = $req3->fetchAll(PDO::FETCH_ASSOC);


        foreach ($mescontacts as $contact) {
            $m = new Contact($contact['nom'], $contact['prenom'], $contact['date_contact'], $contact['nomcode_contact'], $contact['nationalite']);
            $m->setMission($contact['mission_contact']);
            $this->setContacts($m);
        }
    }

    public function Affichemescibles()
    {
        // récupérer les cibles de la bdd

        $pdo = $this->getBdd();
        $req3 = $pdo->prepare('SELECT id, nom, prenom, date_cible, nomcode_cible, nationalite, mission_cible FROM Cible');
        $req3->execute();
        $mescibles = $req3->fetchAll(PDO::FETCH_ASSOC);


        foreach ($mescibles as $cible) {
            $m = new Cible($cible['nom'], $cible['prenom'], $cible['date_cible'], $cible['nomcode_cible'], $cible['nationalite']);
            $m->setMission($cible['mission_cible']);
            $this->setCibles($m);
        }
    }

    public function Affichemesagents()
    {
        // récupérer les agents de la bdd

        $pdo = $this->getBdd();
        $req3 = $pdo->prepare('SELECT code_agent, nom, prenom, date_agent, nationalite, mission_agent FROM Agent');
        $req3->execute();
        $mesagents = $req3->fetchAll(PDO::FETCH_ASSOC);




        // les intégrer dans des objets Agents

        foreach ($mesagents as $agent) {



            $m = new Agent($agent['nom'], $agent['prenom'], $agent['date_agent'], $agent['code_agent'], $agent['nationalite']);
            $m->setMission($agent['mission_agent']);

            // récupérer les spé des agents
            $req4 = $pdo->prepare('SELECT specialite_id FROM speagent WHERE agent_id = :agentid');
            $req4->bindValue(':agentid', $agent['code_agent']);
            $req4->execute();

            $messpecialites = $req4->fetchAll(PDO::FETCH_ASSOC);
            foreach ($messpecialites as $spe) {
                $m->setSpecialites($spe);
            }




            $this->setAgents($m);
        }
    }

    public function Affichemesplanques()
    {
        // récupérer les planques de la bdd

        $pdo = $this->getBdd();
        $req3 = $pdo->prepare('SELECT code_planque, adresse, pays, type_planque, mission_planque FROM Planque');
        $req3->execute();
        $mesplanques = $req3->fetchAll(PDO::FETCH_ASSOC);


        foreach ($mesplanques as $planque) {
            $m = new Planque($planque['code_planque'], $planque['adresse'], $planque['pays'], $planque['type_planque']);
            $m->setMission($planque['mission_planque']);
            $this->setPlanques($m);
        }
    }
}
