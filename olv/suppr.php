<?php 
	//Configuration
	require("includes/config.php");
	
	$mar = query("SELECT * FROM tarif");
	
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['s']) && !empty($_GET['s']))
		{
			$ag = $_GET['s'];
	    	switch ($ag)
	    	{
	    		case "mkf": case "kabba": case "atc": case "drames": case "sk5": case "pm": case "autre":
	    			render("supprimer_form.php", ["ag" => $ag, "tarif" => $mar,"title" => "Supprimer ".strtoupper($ag)]);
	    			break;
	    	}	    	
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
		redirect("indexx.php?s=$ag");
		
	}
?>
