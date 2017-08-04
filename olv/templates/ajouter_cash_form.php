<div>
      <form class="form-horizontal " method="post" action="agences.php?s=<?=$ag?>&sv=new_cash">
          <div class="form-group has-warning">
              <label class="control-label col-lg-5" for="inputWarning"><?=strtoupper("Date")?></label>
              <div class="col-lg-6">
                <select class="form-control col-lg-3" name="jour">
                  <?php for ($i=1; $i <=31 ; $i++):?>
                    <?php if ($i == date('d')): ?>
                    <option selected value="<?=$i?>"><?=$i?></option>
                  <?php else: ?>
                    <option value="<?=$i?>"><?=$i?></option>
                  <?php endif;endfor; ?>
                </select>
                <select class="form-control col-lg-3" name="mois">
                  <?php for ($i=1; $i <=12 ; $i++):?>
                    <?php if ($i == date('m')): ?>
                    <option selected value="<?=$i?>"><?=$_SERVER['date']['mois'][$i-1]?></option>
                  <?php else: ?>
                    <option value="<?=$i?>"><?=$_SERVER['date']['mois'][$i-1]?></option>
                  <?php endif;endfor; ?>
                </select>
                  <select class="form-control col-lg-3" name="annee">
                    <?php for ($i= date('Y'); $i >= 1993 ; $i--):?>
                      <?php if ($i == date('Y')): ?>
                      <option selected value="<?=$i?>"><?=$i?></option>
                    <?php else: ?>
                      <option value="<?=$i?>"><?=$i?></option>
                    <?php endif;endfor; ?>
                  </select>
              </div>
          </div>
          <div class="form-group has-warning">
              <label class="control-label col-lg-5" for="inputWarning">Montant à ajouter</label>
              <div class="col-lg-3">
                  <input type="text" class="form-control" name="ajouter" id="inputWarning" placeholder="Montant en $">
              </div>
          </div>
          <div class="form-group has-warning">
              <label class="control-label col-lg-5" for="inputWarning">Motif</label>
              <div class="col-lg-3">
                  <input type="text" class="form-control" name="motif" id="inputWarning" placeholder="Motif d'ajout">
              </div>
          </div>
         <button type="submit" class="btn btn-primary btn-block" value="Boutton">Ajouter</button>
      </form>
<div>
</div>
