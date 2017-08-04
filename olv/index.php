<?php

    // configuration
    require("includes/config.php");

	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['s']))
 	   	{
        $ag = $_GET['s'];
        // La tarification
        $mar = query("SELECT * FROM tarif WHERE agence=?",$ag);
        // On selectionne la liste des produits ds la BDD qui ont qlq chose
        $liste = query("SELECT * FROM agences WHERE agence = ? AND qte > 0", $ag);
        // On selectionne le cash de chaque agence
        $cash = query("SELECT * FROM cash WHERE agence = ?", $ag);

        // On modifie la tarif en fonctions des agences
  			if(isset($_GET['sv']) && !empty($_GET['sv']) && !empty($ag))
  			{
  				render("modif_tarif.php", ["title" => "Modifier le tarif", "tarif" => $mar]);
  			}
        // On affiche la page corresponspondant à l'agence
        if(isset($cash[0])) render("agences.php", ["title" => strtoupper($ag), "tarif" => $mar, "agence" => $liste, "cash" => $cash]);
        else redirect('./');
 	   	}
      elseif (isset($_GET['autres']) && !empty($_GET['autres']))
      {
        $cash = query("SELECT * FROM cash_autre WHERE chef = ?", $_GET['autres']);
        $liste = query("SELECT * FROM autre WHERE agence = ? AND montant > 0", $_GET['autres']);
        render("autre.php", ["title" => "Agent ".strtoupper($cash[0]['chef']), "cash" => $cash, "agence" => $liste]);
      }
      // Si on n'a rien demandé, on affiche la page d'accueil
 	   	else
      {
        $sk = query("SELECT * FROM cash");
        $ska = query("SELECT * FROM cash_autre");
	 	   	render("accueil.php", ["title" => "Accueil", "agences" => $sk, "autres" => $ska]);
      }
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["modif_tarif"]))
		{
			if(isset($_GET['s']) && $_GET['s'] != NULL)
			{
				$ag = $_GET['s'];
				$mar = query("SELECT * FROM tarif WHERE agence=?",$ag);
				foreach($mar as $modif)
				{
					if(isset($_POST[$modif['marchandise']]) && !empty($_POST[$modif['marchandise']]))
					{
						query("UPDATE tarif SET prix = ? WHERE marchandise=? AND agence=?", $_POST[$modif['marchandise']], $modif['marchandise'], $ag);
					}
					else
					{
						apologize("Veuillez remplir la case de ".strtoupper($modif['marchandise']));
					}
				}
				redirect("./?s=$ag");
			}
			else
				apologize("Données introduits sont incorrectes !");

		}
	}



?>
