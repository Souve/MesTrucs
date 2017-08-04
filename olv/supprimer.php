<?php
	//Configuration
	require("includes/config.php");

	$mar = query("SELECT * FROM tarif");

	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['autres']) && !empty($_GET['autres']))
		{
			$ag = $_GET['autres'];
	    render("supprimer_form.php", ["ag" => $ag, "tarif" => $mar,"title" => "Supprimer ".strtoupper($ag)]);
	  }
	  redirect("./");
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	    $ag = $_GET['sv'];
	    $v = query("SELECT * FROM agences WHERE agence = ?", $ag);
	    $jour = date("d-m-Y");
	    $mois = date("m-Y");
	    $an = date("Y");


			    $lignes = query("SELECT montant FROM autre WHERE agence = ?", $ag);
				foreach ($lignes as $row)
						{
						$bal = $row["montant"];
						}
		query("UPDATE cash_autre SET cash = cash - ? WHERE chef=?", $bal, $ag);
		query("UPDATE autre SET montant = 0 WHERE agence=?", $ag);

		redirect("index.php?autres=$ag");

	}
?>
