<?php

class Planque
{
    private int $code;
    private string $adresse;
    private string $pays;
    private string $type;


    public function __construct($code, $adresse, $pays, $type)
    {
        $this->code = $code;
        $this->adresse = $adresse;
        $this->pays = $pays;
        $this->type = $type;
    }

    // code d'identification
    function getCode()
    {
        return $this->code;
    }

    function setCode($code)
    {
        $this->code = $code;
    }
    // adresse
    function getAdresse()
    {
        return $this->adresse;
    }

    function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    // pays
    function getPays()
    {
        return $this->pays;
    }

    function setPays($pays)
    {
        $this->pays = $pays;
    }
    // type
    function getType()
    {
        return $this->type;
    }

    function setType($type)
    {
        $this->type = $type;
    }
}
