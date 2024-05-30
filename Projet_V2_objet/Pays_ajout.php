<?php
require_once("init.php");


if (isset($_POST["Id"])) {
    // Le formulaire a été soumis
    // je sauvegarde dans la BDD ==> UPDATE
    $cont = new Pays(0, $_POST["Nom"]);
    // print_r($cont);
    $cont->ajout(); // Je déclenche le INSERT

    header("location:Pays_liste.php?Message=Pays bien ajouté");

}
else {
    $comboContinent = "";
    $cont = new Continent();
    $list = $cont ->liste();

    foreach($list as $uneLigne){
        $code = $uneLigne['ID_CONTINENT'];
        $nom = $uneLigne['NOM_CONTINENT'];

        $comboContinent .= "<option value='$code'>$nom</option>";
    }

}
    


// Je déclenche le RENDU de ma page
require_once("view/Pays_ajout-tpl.php");