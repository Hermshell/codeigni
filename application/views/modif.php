<?php require('entete.php'); 
$date=date('Y-m-d')?>
<body>
	<div class="container">

  	
  <?php echo form_open_multipart('produits/modif/'.$produits->pro_id); ?>
  
   <!--ID-->

   <label for="pro_id" class="text-success">ID</label>
   <input type="text" class="form-control" name="pro_id" value="<?= $produits->pro_id; ?>">



   <label for="pro_cat_id" class="text-success">Catégories </label>
  <select name="pro_cat_id" class="form-control">
     <?php foreach($categories as $row)
     {
     ?>
     <option value="<?=$row->cat_id?>"><?=$row->cat_nom;?></option>

<?php } ?>
     </select>

   <!--Références-->

   <label for="pro_ref" class="text-success">Références du produit</label>
    
    <img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">
    
    
    <input type="text" class="form-control" name="pro_ref" value="<?=$produits->pro_ref; ?>"><br>

    <p><?= form_error('pro_ref');?>

    <!--Nom du produit-->

<label for="pro_libelle" class="text-success">Nom du produit</label>


<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px"> 


<input type="text" class="form-control" name="pro_libelle" value="<?= $produits->pro_libelle; ?>"><br>

<p><?= form_error('pro_libelle');?>


<!--Description-->

<label for="pro_description" class="text-success">Description du produit</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">

<textarea class="form-control" name="pro_description"><?= $produits->pro_description; ?></textarea><br>
<p><?= form_error('pro_description');?>

<!--Prix du produit-->

<label for="pro_prix" class="text-success">Prix du produit</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px"> 

<input type="text" class="form-control" name="pro_prix" value="<?= $produits->pro_prix; ?>"><br>

<p><?= form_error('pro_prix');?>

<!--Unité en stock-->

<label for="pro_stock" class="text-success">Nombre d'unités en stock</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">

<input type="text" class="form-control" name="pro_stock" value="<?= $produits->pro_stock; ?>"><br>

<p><?= form_error('pro_stock');?>

<!--Couleur-->

<label for="pro_couleur" class="text-success">Couleur</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">

<input type="text" class="form-control" name="pro_couleur" value="<?= $produits->pro_couleur; ?>"><br>

<p><?= form_error('pro_couleur');?>

<!--Photo-->

<label class="text-success">Photos</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">

<input type="file" id="pro_photo"  name="pro_photo" class="form-control" ><br>

<!--En stock oui ou non-->

<label class="text-success"  for="success" id="radio">Bloquer le produit à la production</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px"><br>

<input type="radio" class="form-check-input" name="pro_bloque" value="1" checked>Oui<br>

<input type="radio" class="form-check-input" name="pro_bloque" value="0">Non
  <br> 

  <input type="text" name="pro_d_modif" value="<?= $date=date('Y-m-d');?>" hidden>

  <!--Boutton valider-->
<input type="submit" value="Modifier" class='btn btn-outline-success' id="valider">
		
    </div> 
	
</form>
</div>
</body>
    
<?php 
require('pieddepage.php'); 
?>