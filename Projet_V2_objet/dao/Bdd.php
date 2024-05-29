<?php

require_once("init_bdd.php");

abstract class Bdd {
    protected $connexion;

    public function __construct() {
        try {
            $this->connexion = new PDO(SGBD_CHAINE_CONNEXION, SGBD_USER, SGBD_PSWD, SGBD_OPTIONS);
        }
        catch (Exception $e) {
            header('Location: erreur.php?Message=Problème accès à la BDD '.$e->getMessage());
        }
    }

    public abstract function liste() ;
    public abstract function ajout() ;
    public abstract function modif() ;
    public abstract function suppr() ;
}