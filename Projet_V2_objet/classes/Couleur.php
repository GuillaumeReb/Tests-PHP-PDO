<?php

class Couleur extends Bdd {
    ///////////////////////////////////////////
    //////    Les attributs                 ///
    ///////////////////////////////////////////
    protected $id_couleur;
    protected $nom_couleur;


    ///////////////////////////////////////////
    //////    Le constructeur               ///
    ///////////////////////////////////////////
    public function __construct(int $code=0, string $nom="" ) {
        parent::__construct();

        $this->id_couleur = $code;
        $this->nom_couleur = $nom;
    }

    ///////////////////////////////////////////
    //////    Les accesseurs                ///
    ///////////////////////////////////////////
    public function __set( $nom_prop, $valeur)
    {
         if (property_exists('Couleur', $nom_prop)) { 
             $this->$nom_prop = $valeur;
         }
         else throw new Exception("Propriété inconnue dans couleur");
    }
     // Methode MAGIQUE GET
    public function __get( $nom_prop)  
     {
        if (property_exists('Couleur', $nom_prop)) {
             return $this->$nom_prop;
         }
         else return null;
    }
 
 
    ///////////////////////////////////////////
    //////    Les méthodes                  ///
    ///////////////////////////////////////////
    public function liste() {
        $resultat = $this->connexion->query("select * from couleur order by NOM_COULEUR asc");
        $records = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

     

    public function ajout() {
 
        $requete = "insert into couleur (NOM_COULEUR) values (:nom)";
        $reponse = $this->connexion->prepare($requete);

        $nom = $this->nom_couleur;

         
        // $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
        $reponse->bindValue(":nom", htmlspecialchars($nom), PDO::PARAM_STR);
        $reponse->execute();
 
    }

    public function recherche($id) {
         
        $resultat = $this->connexion->query("select * from couleur where ID_COULEUR =".$id);
        $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

        // Alimentation des attributs du couleur
        if (count($records) > 0) {
            $this->__set("id_couleur", $records[0]["ID_COULEUR"]); 
            $this->__set("nom_couleur", $records[0]["NOM_COULEUR"]); 
        }
        return $records;
  
     }

     public function modif() {
        $requete = "update couleur set NOM_COULEUR=:nom where ID_COULEUR=:id";
        $reponse = $this->connexion->prepare($requete);

        $id = $this->id_couleur;
        $nom = $this->nom_couleur;

        $reponse->bindValue(":id", $id, PDO::PARAM_INT);
        // $reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
        $reponse->bindValue(":nom", htmlspecialchars($nom), PDO::PARAM_STR);
        $reponse->execute();
     }

     public function suppr() {
        $requete = "delete from couleur where ID_COULEUR=:id";
        $reponse = $this->connexion->prepare($requete);

        $id = $this->id_couleur;

        $reponse->bindValue(":id", $id, PDO::PARAM_INT);
        $reponse->execute();
     }
}