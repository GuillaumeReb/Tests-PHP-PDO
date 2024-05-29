<?php
        $Titre = "Liste des CONTINENTS";
        require("view/header-tpl.php");
        echo "<a href='./Continent_ajout.php'><button class='btn btn-primary'>Ajouter</button></a>";
        echo @$Contenu;
        require("view/footer-tpl.php");
?>