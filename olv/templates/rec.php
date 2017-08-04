<?php if(strchr($_SERVER['PHP_SELF'], "rembourser.php")) $req = "rembourser.php"; else $req = "inserer.php";?>

<div>
<form action="<?=$req?>?m=<?=$ag?>" method="post" class="form-signin" role="form">
	<h2 class="form-signin-heading">Code de vérification</h2>
    <div class="form-group">
        <input readonly class="form-control" name="username" value="<?=$_SESSION['username']?>" type="text"/>
    </div>
    <div class="form-group">
        <input autofocus class="form-control" name="code" placeholder="Code" type="password"/>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Vérifier</button>
    </div>
</form>
<div>
</div>
