<?php
 $Titre = "Modification d'une couleur";
 require("view/header-tpl.php");
 echo @$Contenu;
?>


<form action="./Couleur_modif.php" method="POST">
    <div class="mb-3">
        <label for="idCode" class="form-label">Code de la Couleur</label>
        <input type="text" class="form-control" id="idCode" name="Code" aria-describedby="nomHelp"
            value="<?php echo @$code; ?>" readonly>
        <div id="nomHelp" class="form-text">Code du COULEUR (Non modifiable).</div>
    </div>
    <div class="mb-3">
        <label for="idNom" class="form-label">Nom de la Couleur</label>
        <input type="text" class="form-control" id="idNom" name="Nom" aria-describedby="nomHelp"
            value="<?php echo @$nom; ?>">
        <div id="nomHelp" class="form-text">Saisir le nom de la COULEUR.</div>
    </div>
    
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button type="reset" class="btn btn-danger">Annuler</button>
</form>
<br />
<a href="./Pays_liste.php">
    <button class="btn btn-secondary">Retout à la liste</button>
</a>

<?php
        require("view/footer-tpl.php");
?>