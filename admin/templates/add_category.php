<?php $title = "Ajouter"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5"><a href="../public/index.php?page=category" class="btn btn-secondary me-3">Retour</a>Ajouter</h1>
    <h3 class="text-success"><?=$msg?></h3>
    <section class="d-flex justify-centent-between gap-5 w-100">
    <div class="w-50">
        <h2 class="mb-5">Ajouter une catégorie</h2>
        <form action="../public/index.php?page=validate_add_category" method="POST" enctype="multipart/form-data">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control mb-3" placeholder="Nom" name="name">
            <label class="form-label">Description</label>
            <textarea type="textaera" class="form-control mb-3" placeholder="Description" name="description"></textarea>
            <label for="formFile" class="form-label">Ajouter une image à la catégorie</label>
            <input class="form-control mb-3" type="file" name="picture">
            <button class="btn btn-primary" type="submit" name="addCategorie">Ajouter</button>
        </form>
    </div>
    <div class="w-50">
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>