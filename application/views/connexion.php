<?php require("entete.php");?>

    <title>Liste des produits</title>

	

<title>Connexion</title>

<h1 class="text-center ml-5 sanos">Connexion</h1>


<div class="container fluid">
<?php echo form_open_multipart('produits/connexion'); ?>

<div class="row">
<?php if(isset($erreur)){echo $erreur;}?>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 ml-5">
        <div class="row">
<label class="offset-5 sanos" for="cli_login">Login</label>
<input class="form-control" type="text" name="cli_login">
<?= form_error('cli_login')?>
</div>
<div class="row">
<label  class="offset-4 sanos" for="cli_mdp">Mot de passe</label>
<input class="form-control" type="password" name="cli_mdp">
<?= form_error('cli_mdp');?>
</div>
<div class="row mt-2">
<div class="col-3"></div>
    <div class="col-6 ml-5">
<input class="btn btn-success" type="submit" value="Valider">
</div>
</div>
</form>
<a href="inscription">Vous n'êtes pas inscrit? Cliquez ici pour créer votre compte</a>
</div>
</div>
</div>
<?php require('pieddepage.php');?>