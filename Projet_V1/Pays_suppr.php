<?php

require_once "init.php";

$Contenu = "";
// print_r($GLOBALS);
// Gestion du formulaire
if (isset($_POST['Code'])) {
    // Le formulaire a été soumis ==> il faut SUPPRIMER dans la BDD
    try {
        $sth = $connexion->prepare('DELETE
                                    FROM pays
                                    WHERE ID_PAYS = :id_param');

        $sth->bindParam('id_param', $_POST['Code'], PDO::PARAM_INT);
 
        $sth->execute();
    } catch (Exception $e) {
        header('Location: erreur.php?Message=Problème lors de la suppression ' . $e->getMessage());
    }

    $code = $_POST['Code'];
    $nom = $_POST['Nom'];
  
    // Génération du combo CONTINENT
    // $comboContinent = "";

    // $requete = "select * from continent";
    // $resultat = $connexion->query($requete);
    // $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

    // foreach ($records as $uneLigne) {
    //     $code_continent = $uneLigne['ID_CONTINENT'];
    //     $nom_continent = $uneLigne['NOM_CONTINENT'];

    //     if ($code_continent == $_POST['Continent']) {
    //         $comboContinent .= "<option value='$code_continent' selected>$nom_continent</option>";
    //     } else {
    //         $comboContinent .= "<option value='$code_continent'>$nom_continent</option>";
    //     }
    // }

    $Contenu = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Bravo!</strong> Elément bien modifié.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";

} else {
    // On arrive de la LISTE ==> Il faut afficher les informations
    // dans le formulaire enrécupérant les info depuis la BDD
    // echo $_GET['Code'];

    // Récupération des informations du PAYS à modifier
    try {
        $sth = $connexion->prepare('SELECT * from pays WHERE ID_PAYS = :id_param');

        $sth->bindParam('id_param', $_GET['Code'], PDO::PARAM_INT);

        $sth->execute();
    } catch (Exception $e) {
        header('Location: erreur.php?Message=Problème lors de la recupération des informations ' . $e->getMessage());
    }
    // Il faudra vérifier que cela c'est bien passé
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
// print_r($result);
    $code = $result[0]['ID_PAYS'];
    $nom = $result[0]['NOM_PAYS'];
    $id_continent = $result[0]['ID_CONTINENT'];

    // Génération du combo CONTINENT
    $comboContinent = "";

    $requete = "select * from continent";
    $resultat = $connexion->query($requete);
    $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

    foreach ($records as $uneLigne) {
        $code_continent = $uneLigne['ID_CONTINENT'];
        $nom_continent = $uneLigne['NOM_CONTINENT'];

        if ($code_continent == $id_continent) {
            $comboContinent .= "<option value='$code_continent' selected>$nom_continent</option>";
        } else {
            $comboContinent .= "<option value='$code_continent'>$nom_continent</option>";
        }
    }

    $Contenu = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
   <strong>Suppression!</strong> Vous pouvez supprimer les informations.
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>";
}

// Affichage de la VUE
require "./view/Pays_suppr-tpl.php";