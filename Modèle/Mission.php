<?php

class Mission
{
    private int $id;
    private string $titre;
    private string $description;
    private string $nomcode;
    private string $pays;
    private array $agent = [];
    private array $contact = [];
    private array $cible = [];
    private string $type;
    private string $statut;
    private array $specialites = [];
    private int $datedebut;
    private int $datefin;
    private array $planque = [];

    public function __construct(int $id, string $titre, string $description, string $nomcode, string $pays, array $agent, array $contact, array $cible, string $type, string $statut, array $specialites, int $datedebut, int $datefin, array $planque)
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
        $this->planque = $planque;
    }

    //id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    //titre
    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    //description
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    //nomcode

    public function getNomcode()
    {
        return $this->nomcode;
    }
    public function setNomcode($nomcode)
    {
        $this->nomcode = $nomcode;
    }
    //pays

    public function getPays()
    {
        return $this->pays;
    }
    public function setPays($pays)
    {
        $this->pays = $pays;
    }
    //agent

    public function getAgent()
    {
        return $this->agent;
    }
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }
    //contact
    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
    }
    //cible
    public function getCible()
    {
        return $this->cible;
    }

    public function setCible($cible)
    {
        $this->cible = $cible;
    }
    //type
    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    //statut

    public function getStatut()
    {
        return $this->statut;
    }
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
    //specialite

    public function getSpecialites()
    {
        return $this->specialites;
    }
    public function setSpecialites($specialites)
    {
        $this->specialites = $specialites;
    }
    //datedebut

    public function getDatedebut()
    {
        return $this->datedebut;
    }
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    //datefin

    public function getDatefin()
    {
        return $this->datefin;
    }
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    //planque

    public function getPlanque()
    {
        return $this->planque;
    }
    public function setPlanque($planque)
    {
        $this->planque = $planque;
    }
}
