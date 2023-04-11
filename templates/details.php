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
                        <button class="button3 w-100 mont">Ajouter au panier</button>                       
                    </div>
                </div>
                <div class="row gy-2 mb-5">
                    <h1 class="tilt fs-2">CAPACITÉ</h1>
                    <?php foreach($storage as $size) { ?> 
                            <div class="col-4">
                                <input type="radio" class="btn-check" name="options" id="<?= $size['id']?>" autocomplete="off">
                                <label class="btn btn-primary w-100 mont border-3" for="<?= $size['id']?>"><?= $size['size']?></label>
                            </div>
                    <?php
                    } ?>
                </div>
                <div class="row mb-5 gy-2">
                    <h1 class="tilt fs-2">NOUS PRENONS SOIN DE VOUS</h1>
                    <div class="col-6 d-flex align-items-center gap-2">
                        <img src="../admin/assets/icons/calendar.svg" style="height: 30px">
                        <span class="mont">30 jours pour changer d'avis</span>
                    </div>
                    <div class="col-6 d-flex align-items-center gap-2">
                        <img src="../admin/assets/icons/package.svg" style="height: 30px">
                        <span class="mont">Livraison gratuite sous 4 à jours ouvré</span>
                    </div>
                    <div class="col-6 d-flex align-items-center gap-2">
                        <img src="../admin/assets/icons/shield-check-garantie.svg" style="height: 30px">
                        <span class="mont">Garantie contractuelle de 12 mois</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="p-5" style="background: #2ec4b6">   
      <div id="carouselExample" class="carousel slide mb-5">
        <div class="carousel-inner">
            <div class="container">
            <h2 class="tilt fs-2 text-light mb-3">CA POURRAIT BIEN VOUS INTERESSER</h2>
              <div class="carousel-item active">
                <div class="row">
                    <?php foreach($randomProd as $prod) { ?>
                    <div class="col-3 d-flex justify-content-center">
                        <a href="../public/index.php?page=details&id=<?php echo $prod['id']?>">
                            <div class="card">
                                <div class="img-product p-2 d-flex justify-content-center">
                                    <img class="img-fluid h-100" src="<?= str_replace('../assets/', '../admin/assets/', $prod['path'])?>">
                                </div>
                                <div class="info-product ps-2 d-flex flex-column justify-content-around p-1">
                                    <div><span class="fs-4 montbold text-light w-100"><?= $prod['name']?></span><br></div>
                                    <div class="d-inline text-truncate text-light"><span class="fs-6 mont text-light"><?= $prod['description']?></span><br></div>
                                    <div class="text-end"><span class="montbold text-end text-light w-100 fs-5 pe-3"><?= $prod['price']?> €</span></div>
                                </div>
                            </div>
                        </a>
                    </div>                
                    <?php } ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                <?php foreach($randomProd as $prod) { ?>
                    <div class="col-3 d-flex justify-content-center">
                        <a href="../public/index.php?page=details&id=<?php echo $prod['id']?>">
                            <div class="card">
                                <div class="img-product p-2 d-flex justify-content-center">
                                    <img class="img-fluid h-100" src="<?= str_replace('../assets/', '../admin/assets/', $prod['path'])?>">
                                </div>
                                <div class="info-product ps-2 d-flex flex-column justify-content-around p-1">
                                    <div><span class="fs-4 montbold text-light w-100"><?= $prod['name']?></span><br></div>
                                    <div class="d-inline text-truncate text-light"><span class="fs-6 mont text-light"><?= $prod['description']?></span><br></div>
                                    <div class="text-end"><span class="montbold text-end text-light w-100 fs-5 pe-3"><?= $prod['price']?> €</span></div>
                                </div>
                            </div>
                        </a>
                    </div>                
                    <?php } ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                <?php foreach($randomProd as $prod) { ?>
                    <div class="col-3 d-flex justify-content-center">
                        <a href="../public/index.php?page=details&id=<?php echo $prod['id']?>">
                            <div class="card">
                                <div class="img-product p-2 d-flex justify-content-center">
                                    <img class="img-fluid h-100" src="<?= str_replace('../assets/', '../admin/assets/', $prod['path'])?>">
                                </div>
                                <div class="info-product ps-2 d-flex flex-column justify-content-around p-1">
                                    <div><span class="fs-4 montbold text-light w-100"><?= $prod['name']?></span><br></div>
                                    <div class="d-inline text-truncate text-light"><span class="fs-6 mont text-light"><?= $prod['description']?></span><br></div>
                                    <div class="text-end"><span class="montbold text-end text-light w-100 fs-5 pe-3"><?= $prod['price']?> €</span></div>
                                </div>
                            </div>
                        </a>
                    </div>                
                    <?php } ?>
                </div>
              </div>
            </div>
            <button id="btn" class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button id="btn" class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>