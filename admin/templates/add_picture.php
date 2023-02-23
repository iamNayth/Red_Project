<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
<h1 class="mb-5">Ajouter une image</h1>
        <form action="index.php?action=addPicture" method="POST">
            <input class="form-control mb-3" type="file" id="picture" name="picture">
            <input type="text" class="form-control mb-3" placeholder="Nom de l'image" name="name">
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
<?php $content = ob_get_clean();?>
<?php require('layout.php') ?>