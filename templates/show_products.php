<?php $title = "Produits"; ?>
<?php ob_start(); ?>
<section>
    <h1 class="tilt ps-5 ms-5 mt-5 color1"><?= $subcategorie['name'] ?></h1>
    <div class="container pt-5 pb-5">
        <div class="row gy-5">
            <?php foreach($products as $product) { ?>
                <div class="col-3 d-flex justify-content-center">
                    <a href="../public/index.php?page=details&id=<?php echo $product['id']?>">
                        <div class="card">
                        <div class="img-product p-2 d-flex justify-content-center">
                            <img class="img-fluid h-100" src="<?= str_replace('../assets/', '../admin/assets/', $product['path'])?>">
                        </div>
                        <div class="info-product ps-2 d-flex flex-column justify-content-around p-1">
                            <div><span class="fs-4 montbold text-light w-100"><?= $product['name']?></span><br></div>
                            <div class="d-inline text-truncate text-light"><span class="fs-6 mont text-light"><?= $product['description']?></span><br></div>
                            <div class="text-end"><span class="montbold text-end text-light w-100 fs-5 pe-3"><?= $product['price']?> €</span></div>
                        </div>
                        </div>
                    </a>
                </div>                
            <?php } ?>
        </div>   
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>