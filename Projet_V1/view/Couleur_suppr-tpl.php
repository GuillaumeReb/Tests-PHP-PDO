<?php
        $Titre = "Suppression d'une couleur";
        require("view/header-tpl.php");
        echo @$Contenu;
?>

<form action="./Couleur_suppr.php" method="POST">
    <div class="mb-3">
        <label for="idCode" class="form-label">Code de la couleur</label>
        <input type="text" class="form-control" id="idCode" name="Code" aria-describedby="codeHelp"
            value='<?php echo @$code; ?>' readonly>
        <div id="codeHelp" class="form-text">Code de la couleur.</div>
    </div>
    <div class="mb-3">
        <label for="idNom" class="form-label">Nom de la couleur</label>
        <input type="text" class="form-control" id="idNom" name="Nom" aria-describedby="nomHelp"
            value='<?php echo @$nom; ?>' readonly>
        <div id="nomHelp" class="form-text">Nom de la couleur.</div>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button type="reset" class="btn btn-danger">Annuler</button>
</form>
<br />
<a href="./Couleur_liste.php">
    <button class="btn btn-secondary">Retout à la liste</button>
</a>
<?php
        require("view/footer-tpl.php");
?>