<?php
	//Configuration
	require("includes/config.php");

	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if (isset($_GET['s']) && $_GET['s'] != NULL)
		{
			$ag = $_GET['s'];
			$rows = query("SELECT * FROM history WHERE agence=? ORDER BY id DESC LIMIT 0,6", $ag);
			// On selectionne le cash de chaque agence
			$cash = query("SELECT * FROM cash WHERE agence = ?", $ag);

			// On supprime la ligne dans la table de l'historique
			if (isset($_GET['id']) && !empty($_GET['id']))
			{
				if(query("DELETE FROM history WHERE agence=? AND id=?", $_GET['s'], $_GET['id']) !== false)
				{
					redirect("rapport.php?s={$_GET['s']}");
				}
			}

			render("history_view.php", ["positions" => $rows, "cash" =>$cash, "ag" => $ag,"title" => "Rapports ".strtoupper($ag)]);
		}
		redirect("./");
	}
	else if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$ag = $_GET['s'];

		if(isset($ag))
		{
			if ($ag == NULL) apologize("Impossible de traiter votre demande !");
			$cash = query("SELECT * FROM cash WHERE agence = ?", $ag);
			// On effectue des recherches grace aux données reçues
			if(isset($_POST['jour']) && $_POST['jour'] != NULL) 				$req = query("SELECT * FROM history WHERE agence = ? AND jour = ? ORDER BY id DESC", $ag, $_POST['jour']);
			else if(isset($_POST['mois']) && $_POST['mois'] != NULL)		$req = query("SELECT * FROM history WHERE agence = ? AND mois = ? ORDER BY id DESC", $ag, $_POST['mois']);
			else if(isset($_POST['annee']) && $_POST['annee'] != NULL) 	$req = query("SELECT * FROM history WHERE agence = ? AND annee = ? ORDER BY id DESC", $ag, $_POST['annee']);

			//render("history_view.php", ["positions" => $req, "cash" =>$cash, "ag" => $ag,"title" => "Rapports ".strtoupper($ag)]);

			render("history_view.php", ["positions" => $req, "cash" =>$cash, "ag" => $ag,"title" => "Rapports ".strtoupper($ag)]);
		}
		redirect("./");
	}
?>
