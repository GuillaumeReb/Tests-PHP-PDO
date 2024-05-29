<?php
require_once("init.php");


if (isset($_POST["Id"])) {
    // Le formulaire a été soumis
    // je sauvegarde dans la BDD ==> UPDATE
    $cont = new Continent(0, $_POST["Nom"]);
    // print_r($cont);
    $cont->ajout(); // Je déclenche le INSERT

    header("location:Continent_liste.php?Message=Continent bien ajouté");

}
else {
    $Contenu = "Code non reçu";
}
    


// Je déclenche le RENDU de ma page
require_once("view/Continent_ajout-tpl.php");