<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />

        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?> | Olv finances</title>
        <?php else: ?>
            <title>Olv finances</title>
        <?php endif ?>

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery.jqprint-0.3.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

    </head>

    <body>
		<?php if (isset($_SESSION['user']) && $_SESSION['user'] != false):?>

		<div class="container navbar-inverse" role="navigation" style="margin-bottom: 15px;">
        <div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="./" class="navbar-brand" style="color:yellow;">OLV FINANCES</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if (isset($_GET['s']) && $_GET['s'] != NULL || isset($_GET['m']) && $_GET['m'] != NULL):?>
            <li><a href="index.php?s=<?php if(isset($_GET['s'])) echo $_GET['s']; else echo $_GET['m'];?>"><button class="btn btn-warning">Accueil</button></a></li>
            <li><a href="agences.php?s=<?php if(isset($_GET['s'])) echo $_GET['s']; else echo $_GET['m'];?>&sv=ajouter_cash"><button class="btn btn-success">Ajouter Cash</button></a></li>
            <li><a href="inserer.php?s=<?php if(isset($_GET['s'])) echo $_GET['s']; else echo $_GET['m'];?>"><button class="btn btn-danger">Douane</button></a></li>
            <li><a href="rembourser.php?s=<?php if(isset($_GET['s'])) echo $_GET['s']; else echo $_GET['m'];?>"><button class="btn btn-info">Rembourser</button></a></li>
            <li><a href="rapport.php?s=<?php if(isset($_GET['s'])) echo $_GET['s']; else echo $_GET['m'];?>"><button class="btn btn-default">Rapport</button></a></li>
            <?php elseif(isset($_GET['autres']) && $_GET['autres'] != NULL): ?>
              <li><a href="index.php?autres=<?=$_GET['autres']?>"><button class="btn btn-warning">Accueil</button></a></li>
                <li><a href="inserer3.php?autres=<?=$_GET['autres']?>"><button class="btn btn-success">Emprunter</button></a></li>
          		<li><a href="rembourser3.php?autres=<?=$_GET['autres']?>"><button class="btn btn-danger">Rembourser</button></a></li>
          		<li><a href="supprimer.php?autres=<?=$_GET['autres']?>"><button class="btn btn-info">SUPPRIMER</button></a></li>
          		<li><a href="rapport2.php?autres=<?=$_GET['autres']?>"><button class="btn btn-default">History</button></a></li>
            <?php else: ?>
            <li><a href="agences.php?sv=new_agence">Ajouter une agence</a></li>
            <li><a href="agences.php?sv=new_autre">Ajouter Agent</a></li>
            <li><a href="register.php">Ajouter un utilisateur</a></li>
            <li><a href="register.php?sv=modifier">Modifier le mot de passe</a></li>
            <?php endif ?>
            <li><a href="logout.php" class="btn-danger active" style="color:white;">Déconnexion</a></li>
          </ul>
        </div>
      </div>

		<?php endif ?>
        <div class="container">
			<div id="middle">
			<?php if (isset($_SESSION['user']) && $_SESSION['user'] != false):?>
			<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-sm-9" id="gch">
				  <div class="jumbotron">
					<h1  style="color:blue;">
						<?php if (isset($title)) printf(htmlspecialchars($title)); else printf("Olv finances"); ?>
					</h1>
					<p>
            <?php if(isset($_GET['autres']) && !empty($_GET['autres'])):?>
              <?php if(isset($cash[0]['telephone'])): ?>
              Téléphone : <?=$cash[0]['telephone']?>
            <?php endif; else:?>
              <?php if(isset($cash[0]['chef']) && isset($cash[0]['telephone'])): ?>
                Propriétaire : <?=strtoupper($cash[0]['chef'])?> / Téléphone : <?=$cash[0]['telephone']?>
              <?php endif;
            endif;?>
          </p>
				  </div>
			<?php endif ?>
