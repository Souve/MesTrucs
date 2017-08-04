<?php

    // configuration
    require("includes/config.php");
	$mar = query("SELECT * FROM tarif");
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (isset($_GET['sv']) && $_GET['sv'] == "modifier")
        {
        	render("change_pwd.php", [ "title" => "Modifier le mot de passe"]);
        }
        else
        	render("register_form.php", ["title" => "Ajouter un utilisateur"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	if(isset($_POST["change_pwd"]))
		{
			if (empty($_POST["last_pwd"]))
			{
			apologize("Veuillez mettre le mot de passe actuel.");
			}
			else if (empty($_POST["new_pwd"]))
			{
			apologize("Veuillez mettre le nouveau mot de passe");
			}
			else if (empty($_POST["confirmation_pwd"]))
			{
			apologize("Veuillez confirmer le mot de passe");
			}
			else if ($_POST["new_pwd"] != $_POST["confirmation_pwd"])
			{
				apologize("Les mots de passes sont differents");
			}
			$rows = query("SELECT * FROM users WHERE id=?", $_SESSION["id"]);

			$row = $rows[0];
			if (crypt($_POST["last_pwd"],$row["hash"]) == $row["hash"])
			{
				$password = crypt($_POST["new_pwd"]);
				if (query("UPDATE users SET hash=? WHERE id=?", $password, $_SESSION["id"]) !== false)
				{
					success($row["username"].", Votre mot de passe a correctement été changé.");
				}
			}
			else
			{
				apologize("L'ancien mot de passe est invalide");
			}
			exit;
		}

        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("Veuillez mettre le Pseudo.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("Veuillez mettre le Mot de passe.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("Veuillez taper à nouveau le mot de passe dans Confirmation MP.");
        }
		else if ($_POST['password'] != $_POST['confirmation'])
		{
			apologize("Les mots de passes sont differents.");
		}

		$salt = crypt($_POST["password"], rand(0,9999));
		$sal = "intel";
		$barca = crypt($sal);

        // query database for user
        if (query("INSERT INTO users (username, hash, code) VALUES(?, ?, ?)", $_POST["username"], $salt, $barca) !== false)
	{
		$rows = query("SELECT * FROM users WHERE username=?",$_POST["username"]);
		$id = $rows[0]["id"];
		$_SESSION["id"] = $id;
		redirect("./");
	}
	else
	{
		apologize("Le pseudo ".$_POST["username"]." existe déjà!");
	}
        // else apologize
        apologize("Le mot de passe et le pseudo ne correspond pas.");
    }

?>
