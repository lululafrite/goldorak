<div class="d-flex flex-column flex-sm-row">

    <div class="me-2">

    <?php if($_SESSION['typeConnect'] === 'Administrator'){ ?>
        <button type="submit" class="btn btn-lg btn-warning fs-4 mb-2 mb-md-0" id="bt_userEdit_cancel" name="bt_userEdit_cancel" style="width: 100px;" onclick="retour();">Retour</button>
    <?php } ?>
        <button type="submit" class="btn btn-lg btn-success fs-4 mb-2 mb-md-0" id="bt_userEdit_save" name="bt_userEdit_save" style="width: 100px;">Enregistrer</button>
    
    </div>

<?php if($_SESSION['typeConnect'] != 'Administrator' && $_SESSION['typeConnect'] != 'Guest'){ ?>
    <div>

        <button type="submit" class="btn btn-lg btn-danger fs-4 mb-2 mb-md-0" id="bt_userEdit_delete" name="bt_userEdit_delete">Supprimer mon compte</button>
    
    </div>
<?php } ?>

<?php if($_SESSION['typeConnect'] === 'Administrator'){ ?>
    <div>

        <button type="submit" class="btn btn-lg btn-info fs-4 mb-2 mb-md-0" id="bt_userEdit_new" name="bt_userEdit_new" style="width: 100px;">Nouveau</button>
        <button type="submit" class="btn btn-lg btn-danger fs-4 mb-2 mb-md-0" id="bt_userEdit_delete" name="bt_userEdit_delete" style="width: 100px;">Supprimer</button>
    
    </div>
<?php } ?>

</div>