<?php

namespace Projet4\Blog\Model;

class Manager
{
    protected function dbConnect() // Connexion à la base de donnée
    {
        //$db = new \PDO('mysql:host=db5001001057.hosting-data.io;dbname=dbs867532', 'dbu1059728', '');
        $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}

