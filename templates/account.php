<?php $title = "Mon profil"; ?>
<?php ob_start(); ?>

<h1 class="tilt text-center color1 fs-3">MON PROFIL</h1>

<section>
    <div class="container p-3">
        <div class="row g-3">
            <div class="col-6">
                <div class="bg-white rounded-2 mont p-5 position-relative">
                    <h2 class="fs-4">Infos personnelles</h2>
                    <span><?= (isset($_SESSION['first_name'])) ? $_SESSION['name']. ' '. $_SESSION['first_name'] : ''; ?></span><br>
                    <span><?= (isset($_SESSION['first_name'])) ? $_SESSION['email'] : ''; ?></span><br>
                    <a href="" class="fw-bold" style="text-decoration:underline">Modifier mon mot de passe</a>
                    <a href=""><img class="position-absolute" src="../admin/assets/icons/edit-svgrepo-com.svg" style="top: 50%; right: 2em; height:40px; transform:translateY(-50%)"></a>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-white rounded-2 mont p-5 position-relative">
                    <h2 class="fs-4">Adresse de facturation</h2>
                    <span><?= (isset($_SESSION['billing_address'])) ? $_SESSION['billing_address'] : "Aucune adresse de facturation n'est connu à ce jour."; ?></span><br>
                    <a href=""><img class="position-absolute" src="../admin/assets/icons/edit-svgrepo-com.svg" style="top: 50%; right: 2em; height:40px; transform:translateY(-50%)"></a>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-white rounded-2 mont p-5 position-relative">
                    <h2 class="fs-4">Adresse de livraison</h2>
                    <span><?= (isset($_SESSION['delivery_address'])) ? $_SESSION['delivery_address'] : "Aucune adresse de livraison n'est connu à ce jour"; ?></span><br>
                    <a href=""><img class="position-absolute" src="../admin/assets/icons/edit-svgrepo-com.svg" style="top: 50%; right: 2em; height:40px; transform:translateY(-50%)"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/dashboard.php') ?>