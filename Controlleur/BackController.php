<?php

require_once('Modèle/ManageBack.php');

class BackController
{
    private $Manager;

    public function __construct()
    {
        $this->Manager = new ManageBack();
    }

    public function afficherBack()
    {
        require_once('Vue/back.php');
    }
}
