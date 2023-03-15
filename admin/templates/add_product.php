<?php $title = "Ajouter"; ?>
<?php ob_start(); ?>
    <h1 class="mb-5"><a href="../public/index.php?page=products" class="btn btn-secondary me-3">Retour</a>AJOUTER</h1>
    <section class="d-flex justify-centent-between gap-5 w-100">
    <div class="w-50">
        <h2 class="mb-5">Ajouter un produit</h2>
        <form action="../controllers/add_product.php" method="POST" enctype="multipart/form-data">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control mb-3" placeholder="Nom" name="name">
            <label class="form-label">Description</label>
            <textarea type="textaera" class="form-control mb-3" placeholder="Description" name="description"></textarea>
            <label class="form-label">Prix</label>
            <input type="text" class="form-control mb-3" placeholder="Prix du produit en €" name="price"><br>
            <label for="formFile" class="form-label">Ajouter une image au produit</label>
            <input type="text" class="form-control mb-3" placeholder="Nom de la première image" name="name_picture-1">
            <input class="form-control mb-3" type="file" name="picture-1">
            <label for="formFile" class="form-label">Ajouter une deuxième image</label>
            <input type="text" class="form-control mb-3" placeholder="Nom de la deuxième image" name="name_picture-2">
            <input class="form-control mb-3" type="file" name="picture-2">
            <label for="formFile" class="form-label">Ajouter une troisième image</label>
            <input type="text" class="form-control mb-3" placeholder="Nom de la troisième image" name="name_picture-3">
            <input class="form-control mb-3" type="file" name="picture-3">
            <label for="formFile" class="form-label">Ajouter une quatrième image</label>
            <input type="text" class="form-control mb-3" placeholder="Nom de la quatrième image" name="name_picture-4">
            <input class="form-control mb-3" type="file" name="picture-4">
            <label for="formFile" class="form-label">Ajouter une cinquième image</label>
            <input type="text" class="form-control mb-3" placeholder="Nom de la cinquième image" name="name_picture-5">
            <input class="form-control mb-3" type="file" name="picture-5">
            <button class="btn btn-primary" type="submit" name="addProducts">Ajouter</button>
        </form>
    </div>
    <div class="w-50">
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('../templates/layout.php') ?>