<?php

class MainManager
{
    protected function connectDb()
    {
        try{
            $db = new PDO('mysql:host=localhost;dbname=my_meetic;charset=utf8', 'Utilisateur', 'MotDePasse');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}
