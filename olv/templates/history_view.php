<?php $a = $c = $k = 0; ?>
<div>
      <table class="table table-bordered table-striped">
		<tr class="table-head">
      <th>Code</th>
			<th>Marchandise</th>
			<th>Quantités</th>
			<th>Prix</th>
			<th>Montant</th>
			<th>Balence</th>
			<th>Transaction</th>
			<th>Date</th>
			<th>Heure</th>
		</tr>
		<?php foreach($positions as $position):?>
		<tr>
      <td><?= $position['id'] ?></td>
			<td><?= $position["marchandise"]?></td>
			<td><?= $position["qte"]; $a += $position['qte']?></td>
			<td>$ <?= number_format($position["prix"],2)?></td>
			<td>$ <?= number_format($position["montant"],2); if ($position["transaction"] == "douane") $c += $position["montant"]; elseif($position["transaction"] == "rembourser") $k += $position["montant"]?></td>
			<td>$ <?= number_format($position["balance"],2)?></td>
			<td><?= $position["transaction"]?></td>
			<td><?= $position["jour"]?></td>
			<td><?= $position["heure"]?></td>
      <!--td><a id="boutton_sup" href="rapport.php?s=<?= $ag ?>&id=<?= $position['id'] ?>" class="btn btn-danger">Sup.</a></td-->
		</tr>
		<?php endforeach ?>
	</table>
	<h2 class="panel-heading">
	  LES TOTAUX DE LA LISTE
	</h2>
	<table class="table">
	<thead>
	  <tr class="success">
		<td>Colis (Quantités)</td>
		<td>Douane</td>
		<td>Rembourse</td>
	  </tr>
	</thead>
	<tbody>
	  <tr class="active">
		<td><?=$a?></td>
		<td>$ <?= number_format($c, 2)?></td>
		<td>$ <?= number_format($k, 2)?></td>
	  </tr>
	</tbody>
	</table>
<div>
</div>
