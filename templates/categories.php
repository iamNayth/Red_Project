<?php $title = "Catégories"; ?>
<?php ob_start(); ?>

<section id="container">
    <div class="container-fluid p-5">
        <div class="row">
        <?php foreach ($categories as $category) { ?>

            <div class="col-4 d-flex align-items-center justify-content-center">
                <div class="catCard position-relative d-flex flex-column justify-content-center gap-3">
                    <div class="links">
                        <?php foreach ($s_categories as $s_category) { ?>
                            <a class="sousCat text-center" href=""> <?= $s_category['name'] ?> </a>
                        <?php } ?>
                    </div>
                    <div class="white-bg"></div>
                    <h4 class="catName"> <?= $category['name'] ?> </h4>
                    <img class="catImage" src=" <?= $category['img_path'] ?>"> 
                </div>
            </div>

        <?php } ?>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>