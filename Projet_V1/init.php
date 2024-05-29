<?php
/////////////////////////////////////
//   Constantes pour se connecter  //
//   à la base de données          //
/////////////////////////////////////
define("SGBD_SERVER", "127.0.0.1");
define("SGBD_PORT", "3306");
define("SGBD_BDD", "SDBM_V2");
define("SGBD_USER", "root");
define("SGBD_PSWD", "");

define("SGBD_OPTIONS", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


define("SGBD_CHAINE_CONNEXION", "mysql:host=".SGBD_SERVER."; port=".SGBD_PORT."; dbname=".SGBD_BDD.";charset=utf8");
try {
    $connexion = new PDO(SGBD_CHAINE_CONNEXION, SGBD_USER, SGBD_PSWD, SGBD_OPTIONS);
}
catch (Exception $e) {
    header('Location: erreur.php?Message=Problème accès à la BDD '.$e->getMessage());
}

?>