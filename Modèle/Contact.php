<?php


class Contact
{
    private int $id;
    private string $nom;
    private string $prenom;
    private $date;
    private string $nomcode;
    private string $nationalite;
    private string $mission;

    public function __construct(string $nom, string $prenom,  $date, string $nomcode, string $nationalite)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date = $date;
        $this->nomcode = $nomcode;
        $this->nationalite = $nationalite;
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
    //nom
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    //prenom
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    //date
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
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
    //nationalit√©

    public function getNationalite()
    {
        return $this->nationalite;
    }
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }
    public function getMission()
    {
        return $this->mission;
    }
    public function setMission($mission)
    {
        $this->mission = $mission;
    }
}
