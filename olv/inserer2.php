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
	    			render("inserer_form.php", ["ag" => $ag, "tarif" => $mar,"title" => "Douane ".strtoupper($ag)]);
	    			break;
	    	}	    	
	    }
		else if(isset($_GET['m']) && !empty($_GET['m']))
		{
			$ag = $_GET['m'];
	    	switch ($ag)
	    	{
	    		case "mkf": case "kabba": case "atc": case "drames": case "sk5": case "pm":
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
	    
		$jour = date("d-m-Y");
	    $mois = date("m-Y");
	    $an = date("Y");
	    
		if(isset($_POST['mod_ins']))
		{
			$ag = $_GET['m'];
			foreach($mar as $i => $modif)
			{
				if($_POST[$modif['marchandise']] != 0)
				{
					$cash = $mar[$i]["prix"] * $_POST[$modif['marchandise']];
					$req = query("SELECT qte FROM agences WHERE marchandise=? AND agence=?", $modif['marchandise'], $ag);
					$cas = $req[0]['qte'] * $mar[$i]["prix"]; printf($cas);
					
					query("UPDATE cash SET cash = cash - ? WHERE agence=?", $cas, $ag);
					query("UPDATE cash SET cash = cash + ? WHERE agence=?", $cash, $ag);
					query("UPDATE agences SET qte = ? WHERE marchandise=? AND agence=?", $_POST[$modif['marchandise']], $modif['marchandise'], $ag);
						
				}
			}
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
							render("inserer_form2.php", ["prix" => $prixx,"ag" => $ag, "tarif" => $mar,"title" => "Modifier douane ".strtoupper($ag)]);
							break;
					}
				}
			}
			apologize("Code de vérification invalide !");
			exit;
		}
	    
	    $ag = $_GET['sv'];
	    $v = query("SELECT * FROM agences WHERE agence = ?", $ag);
	   
	    
		foreach($mar as $i => $modif)
		{
			if($_POST[$modif['marchandise']] != 0)
			{
				$cash = $mar[$i]["prix"] * $_POST[$modif['marchandise']];
				
				query("UPDATE cash SET cash = cash + ? WHERE agence=?", $cash, $ag);
				query("UPDATE agences SET qte = qte + ? WHERE marchandise=? AND agence=?", $_POST[$modif['marchandise']], $modif['marchandise'], $ag);
			    $lignes = query("SELECT cash FROM cash WHERE agence = ?", $ag);
				foreach ($lignes as $row)
				{
					$bal = $row["cash"];
				}
				query("INSERT INTO history VALUES(NULL, ?,?,?,?,?,?,?,?,Now(), 'douane',?,?)", $modif['marchandise'], $_POST[$modif['marchandise']], $mar[$i]["prix"], $cash, $ag, $jour, $mois, $an, $_SESSION['username'], $bal);
			}
		}
		redirect("index.php?s=$ag");
	}
?>
