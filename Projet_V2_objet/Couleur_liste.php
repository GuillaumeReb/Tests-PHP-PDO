<?php
if (isset($_GET['Message'])) {
    $text = $_GET['Message'];
    $Message = "<div class='alert alert-success alert-dismissible'>
    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    $text
    </div>";

}


require_once("init.php");

$cont = new Couleur();

$list = $cont->liste();

// print_r($list);

// Affichage du résultat
$Contenu = "<a href='Couleur_ajout.php'><button>Ajout</button></a><br/>";
$Contenu .= "<table class='table table-dark table-hover'>";
$Contenu .= "<tr><th>Code</th><th>Nom</th><th>Actions</th></tr>";
foreach ($list as $uneLigne) {
    $Contenu .= "<tr>";
    $code = $uneLigne["ID_COULEUR"];
    foreach ($uneLigne as $key => $value) {
        $Contenu .=  "<td>" . $value . "</td>";
    }
    $Contenu .= "<td>";
    $Contenu .= "<a href='Couleur_modif.php?code=". $code ."'><button>Modif</button></a>";
    $Contenu .= "<a href='Couleur_suppr.php?code=". $code ."'><button>Suppr</button></a>";
    $Contenu .= "</td></tr>";
}   
$Contenu .= "</table>";

// Demande le RENDU de la page
require_once("view/Couleur_liste-tpl.php");