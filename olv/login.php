<?php

    session_start();
    require("includes/functions.php");
	$_SESSION["user"] = false;
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login_form.php", ["title" => "Connexion"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("Veuillez mettre le Pseudo.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("Veuillez mettre le Mot de passe.");
        }

        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
				$_SESSION["user"] = true;
				$_SESSION['username'] = $row['username'];
		
                // redirect to portfolio
                redirect("./");
            }
        }

        // else apologize
        apologize("Le mot de passe et le pseudo ne correspond pas.");
    }

?>
