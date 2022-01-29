<?php

class Mission
{
    private int $id;
    private string $titre;
    private string $description;
    private string $nomcode;
    private string $pays;
    private Agent $agent;
    private Contact $contact;
    private Cible $cible;
    private string $type;
    private string $statut;
    private string $specialites;
    private int $datedebut;
    private int $datefin;
    private Planque $planque;

    public function __construct(int $id, string $titre, string $description, string $nomcode, string $pays, Agent $agent, Contact $contact, Cible $cible, string $type, string $statut, string $specialites, int $datedebut, int $datefin, Planque $planque)
    {


        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->nomcode = $nomcode;
        $this->pays = $pays;
        $this->agent = $agent;
        $this->contact = $contact;
        $this->cible = $cible;
        $this->type = $type;
        $this->statut = $statut;
        $this->specialites = $specialites;
        $this->datedebut = $datedebut;
        $this->datefin = $datefin;
    }

    //id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }
    //titre
    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        return $this->titre = $titre;
    }
    //description
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        return $this->description = $description;
    }
    //nomcode

    public function getNomcode()
    {
        return $this->nomcode;
    }
    public function setNomcode($nomcode)
    {
        return $this->nomcode = $nomcode;
    }
    //pays

    public function getPays()
    {
        return $this->pays;
    }
    public function setPays($pays)
    {
        return $this->pays = $pays;
    }
    //agent

    public function getAgent()
    {
        return $this->agent;
    }
    public function setAgent($agent)
    {
        return $this->agent = $agent;
    }
    //contact
    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        return $this->contact = $contact;
    }
    //cible
    public function getCible()
    {
        return $this->cible;
    }

    public function setCible($cible)
    {
        return $this->cible = $cible;
    }
    //type
    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        return $this->type = $type;
    }
    //statut

    public function getStatut()
    {
        return $this->statut;
    }
    public function setStatut($statut)
    {
        return $this->statut = $statut;
    }
    //specialite

    public function getSpecialites()
    {
        return $this->specialites;
    }
    public function setSpecialites($specialites)
    {
        return $this->specialites = $specialites;
    }
    //datedebut

    public function getDatedebut()
    {
        return $this->datedebut;
    }
    public function setDatedebut($datedebut)
    {
        return $this->datedebut = $datedebut;
    }

    //datefin

    public function getDatefin()
    {
        return $this->datefin;
    }
    public function setDatefin($datefin)
    {
        return $this->datefin = $datefin;
    }

    //planque

    public function getPlanque()
    {
        return $this->planque;
    }
    public function setPlanque($planque)
    {
        return $this->planque = $planque;
    }
}
