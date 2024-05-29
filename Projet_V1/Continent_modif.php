<?php

require_once "init.php";

$Contenu = "";
// print_r($GLOBALS);
// Gestion du formulaire
if (isset($_POST['Code'])) {
    // Le formulaire a été soumis ==> il faut SUPPRIMER dans la BDD
    try {
        $sth = $connexion->prepare('UPDATE continent 
                                    SET NOM_CONTINENT = :nom_param
                                    WHERE ID_CONTINENT = :id_param');

        $sth->bindParam('id_param', $_POST['Code'], PDO::PARAM_INT);
        $sth->bindParam('nom_param', $_POST['Nom'], PDO::PARAM_STR);

        $sth->execute();
    } catch (Exception $e) {
        header('Location: erreur.php?Message=Problème lors de la modification ' . $e->getMessage());
    }

    $code = $_POST['Code'];
    $nom = $_POST['Nom'];

    $Contenu = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Bravo!</strong> Elément bien modifié.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";

} else {
    // On arrive de la LISTE ==> Il faut afficher les informations
    // dans le formulaire enrécupérant les info depuis la BDD
    // echo $_GET['Code'];
    try {
        $sth = $connexion->prepare('SELECT * from continent WHERE ID_CONTINENT = :id_param');

        $sth->bindParam('id_param', $_GET['Code'], PDO::PARAM_INT);

        $sth->execute();
    } catch (Exception $e) {
        header('Location: erreur.php?Message=Problème lors de la recupération des informations ' . $e->getMessage());
    }
    // Il faudra vérifier que cela c'est bien passé
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
// print_r($result);
    $code = $result[0]['ID_CONTINENT'];
    $nom = $result[0]['NOM_CONTINENT'];

    $Contenu = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
   <strong>Modification!</strong> Vous pouvez modifier les informations.
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>";
}

// Affichage de la VUE
require "./view/Continent_modif-tpl.php";