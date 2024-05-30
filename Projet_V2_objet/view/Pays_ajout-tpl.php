<?php
        $Titre = "Ajout d'un Pays";
        require("view/header-tpl.php");
?>
        <form action="Pays_ajout.php" method="POST">
        <div class="form-group">
          <label for="Id">Code Pays :</label>
          <input type="text" class="form-control" placeholder="le Code sera attribué automatiquement" name="Id" id="Id"
          readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Pays:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"/>
        </div>

        <div class="form-group">
          <label for="Nom">Continent :</label>
          <select name="Continent" id="">
                <?php echo @$comboContinent;?>
          </select>
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>
 
      </form>  
      <a href='Pays_liste.php'><button class="btn btn-warning">Retour à la liste</button></a>

<?php
        // echo @$Contenu;
        require("view/footer-tpl.php");
?>