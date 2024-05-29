<?php

require_once "init.php";

$Contenu = "";

// Gestion du formulaire
if (isset($_POST['Nom'])) {
    // Le formulaire a été soumis ==> il faut enregistrer dans la BDD
      try {
          $sth = $connexion->prepare('INSERT into pays (NOM_PAYS, ID_CONTINENT) 
                                       values (:nom_param, :id_param)');

          $sth->bindParam('nom_param', $_POST['Nom'], PDO::PARAM_STR);
          $sth->bindParam('id_param', $_POST['Continent'], PDO::PARAM_INT);

          $sth->execute();
      } catch (Exception $e) {
          header('Location: erreur.php?Message=Problème lors de l\'ajout ' . $e->getMessage());
      }
      $Contenu = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Bravo!</strong> Nouvel élément bien renregistré.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";

} else {
    // On affiche le formulaire (pas encore de saisie de la part de l'utilisateur)
    $Contenu = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
   <strong>Ajout!</strong> Merci de saisir les informations.
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>";
    // Génération du combo CONTINENT
    $comboContinent = "";

    $requete = "select * from continent";
    $resultat = $connexion->query($requete);
    $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

    foreach ($records as $uneLigne) {
        $code = $uneLigne['ID_CONTINENT'];
        $nom = $uneLigne['NOM_CONTINENT'];

        $comboContinent .= "<option value='$code'>$nom</option>";
    }

}

// Affichage de la VUE
require "./view/Pays_ajout-tpl.php";