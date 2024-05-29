<?php
        $Titre = "Modification d'un CONTINENT";
        require("view/header-tpl.php");
        echo @$Contenu;
?>

<form action="./Continent_modif.php" method="POST">
    <div class="mb-3">
        <label for="idCode" class="form-label">Code du CONTINENT</label>
        <input type="text" class="form-control" id="idCode" name="Code" aria-describedby="codeHelp"
            value='<?php echo @$code; ?>' readonly>
        <div id="codeHelp" class="form-text">Code du CONTINENT.</div>
    </div>
    <div class="mb-3">
        <label for="idNom" class="form-label">Nom du CONTINENT</label>
        <input type="text" class="form-control" id="idNom" name="Nom" aria-describedby="nomHelp"
            value='<?php echo @$nom; ?>'>
        <div id="nomHelp" class="form-text">Nom du CONTINENT.</div>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button type="reset" class="btn btn-danger">Annuler</button>
</form>
<br />
<a href="./Continent_liste.php">
    <button class="btn btn-secondary">Retout à la liste</button>
</a>
<?php
        require("view/footer-tpl.php");
?>