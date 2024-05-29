<?php
        $Titre = "Liste des PAYS";
        require("view/header-tpl.php");
        echo "<a href='./Pays_ajout.php'><button class='btn btn-primary'>Ajouter</button></a>";
        echo @$Contenu;
        require("view/footer-tpl.php");
?>