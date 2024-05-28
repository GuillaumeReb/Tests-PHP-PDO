<pre>
<!doctype html>
<html>

<head>
    <title>
        Connexion à MySQL avec PDO
    </title>
    <meta charset="utf-8">
</head>

<body>
    <h1>
        Interrogation de la table ARTICLE avec PDO
    </h1>

    <?php
require("pdo_connect.php");
// pour oracle: $dsn="oci:dbname=//serveur:1521/base
// pour sqlite: $dsn="sqlite:/tmp/base.sqlite"
$dsn="mysql:dbname=".BASE.";host=".SERVER;
$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    try{
      $connexion=new PDO($dsn,USER,PASSWD, $options);
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }
// Ici la connexion à la BDD est OUVERTE
$sql="SELECT * from pays";
if(!$connexion->query($sql)) echo "Pb d'accès aux ARTICLES";
else{
    print_r($connexion->query($sql));
    echo "<table border='2px'>";
     foreach ($connexion->query($sql) as $row)
        echo "<tr><td>".$row['CODEPAYS']."</td><td>".$row['NOMPAYS']."</td></tr>";
    echo "</table>";
}


?>
</body>

</html>