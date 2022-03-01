<?php


class Agent
{
    private string $nom;
    private string $prenom;
    private int $date;
    private int $code;
    private string $nationalite;
    private $specialites;
    private $mission;

    public function __construct(string $nom, string $prenom, int $date, int $code, string $nationalite)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date = $date;
        $this->code = $code;
        $this->nationalite = $nationalite;
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
    //code

    public function getCode()
    {
        return $this->code;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    //nationalité

    public function getNationalite()
    {
        return $this->nationalite;
    }
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }
    //specialités

    public function getSpecialites()
    {
        return $this->specialites;
    }
    public function setSpecialites($specialites)
    {
        $this->specialites[] = $specialites;
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
