<?php

class Continent extends Bdd {
    ///////////////////////////////////////////
    //////    Les attributs                 ///
    ///////////////////////////////////////////
    protected $id_continent;
    protected $nom_continent;


    ///////////////////////////////////////////
    //////    Le constructeur               ///
    ///////////////////////////////////////////
    public function __construct(int $code=0, string $nom="" ) {
        parent::__construct();

        $this->id_continent = $code;
        $this->nom_continent = $nom;
    }

    ///////////////////////////////////////////
    //////    Les accesseurs                ///
    ///////////////////////////////////////////
    public function __set( $nom_prop, $valeur)
    {
         if (property_exists('Continent', $nom_prop)) { 
             $this->$nom_prop = $valeur;
         }
         else throw new Exception("Propriété inconnue dans CONTINENT");
    }
     // Methode MAGIQUE GET
    public function __get( $nom_prop)  
     {
        if (property_exists('Continent', $nom_prop)) {
             return $this->$nom_prop;
         }
         else return null;
    }
 
 
    ///////////////////////////////////////////
    //////    Les méthodes                  ///
    ///////////////////////////////////////////
    public function liste() {
        $resultat = $this->connexion->query("select * from continent order by NOM_CONTINENT asc");
        $records = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

     

    public function ajout() {
 
        $requete = "insert into continent (NOM_CONTINENT) values (:nom)";
        $reponse = $this->connexion->prepare($requete);

        $nom = $this->nom_continent;

         
        // $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
        $reponse->bindValue(":nom", htmlspecialchars($nom), PDO::PARAM_STR);
        $reponse->execute();
 
    }

    public function recherche($id) {
         
        $resultat = $this->connexion->query("select * from continent where ID_CONTINENT =".$id);
        $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

        // Alimentation des attributs du continent
        if (count($records) > 0) {
            $this->__set("id_continent", $records[0]["ID_CONTINENT"]); 
            $this->__set("nom_continent", $records[0]["NOM_CONTINENT"]); 
        }
        return $records;
  
     }

     public function modif() {
        $requete = "update continent set NOM_CONTINENT=:nom where ID_CONTINENT=:id";
        $reponse = $this->connexion->prepare($requete);

        $id = $this->id_continent;
        $nom = $this->nom_continent;

        $reponse->bindValue(":id", $id, PDO::PARAM_INT);
        // $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
        $reponse->bindValue(":nom", htmlspecialchars($nom), PDO::PARAM_STR);
        $reponse->execute();
     }

     public function suppr() {
        $requete = "delete from continent where ID_CONTINENT=:id";
        $reponse = $this->connexion->prepare($requete);

        $id = $this->id_continent;

        $reponse->bindValue(":id", $id, PDO::PARAM_INT);
        $reponse->execute();
     }
}