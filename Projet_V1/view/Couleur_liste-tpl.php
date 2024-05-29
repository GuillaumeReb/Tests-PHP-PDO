<?php
$Titre = "Liste des couleurs";
require("view/header-tpl.php");
echo "<a href='./Couleur_ajout.php'><button class='btn btn-primary'>Ajouter</button></a>";
echo @$Contenu;
require("view/footer-tpl.php");
?>