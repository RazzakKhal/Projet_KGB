<?php

class Mission
{
    private ?int $id;
    private ?string $titre;
    private ?string $description;
    private ?string $nomcode;
    private ?string $pays;
    public  $agent = [];
    private  $contact = [];
    private  $cible = [];
    private ?string $type;
    private ?string $statut;
    private ?string $specialite;
    private ?int $datedebut;
    private ?int $datefin;
    private  $planque = [];

    public function __construct(?string $titre, ?string $description, ?string $nomcode, ?string $pays, ?string $type, ?string $statut, ?string $specialite, ?int $datedebut, ?int $datefin)
    {



        $this->titre = $titre;
        $this->description = $description;
        $this->nomcode = $nomcode;
        $this->pays = $pays;
        $this->type = $type;
        $this->statut = $statut;
        $this->specialite = $specialite;
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
    public function setAgent($agents)
    {
        return $this->agent[] = $agents;
    }
    //contact
    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact[] = $contact;
    }
    //cible
    public function getCible()
    {
        return $this->cible;
    }

    public function setCible($cible)
    {
        $this->cible[] = $cible;
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

    public function getSpecialite()
    {
        return $this->specialite;
    }
    public function setSpecialite($specialite)
    {
        $this->specialites = $specialite;
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
        $this->planque[] = $planque;
    }
}
