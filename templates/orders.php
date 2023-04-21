<?php $title = "Mes commandes"; ?>
<?php ob_start(); ?>

<h1 class="tilt text-center color1 fs-3">MES COMMANDES</h1>
<div class="container bg-white rounded-2 mb-5">
    <div class="row">
        <div class="col-12 d-flex flex-column align-items-center h-100 pb-5">
            <img class="img-fluid"src="../assets/img/illustration_orders 1.png" style="height: 15em">
            <span class="mont fs-4 text-center">Oups.. C'est dur a croire mais il semblerait que vous n'ayez pas<br> encore commandé sur Soltech.</span><br>
            <span class="mont fs-6 text-center opacity-50 mb-3">Mais vous pouvez y remedier en un clic :</span>
            <a href="index.php?page=categories" class="button3">Adopter un appareil</a>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require('../templates/dashboard.php') ?>