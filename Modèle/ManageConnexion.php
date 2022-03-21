<?php
require_once('AccesBdd.php');


class ManageConnexion extends AccesBdd
{
    public function nowConnected($id, $mdp)
    {
        $pdo = $this->getBdd();
        $req = $pdo->prepare('SELECT nom, pass FROM administrateur WHERE nom = :nom');
        $req->bindValue(':nom', $id, PDO::PARAM_STR);
        $req->execute();
        $identifiants = $req->fetchAll(PDO::FETCH_ASSOC);
        if (empty($identifiants)) {
            echo 'identifiants incorrects';
        } else {

            $_SESSION['username'] = $id;
            header('Location: ' . URL . 'back');
        }
    }

    public function seDeconnecter()
    {

        unset($_SESSION['username']);
        header('Location: ' . URL . 'connexion');
    }
}
