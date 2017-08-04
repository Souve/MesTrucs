<div>
      <form class="form-horizontal " method="post" action="inserer.php?sv=<?=$ag?>">
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
      	<?php foreach($tarif as $tar): ?>
          <div class="form-group has-warning">
              <label class="control-label col-lg-5" for="inputWarning"><?=strtoupper($tar['marchandise'])?></label>
              <div class="col-lg-3">
                  <input type="text" class="form-control" name="<?=strtolower($tar['marchandise'])?>" id="inputWarning" placeholder="Quantité">
              </div>
          </div>
         <?php endforeach ?>
         <button type="submit" class="btn btn-primary btn-block" value="Boutton">Inserer</button>
      </form>
<div>
</div>
