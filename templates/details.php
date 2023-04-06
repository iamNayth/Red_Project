<?php $title = "Détails"; ?>
<?php ob_start(); ?>

<section class="pt-3 pb-3">
    <div class="container">
        <div class="row">
            <!-- LEFT--->
            <div class="col-6 d-flex justify-content-center">
                <div id="carouselExampleDark" class="carousel carousel-dark slide bg-white p-3 rounded-3 w-75">
                    <div class="carousel-indicators">
                    <?php
                        for($i = 0; $i < count($products); $i++) { ?>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i ?>" <?= ($i==0) ?  "class='active'" : "" ?> <?= ($i==0) ?  'aria-current="true"' : "" ?> aria-label="<?= 'Slide '.$i ?>" ></button>
                        <?php } ?>
                    </div>
                    <div class="carousel-inner ">
                    <?php 
                    $j=0;
                    foreach($products as $product) { ?>
                        
                            <div class="carousel-item <?= ($j==0) ?  "active" : "" ?> pb-5" data-bs-interval="5000">
                            <img src="<?= str_replace('../assets/', '../admin/assets/', $product['path'])?>" class="d-block w-100" alt="...">
                            </div>  
                    <?php 
                        $j++; 
                    } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                </div>
                <!-- RIGHT--->
            <div class="col-6">
                <div class="row mb-5">
                    <div class="col-6">
                        <?php foreach($prodInfos as $prod) { ?> 
                            <h1 class="tilt fs-2 text-uppercase"><?= $prod['name'] ?></h1>
                            <span class="mont opacity-50"><?= $prod['description'] ?></span>
                        <?php 
                        } ?>   
                    </div>
                    <div class="col-6 text-end">
                        <?php foreach($prodInfos as $prod) { ?> 
                            <h2 class="tilt fs-2"><?= $prod['price'] ?> €</h2>
                        <?php 
                        } ?> 
                        <button class="button3 w-100">Ajouter au panier</button>                       
                    </div>
                </div>
                <div class="row">
                    <h1 class="tilt fs-2">CAPACITÉ</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>