<?php
	//Configuration
	require("includes/config.php");

	$mar = query("SELECT * FROM tarif");

	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['autres']) && !empty($_GET['autres']))
		{
			$ag = $_GET['autres'];
	    render("inserer_form3.php", ["ag" => $ag, "tarif" => $mar,"title" => "Emprunter ".strtoupper($ag)]);
	    }
	    redirect("./");
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	    if($_POST['emprunter'] == NULL)
	    {
	    	apologize("Vous devez inserer le montant payé");
	    }

	    $ag = $_GET['sv'];
	    //$v = query("SELECT * FROM agences WHERE agence = ?", $ag);
	    $jour = date("d-m-Y");
	    $mois = date("m-Y");
	    $an = date("Y");

		$cash = $_POST['emprunter'];
		query("UPDATE cash_autre SET cash = cash + ? WHERE chef=?", $cash, $ag);
		query("UPDATE autre SET montant = ? WHERE agence=?", $cash, $ag);
			    $lignes = query("SELECT cash FROM cash_autre WHERE chef = ?", $ag);
				foreach ($lignes as $row)
						{
						$bal = $row["cash"];
						}
				query("INSERT INTO historic VALUES(NULL, ?,'emprunte',Now(),?,?,?,?,?,?)",$_POST['emprunter'],$jour, $mois, $an, $_SESSION['username'],$ag,$bal);

		redirect("index.php?autres=$ag");

	}
?>
