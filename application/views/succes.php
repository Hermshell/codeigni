<?php require('entete.php');?>
<h1 class="align-center"><?=$message?></h1>
<?php header("refresh:2;url=".base_url('index.php/produits/liste'));?> 