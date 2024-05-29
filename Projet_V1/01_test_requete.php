<?php

require_once("init.php");

$Contenu = "";
// Avons-nous reçu une requete
if (isset($_POST["txtRequete"])) {
    $requete = $_POST["txtRequete"];

    try {
        $resultat = $connexion->query($requete);
        $records = $resultat->fetchAll(PDO::FETCH_ASSOC);

        // Affichage du résultat
        foreach ($records as $uneLigne) {
            $Contenu .= "<br/>";
            foreach ($uneLigne as $key => $value) {
                $Contenu .= $key . " : " . $value . "|";
            }
        }
    } catch(Exception $e) {
        $Contenu = "ERREUR : ".$requete . " n'est pas du SQL valide";
    }


}



$Contenu .= "<form action='' method='POST'>
Saisir une requete : <textarea name='txtRequete'></textarea>
<br/>
<input type='submit' value='Envoyer' />
</form><br/>" . @$requete;

 


// Affichage de la VUE
require("view/01_test_requete-tpl.php");
?>