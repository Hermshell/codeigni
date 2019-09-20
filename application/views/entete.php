<?php $total=0;?>
<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jarditou:Liste des Articles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<? base_url('assets/css/Jarditou-php.css') ?>">
    <link rel="stylesheet" href="<? base_url('assets/css/bootstrap.css') ?>">
</head>

<body>
    <header>

        <img src="<?= base_url('assets/images/jarditou_logo.jpg'); ?>" alt="Logo de Jarditou" height="100px" width="300px">
        <p>La qualité depuis 70 ans<p>




    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="<?php base_url() ?>">Acceuil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste.php">Tableau</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contact.html">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div>
                        <img class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="<?= base_url('assets/images/') ?>panier.png" height="35px" width="35px" id="panier">
                        
                        <div class="dropdown-menu dropdown-menu-right border-dark" aria-labelledby="dropdownMenuButton" id="dropdown">
                            
                                <?php
                                foreach ($this->session->panier as $produit) {//Tant qu'il y a des éléments dans le panier
                                    ?>
                   
                                  <img class="rounded-circle" src="<?= base_url('assets/images/') . $produit['pro_id'] . '.' . $produit['pro_photo'] ?>" height="35px" width="35px"><!--Affichage de l'image du produit-->


                                       <span class="align-bottom"> <?= $produit['pro_libelle']; ?></span>  <!--Affichage du nom du produit-->
                                        
                                   <span class="align-bottom"><?=$produit['pro_prix']?>€ </span>
                                        <div class="panier_qte">

                                            <div class="panier_qte_valeur">
                                               
                                                    <a href="<?= site_url('produits/qtemoins/' . $produit['pro_id']); ?>" type="button" role="button"> - </a>

                                                    <?= $produit['pro_qte'];?>

                                                    <a href="<?= site_url('produits/qteplus/' . $produit['pro_id']); ?>" type="button" role="button">+</a>
                                                    <?php $total += $produit['pro_qte']*$produit['pro_prix']; ?>
                                                
                                            </div>

                                        </div>
                                        <hr>
                                  



                                <?php } ?>
                              <p>Prix Total : <?=$total?> € </p>
                              <a href="panier" class="ml-5">Finaliser votre commande</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


    </nav>