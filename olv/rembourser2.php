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
	    		case "mkf": case "kabba": case "atc": case "drames": case "sk5": case "pm":
	    			render("rembourser_form.php", ["ag" => $ag, "tarif" => $mar,"title" => "Rembourser ".strtoupper($ag)]);
	    			break;
	    	}	    	
	    }
	    else if(isset($_GET['m']) && !empty($_GET['m']))
		{
			$ag = $_GET['m'];
	    	switch ($ag)
	    	{
	    		case "mkf": case "kabba": case "atc": case "drames": case "sk5": case "pm":
	    			render("rec.php", ["ag" => $ag, "tarif" => $mar,"title" => "Modifier rembourse ".strtoupper($ag)]);
	    			break;
	    	}	    	
	    }
	    redirect("./");
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{		    
	    $jour = date("d-m-Y");
	    $mois = date("m-Y");
	    $an = date("Y");
	    
		if(isset($_POST['mod_rem']))
		{
			if($_POST['rembourser'] == NULL)
			{
				apologize("Vous devez inserer le montant payé");
			}
	    
			$ag = $_GET['m'];
			$cash = $_POST['rembourser'];
			query("UPDATE cash SET cash = cash + ? WHERE agence=?", $cash, $ag);
		
			redirect("index.php?s=$ag");
		}
		
		if(isset($_GET['m']) && $_GET['m'] != NULL)
		{
			$ag = $_GET['m'];
			$lignes = query("SELECT * FROM users WHERE username=?", $_SESSION['username']);
			$prix = query("SELECT qte FROM agences WHERE agence=?", $ag);
						
			if(count($lignes) == 1)
			{
				$ligne = $lignes[0];
				if (crypt($_POST["code"], $ligne["code"]) == $ligne["code"])
				{
					$prixx = query("SELECT qte FROM agences WHERE agence=?", $ag);
					switch ($ag)
					{
						case "mkf": case "kabba": case "atc": case "drames": case "sk5": case "pm":
							render("rembourser_form2.php", ["prix" => $prixx,"ag" => $ag, "tarif" => $mar,"title" => "Modifier douane ".strtoupper($ag)]);
							break;
					}
				}
			}
			apologize("Code de vérification invalide !");
			exit;
		}
			    
		if($_POST['rembourser'] == NULL)
	    {
	    	apologize("Vous devez inserer le montant payé");
	    }
	    
	    $ag = $_GET['sv'];
	    $v = query("SELECT * FROM agences WHERE agence = ?", $ag);
	    
		
		$cash = $_POST['rembourser'];
		query("UPDATE cash SET cash = cash - ? WHERE agence=?", $cash, $ag);
		query("UPDATE agences SET qte = 0 WHERE agence=?", $ag);
			    $lignes = query("SELECT cash FROM cash WHERE agence = ?", $ag);
				foreach ($lignes as $row)
						{
						$bal = $row["cash"];
						}
		query("INSERT INTO history (montant, heure, transaction, agence, jour, mois, annee, user,balance, marchandise) VALUES(?,Now(), 'rembourser', ?, ?,?,?,?,?,?)", $cash, $ag, $jour, $mois, $an, $_SESSION['username'], $bal, "----");		
		
		redirect("index.php?s=$ag");
		
	}
?>
