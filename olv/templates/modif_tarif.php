<div>
      <form class="form-horizontal " method="post" action="index.php?s=<?=$_GET['s']?>">
      	<?php foreach($tarif as $tar): ?>
          <div class="form-group has-warning">
              <label class="control-label col-lg-5" for="inputWarning"><?=strtoupper($tar['marchandise'])?></label>
              <div class="col-lg-3">
                  <input type="text" class="form-control" name="<?=strtolower($tar['marchandise'])?>" id="inputWarning" value="<?=number_format($tar['prix'], 2)?>" placeholder="Prix en $">
              </div>
          </div>
         <?php endforeach ?>
         <button type="submit" class="btn btn-primary btn-block" value="Boutton" name="modif_tarif">Modifier</button>
      </form>
<div>
</div>
