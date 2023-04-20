<?php $title = "Mes commandes"; ?>
<?php ob_start(); ?>

<h1 class="tilt text-center color1 fs-3">MES COMMANDES</h1>

<?php $content = ob_get_clean();?>
<?php require('../templates/dashboard.php') ?>