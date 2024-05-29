<?php

require_once "init.php";

$Contenu = "";

$requete = "select * from continent";
$resultat = $connexion->query($requete);
$records = $resultat->fetchAll(PDO::FETCH_ASSOC);

// Affichage du résultat
$Contenu .= "<table class='table table-dark table-hover'>
                        <tr>
                            <th  class='text-primary'>Code</th>
                            <th  class='text-primary'>Nom</th>
                            <th  class='text-primary'>Actions</th>
                        </tr>";
foreach ($records as $uneLigne) {
    $Contenu .= "<tr>";
    foreach ($uneLigne as $key => $value) {

        $Contenu .= "<td>" . $value . "</td>";

    }
    $code = $uneLigne['ID_CONTINENT'];
    $url_modif = "./Continent_modif.php?Code=$code";
    $url_suppr = "./Continent_suppr.php?Code=$code";
    // Ajout des 2 boutons (MODIF et SUPPRESSION)
    $Contenu .= "<td><a href=$url_modif><button class='btn btn-warning'>Modifier</button></a>";
    $Contenu .= "<a href=$url_suppr><button class='btn btn-danger'>Supprimer</button></a></td>";
    $Contenu .= "</tr>";
}
$Contenu .= "</table>";

// Affichage de la VUE
require "./view/Continent_liste-tpl.php";