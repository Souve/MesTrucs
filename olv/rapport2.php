<?php
	//Configuration
	require("includes/config.php");

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// On supprime la ligne dans la table de l'historique
		if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['s']) && !empty($_GET['s']))
		{
			if(query("DELETE FROM historic WHERE agence=? AND id=?", $_GET['s'], $_GET['id']) !== false)
			{
				redirect("rapport2.php?autres={$_GET['s']}");
			}
		}

		if (isset($_GET['autres']) && $_GET['autres'] != NULL)
		{
			$rows = query("SELECT * FROM historic WHERE agence=? ORDER BY id DESC LIMIT 0,6", $_GET['autres']);
			$ag = $_GET['autres'];
			$cash = query("SELECT * FROM cash_autre WHERE chef = ?", $ag);
	    render("historic.php", ["positions" => $rows, "cash" =>$cash, "ag" => $ag,"title" => "Rapports ".strtoupper($ag)]);
		}
		redirect("./");
	}
	else if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$ag = $_GET['autres'];

		if(isset($ag))
		{
			if ($ag == NULL) apologize("Impossible de traiter votre demande !");
			$cash = query("SELECT * FROM cash_autre WHERE chef = ?", $ag);
			// On effectue des recherches grace aux données reçues
			if(isset($_POST['jour']) && $_POST['jour'] != NULL) 				$req = query("SELECT * FROM historic WHERE agence = ? AND jour = ? ORDER BY id DESC", $ag, $_POST['jour']);
			else if(isset($_POST['mois']) && $_POST['mois'] != NULL)		$req = query("SELECT * FROM historic WHERE agence = ? AND mois = ? ORDER BY id DESC", $ag, $_POST['mois']);
			else if(isset($_POST['annee']) && $_POST['annee'] != NULL) 	$req = query("SELECT * FROM historic WHERE agence = ? AND annee = ? ORDER BY id DESC", $ag, $_POST['annee']);

			render("historic.php", ["positions" => $req, "cash" =>$cash, "ag" => $ag,"title" => "Rapports ".strtoupper($ag)]);
		}
		redirect("./");
	}
?>
