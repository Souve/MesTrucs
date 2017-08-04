<?php if (isset($_SESSION['user']) && $_SESSION['user'] != false):
	if(!isset($message)) printf('</div>');
	$na = "/olv"
?>


		<div id="bottom">
			Copyright &#169; 2015 Olivier Finances. <br>Powered by <a href="http://www.skavunga.xyz" title="Développement d'applications et Sites Web">SK Corporation</a> and <a href="mailto:planetepnow@yahoo.fr" title="Ecrire au developpeur">Pknow Soft</a>  
		</div>
		</div>

		<div class="col-sm-3" id="bot">
		<?php if(isset($tarif)): ?>
		  <table class="table table-striped">
			  <thead>
			  		<tr>
			  			<td colspan="2"><div class="btn btn-primary btn-block">Tarification <?php if(isset($_GET['s']) && !empty($_GET['s'])) printf(strtoupper($_GET['s'])); else if(isset($_GET['ag']) && !empty($_GET['ag'])) printf(strtoupper($_GET['ag'])); ?></div></td>
			  		</tr>
			  		<tr>
			  			<th>Marchandise</th>
			  			<th>Prix</th>
			  		</tr>
			  </thead>
			  <tbody>
		  <?php foreach($tarif as $tar): ?>
			<tr>
				<td style="text-align:left;"><?=$tar['marchandise']?> </td>
				<td style="text-align:left;">$ <?=number_format($tar['prix'], 2)?></td>
			</tr>
			 <?php endforeach; if($_SERVER["PHP_SELF"] == "$na/index.php"): ?>
			<tr>
				<td colspan="2"><a href="index.php?sv=mtarif&s=<?=$_GET['s']?>" class="btn btn-warning btn-block">MODIFIER TARIF</a></td>
			</tr>
			<?php endif; ?>
		  	</tbody>
		  </table>
		  <?php endif; ?>

		  <?php if ($_SERVER['PHP_SELF'] == "$na/rapport.php"): ?>
		  <table class="table table-striped">
			  <thead>
			  		<tr>
			  			<td colspan="3"><div class="btn btn-primary btn-block">Rapports <?php if(isset($_GET['s']) && !empty($_GET['s'])) printf(strtoupper($_GET['s']));?></div></td>
			  		</tr>
			  </thead>
			  <tbody>
			<tr>
				<td style="text-align:left;">Jour</td>
				<form method="post" action="rapport.php?s=<?=$_GET['s']?>">
					<td><input type="text" name="jour" placeholder = "JJ-MM-AAAA"></td>
					<td><input type="submit" value = "Valider"></td>
				</form>
			</tr>
			<tr>
				<td style="text-align:left;">Mois</td>
				<form method="post" action="rapport.php?s=<?=$_GET['s']?>">
					<td><input type="text" name="mois" placeholder = "MM-AAAA"></td>
					<td><input type="submit" value = "Valider"></td>
				</form>
			</tr>
			<tr>
				<td style="text-align:left;">Année</td>
				<form method="post" action="rapport.php?s=<?=$_GET['s']?>">
					<td><input type="text" name="annee" placeholder = "AAAA"></td>
					<td><input type="submit" value = "Valider"></td>
				</form>
			</tr>
			<tr>
				<td style="text-align:left;">Code</td>
				<form method="get" action="rapport.php">
					<td><input type="text" name="id" placeholder = "Code à Supprimer"></td>
					<td style="display:none;"><input type="hidden" name="s" value = "<?=$_GET['s']?>"></td>
					<td><input type="submit" value = "Supprimer"></td>
				</form>
			</tr>
			<tr>
				<td colspan="3"><a href="javascript:window.print();" id="print" class="btn btn-success btn-block">Imprimer</a></td>
			</tr>
			</tbody>
			</table>
			<?php endif; if(isset($ag)): ?>
		  <?php endif; ?>

		  <?php if ($_SERVER['PHP_SELF'] == "$na/rapport2.php"): ?>
		  <table class="table table-striped">
			  <thead>
			  		<tr>
			  			<td colspan="3"><div class="btn btn-primary btn-block">Rapports</div></td>
			  		</tr>
			  </thead>
			  <tbody>
			<tr>
				<td style="text-align:left;">Jour</td>
				<form method="post" action="rapport2.php?autres=<?=$_GET['autres']?>">
					<td><input type="text" name="jour" placeholder = "JJ-MM-AAAA"></td>
					<td><input type="submit" value = "Valider"></td>
				</form>
			</tr>
			<tr>
				<td style="text-align:left;">Mois</td>
				<form method="post" action="rapport2.php?autres=<?=$_GET['autres']?>">
					<td><input type="text" name="mois" placeholder = "MM-AAAA"></td>
					<td><input type="submit" value = "Valider"></td>
				</form>
			</tr>
			<tr>
				<td style="text-align:left;">Année</td>
				<form method="post" action="rapport2.php?autres=<?=$_GET['autres']?>">
					<td><input type="text" name="annee" placeholder = "AAAA"></td>
					<td><input type="submit" value = "Valider"></td>
				</form>
			</tr>
			<tr>
				<td style="text-align:left;">Code</td>
				<form method="get" action="rapport2.php">
					<td><input type="text" name="id" placeholder = "Code à Supprimer"></td>
					<td style="display:none;"><input type="hidden" name="s" value = "<?=$_GET['autres']?>"></td>
					<td><input type="submit" value = "Supprimer"></td>
				</form>
			</tr>
			<tr>
				<td colspan="3"><a href="javascript:window.print();" id="print" class="btn btn-success btn-block">Imprimer</a></td>
			</tr>
			</tbody>
			</table>
			<?php endif; if(isset($ag)): ?>
		  <?php if ($_SERVER['REQUEST_URI'] == "$na/inserer.php?s=$ag"): ?>
			  <a href="inserer.php?m=<?=$_GET['s']?>" class="btn btn-default btn-block">Modifier douane</a>
			<?php endif; ?>
		  <?php if ($_SERVER['REQUEST_URI'] == "$na/rembourser.php?s=$ag"): ?>
			  <a href="rembourser.php?m=<?=$_GET['s']?>" class="btn btn-default btn-block">Modifier le rembourse</a>
			<?php endif;endif;?>
		 </div>
		 <!-- Mot de salution ->
		 <?php
			 if($_SERVER['QUERY_STRING'] == NULL)
			 {
			 	echo "Je suis";
			 }
		?>-->
	</div>
</div>
            </div>
            <?php endif ?>
        </div>

    </body>

</html>
