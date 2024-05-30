<?php

class Pays extends Bdd {
    ///////////////////////////////////////////
    //////    Les attributs                 ///
    ///////////////////////////////////////////
    protected $id_pays;
    protected $nom_pays;
    protected $id_continent;


    ///////////////////////////////////////////
    //////    Le constructeur               ///
    ///////////////////////////////////////////
    public function __construct(int $code=0, string $nom="", int $code2=0 ) {
        parent::__construct();

        $this->id_pays = $code;
        $this->nom_pays = $nom;
        $this->id_continent = $code2;
    }

    ///////////////////////////////////////////
    ////// Les accesseurs : getter et setter///
    ///////////////////////////////////////////
    public function __set( $nom_pays, $valeur)
    {
         if (property_exists('Pays', $nom_pays)) { 
             $this->$nom_pays = $valeur;
         }
         else throw new Exception("Propriété inconnue dans Pays");
    }
     // Methode MAGIQUE GET
    public function __get( $nom_pays)  
     {
        if (property_exists('Pays', $nom_pays)) {
             return $this->$nom_pays;
         }
         else return null;
    }
 
 
    ///////////////////////////////////////////
    //////    Les méthodes                  ///
    ///////////////////////////////////////////
    public function liste() {
        $resultat = $this->connexion->query("select * from pays inner join continent 
        on pays.ID_CONTINENT = continent.ID_CONTINENT
        order by NOM_PAYS asc");
        $records = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

     

    public function ajout() {
 
        $requete = "insert into pays (NOM_PAYS, ID_CONTINENT) values (:nom, :idContinent)";
        $reponse = $this->connexion->prepare($requete);

        $nom = $this->nom_pays;
        $idContinent = $this->id_continent;

         
        // $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
        $reponse->bindValue(":nom", htmlspecialchars($nom), PDO::PARAM_STR);
        $reponse->bindValue(":idContinent", htmlspecialchars($idContinent), PDO::PARAM_INT);        
        $reponse->execute();
 
    }

    public function recherche($id) {
         
        $resultat = $this->connexion->query("select * from pays where ID_PAYS =".$id);
        $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

        // Alimentation des attributs du pays
        if (count($records) > 0) {
            $this->__set("id_pays", $records[0]["ID_PAYS"]); 
            $this->__set("nom_pays", $records[0]["NOM_PAYS"]); 
            $this->__set("id_continent", $records[0]["ID_CONTINENT"]);
        }
        return $records;
  
     }

     public function modif() {
        $requete = "update pays set NOM_PAYS=:nom where ID_PAYS=:id";
        $reponse = $this->connexion->prepare($requete);

        $id = $this->id_pays;
        $nom = $this->nom_pays;
        $id2 = $this->id_continent;

        $reponse->bindValue(":id", $id, PDO::PARAM_INT);
        // $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
        $reponse->bindValue(":nom", htmlspecialchars($nom), PDO::PARAM_STR);
        $reponse->bindValue(":id", $id2, PDO::PARAM_INT);
        $reponse->execute();
     }

     public function suppr() {
        $requete = "delete from pays where ID_PAYS=:id";
        $reponse = $this->connexion->prepare($requete);

        $id = $this->id_pays;

        $reponse->bindValue(":id", $id, PDO::PARAM_INT);
        $reponse->execute();
     }
}