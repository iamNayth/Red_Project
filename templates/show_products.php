<?php $title = "Produits"; ?>
<?php ob_start(); ?>
<section>
    <h1 class="tilt ps-5 ms-5 mt-5 color1"><?= $subcategorie['name'] ?></h1>
    <div class="container pt-5 pb-5">
        <div class="row">
            <?php foreach($products as $product) { ?>
                <div class="col d-flex justify-content-center">
                    <div class="card">
                        <div class="img-product p-2 d-flex justify-content-center">
                            <img class="img-fluid h-100" src="<?= str_replace('../assets/', '../admin/assets/', $product['path'])?>">
                        </div>
                        <div class="info-product p-2 d-flex flex-column justify-content-around p-1">
                            <span class="fs-4 montbold text-light w-100"><?= $product['name']?></span><br>
                            <span class="fs-6 mont text-light w-100"><?= $product['description']?></span><br>
                            <span class="montbold text-end text-light w-100 fs-5 pe-3"><?= $product['price']?> €</span>
                        </div>
                        </div>
                    </div>
            <?php } ?>
        </div>   
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>