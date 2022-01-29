<?php

class Admin{
    private string $nom;
    private string $prenom;
    private int $date;
    private int $id;
    private string $mail;
    private string $pass;

    public function __construct(string $nom, string $prenom, int $date, int $id, string $mail, string $pass){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date = $date;
        $this->id = $id;
        $this->mail = $mail;
        $this->pass = $pass;

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
//id
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        return $this->id = $id;
    }
//mail
    
    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        return $this->mail = $mail;
    }
//pass
    
    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        return $this->pass = $pass;
    }




}