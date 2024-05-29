<?php
        $Titre = "Modification d'une couleur";
        require("view/header-tpl.php");
?>
        <form action="Couleur_modif.php" method="POST">
        <div class="form-group">
          <label for="Id">Code Couleur :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?php echo @$Id; ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom de la couleur:</label>
          <input type="text" class="form-control" placeholder="Saisir une couleur" name="Nom" id="Nom"
          value=<?php echo @$Nom; ?>>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
 
      </form>  
      <a href='Couleur_liste.php'><button class="btn btn-warning">Retour à la liste</button></a>

<?php
        // echo @$Contenu;
        require("view/footer-tpl.php");
?>