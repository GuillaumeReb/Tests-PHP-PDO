<?php
$titre = "Liste des couleurs";
require("view/header-tpl.php");
echo "<a href='./Couleur_ajout.php'><button class='btn btn-primary'>Ajouter</button></a>";
echo @$contenu;
require("view/footer-tpl.php");
?>