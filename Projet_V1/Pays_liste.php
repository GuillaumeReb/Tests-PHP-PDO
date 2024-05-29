<?php

require_once "init.php";

$Contenu = "";

$requete = "select * from pays inner join continent on
            pays.ID_CONTINENT = continent.ID_CONTINENT
            ORDER BY NOM_PAYS asc";
$resultat = $connexion->query($requete);
$records = $resultat->fetchAll(PDO::FETCH_ASSOC);

// Affichage du résultat
$Contenu .= "<table class='table table-dark table-hover'>
                        <tr>
                            <th  class='text-primary'>Code</th>
                            <th  class='text-primary'>Nom</th>
                            <th  class='text-primary'>CONTINENT</th>
                            <th  class='text-primary'>Actions</th>
                        </tr>";
foreach ($records as $uneLigne) {
    $Contenu .= "<tr>";
    $code = $uneLigne['ID_PAYS'];
    $nom_PAYS = $uneLigne['NOM_PAYS'];
    $nom_CONTINENT = $uneLigne['NOM_CONTINENT'];
    // foreach ($uneLigne as $key => $value) {

    $Contenu .= "<td>" . $code . "</td>";
    $Contenu .= "<td>" . $nom_PAYS . "</td>";
    $Contenu .= "<td>" . $nom_CONTINENT . "</td>";
    // }

    $url_modif = "./Pays_modif.php?Code=$code";
    $url_suppr = "./Pays_suppr.php?Code=$code";
    // Ajout des 2 boutons (MODIF et SUPPRESSION)
    $Contenu .= "<td><a href=$url_modif><button class='btn btn-warning'>Modifier</button></a>";
    $Contenu .= "<a href=$url_suppr><button class='btn btn-danger'>Supprimer</button></a></td>";
    $Contenu .= "</tr>";
}
$Contenu .= "</table>";

// Affichage de la VUE
require "./view/Pays_liste-tpl.php";