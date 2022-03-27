<?php

abstract class AccesBdd
{
    private static $pdo;

    private static function setBdd()
    {
        self::$pdo = new PDO("mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_6d82d167a63c501", "b2d7a78684d85d", "cc6718de");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
