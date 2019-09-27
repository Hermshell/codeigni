<!-- application/views/liste.php -->
<?php require("entete.php");?>

    <title>Liste des produits</title>
	
</head>
	
<body>

<h1 class="text-center sanos">Liste des produits</h1>
	
 <div class="container">
<!-- LES THEADS -->
<table  class='table table-bordered'>	
    <thead>
        <tr>
 <th class='table-success'></th>
 <th class='table-success sanos'>PHOTO</th>
 <th class='table-success sanos'>ID</th>
 <th class='table-success sanos'>Références</th>
 <th class='table-success sanos'>Libellé</th>
 <th class='table-success sanos'>Prix</th>
 <th class='table-success sanos'>Stock</th>
 <th class='table-success sanos'>Couleur</th>
 <th class='table-success sanos'>Ajout</th>
 <th class='table-success sanos'>Modif</th>
 <th class='table-success sanos'>Bloqué</th>


 <?php if(isset($this->session->connexion))
 {
    if($this->session->permission==1 || $this->session->permission==2)
    {
     ?>

 <th class='table-success sanos'>Actions</th>

 <?php
    }
}?>
         </tr>
    </thead>
    
<?php 

//La boucle pour afficher le contenu des tableaux///////////////////////////////////////////////////////////////////////////


foreach ($liste_produits as $row)  //Pour chaque valeur de liste_produits qui nous donnent les valeurs de la table produits
	
{
    ?> 
     <tr>
     <td>  <?php echo form_open('produits/ajoutePanier'); ?>
	
    <input class="form-control" name="pro_qte" id="pro_qte" value="1">
   
    <input type="hidden" name="pro_prix" value="<?= $row->pro_prix ?>">
   
    <input type="hidden" name="pro_id" value="<?= $row->pro_id ?>">
   
     <input type="hidden" name="pro_libelle" value="<?= $row->pro_libelle ?>">

     <input type="hidden" name="pro_photo" value="<?= $row->pro_photo ?>">
   
     <div class="form-group">
   
        <input class="btn btn-outline-success" type="submit" value="Ajouter au panier">            
   
     </div>
   
  </form>
  </td>

    <td><a href='<?=base_url("index.php/produits/detail/$row->pro_id")?>'><img src='<?=base_url("assets/images/").$row->pro_id.".".$row->pro_photo?>' width='80px' height='80px'></a></td> <!--On z'affiche la photo avec des balises img et on l'insère dans un lien cliquable qui envoit au détail-->
	
	
    <td><?=$row->pro_id?></td>
	
    <td><?=$row->pro_ref?></td>
    
    <td><?=$row->pro_libelle?></td>
    
    <td><?=$row->pro_prix?></td>
    
    <td><?=$row->pro_stock?></td>
    
    <td><?=$row->pro_couleur?></td>
    
    <td><?=$row->pro_d_ajout?></td>
    
    <td><?=$row->pro_d_modif?></td>
    
    <td><?=$row->pro_bloque?></td>
     <?php if(isset($this->session->connexion))
     {
        if($this->session->permission==1 || $this->session->permission==2)
        {
         ?>
    <td> <a href='<?=base_url("index.php/produits/modif/$row->pro_id")?>'>
 <input type='button' id='modif'  class='btn btn-outline-success' value='Modifier'>
</a> <br>
<?php
        }
     }
     if(isset($this->session->connexion))
     {
        if($this->session->permission==2)
        {
     ?>
<a href='<?=base_url("index.php/produits/delete/$row->pro_id")?>'>
<input type="submit" name="button2" value="Supprimer" class="btn btn-outline-danger" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"></a> <!-- Au click on appelle un confirm qui si vrai envoie la page sur le script de suppression -->
</td>
<?php
        }
     }
     ?>
<?php	
}
	?>




</table>	
<?php
if(isset($this->session->permission))
{
    if($this->session->permission==1 || $this->session->permission==2)
    {
?>
<a href="<?=base_url("index.php/produits/ajout")?>"><input class="btn btn-success" type="button" value="Ajouter"></a>
<?php
    }
}?>
</div>


<?php require("pieddepage.php");?>