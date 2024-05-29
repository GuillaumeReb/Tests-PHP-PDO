<?php
echo "test";
//Modifier un utilisateur avec $sql = "UPDATE "" SET "" = "nouvel valeur" where 'id' = 3";
//echo "test";
require_once "init.php";
echo "test";
$Contenu = "";
// print_r($GLOBALS);
// Gestion du formulaire
if (isset($_POST['Code'])) {
    // Le formulaire a été soumis ==> il faut MODIFIER dans la BDD
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
  

    $Contenu = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Bravo!</strong> Elément bien modifié.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";

} else {
    // On arrive de la LISTE ==> Il faut afficher les informations
    // dans le formulaire enrécupérant les info depuis la BDD
    // echo $_GET['Code'];

    // Récupération des informations de le couleur à modifier
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
    

    $Contenu = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
   <strong>Modification!</strong> Vous pouvez modifier les informations.
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>";
}

// Affichage de la VUE
require "./view/Couleur_modif-tpl.php";


?>

