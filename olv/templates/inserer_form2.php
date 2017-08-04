<div>
      <form class="form-horizontal " method="post" action="inserer.php?m=<?=$ag?>">
      	<?php foreach($tarif as $i => $tar): ?>
          <div class="form-group has-warning">
              <label class="control-label col-lg-5" for="inputWarning"><?=strtoupper($tar['marchandise'])?></label>
              <div class="col-lg-3">
                  <input type="text" class="form-control" name="<?=strtolower($tar['marchandise'])?>" id="inputWarning" placeholder="<?=$prix[$i]['qte']?>">
              </div>
          </div>
         <?php endforeach ?>
         <button type="submit" class="btn btn-primary btn-block" value="Boutton" name="mod_ins">Modifier</button>
      </form>
<div>
</div>
