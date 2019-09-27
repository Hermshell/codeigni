<?php require("entete.php"); ?>

<body>


    <h1 class="text-center">Mon panier</h1>
    <br>
    <hr>

    <?php

    $total = 0;
$sousajout=false;
$this->session->sousajout=$sousajout;
var_dump($sousajout);


    foreach ($this->session->panier as $produit) {

        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <img class="border border-dark rounded-circle" src="<?= base_url('assets/images/') . $produit['pro_id'] . '.' . $produit['pro_photo'] ?>" height="150px" width="150px">
                    <div class="panier_qte ml-5">



                        <a href="<?= site_url('produits/qtemoins/' . $produit['pro_id']); ?>" type="button" role="button"> - </a>

                        <?= $produit['pro_qte'];
                            ?>

                        <a href="<?= site_url('produits/qteplus/' . $produit['pro_id']); ?>" type="button" role="button">+</a>


                    </div>

                </div>
                <div class="col-5">
                    <div class="row">
                        <h3> <?= $produit['pro_libelle']; ?></h3>
                    </div>
                </div>

                <div class="col-2">

                    <p class="prix">Prix : <?= str_replace('.', ',', $produit['pro_prix']); ?> <sup>€</sup>




                        <div class="row">

                            <p>Pour <?= $produit['pro_qte'] ?> articles le prix total est de: <?= str_replace('.', ',', ($produit['pro_qte'] * $produit['pro_prix'])); ?> <sup>€</sup>

                        </div>
                </div>
<div class="col-2">
                <?php

                    $total += $produit['pro_qte'] * $produit['pro_prix']; ?>


                <a href="<?= site_url('produits/effaceProduit/' . $produit['pro_id']); ?>">Suppimer</a>
    </div>
            </div>
            <hr>
            </div>
        <?php

        }

        ?>
        
        <div class="container-fluid">
        <div class="mr-auto"></div>
        <div class="ml-auto">
            <div class="row">
                <div class="col-1 offset-9">
                    <?php

                    if ($this->session->panier != null) {

                        ?>

                        <div class="row">


                            <?php



                                // ici le code pour récupérer les produits et les incrémenter ...

                                ?>



                        </div>

                        <div>

                            <div>

                                <h2>Récapitulatif</h2>

                                <div>

                                    <h5>TOTAL : <?= str_replace('.', ',', $total); ?> <sup>€</sup></h5>

                                    <a href="<?= site_url("produits/efface"); ?>">Supprimer le panier</a> -

                                    <a href="<?= site_url("produits/catalogue"); ?>">Retour boutique</a>

                                </div>

                            </div>

                        </div>

                </div>

            <?php

            } else {

                ?>

                <div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez visiter notre <a href="<?= site_url("produits/catalogue"); ?>">boutique</a>.</div>

            <?php

            }


            ?>
            </div>
        </div>
        </div>
        <?php require('pieddepage.php');?>