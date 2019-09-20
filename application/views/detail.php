<?php require("entete.php");?>
    

  
    
  
  <div class="container">
  
    
  
<table class='table table-bordered'>
<tr>
  <th class='table-success'>ID</th>
  <th class='table-success'>Catégorie</th>
  <th class='table-success'>Libellé</th>
  <th class='table-success'>Référence</th>
  <th class='table-success'>Description</th>
  <th class='table-success'>Prix</th>
  <th class='table-success'>Stock</th>
  <th class='table-success'>Couleur</th>
  <th class='table-success'>Photos</th>
  <th class='table-success'>Date ajout</th>
</tr>
  <tr>
  <td><?=$produits->pro_libelle?></td>
  <td><?=$produits->pro_ref?></td>
  <td><?=$produits->pro_description?></td>
  <td><?=$produits->pro_prix?></td>
  <td><?=$produits->pro_stock?></td>
  <td><?=$produits->pro_couleur?></td>
  <td><?=$produits->pro_photo?></td> 
  <td><?=$produits->pro_d_ajout?></td>
 </tr>
</table>
 
 <a href='<?=base_url("index.php/produits/modif/$produits->pro_id")?>'>
 <input type='button' id='modif'  class='btn btn-outline-success' value='Modifier'></a>

 
 <a href='<?=base_url("index.php/produits/delete/$produits->pro_id")?>'>
<input type="submit" class="btn btn-outline-danger" value="Supprimer" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"></a> <!-- Au click on appelle un confirm qui si vrai envoie la page sur le script de suppression -->

 
 </div>
  <?php require("pieddepage.php")?>