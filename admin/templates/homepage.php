<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5">Bienvenue <?= $_SESSION['nickname'] ?></h1>


<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>