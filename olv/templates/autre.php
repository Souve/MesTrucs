<div>
<div class="container" id="middle">
      <section class="panel">
          <table class="table table-bordered">
              <thead>
              <tr>
                  <th>Montant</th>
                  <th>Total</th>
              </tr>
              </thead>
              <tbody style="text-align: left;">
              <?php $p = 0; foreach($agence as $sv): ?>
              <tr>
              	<td><?=number_format(strtoupper($sv['montant']), 0)?></td>
			    		</tr>
              <?php endforeach; ?>
              <tr>
              	<td colspan="1" class="active">Cash</td>
              	<td class="success"><?=number_format($cash[0]['cash'], 0)?></td>
              </tr>
              </tbody>
          </table>
      </section>
<div>
</div>
