<?php

require_once('Modèle/ManageConnexion.php');

class ConnexionController
{
    private $ConnexionManager;

    public function __construct()
    {
        // des que le controlleur conenxion est appelé je récupère dans ma BDD les Connexions gràce à ManageConnexion
        $this->ConnexionManager = new ManageConnexion();
    }

    public function afficherConnexion()
    {

        require_once('Vue/connexion.php');
    }
}
