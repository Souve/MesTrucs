<?php
	//Configuration
	require("includes/config.php");

	$mar = query("SELECT * FROM tarif");

	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['autres']) && !empty($_GET['autres']))
		{
			$ag = $_GET['autres'];
	    render("rembourser_form3.php", ["ag" => $ag, "tarif" => $mar,"title" => "Rembourser ".strtoupper($ag)]);
	  }
	  redirect("./");
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{

	    if($_POST['rembourser'] == NULL)
	    {
	    	apologize("Vous devez inserer le montant payé");
	    }

	    $ag = $_GET['sv'];
	    //$v = query("SELECT * FROM agences WHERE agence = ?", $ag);
	    $jour = date("d-m-Y");
	    $mois = date("m-Y");
	    $an = date("Y");

		$cash = $_POST['rembourser'];
		query("UPDATE cash_autre SET cash = cash - ? WHERE chef=?", $cash, $ag);
		query("UPDATE autre SET montant = 0 WHERE agence=?", $ag);
			    $lignes = query("SELECT cash FROM cash_autre WHERE chef = ?", $ag);
				foreach ($lignes as $row)
						{
						$bal = $row["cash"];
						}
				query("INSERT INTO historic VALUES(NULL, ?,'rembourser',Now(),?,?,?,?,?,?)",$_POST['rembourser'],$jour, $mois, $an, $_SESSION['username'],$ag,$bal);

		redirect("index.php?autres=$ag");

	}
?>
