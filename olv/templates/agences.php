<div>
      <section class="panel">
          <table class="table table-bordered">
              <thead>
              <tr>
                  <th>Marchandise</th>
                  <th>Qte</th>
                  <th>Prix</th>
                  <th>Total</th>
              </tr>
              </thead>
              <tbody style="text-align: left;">
              <?php $p = 0; foreach($agence as $sv): ?>
              	<tr>
              		<td><?=strtoupper($sv['marchandise'])?></td>
              		<td><?=$sv['qte']?></td>
              		<?php foreach($tarif as $t):
              				if($t['marchandise'] == $sv['marchandise']): ?>
              		<td>$ <?php $p = $t['prix']; echo number_format($t['prix'], 2)?></td>
              				<?php endif; endforeach; ?>
              		<td>$ <?=number_format(($sv['qte'] * $p), 2)?></td>
              	</tr>
              <?php endforeach; ?>
              <tr>
              	<td colspan="3" class="active">Cash</td>
              	<td class="success">$ <?=number_format($cash[0]['cash'], 2)?></td>
              </tr>
              </tbody>
          </table>
      </section>
<div>
</div>
