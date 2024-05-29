<?php
        $Titre = "Suppression d'un PAYS";
        require("view/header-tpl.php");
        echo @$Contenu;
?>

<form action="./Pays_suppr.php" method="POST">
    <div class="mb-3">
        <label for="idCode" class="form-label">Nom du PAYS</label>
        <input type="text" class="form-control" id="idCode" name="Code" aria-describedby="nomHelp"
            value="<?php echo @$code; ?>" readonly>
        <div id="nomHelp" class="form-text">Code du PAYS (Non modifiable).</div>
    </div>
    <div class="mb-3">
        <label for="idNom" class="form-label">Nom du PAYS</label>
        <input type="text" class="form-control" id="idNom" name="Nom" aria-describedby="nomHelp"
            value="<?php echo @$nom; ?>" readonly>
        <div id="nomHelp" class="form-text">Saisir le nom du PAYS.</div>
    </div>
    <div class="mb-3">
        <label for="idContinent" class="form-label">Continent</label>
        <select class="form-control" id="idContinent" name="Continent" aria-describedby="continentHelp" disabled>
            <?php echo @$comboContinent; ?>
        </select>
        <div id="continentHelp" class="form-text">Choisir un CONTINENT.</div>
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