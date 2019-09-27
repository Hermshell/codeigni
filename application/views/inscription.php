<?php require("entete.php");?>




<title>Inscription</title>

<?php echo form_open_multipart('produits/inscription'); ?>

<label for="cli_login">Login</label>
<input type="text" name="cli_login">
<?= form_error('cli_login')?>
<label for="cli_mdp">Mot de passe </label>
<input type="password" name="cli_mdp">
<?= form_error('cli_mdp')?>
<label for="conf_mdp">Confirmez votre mot de passe</label>
<input type="password" name="conf_mdp">
<?= form_error("conf_mdp");?>



<input type="submit" value="Valider">
</form>
<a href="connexion">Vous êtes déjà inscrit? Cliquez ici pour vous connecter</a>

<?php require('pieddepage.php');?>