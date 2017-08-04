<?php $a = $c = $k = 0; ?>
<div>
      <table class="table table-bordered table-striped">
		<tr class="table-head">
      <th>Code</th>
			<th>Montant</th>
			<th>Action</th>
			<th>Balence</th>
			<th>Date</th>
		</tr>
		<?php foreach($positions as $position):?>
		<tr>
      <td>
        <?= $position["id"]?>
      </td>

			<td>$ <?= number_format($position["montant"],2); if ($position["action"] == "emprunte") $c += $position["montant"]; elseif($position["action"] == "rembourser") $k += $position["montant"]?></td>

			<td><?= $position["action"]?></td>
			<td>$ <?= number_format($position["balance"],2)?></td>
			<td><?= $position["heure"]?></td>
		</tr>
		<?php endforeach ?>
	</table>
	<h2 class="panel-heading">
	  LES TOTAUX DE LA LISTE
	</h2>
	<table class="table">
	<thead>
	  <tr class="success">
		<td>Emprunte</td>
		<td>Rembourse</td>
	  </tr>
	</thead>
	<tbody>
	  <tr class="active">
		<td>$ <?= number_format($c, 2)?></td>
		<td>$ <?= number_format($k, 2)?></td>
	  </tr>
	</tbody>
	</table>
<div>
</div>
