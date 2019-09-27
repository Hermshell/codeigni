<?php $total=0;
$quantité=0;
$sousajout=true;
$this->session->sousajout=$sousajout;
?>
<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jarditou:Liste des Articles</title>
    <link rel="preload" href="<?= base_url('assets/polices/sanos-brush-light-font-webfont.woff2'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/Jarditou-php.css">
    
</head>

<body>
    <header>

        <img src="<?= base_url('assets/images/jarditou_logo.jpg'); ?>" alt="Logo de Jarditou" height="100px" width="300px">
        <p>La qualité depuis 70 ans<p>




    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-secondary">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="<?php base_url() ?>">Acceuil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste">Liste</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contact.html">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <div class="btn-group">
                <?php if (isset($this->session->connexion))
                      {
                          ?>

                        <p class="dropdown-toggle text-white mt-1 mr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="connectButton"><?= $this->session->connexion;?></p>
                        <div class="dropdown-menu dropdown-menu-right border-3 border-primary bg-dark text-white pl-1 pr-1" aria-labelledby="connectButton" id="dropdown">
                            <a href="deconnexion">Déconnexion</a>
                      </div>
                      </div>
                        <?php
                      }
                      else {
                         ?>

 <a class="mr-5" href="connexion">Connexion</a>
                         <?php

                      }
                  ?>
                         <div class="btn-group">
                        <img class="dropdown-toggle mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="<?= base_url('assets/images/') ?>panier.png" height="35px" width="35px" id="panier">
                        <div class="bg-dark text-white text-center offset-right-6 " id="compteur"><?php foreach ($this->session->panier as $produit)
                        {
                            $quantité+=$produit['pro_qte'];
                        }
                        echo $quantité; ?>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right border-3 border-primary bg-dark text-white pl-1 pr-1" aria-labelledby="dropdownMenuButton" id="dropdown">
                            
                                <?php
                                foreach ($this->session->panier as $produit) {//Tant qu'il y a des éléments dans le panier
                                    ?>
                 
                                  <img class="rounded-circle  border border-primary" src="<?= base_url('assets/images/') . $produit['pro_id'] . '.' . $produit['pro_photo'] ?>" height="35px" width="35px"><!--Affichage de l'image du produit-->
                               
                                       <span class="align-bottom ml-2"> <?= $produit['pro_libelle']; ?></span>  <!--Affichage du nom du produit-->
                                        
                                   <span class="align-bottom"><?=$produit['pro_prix']?>€ </span>
                                        <div class="panier_qte ">

                                            <div class="panier_qte_valeur ">
                                               
                                                    <a href="<?= site_url('produits/qtemoins/' . $produit['pro_id']); ?>" type="button" role="button"> - </a>

                                                    <?= $produit['pro_qte'];?>

                                                    <a href="<?= site_url('produits/qteplus/' . $produit['pro_id']); ?>" type="button" role="button">+</a>
                                                    <?php $total += $produit['pro_qte']*$produit['pro_prix']; ?>
                                                
                                            </div>

                                        </div>
                           
                                        <hr class="border-primary">
                                  



                                <?php } ?>
                              <p>Prix Total : <?=$total?> € </p>
                              <a href="panier" class="ml-5">Vers le panier</a>
                             
                        </div>
   
            </ul>
            
        </div>
        </div>


    </nav>