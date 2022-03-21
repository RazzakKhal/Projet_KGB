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
    private $missions; // tableau de missions
    private $contacts; // tableau de contacts
    private $cibles; // tableau de cibles
    private $agents; // tableau d'agents
    private $planques; // tableau des planques
    public function getMissions()
    {
        return $this->missions;
    }

    public function setMissions($mission)
    {
        $this->missions[] = $mission;
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

    //////////////////////////////////////////////////////////////////////////////////////////////
    public function Affichemesmissions()
    {
        // récuperer les missions de la bdd

        $pdo = $this->getBdd();
        $req = $pdo->prepare('SELECT id, titre_m, description_m, nomcode_m, pays_m, type_m, statut_m, datedebut_m, datefin_m, specialite_m FROM Mission');
        $req->execute();
        $mesmissions = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();


        // pour chaque mission creer une instance mission et attribuer les valeurs
        foreach ($mesmissions as $missions) {

            $m =  new Mission($missions['titre_m'], $missions['description_m'], $missions['nomcode_m'], $missions['pays_m'], $missions['type_m'], $missions['statut_m'], $missions['specialite_m'], $missions['datedebut_m'], $missions['datefin_m']);
            $m->setId($missions['id']);
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
        $req3->closeCursor();

        foreach ($mescontacts as $contact) {
            $m = new Contact($contact['nom'], $contact['prenom'], $contact['date_contact'], $contact['nomcode_contact'], $contact['nationalite']);
            $m->setMission($contact['mission_contact']);
            $m->setId($contact['id']);
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
        $req3->closeCursor();

        foreach ($mescibles as $cible) {
            $m = new Cible($cible['nom'], $cible['prenom'], $cible['date_cible'], $cible['nomcode_cible'], $cible['nationalite']);
            $m->setMission($cible['mission_cible']);
            $m->setId($cible['id']);
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
        $req3->closeCursor();





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


            // les intégrer dans des objets Agents

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
            $m = new Planque($planque['adresse'], $planque['pays'], $planque['type_planque']);
            $m->setCode($planque['code_planque']);
            $m->setMission($planque['mission_planque']);
            $this->setPlanques($m);
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////
    public function Ajoutmissionbdd($titre, $description, $nomcode, $pays, $type, $statut, $datedebut, $datefin, $specialite)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('INSERT INTO Mission(titre_m, description_m, nomcode_m, pays_m, type_m, statut_m, datedebut_m, datefin_m, specialite_m) VALUES (:titre, :descriptionm, :nomcode, :pays, :typem, :statut, :datedebut, :datefin, :specialite)');
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':descriptionm', $description, PDO::PARAM_STR);
        $req->bindValue(':nomcode', $nomcode, PDO::PARAM_STR);
        $req->bindValue(':pays', $pays, PDO::PARAM_STR);
        $req->bindValue(':typem', $type, PDO::PARAM_STR);
        $req->bindValue(':statut', $statut, PDO::PARAM_STR);
        $req->bindValue(':datedebut', $datedebut, PDO::PARAM_INT);
        $req->bindValue(':datefin', $datefin, PDO::PARAM_INT);
        $req->bindValue(':specialite', $specialite, PDO::PARAM_STR);
        $resultat = $req->execute();
        $req->closeCursor();
        // si ma requête s'est bien passé j'ajoute aussi ma mission à ma variable missions contenant toutes mes missions

        if ($resultat > 0) {
            $m =  new Mission($titre, $description, $nomcode, $pays, $type, $statut, $specialite, $datedebut, $datefin);
            $this->setMissions($m);
        }
    }

    public function Ajoutcontactbdd($nom, $prenom, $date, $nomcode, $nationalite, $mission)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('INSERT INTO Contact(nom, prenom, date_contact, nomcode_contact, nationalite, mission_contact) VALUES (:nom, :prenom, :datec, :nomcode, :nationalite, :mission)');
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':datec', $date, PDO::PARAM_STR);
        $req->bindValue(':nomcode', $nomcode, PDO::PARAM_STR);
        $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
        $req->bindValue(':mission', $mission, PDO::PARAM_STR);
        $resultat = $req->execute();
        // si ma requête s'est bien passé j'ajoute aussi mon contact à ma variable contacts contenant tous mes contacts
        if ($resultat > 0) {
            $m = new Contact($nom, $prenom, $date, $nomcode, $nationalite);
            $m->setMission($mission);
            $this->setContacts($m);
        }
    }

    public function Ajoutciblebdd($nom, $prenom, $date, $nomcode, $nationalite, $mission)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('INSERT INTO Cible(nom, prenom, date_cible, nomcode_cible, nationalite, mission_cible) VALUES (:nom, :prenom, :datec, :nomcode, :nationalite, :mission)');
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':datec', $date, PDO::PARAM_STR);
        $req->bindValue(':nomcode', $nomcode, PDO::PARAM_STR);
        $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
        $req->bindValue(':mission', (int)$mission, PDO::PARAM_INT);
        $resultat = $req->execute();
        // si ma requête s'est bien passé j'ajoute aussi ma cible à ma variable cibles contenant toutes mes cibles
        if ($resultat > 0) {
            $m = new Cible($nom, $prenom, $date, $nomcode, $nationalite);
            $m->setMission($mission);
            $this->setCibles($m);
        }
    }

    public function Ajoutplanquebdd($adresse, $pays, $type, $mission)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('INSERT INTO Planque(adresse, pays, type_planque, mission_planque) VALUES (:adresse, :pays, :typep, :mission)');
        $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $req->bindValue(':pays', $pays, PDO::PARAM_STR);
        $req->bindValue(':typep', $type, PDO::PARAM_STR);
        $req->bindValue(':mission', $mission, PDO::PARAM_STR);
        $resultat = $req->execute();

        if ($resultat > 0) {
            $m = new Planque($adresse, $pays, $type);
            $m->setMission($mission);
            $this->setPlanques($m);
        }
    }

    public function Ajoutagentbdd($code, $nom, $prenom, $date, $nationalite, $mission, $specialites)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('INSERT INTO Agent(code_agent, nom, prenom, date_agent, nationalite, mission_agent) VALUES (:code, :nom, :prenom, :datec, :nationalite, :mission)');
        $req->bindValue(':code', $code, PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':datec', $date, PDO::PARAM_STR);
        $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
        $req->bindValue(':mission', $mission, PDO::PARAM_INT);
        $resultat = $req->execute();

        // je récupère les spécialités entrées, et je les ajoute à ma table speagent en bdd


        // si on mon tableau specialite contient assassinat...
        if (in_array('assassinat', $specialites)) {
            $req3 = $pdo->prepare('INSERT INTO speagent(agent_id, specialite_id) VALUES (:id, :assa)');
            $req3->bindValue(':id', $code, PDO::PARAM_INT);
            $req3->bindValue(':assa', 1);
            $req3->execute();
        }

        // si on mon tableau specialite contient infiltration...
        if (in_array('infiltration', $specialites)) {
            $req4 = $pdo->prepare('INSERT INTO speagent(agent_id, specialite_id) VALUES (:id, :infi)');
            $req4->bindValue(':id', $code, PDO::PARAM_INT);
            $req4->bindValue(':infi', 3);
            $req4->execute();
        }
        // si on mon tableau specialite contient surveillance...
        if (in_array('surveillance', $specialites)) {
            $req5 = $pdo->prepare('INSERT INTO speagent(agent_id, specialite_id) VALUES (:id, :surv)');
            $req5->bindValue(':id', $code, PDO::PARAM_INT);
            $req5->bindValue(':surv', 2);
            $req5->execute();
        }

        if ($resultat > 0) {
            // Enfin j'ajoute à ma variable agents mon nouvel agent
            $m = new Agent($nom, $prenom, $date, $code, $nationalite);
            $m->setMission($mission);


            foreach ($specialites as $spe) {
                $m->setSpecialites($spe);
            }




            $this->setAgents($m);
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////




    public function Supprimermamission($id)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('DELETE FROM Mission WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute();
    }

    public function Supprimermoncontact($id)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('DELETE FROM Contact WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute();
    }

    public function Supprimermaplanque($id)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('DELETE FROM Planque WHERE code_planque = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute();
    }

    public function Supprimermacible($id)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('DELETE FROM Cible WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute();
    }

    public function Supprimermonagent($id)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('DELETE FROM speagent WHERE agent_id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute();


        $req2 = $pdo->prepare('DELETE FROM Agent WHERE code_agent = :id');
        $req2->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat2 = $req2->execute();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////

    // récupération d'une mission par son id
    public function recupMissionid($id)
    {
        $this->Affichemesmissions();
        for ($i = 0; $i < count($this->missions); $i++) {
            if ($this->missions[$i]->getId() === $id) {
                return $this->missions[$i];
            }
        }
    }

    // récupération d'un agent par son id
    public function recupAgentid($id)
    {
        $this->Affichemesagents();
        for ($i = 0; $i < count($this->agents); $i++) {
            if ($this->agents[$i]->getCode() === $id) {
                return $this->agents[$i];
            }
        }
    }

    // récupération d'un contact par son id
    public function recupContactid($id)
    {
        $this->Affichemescontacts();
        for ($i = 0; $i < count($this->contacts); $i++) {
            if ($this->contacts[$i]->getId() === $id) {
                return $this->contacts[$i];
            }
        }
    }

    // récupération d'une cible par son id
    public function recupCibleid($id)
    {
        $this->Affichemescibles();
        for ($i = 0; $i < count($this->cibles); $i++) {
            if ($this->cibles[$i]->getId() === $id) {
                return $this->cibles[$i];
            }
        }
    }

    // récupération d'une planque par son id
    public function recupPlanqueid($id)
    {
        $this->Affichemesplanques();
        for ($i = 0; $i < count($this->planques); $i++) {
            if ($this->planques[$i]->getCode() === $id) {
                return $this->planques[$i];
            }
        }
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////////////////////////////////////////////
    public function Modifmissionbdd($id, $titre, $description, $nomcode, $pays, $type, $statut, $datedebut, $datefin, $specialite)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('UPDATE Mission SET titre_m = :titre, description_m = :descriptionm, nomcode_m = :nomcode, pays_m = :pays, type_m = :typem, statut_m = :statut, datedebut_m = :datedebut, datefin_m = :datefin, specialite_m = :specialite WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':descriptionm', $description, PDO::PARAM_STR);
        $req->bindValue(':nomcode', $nomcode, PDO::PARAM_STR);
        $req->bindValue(':pays', $pays, PDO::PARAM_STR);
        $req->bindValue(':typem', $type, PDO::PARAM_STR);
        $req->bindValue(':statut', $statut, PDO::PARAM_STR);
        $req->bindValue(':datedebut', $datedebut, PDO::PARAM_INT);
        $req->bindValue(':datefin', $datefin, PDO::PARAM_INT);
        $req->bindValue(':specialite', $specialite, PDO::PARAM_STR);
        $resultat = $req->execute();
        $req->closeCursor();
        // si ma requête s'est bien passé j'ajoute aussi ma mission à ma variable missions contenant toutes mes missions

    }

    public function Modifcontactbdd($id, $nom, $prenom, $date, $nomcode, $nationalite, $mission)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('UPDATE Contact SET nom = :nom, prenom = :prenom, date_contact = :datec , nomcode_contact = :nomcode, nationalite = :nationalite, mission_contact = :mission WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':datec', $date, PDO::PARAM_STR);
        $req->bindValue(':nomcode', $nomcode, PDO::PARAM_STR);
        $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
        $req->bindValue(':mission', $mission, PDO::PARAM_INT);
        $resultat = $req->execute();
        // si ma requête s'est bien passé j'ajoute aussi mon contact à ma variable contacts contenant tous mes contacts

    }

    public function Modifciblebdd($id, $nom, $prenom, $date, $nomcode, $nationalite, $mission)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('UPDATE Cible SET nom = :nom, prenom = :prenom, date_cible = :datec, nomcode_cible = :nomcode, nationalite = :nationalite, mission_cible = :mission WHERE id = :id');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':datec', $date, PDO::PARAM_STR);
        $req->bindValue(':nomcode', $nomcode, PDO::PARAM_STR);
        $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
        $req->bindValue(':mission', (int)$mission, PDO::PARAM_INT);
        $resultat = $req->execute();
        // si ma requête s'est bien passé j'ajoute aussi ma cible à ma variable cibles contenant toutes mes cibles

    }

    public function Modifplanquebdd($code, $adresse, $pays, $type, $mission)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('UPDATE Planque SET adresse= :adresse, pays = :pays, type_planque = :typep, mission_planque = :mission WHERE code_planque = :code');
        $req->bindValue(':code', $code, PDO::PARAM_INT);
        $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $req->bindValue(':pays', $pays, PDO::PARAM_STR);
        $req->bindValue(':typep', $type, PDO::PARAM_STR);
        $req->bindValue(':mission', $mission, PDO::PARAM_INT);
        $resultat = $req->execute();
    }

    public function Modifagentbdd($code, $nom, $prenom, $date, $nationalite, $mission, $specialites)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('UPDATE Agent SET code_agent = :code, nom = :nom, prenom = :prenom, date_agent = :datec, nationalite = :nationalite, mission_agent = :mission WHERE code_agent = :code');
        $req->bindValue(':code', $code, PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':datec', $date, PDO::PARAM_STR);
        $req->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
        $req->bindValue(':mission', $mission, PDO::PARAM_INT);
        $resultat = $req->execute();

        // je récupère les spécialités entrées, et je les ajoute à ma table speagent en bdd


        // si on mon tableau specialite contient assassinat...
        if (in_array('assassinat', $specialites)) {
            $req3 = $pdo->prepare('UPDATE speagent SET agent_id = :id, specialite_id = :assa WHERE agent_id = :id');
            $req3->bindValue(':id', $code, PDO::PARAM_INT);
            $req3->bindValue(':assa', 1);
            $req3->execute();
        }

        // si on mon tableau specialite contient infiltration...
        if (in_array('infiltration', $specialites)) {
            $req4 = $pdo->prepare('UPDATE speagent SET agent_id = :id, specialite_id = :infi WHERE agent_id = :id');
            $req4->bindValue(':id', $code, PDO::PARAM_INT);
            $req4->bindValue(':infi', 3);
            $req4->execute();
        }
        // si on mon tableau specialite contient surveillance...
        if (in_array('surveillance', $specialites)) {
            $req5 = $pdo->prepare('UPDATE speagent SET agent_id = :id, specialite_id = :surv WHERE agent_id = :id');
            $req5->bindValue(':id', $code, PDO::PARAM_INT);
            $req5->bindValue(':surv', 2);
            $req5->execute();
        }
    }
}
