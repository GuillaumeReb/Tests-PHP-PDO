<?php
require_once("init.php");

if (isset($_GET["code"])) {
    // Je demande d'afficher le formulaire 
    // pour permettre à l'utilisateur 
    // de modififer les valeurs (sauf la clé)
 

    // Je dois aller rechercher dans la Bdd les infos
    // et les afficher dans un formulaire
    $Id = $_GET["code"]; // Alimente la Zone ID du formulaire
    $cont = new Couleur();
    $cont->recherche($Id); 
    
    $Nom = $cont->nom_couleur; // Alimente la Zone NOM du formulaire

} else {
    if (isset($_POST["Id"])) {
        // Le formulaire a été soumis
        // je sauvegarde dans la BDD ==> UPDATE
        $cont = new Couleur($_POST["Id"], $_POST["Nom"]);
        // print_r($cont);
        $cont->modif(); // Je déclenche le UPDATE

        header("location:Couleur_liste.php?Message=Couleur {$_POST["Id"]} bien modifié");

    }
    else {
        $Contenu = "Code non reçu";
    }
    
}

// Je déclenche le RENDU de ma page
require_once("view/Couleur_modif-tpl.php");