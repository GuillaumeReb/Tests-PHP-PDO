<?php
        $Titre = "Suppression d'un Pays";
        require("view/header-tpl.php");
?>
        <form action="Pays_suppr.php" method="POST">
        <div class="form-group">
          <label for="Id">Code Pays :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?php echo @$Id; ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Pays :</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom" value=<?php echo @$Nom; ?> readonly>
        </div>
        <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
 
      </form>  
      <a href='Pays_liste.php'><button class="btn btn-warning">Retour à la liste</button></a>

<?php
        // echo @$Contenu;
        require("view/footer-tpl.php");
?>