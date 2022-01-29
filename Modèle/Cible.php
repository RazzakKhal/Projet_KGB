<?php


class Cible{
    private int $id;
    private string $nom;
    private string $prenom;
    private int $date;
    private string $nomcode;
    private string $nationalite;


    public function __construct(string $nom, string $prenom, int $date, string $nomcode, string $nationalite, string $specialites){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date = $date;
        $this->nomcode = $nomcode;
        $this->nationalite = $nationalite;
    }

    //id
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        return $this->id = $id;
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
//nomcode
    
    public function getNomcode(){
        return $this->nomcode;
    }
    public function setNomcode($nomcode){
        return $this->nomcode = $nomcode;
    }
//nationalité
    
    public function getNationalite(){
        return $this->nationalite;
    }
    public function setNationalite($nationalite){
        return $this->nationalite = $nationalite;
    }


}