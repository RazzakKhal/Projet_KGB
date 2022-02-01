<?php

class AccesBdd
{
    public function connexion()
    {
        $pdo = new PDO('mysql:dbname=kgb;host=localhost', 'root', '');
    }
}
