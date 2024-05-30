<?php
if (isset($_GET['Message'])) {
    $text = $_GET['Message'];
    $Message = "<div class='alert alert-success alert-dismissible'>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    $text
    </div>";

}


require_once("init.php");

$cont = new Pays();

$list = $cont->liste();

// print_r($list);

// Affichage du résultat
$Contenu = "<a href='Pays_ajout.php'><button>Ajout</button></a><br/>";
$Contenu .= "<table class='table table-dark table-hover'>";
$Contenu .= "<tr><th>Code</th><th>Pays</th><th>Code Continent</th><th>Actions</th></tr>";
foreach ($list as $uneLigne) {
    $Contenu .= "<tr>";
    $code = $uneLigne["ID_PAYS"];
    $Contenu .=  "<td>" .  $uneLigne["ID_PAYS"] . "</td>";
    $Contenu .=  "<td>" .  $uneLigne["NOM_PAYS"] . "</td>";
    $Contenu .=  "<td>" .  $uneLigne["NOM_CONTINENT"] . "</td>";
    $Contenu .= "<td>";
    $Contenu .= "<a href='Pays_modif.php?code=". $code ."'><button>Modif</button></a>";
    $Contenu .= "<a href='Pays_suppr.php?code=". $code ."'><button>Suppr</button></a>";
    $Contenu .= "</td></tr>";
}   
$Contenu .= "</table>";

// Demande le RENDU de la page
require_once("view/Pays_liste-tpl.php");