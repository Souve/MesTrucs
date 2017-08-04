<div class="row">
      <table width="251" height="35" border="0" cellpadding="1" cellspacing="1">
  <div class="">
    <fieldset class="col-lg-6">
      <legend>Agences</legend>
      <p style="text-align: justify;">
        Veuillez choisir le nom de l'agence en cliquant sur le menu déroulant.
        Cliquer ensuite sur le boutton Valider pour envoyer le requette.
      </p>
      <form class="form-horizontal" action="index.php" method="get">
        <div class="form-group">
          <select autofocus class="btn btn-primary btn-block" name="s">
            <option value="vide">Selectionner une agence ici</option>
            <?php foreach ($agences as $value) : ?>
              <option value="<?=$value['agence']?>"><?=strtoupper($value['agence'])?></option>
            <?php endforeach; ?>
          </select>
        </div>
          <div class="form-group">
              <input type="submit" class="btn btn-warning btn-block" value="Valider">
          </div>
        </div>
      </form>
    </fieldset>
    <fieldset class="col-lg-6">
      <legend>Agent</legend>
      <p style="text-align: justify;">
        Veuillez choisir le nom de la personne en cliquant sur le menu déroulant.
        Cliquer ensuite sur le boutton Valider pour envoyer le requette.
      </p>
      <form class="form-horizontal" action="index.php?" method="get">
        <div class="form-group">
          <select autofocus class="btn btn-success btn-block" name="autres">
            <option value="vide">Selectionner un agent ici</option>
            <?php foreach ($autres as $value) : ?>
              <option value="<?=$value['chef']?>"><?=strtoupper($value['chef'])?></option>
            <?php endforeach; ?>
          </select>
        </div>
          <div class="form-group">
              <input type="submit" class="btn btn-warning btn-block" value="Valider">
          </div>
        </div>
      </form>
    </fieldset>
      </table>
	  </div>
  </div>
