<?php require("entete.php");
$date=date('Y-m-d');
?>


<body>
    
    <div class="container" id="test">

  
     <?php echo form_open_multipart('produits/ajout'); ?>


     

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
    
    
    <input type="text" class="form-control" name="pro_ref" value="<?= set_value('pro_ref')?>"><br>
    <p><?= form_error('pro_ref');?>

    <!--Nom du produit-->

<label for="pro_libelle" class="text-success">Nom du produit</label>


<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px"> 


<input type="text" class="form-control" name="pro_libelle" value="<?= set_value('pro_libelle')?>"><br>
<p><?= form_error('pro_libelle');?>

<!--Description-->

<label for="pro_description" class="text-success">Description du produit</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">

<textarea class="form-control" name="pro_description" value="<?= set_value('pro_description')?>"></textarea><br>

<p><?= form_error('pro_description');?>
<!--Prix du produit-->

<label for="pro_prix" class="text-success">Prix du produit</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px"> 

<input type="text" class="form-control" name="pro_prix" value="<?= set_value('pro_prix')?>"><br>
<p><?= form_error('pro_prix');?>

<!--Unité en stock-->

<label for="pro_stock" class="text-success">Nombre d'unités en stock</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">

<input type="text" class="form-control" name="pro_stock" value="<?= set_value('pro_stock')?>"><br>
<p><?= form_error('pro_stock');?>

<!--Couleur-->

<label for="pro_couleur" class="text-success">Couleur</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">

<input type="text" class="form-control" name="pro_couleur" value="<?= set_value('pro_couleur')?>"><br>
<p><?= form_error('pro_couleur');?>

<!--Photo-->

<label class="text-success" for="pro_photo">Photos</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px">

<input type="file" class="form-control" name="pro_photo"  id="pro_photo" value="<?= set_value('file')?>"><br>

<!--En stock oui ou non-->

<label class="text-success"  for="success" id="radio">Bloquer le produit à la production</label>

<img src="<?=base_url("assets/images/flower.png")?>" height="30px" width="30px"><br>

<input type="radio" class="form-check-input" name="pro_bloque" value="1" checked>Oui<br>

<input type="radio" class="form-check-input" name="pro_bloque" value="0">Non
  <br> 

  <!--Date-->
  <input name="pro_d_ajout" value="<?=$date?>" hidden> 

  <!--Boutton valider-->
<input type="submit" value="valider" class='btn btn-outline-success' id="valider">
<input type="reset" value="annuler" class='btn btn-outline-warning'>
    </div> 
    
    
    
    
</body>
<?php require("pieddepage.php");?>