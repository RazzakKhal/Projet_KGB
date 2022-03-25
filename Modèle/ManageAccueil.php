<?php
require_once('AccesBdd.php');
require_once('Mission.php');
class ManageAccueil extends AccesBdd
{
    private $mission;


    public function getMission()
    {
        return $this->mission;
    }

    public function setMission(Mission $mission)
    {
        $this->mission[] = $mission;
    }










    // fonction qui récupère les caractéristiques de toutes les missions en bdd pour les instancier



    public function chargementMissionAccueil()
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('SELECT id, titre_m, description_m, nomcode_m, pays_m, type_m, statut_m, datedebut_m, datefin_m, specialite_m FROM Mission');
        $req->execute();
        $mesmissions = $req->fetchAll(PDO::FETCH_ASSOC);


        // pour chaque mission creer une instance mission et attribuer les valeurs
        foreach ($mesmissions as $missions) {

            $m =  new Mission($missions['titre_m'], $missions['description_m'], $missions['nomcode_m'], $missions['pays_m'], $missions['type_m'], $missions['statut_m'], $missions['specialite_m'], $missions['datedebut_m'], $missions['datefin_m']);
            $m->setId($missions['id']);
            $this->setMission($m);


            // pour chaque mission je recupere l'id, je fais une requête avec cet id pour récupérer l'agent , je fais un set agent
            $req2 = $pdo->prepare('SELECT code_agent, nom FROM Agent WHERE mission_agent=:id');
            $req2->bindValue(':id', $missions['id']);
            $req2->execute();
            $mesagents = $req2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mesagents as $agent) {
                $m->setAgent($agent);
            }

            //récupérer contact

            $req3 = $pdo->prepare('SELECT nomcode_contact, id FROM Contact WHERE mission_contact=:id');
            $req3->bindValue(':id', $missions['id']);
            $req3->execute();
            $mescontacts = $req3->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mescontacts as $contact) {
                $m->setContact($contact);
            }



            //récupérer cible

            $req4 = $pdo->prepare('SELECT nomcode_cible, id FROM Cible WHERE mission_cible=:id');
            $req4->bindValue(':id', $missions['id']);
            $req4->execute();
            $mescibles = $req4->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mescibles as $cible) {
                $m->setCible($cible);
            }

            //récupérer planque

            $req5 = $pdo->prepare('SELECT code_planque, adresse FROM Planque WHERE mission_planque=:id');
            $req5->bindValue(':id', $missions['id']);
            $req5->execute();
            $mesplanques = $req5->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mesplanques as $planque) {
                $m->setPlanque($planque);
            }
        }
    }


    // récupération d'une mission par son id
    public function recupMissionid($id)
    {
        for ($i = 0; $i < count($this->mission); $i++) {
            if ($this->mission[$i]->getId() === $id) {
                return $this->mission[$i];
            }
        }
    }
}
