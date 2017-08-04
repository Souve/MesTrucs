<?php
    // configuration
    require("includes/config.php");
//	$mar = query("SELECT * FROM tarif");
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
      if (isset($_GET['sv']) && !empty($_GET['sv']))
      {
        switch ($_GET['sv'])
        {
          case 'new_agence':
            render("ajouter_ag_form.php",    ["title" => "Ajouter une Agence"]);
            break;
          case 'new_autre':
            render("ajouter_autre_form.php", ["title" => "Ajouter Autre"]);
            break;
          default:
            if (isset($_GET['s']) && !empty($_GET['s']))
            {
              // La tarification
              $mar = query("SELECT * FROM tarif WHERE agence=?",$_GET['s']);
              render("ajouter_cash_form.php", ["title" => "Ajouter cash dans ". strtoupper($_GET['s']), "ag" => $_GET['s'], "tarif"=>$mar]);
            }
            break;
        }
      }

      redirect("./");
    }

    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // On extrait la date
    		if(isset($_POST['jour']) && isset($_POST['mois']) && isset($_POST['annee']))
    		{
    			$jour = htmlspecialchars($_POST['jour'].'-'.$_POST['mois'].'-'.$_POST['annee']);
    			$mois = htmlspecialchars($_POST['mois'].'-'.$_POST['annee']);
    			$an = htmlspecialchars($_POST['annee']);
    		}

        if (isset($_GET['sv']) && $_GET['sv'] == 'new_agence')
        {
          if(empty($_POST['agence'])) apologize("Mettez le nom du nouveau agence !");
          //if(empty($_POST['cash'])) $_POST['cash'] = 0;

          $req = query("SELECT agence FROM cash WHERE agence = ?", $_POST['agence']);

          if (count($req) > 0) apologize("L'agence {$_POST['agence']} existe déjà !");
          // Insertions des marchandises dans la table agence
          query("INSERT INTO agences (agence, marchandise) VALUES (?,?)", $_POST['agence'], "cabelo");
          query("INSERT INTO agences (agence, marchandise) VALUES (?,?)", $_POST['agence'], "telephones");
          query("INSERT INTO agences (agence, marchandise) VALUES (?,?)", $_POST['agence'], "materiel_informatique");
          query("INSERT INTO agences (agence, marchandise) VALUES (?,?)", $_POST['agence'], "body");
          query("INSERT INTO agences (agence, marchandise) VALUES (?,?)", $_POST['agence'], "autres");
          // Insertions des marchandises dans la table des tarifs
          query("INSERT INTO tarif (agence, marchandise) VALUES (?,?)", $_POST['agence'], "cabelo");
          query("INSERT INTO tarif (agence, marchandise) VALUES (?,?)", $_POST['agence'], "telephones");
          query("INSERT INTO tarif (agence, marchandise) VALUES (?,?)", $_POST['agence'], "materiel_informatique");
          query("INSERT INTO tarif (agence, marchandise) VALUES (?,?)", $_POST['agence'], "body");
          query("INSERT INTO tarif (agence, marchandise) VALUES (?,?)", $_POST['agence'], "autres");

          if(query("INSERT INTO cash (agence, chef, telephone) VALUES (?,?,?)", $_POST['agence'], $_POST['prop'], $_POST['tel']) !== false) redirect('./');
          else apologize("Désolé! L'agence {$_POST['agence']} n'a pas été ajouter.");
        }
        else if(isset($_GET['sv']) && $_GET['sv'] == 'new_cash')
    		{
    			if($_POST['ajouter'] == NULL)
    			{
    				apologize("Vous devez inserer le montant à ajouter");
    			}

    			$ag = $_GET['s'];
    			$cash = $_POST['ajouter'];
    			$motif = $_POST['motif'];

    			query("UPDATE cash SET cash = cash + ? WHERE agence=?", $cash, $ag);

          $bal = query("SELECT cash FROM cash WHERE agence=?", $ag);
          $bal = $bal[0]['cash'];

          query("INSERT INTO history (montant, heure, transaction, agence, jour, mois, annee, user,balance, marchandise) VALUES(?,Now(),?, ?, ?,?,?,?,?,?)", $cash, "Aj. Cash", $ag, $jour, $mois, $an, $_SESSION['username'], $bal, $motif);
    			redirect("index.php?s=$ag");
    		}
        if (isset($_GET['sv']) && $_GET['sv'] == 'new_autre')
        {
          if(empty($_POST['nom'])) apologize("Mettez le nom !");
          //if(empty($_POST['cash'])) $_POST['cash'] = 0;

          $req = query("SELECT chef FROM cash_autre WHERE chef = ?", $_POST['nom']);

          if (count($req) > 0) apologize("{$_POST['nom']} existe déjà !");
          // Insertion dans la table autre
          query("INSERT INTO autre (agence) VALUES (?)", $_POST['nom']);

          if(query("INSERT INTO cash_autre (chef, telephone) VALUES (?,?)", $_POST['nom'], $_POST['tel']) !== false) redirect('./');
          else apologize("Désolé! {$_POST['nom']} n'a pas été ajouter.");
        }
    }
?>
