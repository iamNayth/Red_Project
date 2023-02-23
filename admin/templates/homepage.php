<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">ACCUEIL</h1>

<?php $content = ob_get_clean();?>
<?php require('layout.php') ?>