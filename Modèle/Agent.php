<?php


class Agent{
    private string $nom;
    private string $prenom;
    private int $date;
    private int $code;
    private string $nationalite;
    private string $specialites;

    public function __construct(string $nom, string $prenom, int $date, int $code, string $nationalite, string $specialites){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date = $date;
        $this->code = $code;
        $this->nationalite = $nationalite;
        $this->specialites = $specialites;

    }
//nom
    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        return $this->nom = $nom;
    }
//prenom
    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        return $this->prenom = $prenom;
    }
//date
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        return $this->date = $date;
    }
//code
    
    public function getCode(){
        return $this->code;
    }
    public function setCode($code){
        return $this->code = $code;
    }
//nationalité
    
    public function getNationalite(){
        return $this->nationalite;
    }
    public function setNationalite($nationalite){
        return $this->nationalite = $nationalite;
    }
//specialités
    
    public function getSpecialites(){
        return $this->specialites;
    }
    public function setSpecialites($specialites){
        return $this->specialites = $specialites;
    }





}