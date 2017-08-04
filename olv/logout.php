<?php

    // configuration
    require("includes/config.php"); 

    // log out current user, if any
    logout();
	
    // redirect user
	$_SESSION['user'] = false;
	redirect("./");
?>
