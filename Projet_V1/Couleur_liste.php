<?php
require_once "init.php";

$Contenu = "";

$requete = "select * from couleur ORDER BY NOM_COULEUR asc";
$resultat = $connexion->query($requete);
//on récupère les données
$records = $resultat->fetchAll(PDO::FETCH_ASSOC);


// Affichage du résultat
// echo "<pre>";
// var_dump($records);
// echo "</pre>";

//Afficher les résultats dans un tableu

$Contenu .= "<table class='table table-dark table-hover'>
                <tr>
                    <th  class='text-primary'>Code</th>
                    <th  class='text-primary'>Nom</th>
                    <th  class='text-primary'>Actions</th>
                </tr>";
foreach($records as $uneLigne){
    $Contenu .= "<tr>";
    $code = $uneLigne['ID_COULEUR'];
    $nom_COULEUR = $uneLigne['NOM_COULEUR'];
     // foreach ($uneLigne as $key => $value) {

    $Contenu .= "<td>" . $code . "</td>";
    $Contenu .= "<td>" . $nom_COULEUR . "</td>";
    // }

    $url_modif = "./Couleur_modif.php?Code=$code";
    $url_suppr = "./Couleur_suppr.php?Code=$code";
    // Ajout des 2 boutons (MODIF et SUPPRESSION)
    $Contenu .= "<td><a href=$url_modif><button class='btn btn-warning'>Modifier</button></a>";
    $Contenu .= "<a href=$url_suppr><button class='btn btn-danger'>Supprimer</button></a></td>";
    $Contenu .= "</tr>";

}

$Contenu .= "</table>";

// Affichage de la VUE
require "./view/Couleur_liste-tpl.php";

var_dump($titre);
//Sans le var_dump mon tableau ne s'affiche pas ????
var_dump($Contenu);

//ajouter un utlisateur avec $sql = insert into  values;



//Modifier un utilisateur avec $sql = "UPDATE "" SET "" = "nouvel valeur" where 'id' = 3";


//Supprimer un utilisateur avec $sql = "delete from "" where "id" = 3";

?>