<?php
//Modifier un utilisateur avec $sql = "UPDATE "" SET "" = "nouvel valeur" where 'id' = 3";

require_once "init.php";

$Contenu = "";
// print_r($GLOBALS);
// Gestion du formulaire
if (isset($_POST['Code'])) {
    // Le formulaire a été soumis ==> il faut SUPPRIMER dans la BDD
    try {
        $sth = $connexion->prepare('UPDATE couleur
                                    SET NOM_COULEUR = :nom_param                                   
                                    WHERE ID_COULEUR = :id_param');

        $sth->bindParam('id_param', $_POST['Code'], PDO::PARAM_INT);
        $sth->bindParam('nom_param', $_POST['Nom'], PDO::PARAM_STR);
        $sth->execute();
        
    } catch (Exception $e) {
        header('Location: erreur.php?Message=Problème lors de la modification ' . $e->getMessage());
    }

    $code = $_POST['Code'];
    $nom = $_POST['Nom'];
  
    // Génération du combo CONTINENT
    $comboContinent = "";

    $requete = "select * from couleur";
    $resultat = $connexion->query($requete);
    $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

    foreach ($records as $uneLigne) {
        $code_couleur = $uneLigne['ID_COULEUR'];
        $nom_couleur = $uneLigne['NOM_COULEUR'];

        // if ($code_continent == $_POST['Couleur']) {
        //     $comboContinent .= "<option value='$code_couleur' selected>$nom_continent</option>";
        // } else {
        //     $comboContinent .= "<option value='$code_continent'>$nom_continent</option>";
        // }
    }

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
        $sth = $connexion->prepare('SELECT * from couleur WHERE ID_COULEUR = :id_param');

        $sth->bindParam('id_param', $_GET['Code'], PDO::PARAM_INT);

        $sth->execute();
    } catch (Exception $e) {
        header('Location: erreur.php?Message=Problème lors de la recupération des informations ' . $e->getMessage());
    }
    // Il faudra vérifier que cela c'est bien passé
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
// print_r($result);
    $code = $result[0]['ID_COULEUR'];
    $nom = $result[0]['NOM_COULEUR'];
    // $id_continent = $result[0]['ID_CONTINENT'];

    // Génération du combo CONTINENT
    // $comboContinent = "";

    // $requete = "select * from continent";
    // $resultat = $connexion->query($requete);
    // $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

    // foreach ($records as $uneLigne) {
    //     $code_continent = $uneLigne['ID_CONTINENT'];
    //     $nom_continent = $uneLigne['NOM_CONTINENT'];

    //     if ($code_continent == $id_continent) {
    //         $comboContinent .= "<option value='$code_continent' selected>$nom_continent</option>";
    //     } else {
    //         $comboContinent .= "<option value='$code_continent'>$nom_continent</option>";
    //     }
    // }

    $Contenu = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
   <strong>Modification!</strong> Vous pouvez modifier les informations.
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>";
}

// Affichage de la VUE
require "./view/Pays_modif-tpl.php";


?>

