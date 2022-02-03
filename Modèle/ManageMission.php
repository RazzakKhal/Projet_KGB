<?php
require_once('AccesBdd.php');
require_once('Mission.php');
class ManageMission extends AccesBdd
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
    // fonction qui récupère les caractéristiques d'une mission en bdd pour l'instancier
    public function chargementMissionAccueil()
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('SELECT id, titre_m, description_m, nomcode_m, pays_m, type_m, statut_m, datedebut_m, datefin_m, specialite_m FROM Mission');
        $req->execute();
        $mesmissions = $req->fetchAll(PDO::FETCH_ASSOC);


        // pour chaque mission creer une instance mission et attribuer les valeurs
        foreach ($mesmissions as $missions) {

            $m =  new Mission($missions['titre_m'], $missions['description_m'], $missions['nomcode_m'], $missions['pays_m'], $missions['type_m'], $missions['statut_m'], $missions['specialite_m'], $missions['datedebut_m'], $missions['datefin_m']);
            $this->setMission($m);


            // pour chaque mission je recupere l'id, je fais une requête avec cet id pour récupérer l'agent , je fais un set agent
            $req2 = $pdo->prepare('SELECT code_agent FROM Agent WHERE mission_agent=:id');
            $req2->bindValue(':id', $missions['id']);
            $req2->execute();
            $mesagents = $req2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mesagents as $agent) {
                $m->setAgent($agent);
            }

            //récupérer contact, cible, plaque
        }
    }
    public function AffichageAgent()
    {
        $mission = $this->mission;
        for ($i = 0; $i < count($mission); $i++) {
            //code a mettre dans l'endroit ou insérer les agents
            for ($m = 0; $m < count($mission[$i]->getAgent()); $m++) {
                echo ($mission[$i]->getAgent()[$m]['code_agent'] . "  ");
            }
        }
    }
}
