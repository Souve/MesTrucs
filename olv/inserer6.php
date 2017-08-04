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
	    			render("emprunte_form.php", ["ag" => $ag, "tarif" => $mar,"title" => "Empreinte ".strtoupper($ag)]);
	    			break;
	    	}	    	
	    }
		else if(isset($_GET['m']) && !empty($_GET['m']))
		{
			$ag = $_GET['m'];
	    	switch ($ag)
	    	{
	    		case "mkf": case "kabba": case "atc": case "drames": case "sk5": case "pm": case "autre":
	    			render("rec.php", ["ag" => $ag, "tarif" => $mar,"title" => "Modifier douane ".strtoupper($ag)]);
	    			break;
	    	}	    	
	    }
	    redirect("./");
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$s = 0;
		
		foreach($_POST as $a => $post)
		{
			if ($_POST[$a] != NULL)
			{
				$s++;
			}
			else
			{
				$_POST[$a] = 0;
			}
	    }
	    
	    if($s == 0)
	    {
	    	apologize("Veuillez remplir au moins un champ");
	    }
	  
	    $ag = $_GET['sv'];
	    $v = query("SELECT * FROM agences WHERE agence = ?", $ag);
	    $jour = date("d-m-Y");
	    $mois = date("m-Y");
	    $an = date("Y");
	    
		
		foreach($mar as $i => $modif)
		{
			if($_POST[$modif['montant']] != 0)
			{
				$cash =($_POST[$modif['montant']]);
				query("UPDATE cash SET cash = cash + ? WHERE agence=?", $cash, $ag);
				query("UPDATE autre SET montant = montant + ? WHERE agence=?", $_POST[$modif['montant']], $modif['montant'], $ag);
			    $lignes = query("SELECT cash FROM cash WHERE agence = ?", $ag);
				foreach ($lignes as $row)
						{
						$bal = $row["cash"];
						}
				query("INSERT INTO historic VALUES(NULL, ?,'emprunte',Now(),?,?,?,?)",$_POST[$modif['marchandise']],$jour, $mois, $an, $_SESSION['username']);
			}
		}
		
		redirect("index.php?s=$ag");
	}
?>
